<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="firstscreen slider" id="firstscreen">
	<div id="firstscreen-list">
		<?php echo implode( "\r\n", $slides ); ?>
	</div>
	<?php if ( count( $slides ) > 1 ) : ?>
		<div class="slider-controls" id="firstscreen-controls">
			<button class="slider-arrow prev" id="firstscreen-prev">
				<span class="sr-only">
					<?php _e( 'Предыдущий слайд', VSTUP_TEXTDOMAIN ); ?>
				</span>
			</button>
			<button class="slider-arrow next" id="firstscreen-next">
				<span class="sr-only">
					<?php _e( 'Следующий слайд', VSTUP_TEXTDOMAIN ); ?>
				</span>
			</button>
		</div>
	<?php endif; ?>
</div>