<?=$this->element('SiteUI/title', array('title' => $this->ObjectType->getTitle('index', 'News')))?>
<div class="row news">
<?
	foreach($aNews as $i => $article) {
		$this->ArticleVars->init($article, $url, $title, $teaser, $src, '400x');
?>
	<div class="col-sm-4">
<?
		if ($src) {
?>
		<a href="<?=$url?>" class="thumb" style="background-image: url('<?=$src?>')"></a>
<?
		}
?>

		<?=$this->Html->link($title, $url, array('class' => 'title'))?>
		<div class="description"><?=$teaser?></div>
	</div>
<?
		if ((($i + 1) % 3) == 0 && $i > 0) {
?>
</div>
<div class="row news">
<?
		}
	}
?>

</div>