<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( ! post_type_exists( 'educational_program' ) || ! taxonomy_exists( 'specialties' ) ) { return; }


$title = get_theme_mod( 'faculties_title' );
$excerpt = get_theme_mod( 'faculties_excerpt' );
$label = get_theme_mod( 'faculties_label' );
$permalink = get_theme_mod( 'faculties_permalink' );
$numberposts = get_theme_mod( 'faculties_numberposts' );
$entries = get_theme_mod( 'faculties' );

if ( is_array( $entries ) && ! empty( $entries ) ) {

	include get_theme_file_path( 'views/home/faculties-before.php' );

	foreach ( $entries as $entry ) {
		include get_theme_file_path( 'views/home/faculties-entry.php' );
	}

	include get_theme_file_path( 'views/home/faculties-after.php' );

}