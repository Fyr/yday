<?php
App::uses('AppController', 'Controller');
class UserController extends AppController {
	public $name = 'User';
	public $layout = 'user';
	public $components = array('RequestHandler', 'Flash', 'Table.PCTableGrid');
	public $uses = array('User', 'Media.Media', 'SongPack', 'Song', 'SubscrPlan');
	public $helpers = array('Form.PHForm', 'Table.PHTableGrid', 'Media.PHMedia');

	public $paginate = array();

	public function login() {
		$tries = (isset($_COOKIE['login'])) ? intval($_COOKIE['login']) - 1 : 2;
		$this->_response = array('status' => 'OK', 'errMsg' => __('Invalid key.<br />You have left %s attempt(s)', $tries), 'tries' => $tries);
		if ($tries < 0) {
			$this->_response = array('status' => 'OK', 'errMsg' => __('You have no attempts left'), 'tries' => -1);
		} elseif ($this->request->is('post')) {
			$user = $this->User->findByKeyAndActive($this->request->data('key'), 1);
			if ($user) {
				$this->Auth->login($user['User']);
				$this->_response = array('status' => 'OK', 'url' => Router::url($this->Auth->loginRedirect));
			}
		}
		$this->set('_response', $this->_response);
		$this->set('_serialize', '_response');
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function index() {
		$this->redirect(array('action' => 'profile'));
	}

	public function profile() {
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data('User.id', $this->currUser['id']);
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Record has been successfully saved'));
				$user = $this->User->findById($this->currUser['id']);
				$this->Auth->login($user['User']);
				return $this->redirect(array('action' => 'profile'));
			}
		} else {
			$this->request->data('User', $this->currUser);
		}

		$this->set('product', $this->Product->findById($this->currUser['product_id']));
		$this->set('subscription', $this->SubscrPlan->findById($this->currUser['subscr_plan_id']));
	}

	protected function _index($model) {
		foreach($this->paginate as &$field) {
			$field = str_replace('$lang', Configure::read('Config.language'), $field);
		}
		$this->set('objectType', $model);
		return $this->PCTableGrid->paginate($model);
	}

	public function songpacks() {
		$this->paginate = array(
			'fields' => array('title_$lang'),
			'order' => array('sorting' => 'desc'),
			'conditions' => array('published' => 1),
			'limit' => 20
		);
		$rowset = $this->_index('SongPack');
		$ids = Hash::extract($rowset, '{n}.SongPack.id');
		$conditions = array('media_type' => 'raw_file', 'object_type' => 'SongPack', 'object_id' => $ids);
		$aMedia = $this->Media->find('all', compact('conditions'));
		$aMedia = Hash::combine($aMedia, '{n}.Media.object_id', '{n}');
		$this->set(compact('rowset', 'aMedia'));
	}

	public function songs() {
		$this->paginate = array(
			'fields' => array('artist', 'song', 'format', 'back_vocals', 'video_clip'),
			'order' => array('artist'),
			'conditions' => array('published' => 1),
			'limit' => 3
		);

		if ($artist = $this->request->query('artist')) {
			$this->paginate['conditions']['artist'] = $artist;
		}
		if ($song = $this->request->query('song')) {
			$this->paginate['conditions']['song'] = $song;
		}
		if ($format = $this->request->query('format')) {
			$this->paginate['conditions']['format'] = $format;
		}
		if ($back_vocals = $this->request->query('back_vocals')) {
			$this->paginate['conditions']['back_vocals'] = $back_vocals;
		}
		if ($video_clip = $this->request->query('video_clip')) {
			$this->paginate['conditions']['video_clip'] = $video_clip;
		}

		$this->_index('Song');

		$this->set('aFormatOptions', $this->Song->getFormatOptions());
	}

	public function customorder() {

	}
}
