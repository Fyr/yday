<?php
App::uses('AppModel', 'Model');
class Category extends AppModel {

    public $hasOne = array(
        'Media' => array(
            'className' => 'Media.Media',
            'foreignKey' => 'object_id',
            'conditions' => array('Media.media_type' => 'image', 'Media.object_type' => 'Category', 'Media.main' => 1),
            'dependent' => false
        )
    );

    public function getOptions() {
        return $this->find('list', array('order' => 'sorting'));
    }
}
