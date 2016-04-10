<?php
App::uses('AppController', 'Controller');
class UserController extends AppController {
	public $name = 'User';
	public $layout = 'user';
	public $components = array('RequestHandler', 'Flash', 'Table.PCTableGrid');
	public $uses = array('User', 'Media.Media', 'SongPack', 'Song', 'SubscrPlan', 'Service', 'Order');
	public $helpers = array('Form.PHForm', 'Table.PHTableGrid', 'Media.PHMedia', 'Core.PHTime');

	public $paginate = array();

	public function login() {
		$tries = (isset($_COOKIE['login'])) ? intval($_COOKIE['login']) - 1 : 2;
		$this->_response = array('status' => 'OK', 'errMsg' => __('Invalid key.<br />You have left %s attempt(s)', $tries), 'tries' => $tries);
		if ($tries < 0) {
			$this->_response = array('status' => 'OK', 'errMsg' => __('You have no attempts left'), 'tries' => -1);
		} elseif ($this->request->is('post')) {
			$user = $this->User->findByKeyAndActive($this->request->data('key'), 1);
			if ($user) {
				$this->Auth->login($user['User']);
				$this->_response = array('status' => 'OK', 'url' => Router::url($this->Auth->loginRedirect));
			}
		}
		$this->set('_response', $this->_response);
		$this->set('_serialize', '_response');
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function index() {
		$this->redirect(array('action' => 'profile'));
	}

	public function profile() {
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data('User.id', $this->currUser['id']);
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Record has been successfully saved'));
				$user = $this->User->findById($this->currUser['id']);
				$this->Auth->login($user['User']);
				return $this->redirect(array('action' => 'profile'));
			}
		} else {
			$this->request->data('User', $this->currUser);
		}

