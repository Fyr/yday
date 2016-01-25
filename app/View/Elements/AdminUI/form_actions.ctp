<?/*<div class="form-actions">
	<div class="row">
		<div class="col-md-3">
			<a class="btn default" href="javascript:;">
				<i class="fa fa-angle-left"></i> <?=__('Back')?>
			</a>
		</div>
		<div class="col-md-6">
			<button type="submit" class="btn blue">
				<i class="fa fa-save"></i>
				<?=__('Save')?>
			</button>
		</div>
		<div class="col-md-3">
			<button type="submit" class="btn green pull-right">
				<?=__('Apply')?>
				<i class="fa fa-angle-right"></i>
			</button>
		</div>
	</div>
</div>
*/?>
<?
	if (!isset($backURL)) {
		$backURL = array('action' => 'index');
	}
?>

<div class="form-actions">
	<div class="row">
		<div class="col-md-12">
			<button class="btn green" type="submit"><?=__('Save')?></button>
			<?=$this->Html->link(__('Cancel'), $backURL, array('class' => 'btn default'))?>
		</div>
	</div>
</div>
