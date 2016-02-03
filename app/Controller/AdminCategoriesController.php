<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminCategoriesController extends AdminContentController {
    public $name = 'AdminCategories';
    public $uses = array('Category');

    public $paginate = array(
        'fields' => array('title', 'slug'),
        'order' => array('published' => 'desc'),
        'limit' => 20
    );
}
