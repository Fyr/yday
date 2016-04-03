<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminSongsController extends AdminContentController {
    public $name = 'AdminSongs';
    public $uses = array('Song');

    public $paginate = array(
        'fields' => array('artist', 'song', 'format', 'back_vocals', 'video_clip', 'published'),
        'order' => array('published' => 'desc'),
        'limit' => 20
    );

}
