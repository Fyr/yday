<?
	$title = __('Profile');
	$breadcrumbs = array(
		__('User area') => 'javascript:;',
		$title => ''
	);
	echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
	echo $this->element('AdminUI/title', compact('title'));
	echo $this->Flash->render();
?>

<div id="aaa" class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
<?
	echo $this->element('AdminUI/form_title', array('title' => __('Edit profile')));
	echo $this->PHForm->create('User');
	echo $this->PHForm->input('key', array('readonly' => true, 'disabled' => true));
	echo $this->PHForm->input('username', array(
		'label' => array('class' => 'col-md-3 control-label', 'text' => __('Full name'))
	));
	echo $this->PHForm->input('phone');
	echo $this->PHForm->input('email');
	echo $this->PHForm->input('country');
	echo $this->PHForm->input('city');

	echo $this->element('AdminUI/form_save');
	echo $this->PHForm->end();
?>
		</div>
	</div>
</div>
