<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminSongPacksController extends AdminContentController {
    public $name = 'AdminSongPacks';
    public $uses = array('SongPack');

    public $paginate = array(
        'fields' => array('title', 'published'),
        'order' => array('published' => 'desc'),
        'limit' => 20
    );

}
