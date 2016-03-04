<?php
App::uses('AppModel', 'Model');
App::uses('Article', 'Article.Model');
class Category extends Article {
    protected $objectType = 'Category';

    public $hasOne = array(
        'Media' => array(
            'className' => 'Media.Media',
            'foreignKey' => 'object_id',
            'conditions' => array('Media.media_type' => 'image', 'Media.object_type' => 'Category', 'Media.main' => 1),
            'dependent' => false
        )
    );
}
