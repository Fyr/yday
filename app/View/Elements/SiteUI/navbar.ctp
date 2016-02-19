<nav class="navbar">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="/">
				<img src="/img/logo.png" alt="Brand" />
			</a>
			<button aria-controls="navbar" aria-expanded="true" data-target="#navbar" data-toggle="collapse" class="navbar-toggle" type="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<a href="javascript: void(0)" class="loginBtn">Личный кабинет</a>
		<div class="dropdown language">
			<button class="btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">ru <span class="icon-arrow-down"></span></button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				<li><a href="#">ru</a></li>
				<li><a href="#">en</a></li>
			</ul>
		</div>
		<div class="navbar-collapse collapse" id="#navbar">
			<ul class="nav navbar-nav">
				<li class="dropdown active">
					<a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">Караоке системы <span class="icon-arrow-down"></span></a>
					<ul class="dropdown-menu">
<?
	foreach($aProducts as $article) {
		$this->ArticleVars->init($article, $url, $title);
?>
						<li><?=$this->Html->link($title, $url)?></li>
<?
	}
?>
					</ul>
				</li>
				<li class="dropdown">
					<a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">Каталоги <span class="icon-arrow-down"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">some text</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">Приложения <span class="icon-arrow-down"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">some text</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
					</ul>
				</li>
				<li><a href="#">Поддержка</a></li>
			</ul>
		</div>

	</div>
</nav>