( function () {
	jQuery( document ).ready( function () {
		jQuery( '#graduate-list' ).slick( {
			dots: true,
			arrows: true,
			fade: true,
			dotsClass: 'slider-dots',
			prevArrow: '#graduate-arrow-prev',
			nextArrow: '#graduate-arrow-next',
			autoplay: true,
			autoplaySpeed: 5000,
			speed: 1000,
			lazyLoad: 'ondemand',
			slidesToShow: 1,
			slidesToScroll: 1,
		} );
	} );
} )();