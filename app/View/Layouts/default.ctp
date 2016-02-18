<!DOCTYPE html>
<html lang="en">
<head>
	<?=$this->Html->charset()?>
	<title><?=Configure::read('domain.title')?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, minimum-scale=1.0">
<?

	echo $this->Html->css(array(
		'bootstrap.min',
		'style.css',
		'extra'
	));

	echo $this->Html->meta('icon');
	echo $this->fetch('meta');
	echo $this->fetch('css');

	echo $this->Html->script(array(
		'vendor/jquery.1.11.0.min',
		'vendor/bootstrap.min',
		'rego_custom'
	));
?>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
<?=$this->element('SiteUI/navbar')?>
<div class="container">
	<?=$this->fetch('content')?>
</div>
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="name">Свяжитесь с нами</div>
				Your Day Ltd.<br />
				Россия, Ростов на Дону, офис 723<br />
				50-летия Ростсельмаша 52/1<br />
				8 800 500-25-73<br />
				Skype: yourdaymusic<br />
				mail@karaokeyourday.com
			</div>
			<div class="col-sm-3">
				<div class="name">Виртуальные пакеты</div>
				<ul class="packets">
					<li><a href="#">Virtual START</a></li>
					<li><a href="#">Virtual Start PLUS</a></li>
					<li><a href="#">Virtual HOME</a></li>
					<li><a href="#">Virtual Home PLUS</a></li>
					<li><a href="#">Virtual CLUB</a></li>
					<li><a href="#">Virtual CLUB PLUS</a></li>
					<li><a href="#">Virtual FULL</a></li>
					<li><a href="#">Virtual FULL PLUS</a></li>
				</ul>
			</div>
			<div class="col-sm-2">
				<div class="name">Караоке системы</div>
				<a href="#">Lite</a><br />
				<a href="#">Home</a><br />
				<a href="#">Professional</a>
			</div>
			<div class="col-sm-2">
				<div class="name">Приложения</div>
				<div class="link"><a href="#"><img src="/img/apple.png" class="img-responsive" alt="App Store" width="140" /></a></div>
				<div class="link"><a href="#"><img src="/img/google.png" class="img-responsive" alt="Play Market" width="140" /></a></div>
			</div>
			<div class="col-sm-2 developer">
				Разработка сайта
			</div>
		</div>
		<div class="copyright">© 2016 Your Day Karaoke</div>
	</div>
</div>
</body>
</html>
