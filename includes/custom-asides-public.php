<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Проверяем есть нужна ли замена колонки у страницы и если есть,
 * то регистрируем соответствующий фильтр
 */
function replace_default_column() {
	$custom_asides = '';
	if ( is_singular( 'page' ) ) {
		$custom_asides = get_post_meta( get_the_ID(), '_custom_asides', true );
	} elseif ( is_singular( 'post' ) ) {
		$categories = get_terms( [
			'taxonomy'   => 'category',
			'object_ids' => get_the_ID(),
			'fields'     => 'ids',
			'meta_key'   => '_custom_asides',
		] );
		if ( is_array( $categories ) && ! empty( $categories ) ) {
			$custom_asides = get_term_meta( $categories[ 0 ], '_custom_asides', true );
		}
	} elseif ( is_category() ) {
		$custom_asides = get_term_meta( get_queried_object()->term_id, '_custom_asides', true );
	}
	if ( ! empty( $custom_asides ) ) {
		add_filter( 'sidebars_widgets', function( $sidebars ) use ( $custom_asides ) {
			if ( array_key_exists( $custom_asides, $sidebars ) ) {
				$sidebars[ 'footer' ] = $sidebars[ $custom_asides ];
			}
			return $sidebars;
		}, 5, 1 );
	}
}

add_action( 'wp', 'vstup\replace_default_column' );