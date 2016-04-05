<?php
App::uses('AppModel', 'Model');
class OrderCustom extends AppModel {
    public $useTable = 'order_custom';

    public $hasMany = array(
        'OrderServices' => array(
            'dependent' => true
        )
    );
}
