<?php
App::uses('AppHelper', 'View/Helper');
class PHTableGridHelper extends AppHelper {
    public $helpers = array('Paginator', 'Html');
    private $paginate;
    
    /**
     * Used to reassign Grid actions.
     *
     * @param str $modelName
     * @return array
     */
	public function getDefaultActions($modelName) {
		$table = array(
			'add' => array('class' => 'icon-color icon-add', 'label' => __('Add record'), 'href' => $this->Html->url(array('action' => 'edit'))),
			'filter' => array('class' => 'icon-color icon-filter-settings grid-show-filter', 'label' => __('Show filter settings'))
		);
		$objectType = $this->viewVar('objectType');
		$objectID = $this->viewVar('objectID');
		$backURL = $this->Html->url(array('action' => 'index', $objectType, $objectID));
		$editURL = $this->Html->url(array('action' => 'edit')).'/{$id}';
		$deleteURL = $this->Html->url(array('action' => 'delete')).'/{$id}?model='.$modelName.'&backURL='.urlencode($backURL);
		$row = array(
			'edit' => array('class' => 'icon-color icon-edit', 'label' => __('Edit record'), 'href' => $editURL),
			// array('class' => 'icon-color icon-delete', 'label' => __('Delete record'), 'href' => urldecode($deleteURL).'?model='.$modelName.'&backURL='.urlencode($backURL))
			'delete' => $this->Html->link('', $deleteURL, array('class' => 'icon-color icon-delete', 'title' => __('Delete record')), __('Are you sure to delete this record?'))
		);
		$checked = array(
			array('icon' => 'icon-color icon-delete', 'label' => __('Delete checked records'))
		);
		return compact('table', 'row', 'checked');
	}
	
	public function getDefaultColumns($modelName) {
		$aCols = $this->viewVar('_paginate.'.$modelName.'._columns');
		$aKeys = Hash::extract($aCols, '{n}.key');
		return array_combine($aKeys, $aCols);
	}

	public function getDefaultRowset($modelName) {
		return $this->viewVar('_paginate.'.$modelName.'._rowset');
	}

	public function render($modelName, $options = array()) {
		//$this->Html->css(array('/Table/css/grid', '/Icons/css/icons'), array('inline' => false));
		$this->Html->script(array('/Table/js/grid'), array('inline' => false));

		$_paginate = $this->viewVar('_paginate.'.$modelName);
		$_paginate['_model'] = $modelName;
		$_paginate['_columns'] = (isset($options['columns'])) ? $options['columns'] : $this->getDefaultColumns($modelName);
		$_paginate['_rowset'] = (isset($options['rowset'])) ? $options['rowset'] : $this->getDefaultRowset($modelName);
		if ($_paginate['_rowset']) {
			return $this->_View->element('Table.table', compact('_paginate', 'options'));
		}
		return $this->_View->element('Table.no_records', compact('_paginate', 'options'));
	}

}