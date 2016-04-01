<?
	echo $this->Html->link('<i class="fa fa-shopping-cart"></i> '.__('Order'), array('controller' => 'AdminCategoryBlocks', 'action' => 'index', $id), array(
		'class' => 'btn btn-outline dark btn-sm blue',
		'escape' => false
	)).' ';
