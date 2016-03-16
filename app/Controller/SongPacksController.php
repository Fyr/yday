<?php
App::uses('AppController', 'Controller');
App::uses('Page', 'Model');
App::uses('PageBlock', 'Model');
App::uses('SongPack', 'Model');
App::uses('SubscrPlan', 'Model');
class SongPacksController extends AppController {
	public $uses = array('Page', 'PageBlock', 'Media.Media', 'SongPack', 'SubscrPlan');

	public function index() {
		$page = $this->Page->findBySlug('karaoke-songs-packs');
		$blocks = $this->PageBlock->findAllByParentIdAndPublished($page['Page']['id'], 1, null, 'PageBlock.sorting');
		$blocks = Hash::combine($blocks, '{n}.PageBlock.slug', '{n}.PageBlock');

		$id = $page['Page']['id'];
		$conditions = array('media_type' => 'image', 'object_type' => 'Page', 'object_id' => $id);
		$aMedia = $this->Media->find('all', compact('conditions'));

		$aSongPacks = $this->SongPack->findAllByPublished(1, null, 'sorting');

		$aPlans = $this->SubscrPlan->findAllByPublished(1, null, 'sorting');
		$this->set(compact('page', 'blocks', 'aMedia', 'aSongPacks', 'aPlans'));

	}

}
