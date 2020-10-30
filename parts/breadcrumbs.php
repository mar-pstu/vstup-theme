<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


include get_theme_file_path( 'views/breadcrumbs-before.php' );


if ( function_exists( 'yoast_breadcrumb' ) ) {
	yoast_breadcrumb();
} else {
	if ( ! is_front_page() ) {
		echo '<a href="';
		echo home_url();
		echo '">'.__( 'Главная', VSTUP_TEXTDOMAIN );
		echo "</a> » ";
		if ( is_category() || is_single() ) {
				the_category(' ');
				if ( is_single() ) {
						echo " » ";
						the_title();
				}
		} elseif ( is_page() ) {
				echo the_title();
		}
	}
	else {
		echo __( 'Домашняя страница', VSTUP_TEXTDOMAIN );
	}
}


include get_theme_file_path( 'views/breadcrumbs-after.php' );