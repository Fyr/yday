<?
	$id = $this->request->data('Page.id');
	$title = __('Pages');
	$breadcrumbs = array(
		__('Dashboard') => array('controller' => 'Admin', 'action' => 'index'),
		$title => array('controller' => 'AdminContent', 'action' => 'index'),
		__('Edit') => ''
	);
	echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
	echo $this->element('AdminUI/title', compact('title'));
	echo $this->Flash->render();
?>

<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">

			<?=$this->element('AdminUI/form_title', array('title' => $this->ObjectType->getTitle($id ? 'edit' : 'create', 'Page')))?>
			<?=$this->PHForm->create('Page')?>
<?
// $this->element('AdminContent/admin_edit_Page')
	$tabs = array(
		__('General') => $this->Html->div('form-body',
			$this->element('AdminUI/checkboxes')
			.$this->element('Article.edit_title')
			.$this->element('Article.edit_slug')
			.$this->PHForm->input('teaser')
		),
		__('Text') => $this->element('Article.edit_body')
	);
	echo $this->element('AdminUI/tabs', compact('tabs'));
?>

			<!--div class="form-body">
<?
	echo $this->element('AdminUI/checkboxes');
	echo $this->element('Article.edit_title');
	echo $this->element('Article.edit_slug');
	echo $this->PHForm->input('teaser');
?>
			</div-->
			<?=$this->element('AdminUI/form_actions')?>
			<?=$this->PHForm->end()?>
		</div>
	</div>
</div>
