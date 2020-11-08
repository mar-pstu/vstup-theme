<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$socials = get_theme_mod( 'socials', [] );

if ( is_array( $socials ) && ! empty( $socials ) ) {

	$socials_items = __return_empty_array();

	foreach ( $socials as $key => $link ) {
		if ( ! empty( trim( $link ) ) ) {
			$socials_items[] = sprintf(
				'<li><a class="%1$s" target="_blank" href="%2$s"><span class="sr-only">%1$s</span></a></li>',
				$key,
				esc_attr( $link )
			);
		}
	}

	if ( ! empty( $socials_items ) ) {
		echo '<ul class="links socials list-inline">' . implode( "\r\n", $socials_items ) . '</ul>';
	}

}