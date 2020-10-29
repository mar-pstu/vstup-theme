jQuery( document ).ready( function () {
	jQuery( '#partners-list' ).slick( {
		dots: true,
		arrows: true,
		fade: false,
		appendDots: jQuery( '#partners-controls' ),
		dotsClass: 'slider-dots',
		prevArrow: '#partners-arrow-prev',
		nextArrow: '#partners-arrow-next',
		autoplay: true,
		autoplaySpeed: 5000,
		speed: 1000,
		lazyLoad: 'ondemand',
		variableWidth: true,
		slidesToShow: 4,
	} );
} );