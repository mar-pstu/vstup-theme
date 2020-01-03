<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<div class="firstscreen slider" id="firstscreen">
	<div id="firstscreen-list">
		<?php echo implode( "\r\n", $slides ); ?>
	</div>
	<?php if ( count( $slides ) > 1 ) : ?>
		<div class="controls" id="firstscreen-controls">
			<div class="container text-right">
				<button class="arrow prev" id="firstscreen-prev">
					<span class="sr-only">
						<?php _e( 'Предыдущий слайд', VSTUP_TEXTDOMAIN ); ?>
					</span>
				</button>
				<button class="arrow next" id="firstscreen-next">
					<span class="sr-only">
						<?php _e( 'Следующий слайд', VSTUP_TEXTDOMAIN ); ?>
					</span>
				</button>
			</div>
		</div>
	<?php endif; ?>
</div>