/* Навигационное меню */
jQuery( document ).ready( function () {

	var $window = jQuery( window );
		$nav_list = jQuery( '.wrapper__item--header .nav .nav__list' ).eq( 0 );
		$wpadminbar = jQuery( '#wpadminbar' );

	function wpadminbar_offset_top() {
		jQuery( '.header.header--fixed' ).css( 'top', $wpadminbar.height() );
	}

	jQuery( 'body' ).on( 'click', '.burger, #mobilenav .bg', function() {
		if ( jQuery( 'body' ).attr( 'data-nav' ) == 'active' ) {
			jQuery( '#mobilenav' ).removeClass( 'active' );
			jQuery( '.burger' ).removeClass( 'active' );
			jQuery( 'body' ).attr( 'data-nav', 'inactive' ).css( { 'overflow': 'auto' } );
		} else {
			jQuery( '#mobilenav' ).addClass( 'active' ).css( { 'top': jQuery( '.header--fixed' ).height() } );
			jQuery( '.burger' ).addClass( 'active' );
			jQuery( 'body' ).attr( 'data-nav', 'active' ).css( { 'overflow': 'hidden' } );
		}
	} );


	$nav_list.clone().removeClass().appendTo( jQuery( '#mobilenav-list' ) );

	$nav_list.find( ' > .has-sub-menu' ).each( function ( index, element ) {
		var $sub_menus = jQuery( element ).find( '.sub-menu' );
		if ( $sub_menus.length > 1 || $sub_menus.find( 'li' ).length > 10 ) {
			jQuery( element ).addClass( 'item--columns' );
		} else {
			jQuery( element ).addClass( 'item--simple' );
		}
	} );


	jQuery( '.wrapper__item--header' ).eq( 0 ).clone().removeClass().addClass( 'header header--fixed' ).prependTo( 'body' );


	if ( jQuery( '#wpadminbar' ).length > 0 ) {
		jQuery( window ).resize( wpadminbar_offset_top() );
	}


	$window.scroll( function () {
		var $header = jQuery( '.header--fixed' ).eq( 0 );
		if ( $window.scrollTop() > $header.height() * 2 ) {
			$header.addClass( 'header--stick' );
		} else {
			$header.removeClass( 'header--stick' );
		}
	} );


} );