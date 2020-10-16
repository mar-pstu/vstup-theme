jQuery( document ).ready( function () {
	jQuery( '#news-list-entries-large' ).slick( {
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