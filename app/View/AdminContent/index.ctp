<?
	$title = __('Pages');
	$breadcrumbs = array(
		__('Dashboard') => array('controller' => 'Admin', 'action' => 'index'),
		$title => ''
	);
	echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
	echo $this->element('AdminUI/title', compact('title'));
	echo $this->Flash->render();
?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<?=$this->element('AdminUI/form_title', array('title' => $title))?>
			<div class="portlet-body dataTables_wrapper">
				<div class="table-toolbar">
					<div class="row">
						<div class="col-md-6">
							<div class="btn-group">
								<button class="btn green">
									<i class="fa fa-plus"></i> <?=__('New page')?>
								</button>
							</div>
						</div>
						<div class="col-md-6">

						</div>
					</div>
				</div>
				<?=$this->PHTableGrid->render('Page')?>
			</div>
		</div>
	</div>
</div>
