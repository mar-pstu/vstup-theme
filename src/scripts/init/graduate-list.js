( function () {
	jQuery( document ).ready( function () {
		var $list = jQuery( '#graduate-list' );
		$list.slick( {
			dots: true,
			arrows: true,
			fade: ! jQuery( 'body' ).hasClass( 'is-mobile' ),
			dotsClass: 'slider-dots',
			appendDots: '#graduate-controls',
			prevArrow: '#graduate-arrow-prev',
			nextArrow: '#graduate-arrow-next',
			autoplay: true,
			autoplaySpeed: 3000,
			speed: jQuery( 'body' ).hasClass( 'is-mobile' ) ? 500 : 1500,
			lazyLoad: 'ondemand',
			slidesToShow: 1,
			slidesToScroll: 1,
		} );
	} );
} )();