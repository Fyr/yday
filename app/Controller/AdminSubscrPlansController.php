<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminSubscrPlansController extends AdminContentController {
    public $name = 'AdminSubscrPlans';
    public $uses = array('SubscrPlan');

    public $paginate = array(
        'fields' => array('title', 'price', 'published', 'featured', 'sorting'),
        'order' => array('sorting' => 'desc'),
        'limit' => 20
    );
}
