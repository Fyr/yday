<?
	$title = __('Catalogs');
	$breadcrumbs = array(
		__('Settings') => 'javascript:;',
		$title => ''
	);
	echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
	echo $this->element('AdminUI/title', array('title' => __('Settings')));
	echo $this->Flash->render();
?>

<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">

<?
	echo $this->element('AdminUI/form_title', compact('title'));
	echo $this->PHForm->create('Settings');

	echo $this->PHForm->input('song_price_rur', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Song price, RUR'))));
	echo $this->PHForm->input('song_price_usd', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Song price, USD'))));
	echo $this->PHForm->input('catalog_features', array('type' => 'textarea', 'label' => array('class' => 'col-md-3 control-label', 'text' => __('Catalog features'))));

	echo $this->element('AdminUI/form_actions', array('backURL' => array('action' => $this->request->action)));
	echo $this->PHForm->end();
?>
		</div>
	</div>
</div>
