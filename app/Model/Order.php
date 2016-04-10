<?php
App::uses('AppModel', 'Model');
App::uses('OrderSong', 'Model');
App::uses('Song', 'Model');
App::uses('OrderPack', 'Model');
App::uses('SongPack', 'Model');
App::uses('OrderCustom', 'Model');
class Order extends AppModel {

    public function getOrder($ids) {
        $order['Order'] = $this->findAllById($ids);
        if ($order['Order'] && !is_array($ids)) {
            $order['Order'] = $order['Order'][0]['Order'];
        }

        $this->OrderSong = $this->loadModel('OrderSong');
        $order['OrderSongs'] = $this->OrderSong->findAllByOrderId($ids);
        $order['Songs'] = array();
        if ($order['OrderSongs']) {
            $order['OrderSongs'] = (is_array($ids)) ? Hash::combine($order['OrderSongs'], '{n}.OrderSong.id', '{n}', '{n}.OrderSong.order_id') : $order['OrderSongs'];
            $this->Song = $this->loadModel('Song');
            $order['Songs'] = $this->Song->findAllById(Hash::extract($order['OrderSongs'], (is_array($ids)) ? '{n}.{n}.OrderSong.song_id' : '{n}.OrderSong.song_id'));
            $order['Songs'] = Hash::combine($order['Songs'], '{n}.Song.id', '{n}.Song');
        }

        $this->OrderPack = $this->loadModel('OrderPack');
        $order['OrderPacks'] = $this->OrderPack->findAllByOrderId($ids);
        $order['Packs'] = array();
        if ($order['OrderPacks']) {
            $order['OrderPacks'] = (is_array($ids)) ? Hash::combine($order['OrderPacks'], '{n}.OrderPack.id', '{n}', '{n}.OrderPack.order_id') : $order['OrderPacks'];
            $this->SongPack = $this->loadModel('SongPack');
            $order['Packs'] = $this->SongPack->findAllById(Hash::extract($order['OrderPacks'], (is_array($ids)) ? '{n}.{n}.OrderPack.pack_id' : '{n}.OrderPack.pack_id'));
            $order['Packs'] = Hash::combine($order['Packs'], '{n}.SongPack.id', '{n}.SongPack');
        }

        $this->OrderCustom = $this->loadModel('OrderCustom');
        $order['OrderCustoms'] = $this->OrderCustom->findAllByOrderId($ids);
        if ($order['OrderCustoms']) {
            $order['OrderCustoms'] = (is_array($ids)) ? Hash::combine($order['OrderCustoms'], '{n}.OrderCustom.id', '{n}', '{n}.OrderCustom.order_id') : $order['OrderCustoms'];
        }

        return $order;
    }
}
