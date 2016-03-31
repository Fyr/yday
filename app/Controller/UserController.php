<?php
App::uses('AppController', 'Controller');
class UserController extends AppController {
	public $name = 'User';
	public $layout = 'user';
	public $components = array('RequestHandler', 'Flash');
	public $uses = array('User');
	public $helpers = array('Form.PHForm');

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

	public function songpacks() {
	}
}
