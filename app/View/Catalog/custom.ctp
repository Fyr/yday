<div class="playerKaraoke" style="padding-bottom: 0;">
	<div class="container">
		<div class="title"><?=$page['Page']['title']?></div>
		<div class="smallDesc">Заказ профессиональной звукозаписи караоке песен индивидуально</div>
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
<div class="section">
	<div class="container">
		<div class="title">Когда может понадобиться индивидуальный заказ песен для караоке</div>
		<ul class="individualList">
			<li>
				<img src="/img/icon1.png" class="img-responsive" alt="" />
				<div class="name">Новый хит</div>
			</li>
			<li>
				<img src="/img/icon2.png" class="img-responsive" alt="" />
				<div class="name">Нет в полной<br />комплектации</div>
			</li>
			<li>
				<img src="/img/icon3.png" class="img-responsive" alt="" />
				<div class="name">Редкая песня</div>
			</li>
			<li>
				<img src="/img/icon4.png" class="img-responsive" alt="" />
				<div class="name">Песня собственного<br />сочинения</div>
			</li>
			<li>
				<img src="/img/icon5.png" class="img-responsive" alt="" />
				<div class="name">Детская песня</div>
			</li>
			<li>
				<img src="/img/icon6.png" class="img-responsive" alt="" />
				<div class="name">Песня в подарок</div>
			</li>
			<li>
				<img src="/img/icon7.png" class="img-responsive" alt="" />
				<div class="name">Старая песня</div>
			</li>
			<li>
				<img src="/img/icon8.png" class="img-responsive" alt="" />
				<div class="name">Фольклорная песня</div>
			</li>
			<li>
				<img src="/img/icon9.png" class="img-responsive" alt="" />
				<div class="name">Профессиональная<br />фонограмма</div>
			</li>
		</ul>
	</div>
</div>
<div class="section grey">
	<div class="container">
		<div class="title">Сколько стоит индивидуальный заказ караоке песни</div>
		<table class="individualPrice">
			<tr>
				<th></th>
				<th class="price1">Стоимость, <span class="rubl">₷</span></th>
				<th style="text-align: right">Стоимость, $</th>
			</tr>
<?
	foreach($aServices as $service) {
?>
			<tr>
				<td class="name"><?=$service['Service']['title']?></td>
				<td class="price1"><?=$this->Price->format($service['Service']['price_rur'])?></td>
				<td class="price2"><?=$this->Price->format($service['Service']['price_usd'], 'usd')?></td>
			</tr>
<?
	}
?>
	</table>
		<div class="requestSong"><a class="btn btn-success" href="javascript: void(0)">Заказать песню</a></div>
	</div>
</div>
<?=$this->element('call_us')?>