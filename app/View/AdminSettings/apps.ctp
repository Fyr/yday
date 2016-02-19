<?
	$title = __('Mobile apps');
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

	echo $this->PHForm->input('app_apple', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('App store URL'))));
	echo $this->PHForm->input('app_google', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Google playmarket URL'))));

	echo $this->element('AdminUI/form_actions', array('backURL' => array('action' => $this->request->action)));
	echo $this->PHForm->end();
?>
		</div>
	</div>
</div>