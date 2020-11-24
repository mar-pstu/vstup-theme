  /* Навигационное меню */
( function () {


	var $wpadminbar = jQuery( '#wpadminbar' );


	function GetNavItemsWidth( $nav ) {
		var width = 0;
		$nav.find( '.nav__list > li' ).each( function ( index, element ) {
			width += jQuery( element ).outerWidth();
		} );
		return width;
	}


	function GetCustonLogoItemsMinWidth( $customLogoLink ) {
		var width = 0;
		var $logo = $customLogoLink.find( '.custom-logo' );
		var $full = $customLogoLink.find( '.blog-name--full' );
		var $short = $customLogoLink.find( '.blog-name--short' );
		if ( $logo.length > 0 ) {
			width += $logo.outerWidth();
		} else {
			if ( $full.length > 0 ) {
				width += $full.outerWidth();
			} else {
				if ( $short.length > 0 ) {
					width += $short.outerWidth();
				}
			}
		}
		return width;
	}


	function CheckNavItems() {
		jQuery( '.nav' ).each( function ( index, nav ) {
			var $nav = jQuery( nav );
			var $wrap = jQuery( nav ).closest( '.wrap' );
			var NavItemsWidth = GetNavItemsWidth( $nav );
			var CustonLogoItemsMinWidth = GetCustonLogoItemsMinWidth( $wrap.find( '.custom-logo-link' ) );
			// console.log( ( 1.1 * NavItemsWidth ) + ' - ' +$nav.width() + ' || ' + NavItemsWidth + ' - ' + ( $line.width() - CustonLogoItemsMinWidth ) );
			// console.log( NavItemsWidth < ( $line.width() - CustonLogoItemsMinWidth ) );
			// if ( ( ( 1.1 * NavItemsWidth ) > $nav.width() ) || ( NavItemsWidth > ( $line.width() - CustonLogoItemsMinWidth ) ) ) {
			// console.log( NavItemsWidth + ' - ' + ( $wrap.width() - CustonLogoItemsMinWidth ) );
			if ( NavItemsWidth > ( $wrap.width() - CustonLogoItemsMinWidth ) ) {
				var $fullName = $wrap.find( '.blog-name--full' );
				var $shortName = $wrap.find( '.blog-name--short' );
				$nav.find( '.nav__list' ).addClass( 'hide' );
				$nav.find( '.nav__burger' ).removeClass( 'hide' );
				if ( $fullName.outerHeight() > $wrap.height() ) {
					$fullName.addClass( 'hide' );
					if ( $shortName.outerHeight() < $wrap.height() ) {
						$shortName.removeClass( 'hide' ); 
					}
				} else {
					$fullName.removeClass( 'hide' ); 
					$shortName.addClass( 'hide' ); 
				}
			} else {
				$nav.find( '.nav__list' ).removeClass( 'hide' );
				$nav.find( '.nav__burger' ).addClass( 'hide' );
				$nav.closest( '.wrap' ).find( '.blog-name' ).addClass( 'hide' );
			}
		} );
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
		jQuery( '#mobilenav' ).css( { 'top': jQuery( '.header--fixed' ).outerHeight() } );
	}


	function NavInit() {
		var $nav_list = jQuery( '.nav .nav__list' );
		var $mobile_list_container = $nav_list.clone().attr( 'class', 'list-container' );
		var $mobile_parent_items = $mobile_list_container.find( '> .has-sub-menu' );
		var $mobile_child_menus = $mobile_parent_items.find( '> .sub-menu' );
		$mobile_list_container.appendTo( jQuery( '#mobilenav-list' ) );
		$mobile_child_menus.hide( 0 );
		$mobile_parent_items.each( function( index, element ) {
			var $element = jQuery( element );
			var $link = $element.find( '> a' ).clone().removeClass();
			if ( $link.attr( 'href' ).length > 1 ) {
				$link.appendTo( jQuery( '<li>' ).prependTo( $element.find( '.sub-menu' ).eq( 0 ) ) );
			}
		} );
		$mobile_parent_items.on( 'click', ' > a ', function ( event ) {
			event.preventDefault();
			jQuery( this ).siblings( '.sub-menu' ).slideToggle( 200 );
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
	jQuery( 'body' ).on( 'click', '.burger, #mobilenav .bg', MobileNavTopPosition );
	jQuery( 'body' ).on( 'click', '.burger, #mobilenav .bg', NavToggle );


} )();