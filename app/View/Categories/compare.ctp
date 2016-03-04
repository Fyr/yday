<div class="otherKaraokeSystems">
	<div class="container">
		<?=$this->element('SiteUI/title', array('title' => 'Сравнение караоке систем'))?>
		<div class="row">
<?
	foreach($aCategories as $category) {
		$this->ArticleVars->init($category, $url, $title, $teaser, $src, 'noresize', $featured, $id);
		$url = array('controller' => 'Products', 'action' => 'select', $id);
?>
			<div class="col-sm-<?=floor(12 / count($aCategories))?>">
<?
		if ($src) {
?>
				<div class="thumbHeight">
					<a href="<?=$this->Html->url($url)?>"><img class="img-responsive" src="<?=$src?>" alt="" /></a></div>
<?
		}
		echo $this->Html->link('Сравните '.$title, $url, array('class' => 'link light'));
?>
			</div>

<?
	}
?>
		</div>
	</div>
</div>