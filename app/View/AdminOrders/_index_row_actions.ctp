<?
	echo $this->Html->link('<i class="fa fa-search"></i> '.__('View order'), array('action' => 'edit', $row['Order']['id']), array(
		'class' => 'btn btn-outline dark btn-sm green',
		'escape' => false,
	));
/*
	echo $this->Html->link('<i class="fa fa-trash-o"></i> '.__('Delete'), array('action' => 'delete', $id), array(
		'class' => 'btn btn-outline dark btn-sm red',
		'escape' => false,
		'confirm' => __("Are you sure to delete this record?\nAll child records will be deleted too")
	));
*/