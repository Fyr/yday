<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminOrdersController extends AdminContentController {
    public $name = 'AdminOrders';
    public $uses = array('Order', 'OrderSong', 'OrderPack', 'OrderCustom', 'OrderService', 'Service', 'User', 'Song', 'SongPack');

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

    public function editStatus($objectType, $id) {
        $row = $this->{$objectType}->findById($id);
        $order = $this->Order->findById($row[$objectType]['order_id']);
        if ($this->request->is(array('put', 'post'))) {
            $this->request->data($objectType.'.id', $id);
            $this->{$objectType}->save($this->request->data($objectType));
            $this->Flash->success(__('Record has been successfully saved'));
            $this->redirect(array('action' => 'edit', $row[$objectType]['order_id']));
            return ;
        } else {
            $this->request->data = array_merge($row, $order);
        }
        if ($objectType == 'OrderSong') {
            $this->set('song', $this->Song->findById($this->request->data('OrderSong.song_id')));
        } elseif ($objectType == 'OrderPack') {
            $this->set('pack', $this->SongPack->findById($this->request->data('OrderPack.pack_id')));
        } elseif ($objectType == 'OrderCustom') {
            $aServices = $this->Service->getOptions(true);
            $this->set('aServices', $aServices);
        }
        // $this->request->data('Order', $order)
    }
}
