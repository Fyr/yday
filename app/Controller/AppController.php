<?php
App::uses('Category', 'Model');
App::uses('Product', 'Model');
class AppController extends Controller {
	public $components = array('DebugKit.Toolbar');

	protected $aCategories, $aProducts;

	public function __construct($request = null, $response = null) {
		$this->_beforeInit();
		parent::__construct($request, $response);
		$this->_afterInit();
	}

	protected function _beforeInit() {
		$this->helpers = array_merge(array('Html', 'Form', 'Paginator', 'Settings'), $this->helpers); // 'ArticleVars', 'Media.PHMedia', 'Core.PHTime', 'Media', 'ObjectType'
	}

	protected function _afterInit() {
		// after construct actions here
		$this->loadModel('Settings');
		$this->Settings->initData();

		$lang = (isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'eng') ? 'eng' : 'rus';
		Configure::write('Config.language', $lang);
	}

	public function loadModel($modelClass = null, $id = null) {
		if ($modelClass === null) {
			$modelClass = $this->modelClass;
		}

		$this->uses = ($this->uses) ? (array)$this->uses : array();
		if (!in_array($modelClass, $this->uses, true)) {
			$this->uses[] = $modelClass;
		}

		list($plugin, $modelClass) = pluginSplit($modelClass, true);

		$this->{$modelClass} = ClassRegistry::init(array(
			'class' => $plugin . $modelClass, 'alias' => $modelClass, 'id' => $id
		));
		if (!$this->{$modelClass}) {
			throw new MissingModelException($modelClass);
		}
		return $this->{$modelClass};
	}


	public function isAuthorized($user) {
		$this->set('currUser', $user);
		return Hash::get($user, 'active');
	}

	public function redirect404() {
		// return $this->redirect(array('controller' => 'pages', 'action' => 'notExists'), 404);
		throw new NotFoundException();
	}

	public function beforeFilter() {
		$this->beforeFilterLayout();
	}

	public function beforeFilterLayout() {
		$this->loadModel('Category');
		$this->aCategories = $this->Category->find('all', array('order' => 'sorting'));
		$this->aCategories = Hash::combine($this->aCategories, '{n}.Category.id', '{n}');

		$this->loadModel('Product');
		$this->aProducts = $this->Product->find('all', array('order' => 'Product.sorting'));
		$this->aProducts = Hash::combine($this->aProducts, '{n}.Product.id', '{n}', '{n}.Product.parent_id');
	}

	public function beforeRender() {
		$this->beforeRenderLayout();
	}

	protected function beforeRenderLayout() {
		$this->set('aCategories', $this->aCategories);
		$this->set('aProducts', $this->aProducts);
		$this->set('lang', Configure::read('Config.language'));
	}
}
