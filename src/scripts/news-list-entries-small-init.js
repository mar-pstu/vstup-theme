jQuery( document ).ready( function () {
	jQuery( '#news-list-entries-small' ).slick( {
		dots: false,
		arrows: false,
		fade: false,
		autoplay: true,
		autoplaySpeed: 5000,
		speed: 1000,
		lazyLoad: 'ondemand',
		slidesToShow: 2,
		slidesToScroll: 2,
		responsive: [
			{
				breakpoint: 680,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		],
	} );
} );