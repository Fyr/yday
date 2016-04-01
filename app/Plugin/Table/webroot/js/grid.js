$(function(){
	$('.dataTable > thead > tr > th').each(function(){
		var $a = $('a', this);
		if ($a.length) {
			var href = $a.prop('href');
			$(this).html($a.html());
			$(this).click(function () {
				window.location.href = href;
			});
		}
	});

	$('.dataTable th.checkboxes input[type=checkbox]').change(function(){
		console.log($(this).prop('checked'), $('.dataTable td.checkboxes input[type=checkbox]').length);
		var checked = $(this).prop('checked');
		var $checkboxes = $('.dataTable td.checkboxes');
		$('input', $checkboxes).prop('checked', checked);
		if ($(this).prop('checked')) {
			$('.checker span', $checkboxes).addClass('checked');
		} else {
			$('.checker span', $checkboxes).removeClass('checked');
		}
		console.log($(':checked').length);
	});
});