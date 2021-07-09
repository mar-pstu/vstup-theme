<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="partners" id="partners">
	<div class="container">
		<div class="slider">
			<div id="partners-list">

				<?php if ( isset( $content ) ) : echo $content; endif; ?>

			</div>
			<div class="controls" id="partners-controls">
				<button class="arrow prev" id="partners-arrow-prev"><span class="sr-only"><?php _e( 'Предыдущий слайд', VSTUP_TEXTDOMAIN ); ?></span></button>
				<button class="arrow next" id="partners-arrow-next"><span class="sr-only"><?php _e( 'Следующий слайд', VSTUP_TEXTDOMAIN ); ?></span></button>
			</div>
		</div>
	</div>
</div>