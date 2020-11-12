( function () {

	jQuery( document ).ready( function () {

		var $for = jQuery( '#news-categories-list .item' );
		var $nav = jQuery( '#news-categories-names .item' );

		function setHeight () {
			var maxHeight = $for.eq( 0 ).outerHeight();
			$for.each( function ( index, element ) {
				var height = jQuery( element ).height();
				if ( height > maxHeight ) {
					maxHeight = height;
				}
			} );
			jQuery( '#news-categories-list' ).css( {
				'min-height': maxHeight + 'px',
			} );
		}

		jQuery( window ).bind( 'resize', setHeight );
		jQuery( document ).ready( setHeight );

		$nav.eq( 0 ).addClass( 'active' );
		$for.fadeOut( 0 );
		jQuery( $nav.filter( '.active' ).attr( 'href' ) ).fadeIn( 0 ).addClass( 'active' );

		$nav.bind( 'click', function ( event ) {
			event.preventDefault();
			var $item = jQuery( this );
			if ( ! $item.hasClass( 'active' ) ) {
				$nav.removeClass( 'active' );
				$item.addClass( 'active' );
				$for.filter( '.active' ).fadeOut( 0 ).removeClass( 'active' );
				jQuery( $item.attr( 'href' ) ).fadeIn( 200 ).addClass( 'active' );
			} 
		} );

	} );

} )();