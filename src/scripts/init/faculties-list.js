jQuery( document ).ready( function () {
	jQuery( '#faculties-list' ).slick( {
		dots: true,
		arrows: true,
		dotsClass: 'slider-dots',
		appendDots: jQuery( '#faculties-controls' ),
		prevArrow: '#faculties-arrow-prev',
		nextArrow: '#faculties-arrow-next',
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