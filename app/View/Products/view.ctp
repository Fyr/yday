<?
	$this->Html->css(array('owl-carousel/owl.carousel', 'owl-carousel/owl.theme'), array('inline' => false));
	$this->Html->script(array('vendor/owl.carousel.min'), array('inline' => false));
fdebug(compact('aFormGroups', 'aForms', 'aValues', 'aPacks', 'aPackValues'));
?>
<div class="subMenu">
	<div class="container">
		<div class="name"><?=$product['Category']['title']?>: <?=$product['Product']['title']?></div>
		<a class="btn btn-success orderBtn" href="javascript: void(0)">Заказать</a>
		<ul class="menu">
			<li class="active"><a href="javascript: void(0)">Возможности</a></li>
			<li><a href="javascript: void(0)">Технические характеристики</a></li>
			<li><a href="javascript: void(0)">Комплект поставки</a></li>
		</ul>
	</div>
</div>
<div class="playerKaraoke">
	<div class="container">
		<div class="title"><?=$product['Product']['title']?></div>
		<div class="smallDesc"><?=$product['Product']['teaser']?></div>
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
			<?=$this->ArticleVars->body($product)?>
			<div class="row">
				<div class="col-sm-6 price">
					<div class="value">190 000</div>
					<div class="license">Стандартная комплектация</div>
				</div>
				<div class="col-sm-6 price">
					<div class="value">260 000</div>
					<div class="license">Полная комплектация</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="darkGrey characteristics">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				Полный функционал современного караоке плеера
			</div>
			<div class="col-sm-4">
				Возможность удаленного управления с планшета
			</div>
			<div class="col-sm-4">
				50 000 песен, 7 000 клипов и 60 видеофонов в комплекте
			</div>
		</div>
	</div>
</div>
<div class="section">
	<div class="container">
		<h2 class="light">Система на флеш-накопителе</h2>
		<table class="sectionContent">
			<tr>
				<td valign="bottom"><img src="/img/karaoke17.png" class="img-responsive" alt="" /></td>
				<td class="text">Караоке система Professional установлена на флэш-накопителе, который обеспечивает сверх быструю скорость отклика. Флэш-накопители работают в 17 раз быстрее традиционных жестких дисков. С ними система становится не только более портативной и легкой, но и имеет высокую скорость доступа к данным. Флэш-накопитель обеспечивает быструю загрузку системы. Даже, если Вы долгое время не пользовались ей, при включении система мгновенно будет готова к работе.</td>
			</tr>
		</table>
	</div>
</div>
<div class="grey section">
	<div class="container">
		<h2 class="light">Комплектующие профессионального уровня </h2>
		<table class="sectionContent">
			<tr>
				<td class="text">Караоке система Professional собрана из комплектующих профессионального уровня качества. В комплект системы входит профессиональная звуковая карта, которая гарантирует высокое качество звучания песен даже на больших площадках*, процессор с возможностью обработки голоса исполнителя, видеокарта, микшерный пульт, а также мощный процессор для высокой производительности системы.<br /><br />*При соблюдении всех условий.</td>
				<td><img src="/img/karaoke9.png" class="img-responsive" alt="" /></td>
			</tr>
		</table>
	</div>
</div>
<div class="section">
	<div class="container">
		<h2 class="light">Современный лаконичный дизайн</h2>
		<table class="sectionContent">
			<tr>
				<td><img src="/img/karaoke18.png" class="img-responsive" alt="" /></td>
				<td class="text">Дизайн системы разработан в соответствии с новейшими тенденциями в дизайне и техническими возможностями производства. Несмотря на то, что система предназначена для концертных площадок, она не громоздкая и не занимает много места, а гармоничное сочетание лаконичных линий без лишних деталей делает систему идеальной не только внутри, но и снаружи.</td>
			</tr>
		</table>
	</div>
