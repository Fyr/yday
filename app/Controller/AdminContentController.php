<?php
App::uses('AdminController', 'Controller');
class AdminContentController extends AdminController {
    public $name = 'AdminContent';
	public $components = array('Paginator');
    public $uses = array('Page', 'News');

	public $paginate = array(
		'Page' => array(
			'fields' => array('created', 'title', 'slug', 'published', 'featured'),
			'limit' => 20
		),
		'News' => array(
			'fields' => array('id', 'created', 'title', 'teaser', 'featured', 'published')
		)
	);

    public function index() {
		$aRows = $this->Paginator->paginate('Page');
		$this->set('aRows', $aRows);
		// fdebug($aRows);
    }
    
	public function edit($id = 0) {
		if ($this->request->is(array('put', 'post'))) {
			if ($id) {
				$this->request->data('Page.id', $id);
			}
			if ($this->Page->saveAll($this->request->data)) {
				$this->Flash->success(__('Record has been successfully saved'));
				$id = $this->Page->id;
				// return $this->redirect(array('action' => 'edit', $id));
			}
		} else {
			$this->request->data = $this->Page->findById($id);
		}
	}

	public function delete($id) {
		$this->Flash->success(__('Record has been successfully deleted'));
		$this->Page->delete($id);
		$this->redirect(array('action' => 'index'));
	}
}
