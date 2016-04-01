<?php
App::uses('AppController', 'Controller');
class UserController extends AppController {
	public $name = 'User';
	public $layout = 'user';
	public $components = array('RequestHandler', 'Flash', 'Table.PCTableGrid');
	public $uses = array('User', 'SongPack', 'Media.Media');
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
}
