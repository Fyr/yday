<?php
App::uses('AppModel', 'Model');
class PMFormValue extends AppModel {
	public $useTable = 'form_values';

	public function saveValues($object_type, $parent_id, $data) {
		$this->deleteAll(compact('object_type', 'parent_id'));
		if ($data) {
			foreach ($data as $field_id => $value) {
				$this->clear();
				$this->save(compact('object_type', 'parent_id', 'field_id', 'value'));
			}
		}
	}

	public function getValues($object_type, $parent_id) {
		$conditions = compact('object_type', 'parent_id');
		$rows = $this->find('all', compact('conditions'));
		return Hash::combine($rows, '{n}.PMFormValue.field_id', '{n}.PMFormValue.value');
	}
}