</div>
<div class="section grey">
	<div class="container">
		<h2 class="light">Полный функционал современного караоке плеера</h2>
		<table class="sectionContent">
			<tr>
				<td class="text">Системы YOUR DAY отличаются современным караоке плеером. Он имеет удобный для пользователя интерфейс нового поколения и расширенный функционал: поддержка всех современных аудио и видео форматов, проигрывание любого контента, интеллектуальный поиск песен, вывод анализа проигранных песен на печать, запись исполнителя в реальном времени, автоматическая оценка пения, поддержка Multi-Touch системы, доступ в интернет, удобный интерфейс и другие преимущества.</td>
				<td><img src="/img/karaoke10.png" class="img-responsive" alt="" /></td>
			</tr>
		</table>
	</div>
</div>
<div class="section">
	<div class="container">
		<h2 class="light">Планшет в полной комплектации</h2>
		<table class="sectionContent">
			<tr>
				<td><img src="/img/karaoke15.png" class="img-responsive" alt="" /></td>
				<td class="text">Мы собрали все необходимое для максимально комфортной работы с системой. В полный комплект караоке системы Professional входит планшет для удаленного доступа. Удаленное управление с планшета значительно облегчит работу администратора и звукорежиссера с караоке системой. Они больше не будут привязаны к рабочему месту, а Ваши гости и клиенты сами смогут выбирать, искать и добавлять песни в плейлист, без участия администратора.</td>
			</tr>
		</table>
	</div>
</div>
<div class="section grey">
	<div class="container">
		<h2 class="light">Поддержка двух потоков видео с разрешением Full HD</h2>
		<table class="sectionContent">
			<tr>
				<td class="text">В караоке системе Professional существует возможность раздельного вывода 2-х потоков видео. На один экран выводится панель управления плеером, а на второй экран выводится видеофон и текст песни. Работа в 2-х экранных режимах дает возможность управления плеером одновременно с трансляцией видео. Таким образом Вы получите реалистичное видеоизображение в качестве Full HD на экранах администратора и клиента. Кроме того, Вы сможете подключить неограниченное количество экранов для трансляции видеоизображения или видеофонов для клиента в высоком разрешении Full HD.</td>
				<td><img src="/img/karaoke1.png" class="img-responsive" alt="" /></td>
			</tr>
		</table>
	</div>
</div>
<div class="section">
	<div class="container">
		<h2 class="light">Возможность подключения 4-х микрофонов</h2>
		<table class="sectionContent">
			<tr>
				<td valign="bottom"><img src="/img/karaoke19.png" class="img-responsive" alt="" /></td>
				<td class="text">С караоке системой Professional Вы имеете возможность подключения сразу четырех микрофонов вместо привычного одного или двух. Это значит, что Вам не придется искать дополнительное оборудование для большего числа исполнителей - с одной системой Professional может выступать даже хор*.<br /><br />*При правильной расстановке микрофонов.</td>
			</tr>
		</table>
	</div>
</div>
<div class="section grey">
	<div class="container">
		<h2 class="light">Система восстановления и защиты</h2>
		<table class="sectionContent">
			<tr>
				<td class="text">Вам не нужно волноваться о сохранности настроек системы. Караоке система Professional имеет защиту от стороннего вмешательства в настройки, с возможностью быстрого восстановления настроек по умолчанию. Если Вы случайно удалили нужный контент, или в систему проник вирус, просто запустите функцию быстрого восстановления, и она восстановит все настройки по умолчанию с момента первой загрузки.</td>
				<td><img src="/img/karaoke20.png" class="img-responsive" alt="" /></td>
			</tr>
		</table>
	</div>
</div>

<div class="section">
	<div class="container">
		<h2 class="light">Открытая система под полной защитой</h2>
		<table class="sectionContent">
			<tr>
				<td><img src="/img/karaoke12.png" class="img-responsive" alt="" /></td>
				<td class="text">Мы не ограничиваем возможности системы, система караоке Professional является открытой. Вы сможете загружать, скачивать любой сторонний контент и проигрывать его, устанавливать нужные Вам для работы программы, а также пользоваться интернетом. Кроме того, Вам не придется волноваться о сохранности данных и настроек – Ваша система будет под полной круглосуточной защитой лицензионного антивируса.</td>
			</tr>
		</table>
	</div>
</div>

