$(document).ready(function(){

	$.fn.fsvs({
		autoPlay: false,
		speed: 300,
		bodyID: 'fsvs-body',
		selector: '.slide',
		mouseSwipeDisance: 40,
		afterSlide: function () {},
		beforeSlide: function () {},
		endSlide: function () {},
		mouseWheelEvents: true,
		mouseWheelDelay: false,
		mouseDragEvents: true,
		touchEvents: true,
		arrowKeyEvents: true,
		pagination: true,
		nthClasses: 2,
		detectHash: true
	});



	if (window.innerWidth > 1600) {
		var settings = {
			//height of sphere container
			height: 900,
			//width of sphere container
			width: 1300,
			//radius of sphere
			radius: 300,
			//rotation speed
			speed: 0.5,
			//sphere rotations slower
			slower: 0.9,
			//delay between up<a href="http://www.jqueryscript.net/time-clock/">date</a> position
			timer: 5,
			//dependence of a font size on axis Z
			fontMultiplier: 15,
			//tag css stylies on mouse over
			hoverStyle: {
				border: 'none',
				color: '#0b2e6f'
			},
			//tag css stylies on mouse out
			mouseOutStyle: {
				border: '',
				color: ''
			}
		};
	}
	else {
		settings = {
			//height of sphere container
			height: 800,
			//width of sphere container
			width: 1200,
			//radius of sphere
			radius: 150,
			//rotation speed
			speed: 0.5,
			//sphere rotations slower
			slower: 0.9,
			//delay between up<a href="http://www.jqueryscript.net/time-clock/">date</a> position
			timer: 5,
			//dependence of a font size on axis Z
			fontMultiplier: 15,
			//tag css stylies on mouse over
			hoverStyle: {
				border: 'none',
				color: '#0b2e6f'
			},
			//tag css stylies on mouse out
			mouseOutStyle: {
				border: '',
				color: ''
			}
		};
	}


	$('#tagcloud').tagoSphere(settings);
});
