<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( 'facultiestitle' );
$excerpt = get_theme_mod( 'facultiesexcerpt' );
$label = get_theme_mod( 'facultieslabel' );
$permalink = get_theme_mod( 'facultiespermalink' );
$entries = get_theme_mod( 'faculties' );
$content = '';

if ( is_string( $entries ) ) {
	$entries = json_decode( $entries, true );
}

if ( is_array( $entries ) && ! empty( $entries ) ) {
	ob_start();
	foreach ( $entries as $entry ) {
		include get_theme_file_path( 'views/entry-faculty.php' );
	}
	$content = ob_get_contents();
	ob_end_clean();
}


include get_theme_file_path( 'views/section-faculties.php' );