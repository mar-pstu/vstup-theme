jQuery( document ).ready( function () {
	
	var $list = jQuery( '#firstscreen-list' );
	var $controls = jQuery( '#firstscreen-controls' );

	$list.on( 'lazyLoaded', function ( event, slick, image, imageSource ) {
		jQuery( image ).closest( '.jumbotron' ).find( '.bg' ).attr( 'style', 'background-image:url('+imageSource+');' );
	} );

	$list.on( 'init', function () {
		$list.find( '.slide' ).css( {
			'display': 'initial',
		} );
		$controls.css( {
			'visibility': 'visible',
		} );
	} );

	$list.slick( {
		dots: true,
		arrows: true,
		dotsClass: 'slider-dots',
		appendDots: $controls,
		prevArrow: '#firstscreen-prev',
		nextArrow: '#firstscreen-next',
		fade: true,
		autoplay: true,
		autoplaySpeed: 4000,
		speed: 2000,
		lazyLoad: 'ondemand',
	} );
} );