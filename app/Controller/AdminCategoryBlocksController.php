<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminCategoryBlocksController extends AdminContentController {
    public $name = 'AdminCategoryBlocks';
    public $uses = array('CategoryBlock');

    public $paginate = array(
        'fields' => array('title', 'published', 'sorting'),
        'order' => array('sorting' => 'asc'),
        'limit' => 20
    );

}
