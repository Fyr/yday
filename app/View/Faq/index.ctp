<div class="container">
	<div class="support">
		<?=$this->element('SiteUI/title', array('title' => $faq['Page']['title']))?>

		<div class="smallDesc">Оперативно ответим на любой вопрос</div>
		<div class="text"><?=$this->ArticleVars->body($faq)?></div>

		<?=$this->element('SiteUI/title', array('title' => __('Frequently asked questions')))?>

		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

<?
	foreach($aArticles as $i => $article) {
?>
		<div class="panel">
			<a data-toggle="collapse" data-parent="#accordion" href="#answer<?=$i?>" aria-expanded="true"
			   aria-controls="answer1" class="headPanel collapsed">
				<span class="icon icon-arrow-up"></span>
				<?=$article['Faq']['title']?>
			</a>

			<div id="answer<?=$i?>" class="bodyPanel collapse" role="tabpanel">
				<?=$this->ArticleVars->body($article)?>
			</div>
		</div>
<?
	}
?>

		</div>
	</div>
</div>
<div class="grey">
	<div class="container">
		<div class="supportForm">
			<div class="text">Не нашли ответ на интересующий Вас вопрос? <br />Напишите нам, и мы с удовольствием Вам ответим.</div>
			<form class="row form">
				<div class="col-sm-5">
					<input type="text" placeholder="Имя" class="form-control" />
					<input type="tel" pattern="\(\d\d\d\) ?\d\d\d-\d\d-\d\d" placeholder="Телефон"  class="form-control error" value="234dd" />
					<input type="email" placeholder="Email" class="form-control" />
					<input type="text" placeholder="Тема вопроса" class="form-control" />
				</div>
				<div class="col-sm-7">
					<textarea placeholder="Введите Ваш вопрос" class="form-control"></textarea>
				</div>
				<div class="col-sm-12 submit">
					<button class="btn btn-success">Отправить</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?=$this->element('call_us')?>