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
								<button id="sample_editable_1_new" class="btn green">
									<i class="fa fa-plus"></i> <?=__('New page')?>
								</button>
							</div>
						</div>
						<div class="col-md-6">

						</div>
					</div>
				</div>
				<table class="table table-striped table-bordered table-hover table-header-fixed dataTable">
					<thead>
					<tr class="">
<?
	$fields = array('id', 'created', 'title', 'published', 'featured', 'action');
	foreach($fields as $field) {
		$class = 'sorting';
		$label = ucfirst(__($field));
		if ($field == $this->Paginator->sortKey()) {
			$class = 'sorting_'.$this->Paginator->sortDir();
		}
?>
						<th class="<?=$class?>">
							<?=$this->Paginator->sort($field, $label)?>
						</th>
<?
	}
?>
					</tr>
					</thead>
					<tbody>
<?
	foreach($aRows as $row) {
		$row = $row['Page'];
?>

						<tr>
							<td><?=$row['id']?></td>
							<td><?=$this->PHTime->niceShort($row['created'])?></td>
							<td><?=$row['title']?></td>
							<td align="center">
								<?=($row['published']) ? '<i class="fa fa-check">' : ''?>
							</td>
							<td align="center">
								<?=($row['featured']) ? '<i class="fa fa-check">' : ''?>
							</td>
							<td>
<?
		echo $this->Html->link('<i class="fa fa-edit"></i> '.__('Edit'), array('action' => 'edit', $row['id']), array(
			'class' => 'btn btn-outline dark btn-sm blue',
			'escape' => false
		)).' ';
		echo $this->Html->link('<i class="fa fa-trash-o"></i> '.__('Delete'), array('action' => 'delete', $row['id']), array(
			'class' => 'btn btn-outline dark btn-sm red',
			'escape' => false,
			'confirm' => __('Are you sure to delete this record?')
		));
?>
							</td>
						</tr>

<?
	}
?>

					</tbody>
				</table>
				<?=$this->element('AdminUI/pagination')?>
			</div>
		</div>
	</div>
</div>
<script>
$(function(){
	$('.dataTable > thead > tr > th').each(function(){
		var $a = $('a', this);
		var href = $a.prop('href');
		$(this).html($a.html());
		$(this).click(function(){
			window.location.href = href;
		});
	});
});
</script>