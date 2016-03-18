<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminServicesController extends AdminContentController {
    public $name = 'AdminServices';
    public $uses = array('Service');

    public $paginate = array(
        'fields' => array('title', 'price_rur', 'price_usd', 'published', 'sorting'),
        'order' => array('sorting' => 'desc'),
        'limit' => 20
    );

}
