<?php
App::uses('AppController', 'Controller');
App::uses('Page', 'Model');
App::uses('PageBlock', 'Model');
App::uses('News', 'Model');
App::uses('Product', 'Model');
App::uses('Category', 'Model');
class PagesController extends AppController {
	public $uses = array('Page', 'PageBlock', 'News', 'Product', 'Category');

	public function home() {
		$this->layout = 'home';
		$page = $this->Page->findBySlug('home');
		$blocks = $this->PageBlock->findAllByParentIdAndPublished($page['Page']['id'], 1, null, 'PageBlock.sorting');
		$blocks = Hash::combine($blocks, '{n}.PageBlock.slug', '{n}.PageBlock');
		$this->set('page', $page['Page']);
		$this->set('blocks', $blocks);

		$aNews = $this->News->findAllByPublished(1, null, 'News.modified DESC', 3);
		$aCategories = $this->Category->findAllByPublished(1, null, 'Category.sorting');
		$aProducts = $this->Product->findAllByPublished(1, null, 'Product.sorting');
		$this->set(compact('aNews', 'aProducts', 'aCategories'));
	}

	public function karaoke_systems() {
		$page = $this->Page->findBySlug('karaoke-systems');
		$this->set('page', $page);

		$this->ProductPack = $this->loadModel('ProductPack');
		foreach($this->aCategories as $cat_id => $category) {
			$ids = Hash::extract($this->aProducts[$cat_id], '{n}.Product.id');
			$conditions = array('parent_id' => $ids);
			$order = 'price';
			$packs = $this->ProductPack->find('first', compact('conditions', 'order'));
			$aPrices[$cat_id] = ($packs) ? floatval($packs['ProductPack']['price']) : 0;
		}
		$this->set('aPrices', $aPrices);
	}
}
