<div class="section">
	<div class="container">
		<h2 class="light">Сравнение выбранных систем</h2>
		<table class="compareTable">
			<tr class="products">
				<td></td>
<?
	fdebug(compact('aFormGroups', 'aForms', 'aValues', 'aPacks'));
	$colspan = 1;
	$buy = false;
	foreach($aProducts[$cat_id] as $id => $product) {
		if (in_array($id, $selected)) {
			if (isset($aPacks[$id])) {
				foreach($aPacks[$id] as $pack) {
					$colspan++;
					echo $this->element('compare_product', compact('product', 'pack', 'buy'));
				}
			} else {
				$colspan++;
				echo $this->element('compare_product', compact('product', 'buy'));
			}
		}
	}
?>

			</tr>
			<tr>
				<th colspan="<?=$colspan?>">Общая информация</th>
			</tr>
			<tr>
				<td>Описание</td>
<?
	foreach($aProducts[$cat_id] as $id => $product) {
		if (in_array($id, $selected)) {
			$this->ArticleVars->init($product, $url, $title, $teaser, $src, 'noresize');
			if (isset($aPacks[$id])) {
				foreach($aPacks[$id] as $pack) {
					echo $this->Html->tag('td', $teaser);
				}
			} else {
				echo $this->Html->tag('td', $teaser);
			}
		}
	}


?>

			</tr>
			<tr>
				<th colspan="<?=$colspan?>">Возможности системы</th>
			</tr>
<?
	$aFeatures = array();
	foreach($aProducts[$cat_id] as $id => &$_product) {
		$features = trim($_product['Product']['features']);
		$_product['Product']['features'] = ($features) ? explode('<br />', nl2br($features)) : array();
		$aFeatures = array_merge($aFeatures, $_product['Product']['features']);
	}
	unset($_product);
	$aFeatures = array_unique($aFeatures);
	sort($aFeatures);
	// $aFeatures = array_combine($aFeatures, $aFeatures);
	foreach($aFeatures as $feature) {
?>
			<tr>
				<td><?=$feature?></td>
<?
		foreach($aProducts[$cat_id] as $id => $product) {
			$class = (in_array($feature, $product['Product']['features'])) ? 'icon-check' : 'icon-close';
			if (isset($aPacks[$id])) {
				foreach($aPacks[$id] as $pack) {
?>
				<td class="center"><span class="<?=$class?>"></span></td>
<?
				}
			} else {
?>
				<td class="center"><span class="<?=$class?>"></span></td>
<?
			}
		}
?>
			</tr>
<?
	}

	$lShowParams = false;
	foreach($aFormGroups as $group_id => $group) {
		if (!$group['ParamGroup']['featured']) {
			$lShowParams = true;
			break;
		}
	}
	if ($lShowParams) {
		foreach($aFormGroups as $group_id => $group) {
			if (!$group['ParamGroup']['featured']) {
?>
			<tr>
				<th colspan="<?= $colspan ?>"><?=$group['ParamGroup']['title']?></th>
			</tr>
<?
				foreach($aForms[$group_id] as $fid => $field) {
?>
			<tr>
				<td><?=$field['PMFormField']['label']?></td>
<?
					foreach($aProducts[$cat_id] as $id => $product) {
						if (in_array($id, $selected)) {
							$value = $aValues[$fid]['ProductParam'][$id];
							if (isset($aPacks[$id])) {
								foreach ($aPacks[$id] as $pack) {
									echo $this->element('compare_param', compact('field', 'value'));
								}
							} else {
								echo $this->element('compare_param', compact('field', 'value'));
							}
						}
					}
?>
			</tr>
<?
				}
			}
		}
	}
	$lShowPacks = false;
	if ($aPacks) {
		foreach ($aFormGroups as $group_id => $group) {
			if ($group['ParamGroup']['featured']) {
				$lShowPacks = true;
				break;
			}
		}
	}
	if ($lShowPacks) {
		foreach($aFormGroups as $group_id => $group) {
			if ($group['ParamGroup']['featured']) {
?>
			<tr>
				<th><?=$group['ParamGroup']['title']?></th>
<?
				foreach($aProducts[$cat_id] as $id => $product) {
					if (in_array($id, $selected)) {
						if (isset($aPacks[$id])) {
							foreach($aPacks[$id] as $pack) {
?>
				<th class="center">
					<b><?= $product['Product']['title'] ?></b><br/>
					<?= $pack['ProductPack']['title'] ?>
				</th>
<?
							}
						} else {
?>
				<th></th>
<?
						}
					}
				}
?>
			</tr>
<?
				foreach($aForms[$group_id] as $fid => $field) {
?>
			<tr>
				<td><?=$field['PMFormField']['label']?></td>
<?
					foreach($aProducts[$cat_id] as $id => $product) {
						if (in_array($id, $selected)) {
							if (isset($aPacks[$id])) {
								foreach ($aPacks[$id] as $pack_id => $pack) {
									$value = $aValues[$fid]['ProductPackParam'][$pack_id];
									echo $this->element('compare_param', compact('field', 'value'));
								}
							} else {
?>
				<td class="center">-</td>
<?
							}
						}
					}
?>
			</tr>
<?
				}
			}
		}
	}
?>
			<tr class="products">
				<td></td>
<?
	$colspan = 1;
	$buy = true;
	foreach($aProducts[$cat_id] as $id => $product) {
		if (in_array($id, $selected)) {
			if (isset($aPacks[$id])) {
				foreach($aPacks[$id] as $pack) {
					$colspan++;
					echo $this->element('compare_product', compact('product', 'pack', 'buy'));
				}
			} else {
				$colspan++;
				echo $this->element('compare_product', compact('product', 'buy'));
			}
		}
	}
?>
			</tr>
		</table>

	</div>
</div>