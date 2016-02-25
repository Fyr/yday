<div class="slide">
	<div class="container">
		<div class="phoneNumber">
			<div>Бесплатный звонок</div>
			<div class="number"><?=Configure::read('Settings.phone')?></div>
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
				<a href="<?=Configure::read('Settings.app_apple')?>"><img src="/img/apple.png" alt="" /></a>
				<a href="<?=Configure::read('Settings.app_google')?>"><img src="/img/google.png" alt="" /></a>
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
				<div class="col-sm-6">
					<div class="title">Готовые системы</div>
					<div class="item">
						<div class="outerThumb">
							<a href="javascript: void(0)"><img src="/img/img1.png" alt="" class="thumb img-responsive" /></a>
						</div>
						<div class="description">
							<a href="javascript: void(0)">Home</a>
							<div class="text">Полноценная, профессиональная система для вашего дома</div>
						</div>
					</div>
					<div class="item">
						<div class="outerThumb">
							<a href="javascript: void(0)"><img src="/img/img2.png" alt="" class="thumb img-responsive" /></a>
						</div>
						<div class="description">
							<a href="javascript: void(0)">Lite</a>
							<div class="text">Мобильная система профессионального уровня для дома и клуба</div>
						</div>
					</div>
					<div class="item">
						<div class="outerThumb">
							<a href="javascript: void(0)"><img src="/img/img3.png" alt="" class="thumb img-responsive" /></a>
						</div>
						<div class="description">
							<a href="javascript: void(0)">Professional</a>
							<div class="text">Профессиональная система для самых грандиозных проектов</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="title">Virtual системы</div>
					<div class="item1">
						<div class="outerThumb">
							<a href="javascript: void(0)"><img src="/img/virtual_start.png" alt="" class="thumb img-responsive" /></a>
						</div>
						<div class="description">
							<a href="javascript: void(0)">Start/Start Plus</a>
							<div class="text">Виртуальная система для начинающих</div>
						</div>
					</div>
					<div class="item1">
						<div class="outerThumb">
							<a href="javascript: void(0)"><img src="/img/virtual_home.png" alt="" class="thumb img-responsive" /></a>
						</div>
						<div class="description">
							<a href="javascript: void(0)">Home/Home Plus</a>
							<div class="text">Облегченная виртуальная система для домашнего использования</div>
						</div>
					</div>
					<div class="item1">
						<div class="outerThumb">
							<a href="javascript: void(0)"><img src="/img/virtual_club.png" alt="" class="thumb img-responsive" /></a>
						</div>
						<div class="description">
							<a href="javascript: void(0)">Club/Club Plus</a>
							<div class="text">Полноценная, виртуальная система для отдыха и бизнеса</div>
						</div>
					</div>
					<div class="item1">
						<div class="outerThumb">
							<a href="javascript: void(0)"><img src="/img/virtual_full.png" alt="" class="thumb img-responsive" /></a>
						</div>
						<div class="description">
							<a href="javascript: void(0)">Full/Full Plus</a>
							<div class="text">Профессиональная система с максимальным функционалом для вашего бизнеса</div>
						</div>
					</div>
				</div>
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
				<?=$this->Html->link(__('More news...'), array('controller' => 'News', 'action' => 'index'), array('class' => 'btn btn-success'))?>
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