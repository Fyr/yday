<?php
App::uses('AppModel', 'Model');
App::uses('Article', 'Article.Model');
class Product extends Article {
    protected $objectType = 'Product';

    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'parent_id',
            'conditions' => array('Category.object_type' => 'Category'),
            'dependent' => true
        )
    );

}
