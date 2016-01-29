<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminPageBlocksController extends AdminContentController {
    public $name = 'AdminPageBlocks';
    public $uses = array('PageBlock');

    public $paginate = array(
        'fields' => array('title', 'published', 'sorting'),
        'order' => array('sorting' => 'asc'),
        'limit' => 20
    );
/*
    public function edit($id = 0, $parent_id = 0) {
        $model = $this->getModel();
        if ($this->request->is(array('put', 'post'))) {
            if ($id) {
                $this->request->data($model.'.id', $id);
            }
            if ($parent_id) {
                $this->request->data($model.'.parent_id', $parent_id);
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
*/
}
