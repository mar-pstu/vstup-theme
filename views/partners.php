<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<div class="partners" id="partners">
	<div class="container">
		<div class="slider">
			<div id="partners-list">
				<?php echo implode( "\r\n", $slides ); ?>					
			</div>
			<div class="controls" id="partners-controls">
				<?php the_slider_arrow_buttons( 'partners' ); ?>
			</div>
		</div>
	</div>
</div>
<script>
	( function () {
		jQuery( document ).ready( function () {
			jQuery( '#partners-list' ).slick( {
				dots: true,
				arrows: true,
				fade: false,
				appendDots: jQuery( '#partners-controls' ),
				dotsClass: 'slider-dots',
				prevArrow: '#partners-arrow-prev',
				nextArrow: '#partners-arrow-next',
				autoplay: true,
				autoplaySpeed: 5000,
				speed: 1000,
				lazyLoad: 'ondemand',
				variableWidth: true,
				slidesToShow: 4,
			} );
		} );
	} )();
</script>