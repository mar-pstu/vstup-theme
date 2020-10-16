jQuery( document ).ready( function () {
	jQuery( '#firstscreen-list' ).slick( {
		dots: true,
		arrows: true,
		dotsClass: 'slider-dots',
		appendDots: jQuery( '#firstscreen-controls' ),
		prevArrow: '#firstscreen-prev',
		nextArrow: '#firstscreen-next',
		fade: true,
		autoplay: true,
		autoplaySpeed: 4000,
		speed: 2000,
		lazyLoad: 'ondemand',
	} ).on( 'lazyLoaded', function ( event, slick, image, imageSource ) {
		jQuery( image ).closest( '.jumbotron' ).find( '.bg' ).attr( 'style', 'background-image:url('+imageSource+');' );
	} );
} );