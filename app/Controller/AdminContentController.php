<?php
App::uses('AdminController', 'Controller');
class AdminContentController extends AdminController {
    public $name = 'AdminContent';
    public $uses = array('Article');

	public $paginate = array(
		'fields' => array('created', 'title', 'slug', 'published', 'featured', 'sorting'),
		'order' => array('sorting' => 'asc'),
		'limit' => 20
	);

	public function beforeRender() {
		parent::beforeRender();
		$this->set('objectType', $this->getModel());
	}

	protected function getModel() {
		return $this->uses[0];
	}

    public function index() {
		$this->PCTableGrid->paginate($this->getModel());
    }
    
	public function edit($id = 0) {
		$model = $this->getModel();
		if ($this->request->is(array('put', 'post'))) {
			if ($id) {
				$this->request->data($model.'.id', $id);
			}
			if ($this->{$model}->saveAll($this->request->data)) {
				$this->Flash->success(__('Record has been successfully saved'));
				$id = $this->{$model}->id;
				return $this->redirect(array('action' => 'edit', $id));
			}
		} else {
			$this->request->data = $this->{$model}->findById($id);
		}
	}

	public function delete($id) {
		$model = $this->getModel();
		$this->Flash->success(__('Record has been successfully deleted'));
		$this->{$model}->delete($id);
		$this->redirect(array('action' => 'index'));
	}
}
