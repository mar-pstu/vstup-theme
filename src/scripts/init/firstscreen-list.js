jQuery( document ).ready( function () {
	
	var $list = jQuery( '#firstscreen-list' );
	var $controls = jQuery( '#firstscreen-controls' );
	var $menu = jQuery( '#warning-menu' );

	function MenuToggle() {
		if ( jQuery( window ).scrollTop() > screen.height * 0.5 ) {
			$menu.removeClass( 'active' );
		} else {
			$menu.addClass( 'active' );
		}
	}

	if ( $menu.length > 0 ) {
		jQuery( window ).on( 'scroll', MenuToggle );
		jQuery( document ).ready( MenuToggle );
	}

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
		fade: ! jQuery( 'body' ).hasClass( 'is-mobile' ),
		autoplay: true,
		autoplaySpeed: 3000,
		speed: jQuery( 'body' ).hasClass( 'is-mobile' ) ? 500 : 1500,
		lazyLoad: 'ondemand',
	} );
} );