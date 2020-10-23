<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$contacts = get_theme_mod( 'contacts', [] );

if ( is_array( $contacts ) && ! empty( $contacts ) ) {

	$contacs_items = __return_empty_array();

	foreach ( $contacts as $key => $link ) {
		if ( ! empty( trim( $link ) ) ) {
			$scheme = __return_empty_string();
			$label = __return_empty_string();
			switch ( $key ) {
				case 'phone':
					$scheme = 'tel:';
					$label = '';
					break;
				case 'email':
					$scheme = 'mailto:';
					break;
				default:
					$scheme = 'https://';
					$label = '';
					break;
			}
			$contacs_items[] = sprintf(
				'<li><a class="%1$s" href="%2$s%3$s"><span class="label">%4$s</span></a></li>',
				$key,
				$scheme,
				esc_attr( $link ),
				$link
			);
		}
	}
	if ( ! empty( $contacs_items ) ) {
		echo '<ul class="links contacts list-inline">' . implode( "\r\n", $contacs_items ) . '</ul>';
	}
}