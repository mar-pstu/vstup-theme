jQuery( document ).ready( function () {
	var $slider = jQuery( '#news-list-entries' );
	$slider.find( '.slide' ).each( function ( index, element ) {
		var $slide = jQuery( element );
		if ( $slide.find( '.news__thumbnail' ).length == 0 ) {
			$slide.remove();
		}
	} );
	$slider.slick( {
		dots: false,
		arrows: false,
		fade: true,
		autoplay: true,
		autoplaySpeed: 4000,
		speed: 1000,
		lazyLoad: 'ondemand',
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
	} );
} );