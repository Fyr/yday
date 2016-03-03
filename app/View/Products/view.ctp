<?
	$this->Html->css(array('owl-carousel/owl.carousel', 'owl-carousel/owl.theme'), array('inline' => false));
	$this->Html->script(array('vendor/owl.carousel.min'), array('inline' => false));

	$lShowParams = false;
	foreach($aFormGroups as $group_id => $group) {
		if (!$group['ParamGroup']['featured']) {
			$lShowParams = true;
			break;
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

	$spec_features = trim($product['Product']['spec_features']);
	$features = trim($product['Product']['features']);
?>
<div class="subMenu">
	<div class="container">
		<div class="name"><?=$product['Category']['title']?>: <?=$product['Product']['title']?></div>
		<a class="btn btn-success orderBtn" href="javascript: void(0)">Заказать</a>
		<ul class="menu">
<?
	if ($features) {
?>
			<li><a href="#features">Возможности</a></li>
<?
	}
	if ($lShowParams) {
?>
			<li><a href="#params">Технические характеристики</a></li>
<?
	}
	if ($lShowPacks) {
?>
			<li><a href="#packs">Комплект поставки</a></li>
<?
	}
?>

		</ul>
	</div>
</div>
<div class="playerKaraoke">
	<div class="container">
		<div class="title"><?=$product['Product']['title']?></div>
		<div class="smallDesc"><?=$product['Product']['teaser']?></div>
		<div class="outerCarousel">
			<div id="owl-carousel" class="owl-carousel">
<?
	foreach($aMedia as $media) {
?>
				<div class="item"><img class="lazyOwl" data-src="<?=$this->Media->imageUrl($media, 'noresize')?>" alt="" /></div>
<?
	}
?>

			</div>
		</div>
	</div>
</div>
<div class="grey buyPlayer">
	<div class="container">
		<div class="text">
			<?=$this->ArticleVars->body($product)?>
			<div class="row">
<?
	foreach($aPacks as $pack) {
?>
				<div class="col-sm-<?=ceil(12 / count($aPacks))?> price">
					<div class="value"><?=$this->Price->format($pack['ProductPack']['price'])?></div>
					<div class="license"><?=$pack['ProductPack']['title']?></div>
				</div>
<?
	}
?>
			</div>
		</div>
	</div>
</div>
<?
	if ($spec_features) {

?>
<div class="darkGrey characteristics">
	<div class="container">
		<div class="row">
<?
	$aCols = $this->ArticleVars->divideColumns(explode('<br />', nl2br($spec_features)), 3);
	foreach($aCols as $col) {
?>
			<div class="col-sm-4">
				<ul>

<?
		foreach($col as $title) {
?>
					<li><?=$title?></li>
<?
		}
?>
				</ul>
			</div>
<?
	}
?>
		</div>
	</div>
</div>
<?
	}

	$class = 'grey';
	foreach($productBlocks as $i => $article) {
		$this->ArticleVars->init($article, $url, $title, $teaser, $src, 'noresize');
		$class = ($class == 'grey') ? '' : 'grey';
		$text = $this->ArticleVars->body($article);
		echo $this->element('product_block', compact('title', 'src', 'text', 'class'));
	}

	if ($features) {
		$class = ($class == 'grey') ? '' : 'grey';
?>
<a name="features"></a>
<div class="section allOpportunities <?=$class?>">
	<div class="container">
		<h2 class="light">Все возможности системы</h2>
		<div class="row">

<?
	$aCols = $this->ArticleVars->divideColumns(explode('<br />', nl2br($features)), 3);
	foreach($aCols as $col) {
?>
			<div class="col-sm-4">
				<ul>

<?
		foreach($col as $title) {
?>
					<li><?=$title?></li>
<?
		}
?>
				</ul>
			</div>

<?
	}
?>
		</div>
	</div>
</div>
<?
	}

	if ($lShowParams) {
?>

<a name="params"></a>
<?
		foreach($aFormGroups as $group_id => $group) {
			$class = ($class == 'grey') ? '' : 'grey';
			if (!$group['ParamGroup']['featured']) {
?>
<div class="section allOpportunities <?=$class?>">
	<div class="container">

		<h2 class="light"><?=$group['ParamGroup']['title']?></h2>
		<div class="row">
<?
				$aItems = array();
				foreach($aForms[$group_id] as $fid => $field) {
					$value = Hash::get($aValues, $fid);
					$aItems[] = $this->element('param', compact('field', 'value'));
				}
				foreach($this->ArticleVars->divideColumns($aItems, 3) as $items) {
?>
			<div class="col-sm-4">
				<?=implode('', $items)?>
			</div>
<?
				}
?>
		</div>
<?
			}
?>
	</div>
</div>
<?
		}
	}
	if ($lShowPacks) {
		$class = ($class == 'grey') ? '' : 'grey';
?>
<a name="packs"></a>
<div class="section allOpportunities <?=$class?>">
	<div class="container">
		<h2 class="light">Комплект поставки</h2>
<?
			foreach($aFormGroups as $group_id => $group) {
				if ($group['ParamGroup']['featured']) {
?>
		<table class="deliveryContent">
			<tr>
				<th><?=$group['ParamGroup']['title']?></th>
<?
					foreach($aPacks as $pack) {
?>
				<th><?=$pack['ProductPack']['title']?></th>
<?
					}
?>
			</tr>
<?
					foreach($aForms[$group_id] as $fid => $field) {
						$values = $aPackValues[$fid];
						echo $this->element('param_pack', compact('field', 'values'));
					}
?>
		</table>
<?
				}
			}
?>
	</div>
</div>
<?
	}
	$class = ($class == 'grey') ? '' : 'grey';
?>
<div class="section otherKaraokeSystems <?=$class?>">
	<div class="container">
		<h2 class="light">Другие караоке системы</h2>
		<div class="row">
<?
	foreach($otherProducts as $article) {
		$this->ArticleVars->init($article, $url, $title, $teaser, $src, 'noresize', $featured, $id);
		$price = 0;
		if (isset($otherPacks[$id])) {
			list($pack) = array_values($otherPacks[$id]);
			$price = $pack['ProductPack']['price'];
		}
?>
			<div class="col-sm-4">
<?
		if ($src) {
?>
				<div class="outerThumb">
					<a href="<?=$url?>"><img src="<?=$src?>" alt="" class="img-responsive" /></a>
					<i class="vert"></i>
				</div>
<?
		}
?>


				<a href="<?=$url?>" class="link"><?=$title?></a>
<?
		if ($price) {
?>
				<div class="price">от <?=$this->Price->format($price)?></div>
<?
		}
?>
			</div>

<?
	}
?>
		</div>
		<a href="javascript: void(0)" class="btn btn-success">Сравнить <?=$product['Product']['title']?> с другими системами</a>
	</div>
</div>

<?
	$class = ($class == 'grey') ? '' : 'grey';
	echo $this->element('support', array('title' => $page['support']['Page']['title'], 'blocks' => $pageBlocks['support'], 'class' => 'grey'));

	echo $this->element('call_us');
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#owl-carousel").owlCarousel({
			//autoPlay : 6000,
			navigation : true,
			pagination: false,
			slideSpeed : 300,
			singleItem : true,
			lazyLoad : true,
			autoHeight : true,
			navigationText : ['<div class="icon icon-arrow-left"></div>','<div class="icon icon-arrow-right"></div>']
		});
	});
</script>
