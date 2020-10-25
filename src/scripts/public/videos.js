jQuery( document ).ready( function () {
	var $container = jQuery( '#videos' );
	if ( $container.length > 0 ) {
		var $links = $container.find( '.videos__title a' ).removeClass( 'active' ).eq( 0 ).addClass( 'active' ).end(),
			$videos = $container.find( '.videos__item' ).removeClass( 'active' ).eq( 0 ).addClass( 'active' ).end();
		$links.on( 'click', function ( e ) {
			e.preventDefault();
			var $link = jQuery( this );
			var $image;
			var src;
			$links.removeClass( 'active' );
			$link.addClass( 'active' );
			$videos.removeClass( 'active' );
			$image = $videos.filter( jQuery( this ).attr( 'href' ) ).addClass( 'active' ).find( 'img' );
			src = $image.attr( 'data-src' )
			if ( typeof src !== typeof undefined && src !== false ) {
				$image.attr( 'src', src );
				$image.removeAttr( 'data-src' );
			}
		} )
	}
} );
