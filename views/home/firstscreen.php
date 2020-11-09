<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="firstscreen slider" id="firstscreen">
	<div id="firstscreen-list">
		<?php echo implode( "\r\n", $slides ); ?>
	</div>
	<?php
		if ( ( has_nav_menu( 'warning' ) ) ) {
			wp_nav_menu( [
				'theme_location'  => 'warning',
				'menu'            => 'warning',
				'container'       => false,
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => 'warning',
				'menu_id'         => 'warning-menu',
				'echo'            => true,
				'fallback_cb'     => '',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
				'depth'           => 1,
				'walker'          => '',
			] );
		}
	?>
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