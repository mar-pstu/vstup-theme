jQuery( document ).ready( function () {
	jQuery( '#specialties-list' ).slick( {
		dots: true,
		arrows: true,
		dotsClass: 'slider-dots',
		appendDots: jQuery( '#specialties-controls' ),
		prevArrow: '#specialties-arrow-prev',
		nextArrow: '#specialties-arrow-next',
		autoplay: false,
		adaptiveHeight: false,
		fade: false,
		autoplaySpeed: 4000,
		speed: 1500,
		lazyLoad: 'ondemand',
		slidesToShow: 1,
		slidesToScroll: 1,
	} );
} );