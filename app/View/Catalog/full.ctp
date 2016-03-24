<?
	$this->Html->css('mediaelementplayer', array('inline' => false));
	$this->Html->script('vendor/mediaelement-and-player.min', array('inline' => false));
?>
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
<div class="darkGrey characteristics">
	<div class="container">
		<div class="row">
<?
	$features = $this->ArticleVars->list2array(Configure::read('Settings.catalog_features'));
	$cols = ceil(12 / (count($features) + 1));
?>
			<div class="col-sm-<?=$cols?>">
				<div style="padding-bottom: 10px;"><?=$this->Price->format(Configure::read('Settings.song_price_usd'), 'usd')?> за одну песню</div>
				<?=$this->Price->format(Configure::read('Settings.song_price_rur'))?> за одну песню
			</div>
<?
	foreach($features as $title) {
?>
			<div class="col-sm-<?=$cols?>">
				<?=$title?>
			</div>

<?
	}
?>
		</div>
	</div>
</div>
<div class="playerKaraoke" style="padding-bottom: 0;">
	<div class="container">
		<div class="title">Примеры звучания песен</div>
		<div class="smallDesc">Вы можете оценить звучание наших фонограмм и качество видеофонов</div>
		<div class="row">
			<div class="col-sm-6">
<?
	foreach($aTracks as $media) {
?>
				<div class="songPlayer">
					<div class="songTitle"><?=pathinfo($media['Media']['orig_fname'], PATHINFO_FILENAME)?></div>
					<audio id="player2" src="<?=$media['Media']['url_download']?>" type="audio/<?=str_replace('.', '', $media['Media']['ext'])?>" controls="controls"></audio>
				</div>

<?
	}
?>
			</div>
			<div class="col-sm-6">
				<!-- img src="/img/temp/youtube.jpg" class="img-responsive" alt="" /-->
				<!--iframe width="600" height="350" src="https://www.youtube.com/embed/et281UHNoOU" frameborder="0" allowfullscreen></iframe-->
				<?=Configure::read('Settings.catalog_video')?>
			</div>
		</div>
		<div class="row catalogPrice">
			<div class="col-sm-6">
				Стоимость песни из полного каталога — <?=$this->Price->format(Configure::read('Settings.song_price_rur'))?>
				(эквивалент <?=$this->Price->format(Configure::read('Settings.song_price_usd'), 'usd')?> за песню)
			</div>
			<div class="col-sm-6">
<?
	if ($pdf) {
?>
				<a href="<?=$pdf['Media']['url_download']?>" class="manual">
					<img src="/img/pdf.png" alt="">
					<span><?=$pdf['Media']['orig_fname']?> (<?=$this->PHMedia->MediaPath->filesizeFormat($pdf['Media']['orig_fsize'], 1)?>)</span>
				</a>
<?
	}
?>

			</div>
		</div>
		<div class="requestSong"><a href="javascript: void(0)" class="btn btn-success">Заказать песню</a></div>
	</div>
</div>
<div class="lineGradient"></div>
<?=$this->element('call_us')?>
<script>
	$(document).ready(function(){
		$('audio').mediaelementplayer({
			audioWidth: 542,
			features: ['playpause','current','duration','progress'],
			success: function(media, node, player) {
				media.addEventListener('play', function(e) {
					$(player.container).addClass('playing');
				});
			}
		});
	});
</script>
