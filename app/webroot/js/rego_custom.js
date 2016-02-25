$(document).ready(function(){
	
	/*
	$('.menu  li  a').click(function(){
		$('.menu li ul').stop().slideUp();
		if ( $(this).next().is('ul') ) {
			$(this).next('ul').stop().slideToggle();
			$(this).closest('li').toggleClass('active');
		}
	});
        
	$(document).on('click touchstart', function(e) {
		if ( !$.contains($('.menuDesktop').get(0), e.target)  ) {
			$('.menuDesktop li ul').stop().slideUp('slow', function(){
				$('.menuDesktop li ul').closest('li').removeClass('active');	
			});

		}
		
		if (!$.contains($('.menuMobile').get(0), e.target)  ) {
			$('.menuMobile li ul').stop().slideUp('slow', function(){
				$('.menuMobile li ul').closest('li').removeClass('active');	
			});
		}
		
	});
	
	$('input.styler, select').styler();
	
	$(window).load( function() {        	
		//text ellipsis
		$('.ellipsis').dotdotdot({
			watch: 'window'
		});		
	});
	*/
	
	
	var checkboxflag = false;
	
	$('.virtualSystems .item').click( function(){
		
		$(this).toggleClass('active');
		
		if ( !checkboxflag ) {
			if ( $(this).find('input:checkbox').prop('checked') ) {
				$(this).find('.styler').prop('checked', false).trigger('refresh');
			}
			else {
				$(this).find('.styler').prop('checked', true).trigger('refresh');
			}
		}
		else {
			checkboxflag = false;
		}
		
	});
	
	$('.virtualSystems .item input:checkbox').change( function(){
		checkboxflag = true; 
	});
	
	$('.article img').each(function(index, element){
		
		
		if ( $(this).css('float') == 'left' ) {
			$(this).addClass('leftFloat');
		}
		
		if ( $(this).css('float') == 'right' ) {
			$(this).addClass('rightFloat');
		}
		
		
	});
	
});
