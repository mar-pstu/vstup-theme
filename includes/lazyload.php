<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Добавление ленивой загрузки для изображений контента
 */
function add_content_lazyload_images( $content ) {
	$result = __return_empty_array();
	$elements = preg_split( get_html_split_regex(), $content, -1, PREG_SPLIT_DELIM_CAPTURE );;
	if ( is_array( $elements ) ) {
		foreach ( $elements as $element ) {
			if ( 'img' === substr( $element, 1, 3 ) ) {
				$attrs = wp_kses_hair( $element, array( 'http', 'https' ) );
				if ( ! array_key_exists( 'data-src', $attrs ) || ! array_key_exists( 'data-lazy', $attrs ) ) {
					$attrs[ 'class' ][ 'value' ] = ' lazy';
					$attrs[ 'data-src' ][ 'value' ] = $attrs[ 'src' ][ 'value' ];
					$attrs[ 'src' ][ 'value' ] = '#';
					if ( array_key_exists( 'srcset', $attrs ) ) {
						$attrs[ 'data-srcset' ][ 'value' ] = $attrs[ 'srcset' ][ 'value' ];
						$attrs[ 'srcset' ][ 'value' ] = '#';
					}
					$element = '<img';
					foreach ( $attrs as $attr => $value ) {
						$element .= sprintf( ' %1$s="%2$s"', $attr, $value[ 'value' ] );
					}
					$element .= ' />';
				}
			} elseif ( empty( trim( $element ) ) ) {
				continue;
			}
			$result[] = $element;
		}
	} else {
		$result[] = $content;
	}
	return implode( "", $result );
}
add_filter( 'the_content', 'vstup\add_content_lazyload_images', 10, 1 );