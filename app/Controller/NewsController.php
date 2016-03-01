<?php
App::uses('AppController', 'Controller');
App::uses('News', 'Model');
class NewsController extends AppController {
	public $name = 'News';
	public $uses = array('News');
	// public $helpers = array('Core.PHTime');

	public function index($page = 1) {
		$conditions = array('published' => 1);
		$order = 'modified DESC';
		$limit = 6;
		$this->set('aNews', $this->News->find('all', compact('conditions', 'order', 'limit', 'page')));
		if ($this->request->is('ajax')) {
			// $this->layout = 'ajax';
			$this->render('/Elements/news', 'ajax');
		}
	}

	public function view($slug) {
		$article = $this->News->findBySlug($slug);
		$this->set('article', $article);

		$conditions = array('published' => 1, 'featured' => 1);
		$order = 'sorting DESC';
		$limit = 3;
		$this->set('aFeaturedNews', $this->News->find('all', compact('conditions', 'order', 'limit')));
	}
}
