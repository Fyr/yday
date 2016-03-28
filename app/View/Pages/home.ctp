
<div class="slide">
	<div class="is_overlay">
		<video autoplay="autoplay" loop="loop">
			<source src="/img/video.mp4" type="video/mp4">
		</video>
	</div>
	<div class="container">
		<div class="phoneNumber">
			<div class="phone">
				<div><?=__('Free call')?></div>
				<div class="number"><?=nl2br($this->Settings->read('phone_header'))?></div>
			</div>
		</div>
		<div class="text">
			<h2><?=$page['title_'.$lang]?></h2>
			<div class="description"><?=$page['body_'.$lang]?></div>
		</div>
		<i class="vert"></i>
	</div>
	<div class="main-block-bg"></div>
</div>
<div class="slide">
	<div class="container">
		<h2><?=$blocks['clients']['title_'.$lang]?></h2>
		<i class="vert"></i>
		<div class="iconsList">
			<?=$blocks['clients']['body_'.$lang]?>
		</div>

	</div>
</div>
<div class="slide">
	<div class="container">
		<h2><?=$blocks['tagcloud']['title_'.$lang]?></h2>
		<div id="tagcloud">
			<ul>
<?
	$blocks['tagcloud']['teaser'] = $this->ArticleVars->list2Array($blocks['tagcloud']['teaser_'.$lang]);
	foreach($blocks['tagcloud']['teaser'] as $title) {
?>
		<li><a href="javascript:;"><?=$title?></a></li>
<?
	}
?>

			</ul>
		</div>
	</div>
</div>
<div class="slide" style="text-align: center">
	<div class="container">
		<i class="vert"></i>
		<div class="text">
			<h2><?=nl2br($blocks['order']['teaser_'.$lang])?></h2>
			<div class="description"><?=$blocks['order']['body_'.$lang]?></div>
		</div>
		<div class="main-order-form">
			<input type="text" placeholder="<?=__('Name')?>" class="form-control">
			<input type="text" placeholder="<?=__('Phone')?>" class="form-control">
			<input type="text" placeholder="Email" class="form-control">
			<button class="btn btn-success" data-toggle="modal" data-target="#thanks"><?=__('Order')?></button>
		</div>
	</div>
</div>
<div class="slide" style="text-align: left">
	<div class="container">
		<h2><?=$blocks['abilities']['title_'.$lang]?></h2>
		<div style="text-align: center">
			<img src="/img/main_page_img.png" alt="" />
		</div>
		<div class="title" style="text-align: center"><?=$blocks['abilities']['teaser_'.$lang]?></div>
		<?=$blocks['abilities']['body_'.$lang]?>
	</div>
</div>
<div class="slide">
	<div class="container">
		<i class="vert"></i>
		<div class="content">
			<div class="left">
				<h2><?=$blocks['player']['title_'.$lang]?></h2>
				<?=$blocks['player']['body_'.$lang]?>
			</div>
			<div class="right">
				<img src="/img/karaoke10.png" alt="" class="img-responsive"/>
			</div>
		</div>
	</div>
</div>
<div class="slide">
	<div class="container">
		<div class="shadow">
			<div class="text">
				<h2><?=$blocks['ready']['title_'.$lang]?></h2>
				<div><?=$blocks['ready']['body_'.$lang]?></div>
			</div>
		</div>
	</div>
</div>
<div class="slide">
	<div class="container">
		<div class="content">
			<div class="left">
				<h2><?=nl2br($blocks['remotecontrol']['teaser_'.$lang])?></h2>
				<div><?=$blocks['remotecontrol']['body_'.$lang]?></div>
			</div>
			<div class="right">
				<a href="<?=Configure::read('Settings.app_apple')?>" target="_blank"><img src="/img/apple.png" alt="" /></a>
				<a href="<?=Configure::read('Settings.app_google')?>" target="_blank"><img src="/img/google.png" alt="" /></a>
			</div>
		</div>
	</div>
</div>
<div class="slide">
	<div class="container">
		<i class="vert"></i>
		<div class="text">
			<h2><?=$blocks['audiocontent']['title_'.$lang]?></h2>
			<div class="description"><?=$blocks['audiocontent']['body_'.$lang]?></div>
		</div>
	</div>
</div>
<div class="slide">
	<div class="container">
		<i class="vert"></i>
		<div class="text">
			<h2><?=$blocks['techsupport']['title_'.$lang]?></h2>
			<div class="description"><?=$blocks['techsupport']['body_'.$lang]?></div>
		</div>
	</div>
</div>
<div class="slide">
	<div class="container">
		<i class="vert"></i>
		<div class="advantages">
			<?=$blocks['advantages']['body_'.$lang]?>
		</div>
	</div>
	<div class="bottom">
		<span><?=__('Order a free demo version of our player right now!')?></span>
		<button class="btn btn-success"><?=__('Order')?></button>
	</div>
</div>
<div class="slide">
	<div class="container">
		<i class="vert"></i>
		<div class="content">
			<h2><?=$blocks['karaoke']['title_'.$lang]?></h2>
			<div class="row">

<?
	$i = -1;
	foreach($aCategories as $cat_id => $category) {
		$i++;
?>
				<div class="col-sm-6">
					<div class="title"><?=$category['Category']['title_'.$lang]?></div>
<?
		foreach($aProducts[$cat_id] as $id => $product) {
			$this->ArticleVars->init($product, $url, $title, $teaser, $src, 'noresize');
?>
					<div class="item<?=($i) ? $i : ''?>">
<?
			if ($src) {
?>
						<div class="outerThumb">
							<a href="<?=$url?>"><img src="<?=$src?>" alt="<?=$title?>" class="thumb img-responsive" /></a>
						</div>

<?
			}
?>
						<div class="description">
							<?=$this->Html->link($title, $url)?>
							<div class="text"><?=$teaser?></div>
						</div>
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
	</div>
</div>
<div class="slide">
	<div class="container">
		<div class="main-partners">
			<h2><?=$blocks['partners']['title_'.$lang]?></h2>
			<?=$blocks['partners']['body_'.$lang]?>
		</div>
	</div>
</div>
<div class="slide">
	<div class="container">
		<i class="vert"></i>
		<div class="content">
			<h2><?=__('The latest news from the world of karaoke')?></h2>
			<?=$this->element('news')?>
			<div class="link">
				<?=$this->Html->link(__('More news...'), array('controller' => 'news', 'action' => 'index'), array('class' => 'btn btn-success'))?>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="container">
			<?=$this->element('SiteUI/footer')?>
		</div>
	</div>
</div>
<script>
	$(function(){
		$('.home-elipsys').dotdotdot();
	});
</script>