<?=$this->element('SiteUI/title', array('title' => $article['News']['title']))?>
<div class="article">
	<?=$this->ArticleVars->body($article)?>
</div>
<div class="oneTitle">Другие караоке новости:</div>
<div class="row news">
<?
	foreach($aFeaturedNews as $article) {
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
		<a href="<?=$url?>" class="title"><?=$title?></a>

		<div class="description"><?=$teaser?></div>
	</div>
<?
	}
?>
</div>