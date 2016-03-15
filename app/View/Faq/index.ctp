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
<a name="contacts"></a>
<div class="grey">
	<div class="container">
		<div class="supportForm">

<?
	if ($lSent = $this->request->query('success')) {
		$msg = '<b>Спасибо за ваше сообщение!</b><br/>В ближайшее время наши специалисты вам ответят';
	} else {
		$msg = 'Не нашли ответ на интересующий Вас вопрос? <br/>Напишите нам, и мы с удовольствием Вам ответим.';
	}
?>
			<div class="text"><?=$msg?></div>
<?
	$options = array(
		'class' => 'row form',
		'url' => $this->Html->url(array('action' => 'index')).'#contacts',
		'inputDefaults' => array(
			'class' => 'form-control',
			'label' => false,
		)
	);
	echo $this->PHForm->create('Contact', $options);
?>
				<div class="col-sm-5">
<?
	echo $this->PHForm->input('Contact.username', array('placeholder' => 'Ваше имя'));
	echo $this->PHForm->input('Contact.phone', array('type' => 'tel', 'placeholder' => 'Телефон +(NNN) NNN-NN-NN', /*'pattern' => '\(\d\d\d\) ?\d\d\d-\d\d-\d\d'*/ ));
	echo $this->PHForm->input('Contact.email', array('placeholder' => 'E-mail'));
	echo $this->PHForm->input('Contact.subj', array('placeholder' => 'Тема вопроса'));
?>
				</div>
				<div class="col-sm-7">
<?
	echo $this->PHForm->input('Contact.body', array('type' => 'textarea', 'placeholder' => 'Введите Ваш вопрос...'));
?>
					<!--textarea placeholder="Введите Ваш вопрос" class="form-control"></textarea-->
				</div>
				<div class="col-sm-12 submit">
					<button class="btn btn-success">Отправить</button>
				</div>
<?
	echo $this->PHForm->end();
?>

		</div>

	</div>
</div>

<?=$this->element('call_us')?>
<?
	if ($lSent) {
?>
<script>
	$(function () {
		window.scrollBy(0, -80);
	});
</script>
<?
	}
?>