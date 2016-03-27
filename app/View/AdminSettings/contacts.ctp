<?
	$title = __('Contacts');
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

	echo $this->PHForm->input('title_'.$this->ArticleVars->getLang(), array(
		'label' => array('class' => 'col-md-3 control-label', 'text' => __('Company name'))
	));
	echo $this->PHForm->input('address_'.$this->ArticleVars->getLang(), array(
		'label' => array('class' => 'col-md-3 control-label', 'text' => __('Address'))
	));
	echo $this->PHForm->input('phone_'.$this->ArticleVars->getLang(), array(
		'label' => array('class' => 'col-md-3 control-label', 'text' => __('Phone'))
	));
	echo $this->PHForm->input('phone_header_'.$this->ArticleVars->getLang(), array(
		'label' => array('class' => 'col-md-3 control-label', 'text' => __('Phone (header)'))
	));
	echo $this->PHForm->input('phone_footer_'.$this->ArticleVars->getLang(), array(
		'label' => array('class' => 'col-md-3 control-label', 'text' => __('Phone (footer)'))
	));
	echo $this->PHForm->input('email');
	echo $this->PHForm->input('skype');

	echo $this->element('AdminUI/form_actions', array('backURL' => array('action' => $this->request->action)));
	echo $this->PHForm->end();
?>
		</div>
	</div>
</div>
