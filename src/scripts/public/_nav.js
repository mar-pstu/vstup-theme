  /* Навигационное меню */
( function () {

	var $wpadminbar = jQuery( '#wpadminbar' );
	var NavItemsWidth = 0;

	function CheckNavItems() {
		var $burger = jQuery( '.nav .nav__burger' );	
		if ( ( 1.1 * NavItemsWidth ) > jQuery( '.nav .nav__list' ).eq( 0 ).outerWidth() ) {
			jQuery( '.nav .nav__list' ).addClass( 'hide' );
			jQuery( '.nav .nav__burger' ).removeClass( 'hide' );
		} else {
			jQuery( '.nav .nav__list' ).removeClass( 'hide' );
			jQuery( '.nav .nav__burger' ).addClass( 'hide' );
		}
	}


	function StickyHeader() {
		var $header = jQuery( '.header--fixed' ).eq( 0 );
		if ( jQuery( window ).scrollTop() > $header.height() * 2 ) {
			$header.addClass( 'header--stick' );
		} else {
			$header.removeClass( 'header--stick' );
		}
	}


	function wpadminbar_offset_top() {
		jQuery( '.header.header--fixed' ).css( 'top', $wpadminbar.height() );
	}

	function NavToggle() {
		if ( jQuery( 'body' ).attr( 'data-nav' ) == 'active' ) {
			jQuery( '#mobilenav' ).removeClass( 'active' );
			jQuery( '.nav .nav__burger' ).removeClass( 'active' );
			jQuery( 'body' ).attr( 'data-nav', 'inactive' ).css( { 'overflow': 'auto' } );
		} else {
			jQuery( '#mobilenav' ).addClass( 'active' );
			jQuery( '.nav .nav__burger' ).addClass( 'active' );
			jQuery( 'body' ).attr( 'data-nav', 'active' ).css( { 'overflow': 'hidden' } );
		}
	};

	function MobileNavTopPosition() {
		jQuery( '#mobilenav' ).css( { 'top': jQuery( '.header--fixed' ).height() } );
	}

	function NavInit() {
		var $nav_list = jQuery( '.nav .nav__list' ).eq( 0 );
		var $mobile_list_container = $nav_list.clone().attr( 'class', 'list-container' );
		var $mobile_parent_items = $mobile_list_container.find( '> .has-sub-menu' );
		var $mobile_child_menus = $mobile_parent_items.find( '> .sub-menu' );
		jQuery( '.nav .nav__list' ).eq( 0 ).find( ' > li ' ).each( function ( index, element ) {
			NavItemsWidth += jQuery( element ).outerWidth();
			console.log( index );
			console.log( jQuery( element ) );
			console.log( jQuery( element ).width() );
			console.log( '-' );
		} );
		$mobile_list_container.appendTo( jQuery( '#mobilenav-list' ) );
		$mobile_child_menus.hide( 0 );
		$mobile_parent_items.each( function( index, element ) {
			var $element = jQuery( element );
			var $link = $element.find( '> a' ).clone().removeClass();
			if ( $link.attr( 'href' ).length > 1 ) {
				$link.appendTo( jQuery( '<li>' ).prependTo( $element.find( '.sub-menu' ).eq( 0 ) ) );
			}
		} );
		$mobile_parent_items.click( function ( event ) {
			event.preventDefault();
			jQuery( this ).find( '> .sub-menu' ).slideToggle( 200 );
		} );
		$nav_list.find( ' > .has-sub-menu' ).each( function ( index, element ) {
			var $sub_menus = jQuery( element ).find( '.sub-menu' );
			if ( $sub_menus.length > 1 || $sub_menus.find( 'li' ).length > 10 ) {
				jQuery( element ).addClass( 'item--columns' );
			} else {
				jQuery( element ).addClass( 'item--simple' );
			}
		} );
		jQuery( '.wrapper__item--header' ).eq( 0 ).clone().removeClass().addClass( 'header header--fixed' ).prependTo( 'body' );
	}


	if ( jQuery( '#wpadminbar' ).length > 0 ) {
		jQuery( window ).on( 'resize', wpadminbar_offset_top );
		jQuery( document ).ready( wpadminbar_offset_top );
	}

	jQuery( window ).bind( 'scroll', StickyHeader );
	jQuery( document ).ready( NavInit );
	jQuery( document ).ready( CheckNavItems );
	jQuery( document ).ready( MobileNavTopPosition );
	jQuery( window ).on( 'resize', CheckNavItems );
	jQuery( window ).on( 'resize', MobileNavTopPosition );
	jQuery( 'body' ).on( 'click', '.burger, #mobilenav .bg', NavToggle );

} )();