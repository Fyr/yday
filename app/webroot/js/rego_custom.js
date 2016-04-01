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

	 $('#navbar > ul > li.dropdown').hover(function(){
	 console.log('!');
	 });
	*/

	$('input.styler').styler();

	$('.article img').each(function(index, element){
		if ( $(this).css('float') == 'left' ) {
			$(this).addClass('leftFloat');
		}
		
		if ( $(this).css('float') == 'right' ) {
			$(this).addClass('rightFloat');
		}
	});

	if ($("#owl-carousel").length) {
		$("#owl-carousel").owlCarousel({
			//autoPlay : 6000,
			navigation: true,
			pagination: false,
			slideSpeed: 300,
			singleItem: true,
			lazyLoad: true,
			autoHeight: true,
			navigationText: ['<div class="icon icon-arrow-left"></div>', '<div class="icon icon-arrow-right"></div>']
		});
	}

	$('ul.nav > li.dropdown').hover(function() {
		$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn();
	}, function() {
		$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut();
	});
	$('ul.nav > li.dropdown a.dropdown-toggle').click(function(){
		if ($(this).prop('href') != 'javascript:;') {
			window.location.href = $(this).prop('href');
		}
	});

});
