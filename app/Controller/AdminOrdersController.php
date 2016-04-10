<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminOrdersController extends AdminContentController {
    public $name = 'AdminOrders';
    public $uses = array('Order', 'OrderSong', 'OrderPack', 'OrderCustom', 'OrderService', 'Service', 'User');

    public $paginate = array(
        'fields' => array('id', 'user_id', 'created', 'total_$lang', 'status'),
        'order' => array('created' => 'DESC')
    );

    public function index($parent_id = '') {
        $rowset = parent::index();

        $ids = Hash::extract($rowset, '{n}.Order.id');
        $orders = $this->Order->getOrder($ids);

        $ids = Hash::extract($rowset, '{n}.Order.user_id');
        $users = Hash::combine($this->User->findAllById($ids), '{n}.User.id', '{n}.User');

        $this->set(compact('orders', 'users'));
    }

    public function edit($id = 0, $parent_id = '') {
        parent::edit($id, $parent_id);

        $order = $this->Order->getOrder($id);
        $this->set('orderData', $order);

        $aServices = $this->Service->getOptions(true);
        $this->set('aServices', $aServices);
    }
}
