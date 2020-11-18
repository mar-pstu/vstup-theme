( function () {

	function open() {
		console.log( 'open' );
		jQuery.fancybox.open( {
			src  : '#panel-search-modal',
			type : 'inline',
		} );
	}

	function init() {
		jQuery( '.open-search-modal-button' ).eq( 0 ).css( 'visibility', 'visible' );
	}

	jQuery( document ).ready( init );
	jQuery( 'body' ).on( 'click', '.open-search-modal-button', function ( event ) {
		event.preventDefault();
		jQuery.fancybox.open( {
			src  : '#panel-search-modal',
			type : 'inline',
		} );
	} );

} )();