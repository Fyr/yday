<?
	$this->Html->css('jquery.formstyler', array('inline' => false));
	$this->Html->script('vendor/jquery.formstyler.min', array('inline' => false));
	$category = $aCategories[$cat_id];
?>
<div class="container">
	<?=$this->element('SiteUI/title', array('title' => 'Сравните '.$category['Category']['title']))?>
	<div class="compareSelected"><span id="selected"></span> <a href="javascript: void(0)" class="btn btn-success">Сравнить</a></div>
	<div class="row virtualSystems realSystems">
<?
	foreach($aProducts[$cat_id] as $product) {
		$this->ArticleVars->init($product, $url, $title, $teaser, $src, 'noresize', $featured, $id);
		$checked = (in_array($id, $selected)) ? 'checked="checked"' : '';
?>
		<div class="col-sm-<?=floor(12 / count($aProducts[$cat_id]))?>">
			<div class="item">
				<div class="outerCheckbox"><input type="checkbox" class="styler" name="data[products][]" value="<?=$id?>" autocomplete="off" <?=$checked?>/></div>
<?
		if ($src) {
?>
				<div class="outerThumb">
					<a href="<?=$url?>"><img src="<?=$src?>" alt="<?=$title?>"/></a>
					<i class="vert"></i>
				</div>
<?
		}
?>
				<div class="title"><a href="<?=$url?>"><?=$title?></a></div>
<?
		if (isset($aPacks[$id])) {
			foreach($aPacks[$id] as $pack) {
				$price = $pack['ProductPack']['price'];
?>
				<div class="equipment"><?=$pack['ProductPack']['title']?></div>
<?
				if ($price) {
?>
					<div class="price"><?=$this->Price->format($price)?></div>

<?
				}
				break;
			}
		}
?>
			</div>
		</div>

<?
	}
?>
	</div>

</div>

<script type="text/javascript">
var aSelected = null;
function updateSelected() {
	var count = $(':checked').length;
	$('#selected').html(count < 5 ? aSelected[count] : aSelected[5].replace(/\%s/, count));
}
$(document).ready(function(){
	aSelected = [
		'Выберите системы для сравнения',
		'Выбрана 1 система',
		'Выбрано 2 системы',
		'Выбрано 3 системы',
		'Выбрано 4 системы',
		'Выбрано %s систем'
	];

	$('input.styler').styler();

	updateSelected();

	$('.virtualSystems .item').click(function(e){
		e.stopPropagation();
		$(this).toggleClass('active');
		var checked = $(this).find('input:checkbox').prop('checked');
		$(this).find('.styler').prop('checked', !checked).trigger('refresh');
		updateSelected();
	});

	$('[type=checkbox]').change(function(e){
		var checked = $(this).prop('checked');
		$(this).prop('checked', !checked);
	});

});
</script>
