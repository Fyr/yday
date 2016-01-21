<?php
class AppController extends Controller {
	public $components = array('DebugKit.Toolbar');

	public function __construct($request = null, $response = null) {
		$this->_beforeInit();
		parent::__construct($request, $response);
		$this->_afterInit();
	}

	protected function _beforeInit() {
		$this->helpers = array_merge(array('Html', 'Form', 'Paginator'), $this->helpers); // 'ArticleVars', 'Media.PHMedia', 'Core.PHTime', 'Media', 'ObjectType'
	}

	protected function _afterInit() {
		// after construct actions here
		// $this->loadModel('Settings');
		// $this->Settings->initData();
	}

	public function isAuthorized($user) {
		$this->set('currUser', $user);
		return Hash::get($user, 'active');
	}

}
