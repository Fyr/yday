$(function(){
	$('.dataTable > thead > tr > th').each(function(){
		var $a = $('a', this);
		var href = $a.prop('href');
		$(this).html($a.html());
		$(this).click(function(){
			window.location.href = href;
		});
	});
});