<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( 'servicestitle' );
$label = get_theme_mod( 'serviceslabel' );
$permalink = get_theme_mod( 'servicespermalink' );
$entries = get_theme_mod( 'services' );
$content = '';

if ( is_string( $entries ) ) {
	$entries = json_decode( $entries, true );
}

if ( is_array( $entries ) && ! empty( $entries ) ) {
	ob_start();
	foreach ( $entries as $entry ) {
		include get_theme_file_path( 'views/entry-flat.php' );
	}
	$content = ob_get_contents();
	ob_end_clean();
}


include get_theme_file_path( 'views/section-services.php' );