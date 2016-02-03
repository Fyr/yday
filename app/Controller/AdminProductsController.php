<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminProductsController extends AdminContentController {
    public $name = 'AdminProducts';
    public $uses = array('Product', 'Category');

    public $paginate = array(
        'fields' => array('title', 'slug', 'published', 'featured', 'sorting'),
        'order' => array('sorting' => 'desc'),
        'limit' => 20
    );

    public function edit($id = 0, $parent_id = '') {
        parent::edit($id, $parent_id);

        $this->set('aCategoryOptions', $this->Category->getObjectOptions());
    }
}
