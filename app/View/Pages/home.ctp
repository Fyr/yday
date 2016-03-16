<div class="slide">
	<div class="container">
		<div class="phoneNumber">
			<div>Бесплатный звонок</div>
			<div class="number"><?=nl2br(Configure::read('Settings.phone'))?></div>
		</div>
		<div class="text">
			<h2><?=$page['title']?></h2>
			<div class="description"><?=$page['body']?></div>
		</div>
		<i class="vert"></i>
	</div>
</div>
<div class="slide">
	<div class="container">
		<h2><?=$blocks['clients']['title']?></h2>
		<?=$blocks['clients']['body']?>
	</div>
</div>
<div class="slide">
	<div class="container">
		<h2><?=$blocks['tagcloud']['title']?></h2>
		<div id="tagcloud">
			<ul>
<?
	$blocks['tagcloud']['teaser'] = explode('<br />', nl2br($blocks['tagcloud']['teaser']));
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
<div class="slide">
	<div class="container">
		<i class="vert"></i>
		<div class="text">
			<h2><?=$blocks['order']['title']?></h2>
			<div class="description"><?=$blocks['order']['body']?></div>
		</div>
		<div class="main-order-form">
			<input type="text" placeholder="Имя" class="form-control">
			<input type="text" placeholder="Телефон" class="form-control">
			<input type="text" placeholder="Email" class="form-control">
			<button class="btn btn-success" data-toggle="modal" data-target="#thanks">Заказать</button>
		</div>
	</div>
</div>
<div class="slide">
	<div class="container">
		<h2><?=$blocks['abilities']['title']?></h2>
		<img src="/img/main_page_img.png" alt="" />
		<div class="title"><?=$blocks['abilities']['teaser']?></div>
		<?=$blocks['abilities']['body']?>
	</div>
</div>
<div class="slide">
	<div class="container">
		<i class="vert"></i>
		<div class="content">
			<div class="left">
				<h2><?=$blocks['player']['title']?></h2>
				<?=$blocks['player']['body']?>
			</div>
			<div class="right">
				<img src="/img/karaoke10.png" alt="" class="img-responsive"/>
			</div>
		</div>
	</div>
</div>
<div class="slide">
	<div class="container">
		<div class="text">
			<h2><?=$blocks['ready']['title']?></h2>
			<div><?=$blocks['ready']['body']?></div>
		</div>
	</div>
</div>
<div class="slide">
	<div class="container">
		<div class="content">
			<div class="left">
				<h2><?=$blocks['remotecontrol']['title']?></h2>
				<div><?=$blocks['remotecontrol']['body']?></div>
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
			<h2><?=$blocks['audiocontent']['title']?></h2>
			<div class="description"><?=$blocks['audiocontent']['body']?></div>
		</div>
	</div>
</div>
<div class="slide">
	<div class="container">
		<i class="vert"></i>
		<div class="text">
			<h2><?=$blocks['techsupport']['title']?></h2>
			<div class="description"><?=$blocks['techsupport']['body']?></div>
		</div>
	</div>
</div>
<div class="slide">
	<div class="container">
		<i class="vert"></i>
		<div class="advantages">
			<?=$blocks['advantages']['body']?>
		</div>
	</div>
	<div class="bottom">
		<span>Закажите бесплатно демо-версию нашего плеера прямо сейчас!</span>
		<button class="btn btn-success">Заказать</button>
	</div>
</div>
<div class="slide">
	<div class="container">
		<i class="vert"></i>
		<div class="content">
			<h2><?=$blocks['karaoke']['title']?></h2>
			<div class="row">

<?
	foreach($aCategories as $cat_id => $category) {
?>
				<div class="col-sm-6">
					<div class="title"><?=$category['Category']['title']?></div>
<?
		foreach($aProducts[$cat_id] as $id => $product) {
			$this->ArticleVars->init($product, $url, $title, $teaser, $src, 'noresize');
?>
					<div class="item1">
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
			<h2><?=$blocks['partners']['title']?></h2>
			<?=$blocks['partners']['body']?>
		</div>
	</div>
</div>
<div class="slide">
	<div class="container">
		<i class="vert"></i>
		<div class="content">
			<h2>Последние новости из мира караоке</h2>
			<?=$this->element('news')?>
			<div class="link">
				<?=$this->Html->link(__('More news...'), array('controller' => 'news', 'action' => 'index'), array('class' => 'btn btn-success'))?>
			</div>
		</div>
	</div>
</div>
<div class="footer slide">
	<div class="container">
		<i class="vert"></i>
		<div class="content">
			<?=$this->element('SiteUI/footer')?>
		</div>
	</div>
</div>