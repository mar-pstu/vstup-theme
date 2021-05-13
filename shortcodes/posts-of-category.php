<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Выводит блок для "очистки потока"
 * @return    string    html код
 */
function get_posts_of_category_list( $atts = [], $content = '', $shortcode_name = 'posts_of_category' ) {
	$html = '';
	$atts = shortcode_atts( [
		'id'              => '',
		'numberposts'     => '5',
		'post_type'       => 'post',
		'link'            => '1',
		'description'     => '1',
		'tag'             => '',
		'tag_relation'    => 'OR'
	], $atts, $shortcode_name );
	$atts[ 'tag' ] = wp_parse_slug_list( $atts[ 'tag' ] );
	$atts[ 'tag_relation' ] = strtoupper( $atts[ 'tag_relation' ] );
	if ( ! is_object_in_taxonomy( $atts[ 'post_type' ], 'category' ) ) {
		$atts[ 'post_type' ] = 'post';
	}
	if ( ! in_array( $atts[ 'tag_relation' ], [ 'OR', 'AND' ] ) ) {
		$atts[ 'tag_relation' ] = 'OR';
	}
	$category = get_category( sanitize_key( $atts[ 'id' ] ) );
	if ( is_object( $category ) && ! is_wp_error( $category ) ) {
		$entries_args = [
			'numberposts' => sanitize_key( $atts[ 'numberposts' ] ),
			'category'    => $category->term_id,
			'orderby'     => 'date',
			'order'       => 'DESC',
			'post_type'   => $atts[ 'post_type' ],
		];
		if ( ! empty( $atts[ 'tag' ] ) ) {
			$entries_args[ 'tag' ] = implode( ( ( 'OR' == $atts[ 'tag_relation' ] ) ? "," : " " ), $atts[ 'tag' ] );
		}
		$entries = get_posts( $entries_args );
		if ( ( $entries ) && ( ! empty( $entries ) ) && ( ! is_wp_error( $entries ) ) ) {
			if ( ( $atts[ 'description' ] == '1' ) && ( ! empty( trim( $category->description ) ) ) ) {
				$html .= sprintf(
					'<div class="small font-italic text-center">%1$s</div>',
					$category->description
				);
			}
			$html .= '<ul>' . implode( "\r\n", array_map( function ( $entry )  {
				return sprintf(
					'<li><a href="%1$s">%2$s</a></li>',
					get_permalink( $entry->ID ),
					apply_filters( 'the_title', $entry->post_title, $entry->ID )
				);
			}, $entries ) ) . '</ul>';
			if ( $atts[ 'link' ] == '1' ) {
				$html .= sprintf(
					'<p class="small text-center font-bold"><a href="%1$s">%2$s</a></p>',
					get_category_link( $category->term_id ),
					'Дивитись все'
				);
			}
		}
	}
	return $html . $content;
}

add_shortcode( 'posts_of_category', 'vstup\get_posts_of_category_list' );
add_shortcode( strtoupper( 'posts_of_category' ), 'vstup\get_posts_of_category_list' );


/**
 * Регистрирует колонку с дополнительной информацией о шорткоде
 * 
 * */
function add_posts_of_category_columns( $columns ) {
	$columns[ 'posts_of_category' ] = __( 'Список постов', VSTUP_TEXTDOMAIN );
	return $columns;
}

add_filter( 'manage_edit-category_columns' , 'vstup\add_posts_of_category_columns' );


/**
 * Формирует контект колонки
 * 
 * 
 * */
function get_posts_of_category_custom_column( $content, $column_name, $term_id ) {
	if ( 'posts_of_category' == $column_name ) {
		add_thickbox();
		ob_start();
		include get_theme_file_path( 'views/admin/column-posts-of-category.php' );
		$content .= ob_get_contents();
		ob_end_clean();
	}
	return $content;
}

add_filter( 'manage_category_custom_column' , 'vstup\get_posts_of_category_custom_column', 10, 3 );