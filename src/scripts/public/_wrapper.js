( function () {


	var $main = jQuery( '#main' );
	var $footer = jQuery( '#footer' );
	var $header = jQuery( '#header' );

	function FixMainMinHeight() {
		var MinHeight = document.documentElement.clientHeight - $header.outerHeight() - $footer.outerHeight();
		$main.css( 'min-height', MinHeight );
	}

	jQuery( document ).ready( FixMainMinHeight );
	jQuery( window ).resize( FixMainMinHeight );

} )();