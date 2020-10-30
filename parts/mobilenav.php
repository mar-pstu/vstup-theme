<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="mobilenav" id="mobilenav">
	<div class="bg navtoggle"></div>
	<div class="overlay">
		<h2><?php _e( 'Меню', VSTUP_TEXTDOMAIN ); ?></h2>
		<div id="mobilenav-list"></div>
		<?php
			wp_nav_menu( [
				'theme_location'  => 'warning',
				'menu'            => 'warning',
				'container'       => false,
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => 'warning list-inline small',
				'menu_id'         => '',
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
		?>
		<h3><?php _e( 'Поделиться', VSTUP_TEXTDOMAIN ); ?></h3>
		<?php get_template_part( 'parts/share' ); ?>
	</div>
</div>