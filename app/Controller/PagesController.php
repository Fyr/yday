<?php
App::uses('AppController', 'Controller');
App::uses('Page', 'Model');
App::uses('PageBlock', 'Model');
App::uses('News', 'Model');
class PagesController extends AppController {
	public $uses = array('Page', 'PageBlock', 'News');

	public function home() {
		$this->layout = 'home';
		$page = $this->Page->findBySlug('home');
		$blocks = $this->PageBlock->findAllByParentIdAndPublished($page['Page']['id'], 1, null, 'sorting');
		$blocks = Hash::combine($blocks, '{n}.PageBlock.slug', '{n}.PageBlock');
		$this->set('page', $page['Page']);
		$this->set('blocks', $blocks);

		$this->set('aNews', $this->News->findAllByPublished(1, null, 'sorting DESC', 3));
	}
}
