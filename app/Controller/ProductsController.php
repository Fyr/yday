<?php
App::uses('AppController', 'Controller');
App::uses('Media', 'Media.Model');
App::uses('Product', 'Model');
App::uses('ProductBlock', 'Model');
App::uses('ParamGroup', 'Model');
App::uses('ProductPack', 'Model');
App::uses('PMFormField', 'Form.Model');
App::uses('PMFormValue', 'Form.Model');
App::uses('FieldTypes', 'Form.Vendor');
App::uses('Page', 'Model');
App::uses('PageBlock', 'Model');
class ProductsController extends AppController {
	public $name = 'Products';
	public $uses = array('Media.Media', 'Product', 'ProductBlock', 'ParamGroup', 'ProductPack', 'Form.PMFormField', 'Form.PMFormValue', 'Page', 'PageBlock');

	public function view($slug) {
		$product = $this->Product->findBySlug($slug);
		$id = $product['Product']['id'];
		$conditions = array('media_type' => 'image', 'object_type' => 'Product', 'object_id' => $id, 'main' => 0);
		$aMedia = $this->Media->find('all', compact('conditions'));

		$conditions = array('parent_id' => $id, 'published' => 1);
		$order = 'sorting';
		$productBlocks = $this->ProductBlock->find('all', compact('conditions', 'order'));
		$this->set(compact('product', 'aMedia', 'productBlocks'));

		$conditions = array('parent_id' => $product['Product']['parent_id']);
		$order = 'sorting';
		$aParamGroups = $this->ParamGroup->find('all', compact('conditions', 'order'));
		$aParamGroups = Hash::combine($aParamGroups, '{n}.ParamGroup.id', '{n}');
		$this->set('aFormGroups', $aParamGroups);

		$conditions = array('object_type' => 'PMFormField', 'parent_id' => array_keys($aParamGroups));
		$order = 'sorting';
		$aParams = $this->PMFormField->find('all', compact('conditions', 'order'));
		if ($aParams) {
			// $ids = Hash::extract($aParams, '{n}.PMFormField.id');
			$aParams = Hash::combine($aParams, '{n}.PMFormField.id', '{n}', '{n}.PMFormField.parent_id');
		}
		$this->set('aForms', $aParams);

		$aValues = $this->PMFormValue->getValues('ProductParam', $id);
		$this->set('aValues', $aValues);

		$conditions = array('parent_id' => $id);
		$order = 'sorting';
		$aPacks = $this->ProductPack->find('all', compact('conditions', 'order'));
		$this->set('aPacks', $aPacks);
		$aPackValues = array();
		foreach($aPacks as $pack) {
			$pack_id = Hash::get($pack, 'ProductPack.id');
			foreach($this->PMFormValue->getValues('ProductPackParam', $pack_id) as $fid => $val) {
				$aPackValues[$fid][$pack_id] = $val;
			}
		}
		$this->set('aPackValues', $aPackValues);

		$page['support'] = $this->Page->findBySlug('support');
		$pageBlocks['support'] = $this->PageBlock->findAllByPublishedAndParentId(1, $page['support']['Page']['id'], null, 'sorting');
		$this->set(compact('page', 'pageBlocks'));

		// в первую очередь выводим особые продукты, затем из той же категории, затем все остальные
		$conditions = array('Product.id <> '.$product['Product']['id']);
		$order = 'Product.featured DESC, Product.parent_id = '.$product['Product']['parent_id'].' DESC';
		$limit = 3;
		$otherProducts = $this->Product->find('all', compact('conditions', 'order', 'limit'));

		$conditions = array('parent_id' => Hash::extract($otherProducts, '{n}.Product.id'));
		$order = 'sorting';
		$otherPacks = $this->ProductPack->find('all', compact('conditions', 'order'));
		$otherPacks = Hash::combine($otherPacks, '{n}.ProductPack.id', '{n}', '{n}.ProductPack.parent_id');
		$this->set(compact('otherProducts', 'otherPacks'));
	}

}
