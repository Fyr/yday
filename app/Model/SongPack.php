<?php
App::uses('AppModel', 'Model');
class SongPack extends AppModel {
    public $hasOne = array(
        'Media' => array(
            'className' => 'Media.Media',
            'foreignKey' => 'object_id',
            'conditions' => array('Media.media_type' => 'raw_file', 'Media.object_type' => 'SongPack', 'Media.main' => 0),
            'dependent' => false
        )
    );
}
