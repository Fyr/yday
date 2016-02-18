<?php
App::uses('AppController', 'Controller');
App::uses('News', 'Model');
class NewsController extends AppController {
	public $name = 'News';
	public $uses = array('News');

	public function index() {
		$conditions = array('published' => 1);
		$order = 'sorting';
		$this->set('aNews', $this->News->find('all', compact('conditions', 'order')));
	}

	public function view($slug) {
		$article = $this->News->findBySlug($slug);
		$this->set('article', $article);

		$conditions = array('published' => 1, 'featured' => 1);
		$order = 'sorting';
		$limit = 3;
		$this->set('aFeaturedNews', $this->News->find('all', compact('conditions', 'order', 'limit')));
	}
}