<div class="section grey allOpportunities">
	<div class="container">
		<h2 class="light">Все возможности системы</h2>
		<div class="row">
			<div class="col-sm-4">
				<ul>
					<li>Полный функционал плеера</li>
					<li>Интеллектуальный поиск песен</li>
					<li>Воспроизведение других караоке</li>
					<li>Создание и загрузка плейлистов</li>
					<li>Запись исполнителя в реальном времени</li>
					<li>Фоновая музыка в паузах</li>
					<li>Возможность добавления видеороликов и клипов</li>
					<li>Установка логотипа заведения</li>
					<li>Поддержка видео формата Full HD</li>
					<li>Автоматическая оценка пения</li>
					<li>Анализ исполненных композиций</li>
				</ul>
			</div>
			<div class="col-sm-4">
				<ul>
					<li>Удаленное управление на планшетах IOS и Android</li>
					<li>Установка пароля для входа в модуль учета</li>
					<li>Эффекты для вокала: ревербератор, компрессор</li>
					<li>Обновление с сохранением настроек звукорежиссера</li>
					<li>Программирование горячих клавиш</li>
					<li>Установка сторонних программ</li>
					<li>Бухгалтерский учет с выводом на печать</li>
					<li>Установка пароля для входа в настройки</li>
					<li>Поддержка видео формата Full HD</li>
					<li>Качественное изменение тональности и темпа композиции</li>
					<li>Режим двухпотокового видео выхода</li>
				</ul>
			</div>
			<div class="col-sm-4">
				<ul>
					<li>Автопауза между песнями</li>
					<li>Отображение маркера в тексте песен</li>
					<li>Свободный доступ к сети Интернет</li>
					<li>Проигрывание всех видео аудио и караоке форматов</li>
					<li>Поддержка Multi-Touch системы</li>
					<li>Система защиты</li>
					<li>Подключение 4-х микрофонов</li>
					<li>Работа в двух-экранном режиме</li>
					<li>Система восстановления</li>
					<li>Чтение и запись Blu-Ray Disc</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="section allOpportunities">
	<div class="container">
<?
	foreach($aFormGroups as $group_id => $group) {
		if (!$group['ParamGroup']['featured']) {
?>

		<h2 class="light"><?=$group['ParamGroup']['title']?></h2>
		<div class="row">
<?
			$aCols = array();
			$col = 0;
			$count = 1;
			foreach($aForms[$group_id] as $fid => $field) {
				$value = Hash::get($aValues, $fid);
				$aCols[$col][] = $this->element('param', compact('field', 'value'));
				if ($count >= ceil(count($aForms[$group_id]) / 3)) {
					$count = 1;
					$col++;
				} else {
					$count++;
				}
			}
			foreach($aCols as $items) {
?>
			<div class="col-sm-4">
				<?=implode('', $items)?>
			</div>
<?
			}
?>

		</div>
<?
		}
	}
?>


	</div>
