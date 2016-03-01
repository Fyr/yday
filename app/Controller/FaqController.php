<?php
App::uses('AppController', 'Controller');
App::uses('Faq', 'Model');
App::uses('Page', 'Model');
class FaqController extends AppController {
	public $name = 'Faq';
	public $uses = array('Faq', 'Page');

	public function index() {
		$conditions = array('published' => 1);
		$order = 'sorting';
		$this->set('aArticles', $this->Faq->find('all', compact('conditions', 'order')));

		$this->set('faq', $this->Page->findBySlug('faq'));
	}
}
