( function () {

	var $jumbotrons = jQuery( '.jumbotron' );
	var $header = jQuery( '#header' );

	function fixHeight() {
		$jumbotrons.each( function ( index, element ) {
			jQuery( element ).css( {
				'min-height': document.documentElement.clientHeight - $header.outerHeight(),
			} );
		} );
	}

	if ( $jumbotrons.length > 0 ) {
		jQuery( window ).bind( 'resize', fixHeight );
		jQuery( document ).ready( fixHeight );
	}

} )();