</div>
<?
	if ($aPacks) {
?>
<div class="section grey allOpportunities">
	<div class="container">
		<h2 class="light">Комплект поставки</h2>
<?
		foreach($aFormGroups as $group_id => $group) {
			if ($group['ParamGroup']['featured']) {
?>
		<table class="deliveryContent">
			<tr>
				<th><?=$group['ParamGroup']['title']?></th>
<?
				foreach($aPacks as $pack) {
?>
				<th><?=$pack['ProductPack']['title']?></th>
<?
				}
?>
			</tr>
<?
				foreach($aForms[$group_id] as $fid => $field) {
					$values = $aPackValues[$fid];
					echo $this->element('param_pack', compact('field', 'values'));
				}

?>
		</table>
<?
			}
		}
?>


		<!--table class="deliveryContent">
			<tr>
				<th>Комплект поставки</th>
				<th></th>
				<th></th>
			</tr>
			<tr>
				<td>База</td>
				<td>Системный блок Your Day Professional</td>
				<td>Системный блок Your Day Professional</td>
			</tr>
			<tr>
				<td>Профессиональная звуковая карта</td>
				<td><span class="icon-check"></span></td>
				<td><span class="icon-check"></span></td>
			</tr>
			<tr>
				<td>Лицензионный Windows 8.1 и выше</td>
				<td><span class="icon-check"></span></td>
				<td><span class="icon-check"></span></td>
			</tr>
			<tr>
				<td>Руководство пользователя</td>
				<td><span class="icon-check"></span></td>
				<td><span class="icon-check"></span></td>
			</tr>
			<tr>
				<td>Радио мышь</td>
				<td><span class="icon-check"></span></td>
				<td><span class="icon-check"></span></td>
			</tr>
			<tr>
				<td>Радио клавиатура</td>
				<td><span class="icon-check"></span></td>
				<td><span class="icon-check"></span></td>
			</tr>
			<tr>
				<td>Радиомикрофон</td>
				<td><span class="icon-close"></span></td>
				<td><span class="icon-close"></span></td>
			</tr>
			<tr>
				<td>Сетевой кабель</td>
				<td><span class="icon-check"></span></td>
				<td><span class="icon-close"></span></td>
			</tr>
			<tr>
				<td>Полный комплект кабелей</td>
				<td><span class="icon-close"></span></td>
				<td><span class="icon-check"></span></td>
			</tr>
			<tr>
				<td>Планшет</td>
				<td><span class="icon-close"></span></td>
				<td><span class="icon-check"></span></td>
			</tr>
			<tr>
				<td>Фирменная сумка</td>
				<td><span class="icon-close"></span></td>
				<td><span class="icon-close"></span></td>
			</tr>
			<tr>
				<td>Монитор Full HD</td>
				<td><span class="icon-close"></span></td>
				<td><span class="icon-check"></span></td>
			</tr>
			<tr>
				<td>Микшерный пульт</td>
				<td><span class="icon-close"></span></td>
				<td><span class="icon-check"></span></td>
			</tr>
			<tr>
				<td>Программный процессор для вокала</td>
				<td><span class="icon-close"></span></td>
				<td><span class="icon-check"></span></td>
			</tr>
			<tr>
				<td>Ревербератор 24 эффекта</td>
				<td><span class="icon-close"></span></td>
				<td><span class="icon-check"></span></td>
			</tr>
			<tr>
				<td>SSD Flash накопитель</td>
				<td><span class="icon-close"></span></td>
				<td><span class="icon-check"></span></td>
			</tr>
			<tr>
				<td>Blu-Ray DVD CD привод</td>
				<td><span class="icon-close"></span></td>
				<td><span class="icon-check"></span></td>
			</tr>
		</table-->
	</div>
</div>
<?
	}
?>
<div class="section otherKaraokeSystems">
	<div class="container">
		<h2 class="light">Другие караоке системы</h2>
		<div class="row">
			<div class="col-sm-4">
				<div class="outerThumb">
					<a href="javascript:void(0)"><img src="/img/img2.png" alt="" class="img-responsive" /></a>
					<i class="vert"></i>
				</div>
				<a href="javascript:void(0)" class="link">Lite</a>
				<div class="price">от 130 000</div>
			</div>
			<div class="col-sm-4">
				<div class="outerThumb">
					<a href="javascript:void(0)"><img src="/img/img1.png" alt="" class="img-responsive" /></a>
					<i class="vert"></i>
				</div>
				<a href="javascript:void(0)" class="link">Home</a>
				<div class="price">от 170 000</div>
			</div>
			<div class="col-sm-4">
				<div class="outerThumb">
					<a href="javascript:void(0)"><img src="/img/virtual_full.png" alt="" class="img-responsive" /></a>
					<i class="vert"></i>
				</div>
				<a href="javascript:void(0)" class="link">Full/Full+</a>
				<div class="price">от 130 000</div>
			</div>
		</div>
		<a href="javascript: void(0)" class="btn btn-success">Сравнить Professional с другими системами</a>
	</div>
</div>

<?=$this->element('support', array('title' => $page['support']['Page']['title'], 'blocks' => $blocks['support'], 'class' => 'grey'))?>
<?=$this->element('call_us')?>

<script type="text/javascript">
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
