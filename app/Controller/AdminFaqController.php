<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminFaqController extends AdminContentController {
    public $name = 'AdminFaq';
    public $uses = array('Faq');

    public $paginate = array(
        'fields' => array('title', 'body', 'published', 'sorting'),
        'order' => array('sorting' => 'asc'),
        'limit' => 20
    );
}
