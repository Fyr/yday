<?=$this->element('SiteUI/title', array('title' => $this->ObjectType->getTitle('index', 'News')))?>
<div class="newsContainer">
	<?=$this->element('news')?>
</div>
<button onclick="moreNews();">More news</button>
<script type="text/javascript">
var page = 1;
function moreNews() {
	page++;
	$.get('/news/index/' + page, null, function(response){
		$('.newsContainer').append(response);
	});
}
</script>