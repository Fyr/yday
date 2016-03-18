<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminPageBlocksController extends AdminContentController {
    public $name = 'AdminPageBlocks';
    public $uses = array('PageBlock');

    public $paginate = array(
        'fields' => array('title', 'slug', 'published', 'sorting'),
        'order' => array('sorting' => 'asc'),
        'limit' => 20
    );

}
