<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$entries = get_theme_mod( 'videos' );
$content = '';

$socials = get_theme_mod( 'socials' );

if ( is_string( $entries ) ) {
	$entries = json_decode( $entries, true );
}

if ( is_array( $entries ) && ! empty( $entries ) ) {
	if ( file_exists( $init_script_path = get_theme_file_path( 'scripts/init/videos-list.js' ) ) ) {
		wp_enqueue_style( 'slick' );
		wp_enqueue_scripts( 'slick' );
		wp_add_inline_script( 'slick', file_get_contents( $init_script_path ), 'after' );
	}
	ob_start();
	foreach ( $entries as $entry ) {
		include get_theme_file_path( 'views/entry-videos.php' );
	}
	$content = ob_get_contents();
	ob_end_clean();
}

include get_theme_file_path( 'views/section-videos.php' );