		$this->set('product', $this->Product->findById($this->currUser['product_id']));
		$this->set('subscription', $this->SubscrPlan->findById($this->currUser['subscr_plan_id']));
	}

	protected function _index($model) {
		foreach($this->paginate['fields'] as &$field) {
			$field = str_replace('$lang', Configure::read('Config.language'), $field);
		}
		$this->set('objectType', $model);
		return $this->PCTableGrid->paginate($model);
	}

	public function songpacks() {
		$this->paginate = array(
			'fields' => array('title_$lang'),
			'order' => array('sorting' => 'desc'),
			'conditions' => array('published' => 1),
			'limit' => 20
		);
		$rowset = $this->_index('SongPack');
		$ids = Hash::extract($rowset, '{n}.SongPack.id');

		$conditions = array('media_type' => 'raw_file', 'object_type' => 'SongPack', 'object_id' => $ids);
		$aMedia = $this->Media->find('all', compact('conditions'));
		$aMedia = Hash::combine($aMedia, '{n}.Media.object_id', '{n}');

		$aStatus = $this->SongPack->getStatus($ids);
		$this->set(compact('rowset', 'aMedia', 'aStatus'));
	}

	public function songs() {
		$this->paginate = array(
			'fields' => array('artist', 'song', 'format', 'back_vocals', 'video_clip'),
			'order' => array('artist'),
			'conditions' => array('published' => 1),
			'limit' => 3
		);

		if ($artist = $this->request->query('artist')) {
			$this->paginate['conditions']['artist'] = $artist;
		}
		if ($song = $this->request->query('song')) {
			$this->paginate['conditions']['song'] = $song;
		}
		if ($format = $this->request->query('format')) {
			$this->paginate['conditions']['format'] = $format;
		}
		if ($back_vocals = $this->request->query('back_vocals')) {
			$this->paginate['conditions']['back_vocals'] = $back_vocals;
		}
		if ($video_clip = $this->request->query('video_clip')) {
			$this->paginate['conditions']['video_clip'] = $video_clip;
		}

		$this->_index('Song');

		$this->set('aFormatOptions', $this->Song->getFormatOptions());
	}

	public function customorder() {
		$this->set('aServices', $this->Service->getOptions());
	}

	public function cart() {
		$aServices = $this->Service->find('all', array('order' => 'sorting'));
		$aServices = Hash::combine($aServices, '{n}.Service.id', '{n}.Service');

		if ($this->request->is(array('put', 'post'))) {
			$songs = $this->request->data('songs');
			$packs = $this->request->data('packs');
			$custom = $this->request->data('customOrders');

			if ($songs || $packs || $custom) {
				$this->Order->save(array('user_id' => $this->currUser['id']));
				if ($songs) {
					$this->OrderSong = $this->loadModel('OrderSong');
					$data = array();
					$total_rus = 0;
					$total_eng = 0;
					foreach($songs as $id) {
						$data[] = array(
							'order_id' => $this->Order->id,
							'song_id' => $id,
							'price_rus' => floatval(Configure::read('Settings.song_price_rus')),
							'price_eng' => floatval(Configure::read('Settings.song_price_eng'))
						);
						$total_rus+= floatval(Configure::read('Settings.song_price_rus'));
						$total_eng+= floatval(Configure::read('Settings.song_price_eng'));
					}
					$this->OrderSong->saveAll($data);
				}
				if ($packs) {
					$this->OrderPack = $this->loadModel('OrderPack');
					$data = array();
					foreach($packs as $id) {
						$data[] = array(
							'order_id' => $this->Order->id,
							'pack_id' => $id,
							'price_rus' => floatval(Configure::read('Settings.pack_price_rus')),
							'price_eng' => floatval(Configure::read('Settings.pack_price_eng'))
						);
						$total_rus+= floatval(Configure::read('Settings.pack_price_rus'));
						$total_eng+= floatval(Configure::read('Settings.pack_price_eng'));
					}
					$this->OrderPack->saveAll($data);
				}
				if ($custom) {
					$this->OrderCustom = $this->loadModel('OrderCustom');
					foreach($custom as $id) {
						$order = $this->cart['custom'][$id];
						$order['order_id'] = $this->Order->id;
						$data = array('OrderCustom' => $order, 'OrderService' => array());
						foreach($order['services'] as $_id) {
							$data['OrderService'][] = array(
								'service_id' => $_id,
								'price_rus' => floatval($aServices[$_id]['price_rus']),
								'price_eng' => floatval($aServices[$_id]['price_eng']),
							);
							$total_rus+= floatval($aServices[$_id]['price_rus']);
							$total_eng+= floatval($aServices[$_id]['price_eng']);
						}
						$this->OrderCustom->clear();
						$this->OrderCustom->saveAll($data);
					}
				}
				$this->Order->save(compact('total_rus', 'total_eng'));
				// TODO - clean cart
				$this->Flash->success(__('Your order has been successfully saved'));
				$this->redirect(array('action' => 'orders'));
			}
		}
		$songs = (isset($this->cart['songs'])) ? $this->Song->findAllById($this->cart['songs']) : array();
		$packs = (isset($this->cart['packs'])) ? $this->SongPack->findAllById($this->cart['packs']) : array();
		if ($packs) {
			$ids = Hash::extract($packs, '{n}.SongPack.id');
			$conditions = array('media_type' => 'raw_file', 'object_type' => 'SongPack', 'object_id' => $ids);
			$aMedia = $this->Media->find('all', compact('conditions'));
			$aMedia = Hash::combine($aMedia, '{n}.Media.object_id', '{n}');
		} else {
			$amedia = array();
		}

		$customOrders = (isset($this->cart['custom'])) ? $this->cart['custom'] : array();
		$this->set(compact('songs', 'packs', 'customOrders', 'aMedia', 'aServices'));
	}

	public function orders() {
		$this->paginate = array(
			'fields' => array('id', 'created', 'total_$lang', 'status'),
			'conditions' => array('user_id' => $this->currUser['id']),
			'order' => array('created' => 'DESC')
		);
		$rowset = $this->_index('Order');
		$ids = Hash::extract($rowset, '{n}.Order.id');

		$orders = $this->Order->getOrder($ids);
		$this->set('orders', $orders);
	}

	public function viewOrder($id) {
		$order = $this->Order->getOrder($id);
		$this->set('orderData', $order);

		$aServices = $this->Service->getOptions(true);
		$this->set('aServices', $aServices);
	}

	public function upgrade() {
	}
}
