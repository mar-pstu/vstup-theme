<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();


if ( is_singular() ) {
	get_template_part( 'parts/singular' );
} elseif ( is_search() ) {
	get_template_part( 'parts/search' );
} else {
	get_template_part( 'parts/archive' );
}


get_footer();