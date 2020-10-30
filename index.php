<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();


include get_theme_file_path( 'views/container-before.php' );


if ( is_single() ) {
	get_template_part( 'parts/pageheader', 'singular' );
	get_template_part( 'parts/singular' );
	get_template_part( 'parts/pager' );
} elseif ( is_page() ) {
	get_template_part( 'parts/jumbotron' );
	get_template_part( 'parts/singular' );
} elseif ( is_search() ) {
	get_template_part( 'parts/pageheader', 'search' );
	get_template_part( 'parts/search' );
} else {
	get_template_part( 'parts/pageheader', 'archive' );
	get_template_part( 'parts/archive' );
}


include get_theme_file_path( 'views/container-after.php' );


get_footer();