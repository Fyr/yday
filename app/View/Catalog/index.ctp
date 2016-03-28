<?
	$this->Html->css(array('owl-carousel/owl.carousel', 'owl-carousel/owl.theme'), array('inline' => false));
	$this->Html->script(array('vendor/owl.carousel.min'), array('inline' => false));
?>
<div class="playerKaraoke">
	<div class="container">
		<div class="title"><?=$page['Page']['title_'.$lang]?></div>
		<div class="smallDesc"><?=__('All the most current songs for karaoke in one package')?></div>
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
			<?=$this->ArticleVars->body($page)?>
		</div>
	</div>
</div>
<div class="pakets">
	<div class="container">
		<?=$this->element('SiteUI/title', array('title' => $blocks['monthly-packs-updates']['title_'.$lang]))?>
		<div class="smallText"><?=$blocks['monthly-packs-updates']['teaser_'.$lang]?></div>
		<div class="text"><?=$this->ArticleVars->body(array('PageBlock' => $blocks['monthly-packs-updates']))?></div>
		<div class="price">Стоимость одного пакета — 3000</div>
	</div>
</div>
<div class="darkGrey characteristics">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				200 караоке песен ежемесячно
			</div>
			<div class="col-sm-4">
				200 караоке песен ежемесячно
			</div>
			<div class="col-sm-4">
				Только новые мировые хиты
			</div>
		</div>
	</div>
</div>
<div class="pakets grey">
	<div class="container">
		<?=$this->element('SiteUI/title', array('title' => $blocks['actual-packs-updates']['title_'.$lang]))?>
		<div class="smallText"><?=$blocks['actual-packs-updates']['teaser_'.$lang]?></div>
		<div class="row updatePackages">
<?
	foreach($aSongPacks as $pack) {
?>
			<div class="col-sm-3 item">
				<a class="manual" href="<?=$pack['Media']['url_download']?>">
					<img alt="Скачать PDF" src="/img/pdf.png">
					<span><?=$pack['SongPack']['title_'.$lang]?></span>
				</a>
			</div>
<?
	}
?>
		</div>
		<a class="btn btn-success" href="javascript: void(0)"><?=__('Order service packs')?></a>
	</div>
</div>
<div class="pakets">
	<div class="container">
		<?=$this->element('SiteUI/title', array('title' => $blocks['year-packs-updates']['title_'.$lang]))?>
		<div class="smallText"><?=$blocks['year-packs-updates']['teaser_'.$lang]?></div>
		<div class="text"><?=$this->ArticleVars->body(array('PageBlock' => $blocks['year-packs-updates']))?></div>
		<div class="allPackets">
<?
	foreach($aPlans as $plan) {
		$features = explode('<br>', nl2br($plan['SubscrPlan']['descr_'.$lang]));
?>
			<a href="javascript: void(0)" class="item <?=($plan['SubscrPlan']['featured']) ? 'center' : ''?>">
				<div class="inner">
					<div class="limitation"><?=$plan['SubscrPlan']['title_'.$lang]?></div>
<?
		foreach($features as $title) {
?>
					<div class="feature"><?=$title?></div>
<?
		}
?>
					<div class="price"><?=$this->Price->format($plan['SubscrPlan']['price_'.$lang])?></div>
				</div>
				<div class="order"><?=__('Order')?></div>
			</a>
<?
	}
?>

		</div>
	</div>
</div>

<div class="zakazBlock">
	<div class="container">
		<div class="outer">
			<span class="text">
				<!-- Также у Вас есть возможность <a href="%s">заказать отдельную песню</a> из общего каталога или <a href="%s">сделать индивидуальный заказ</a> песни, которой нет в общем каталоге -->
				<?=__('Also you have the opportunity to <a href="%s"> order </a> single song from a shared directory or <a href="%s"> make the personal order </a> song that is not in the general catalog', 'javascript:;', 'javascript:;')?>
			</span>
			<i class="vert"></i>
		</div>
	</div>
</div>

<?=$this->element('call_us')?>
<script>
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