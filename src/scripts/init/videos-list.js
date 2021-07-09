( function () {
	jQuery( document ).ready( function () {
		var $list = jQuery( '#videos-list' );
		$list.slick( {
			dots: true,
			arrows: true,
			fade: ! jQuery( 'body' ).hasClass( 'is-mobile' ),
			dotsClass: 'slider-dots',
			appendDots: '#videos-controls',
			prevArrow: '#videos-arrow-prev',
			nextArrow: '#videos-arrow-next',
			autoplay: true,
			autoplaySpeed: 3000,
			speed: jQuery( 'body' ).hasClass( 'is-mobile' ) ? 500 : 1500,
			lazyLoad: 'ondemand',
			slidesToShow: 1,
			slidesToScroll: 1,
		} );
	} );
} )();