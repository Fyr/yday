<?
	foreach($aFormGroups as $id => $row) {
?>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-9">
				<h4><?=$row['ParamGroup']['title']?></h4>
			</div>
		</div>
		<div class="row">
			<?=$this->PHForm->renderForm($aForms[$id], $aValues);?>
		</div>

<?

	}
