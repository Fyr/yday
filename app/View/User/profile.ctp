<?
	$title = __('Profile');
	$breadcrumbs = array(
		__('User area') => 'javascript:;',
		$title => ''
	);
	echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
	echo $this->element('AdminUI/title', compact('title'));
	echo $this->Flash->render();

	// $product = $aProducts[$currUser['product_id']];
?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
<?
	echo $this->element('AdminUI/form_title', array('title' => __('Current state')));
?>
			<div class="portlet-body">
				<div class="clearfix">
					<ul class="media-list">
						<li class="media">
<?
	if ($currUser['product_id']) {
?>
							<a class="pull-left" href="<?=SiteRouter::url($product)?>">
								<img class="media-object" src="<?=$this->Media->imageUrl($product, 'noresize')?>" alt="<?=$product['Product']['title_'.$lang]?>" />
							</a>
<?
	}
?>
							<div class="media-body">
								<table class="dataTable">
									<tbody>
										<tr>
											<td width="1%"><?=__('Balance')?></td>
											<td><?=$this->Price->format($currUser['balance'], 'rus')?></td>
										</tr>
										<tr>
											<td nowrap="nowrap"><?=__('Licence key')?></td>
											<td><?=$currUser['key']?></td>
										</tr>
<?
	if ($currUser['product_id']) {
		$title = ($product['Product']['header_'.$lang]) ? $product['Product']['header_'.$lang] :  $product['Product']['title_'.$lang];
?>
										<tr>
											<td nowrap="nowrap"><?=__('Current system')?></td>
											<td><?=$title?></td>
										</tr>
<?
	}
	if ($subscription) {
		$features = array('');
		if (trim($subscription['SubscrPlan']['descr_'.$lang])) {
			$features = $this->ArticleVars->list2array($subscription['SubscrPlan']['descr_'.$lang]);
		}
?>
										<tr>
											<td nowrap="nowrap"><?=__('Subscription plan')?></td>
											<td><?=$subscription['SubscrPlan']['title_'.$lang]?> (<?=$features[0]?>)</td>
										</tr>
<?
	}
?>

									</tbody>
								</table>
							</div>
						</li>
					</ul>
				</div>
				<!--form>
					<div class="form-group">
						<div class="col-md-3">
							<img class="img-responsive" src="<?=$this->Media->imageUrl($product, 'noresize')?>" alt="<?=$product['Product']['title_'.$lang]?>" />
						</div>
						<div class="col-md-9">
							<?=__('Your balance')?>: <?//$this->Price->format()?>
						</div>
					</div>
				</form-->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
<?
	echo $this->element('AdminUI/form_title', array('title' => __('Edit profile')));
	echo $this->PHForm->create('User');
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
