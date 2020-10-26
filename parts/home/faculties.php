<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( ! post_type_exists( 'educational_program' ) || ! taxonomy_exists( 'specialties' ) ) { return; }


$title = get_theme_mod( 'faculties_title' );
$excerpt = get_theme_mod( 'faculties_excerpt' );
$numberposts = get_theme_mod( 'faculties_numberposts' );
$entries = get_theme_mod( 'faculties' );

if ( is_array( $entry ) && ! empty( $entries ) ) {

	if ( file_exists( $init_script_path = get_theme_file_path( 'scripts/news-list-entries-init.js' ) ) ) {
		wp_enqueue_style( 'slick' );
		wp_enqueue_scripts( 'slick' );
		wp_add_inline_script( 'slick', file_get_contents( $init_script_path ), 'after' );
	}

	include get_theme_file_path( 'views/home/faculties-before.php' );

	foreach ( $entries as $entry ) {
		include get_theme_file_path( 'views/home/faculties-entry.php' );
	}

	include get_theme_file_path( 'views/home/faculties-after.php' );

}