<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Проверяет данные поля чекбокс
 * @return   bool
 * */
function sanitize_checkbox( $checked = false ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


/**
 * Проверяет является ли переданная строка валидным URL
 * @param  string  $url исходная строка
 * @return boolean      результат проверки
 */
function is_url( $url = '' ) {
	return ( bool ) filter_var( $url, FILTER_VALIDATE_URL );
}


/**
 *  Определяет есть ли дочернее меню у переданного пункта
 */
function is_nav_has_sub_menu( $item_id, $items ) {
	foreach( $items as $item ) {
		if( $item->menu_item_parent && $item->menu_item_parent == $item_id ) return true;
	}
	return false;
}


/**
 * Возвращает html-код логотипа сайта
 * @return   string           html-код изображения логотипа
 **/
function get_custom_logo_img() {
	$result = '';
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if ( $custom_logo_id ) {
		$result = sprintf(
			'<img class="custom-logo" src="%1$s" alt="%2$s">',
			wp_get_attachment_image_url( $custom_logo_id, 'thumbnail', false ),
			get_bloginfo( 'name', 'display' )
		);
	}
	return $result;
}


/**
 * Возвращает url изображения логотипа сайта
 * @return    string          url логотипа сайта
 **/
function get_custom_logo_src( string $size = 'full' ) {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	return ( $custom_logo_id ) ? wp_get_attachment_image_url( $custom_logo_id, $size, false ) : __return_empty_string();
}


function get_attachment_image( $attachment_id, $args = array() ) {
	$args = wp_parse_args( $args, array(
		'size'       => 'thumbnail',
		'attribute'  => 'src',
		'class_name' => 'wp-post-image',
		'alt'        => '',
	) );
	$result = __return_empty_string();
	$url = wp_get_attachment_image_url( $attachment_id, $args[ 'size' ], false );
	if ( $url ) {
		$result = sprintf(
			'<img class="lazy %1$s" src="#" data-%2$s="%3$s" alt="%4$s">',
			$args[ 'class_name' ],
			$args[ 'attribute' ],
			$url,
			( empty( trim( $args[ 'alt' ] ) ) ) ? trim( strip_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) ) : esc_attr( $args[ 'alt' ] )
		);
	}
	return $result;
}


function the_thumbnail_image( $post_id, $size = 'thumbnail', $attribute = 'src' ) {
	$attachment_id = get_post_thumbnail_id( $post_id );
	$alt = the_title_attribute( array(
		'before' => '',
		'after'  => '',
		'echo'   => false,
		'post'   => $post_id,
	) );
	if ( $attachment_id ) {
		echo get_attachment_image( $attachment_id, array(
			'size'       => $size,
			'attribute'  => $attribute,
			'alt'        => $alt,
		) );
	} else {
		printf(
			'<img class="lazy wp-post-thumbnail" src="#" data-%1$s="%2$s" alt="%3$s"/>',
			$attribute,
			VSTUP_URL . 'images/thumbnail.png',
			$alt
		);
	}
}


function get_categories_choices() {
	$categories = get_terms( [
		'taxonomy'   => 'category',
		'hide_empty' => false,
		'fields'     => 'id=>name',
	] );
	return ( is_array( $categories ) && ! empty( $categories ) ) ? $categories : [];
}


function get_share( $post_id = false ) {
	if ( $post_id ) { $post_id = get_the_ID(); }
	$format = __return_empty_string();
	$result = __return_empty_array();
	$title = __return_empty_string();
	$permalink = __return_empty_string();
	$thumbnail_url = VSTUP_URL . 'images/thumbnail.png';
	$blog_name = get_bloginfo( 'name' );
	if ( $post_id || is_singular() ) {
		$permalink = get_permalink( $post_id );
		$title = get_the_title( $post_id );
		$thumbnail_url = ( has_post_thumbnail( $post_id ) ) ? get_the_post_thumbnail_url( $post_id, 'medium' ) : $thumbnail_url;
	} elseif ( is_front_page() ) {
		$permalink = get_home_url();
		$title = get_bloginfo( 'name' );
		$thumbnail_url = ( has_header_image() ) ? get_header_image() : $thumbnail_url;
	} elseif ( is_search() ) {
		$permalink = get_search_link( get_search_query() );
		$title = sprintf( __( 'Результаты поиска %s', VSTUP_TEXTDOMAIN ), get_search_query() );
	} elseif ( $term_id = get_queried_object()->term_id ) {
		$permalink = get_term_link( $term_id );
		$title = single_term_title( $term_id, 0 );
	}
	foreach ( array(
		'facebook' => __( 'Поделиться в Facebook', VSTUP_TEXTDOMAIN ),
		'twitter'  => __( 'Поделиться в Twitter', VSTUP_TEXTDOMAIN ),
		'linkedin' => __( 'Поделиться в LinkedIn', VSTUP_TEXTDOMAIN ),
		'email'    => __( 'Отправить по email', VSTUP_TEXTDOMAIN ),
	) as $key => $label ) {
		switch ( $key ) {
			case 'facebook':
				$format = 'https://www.facebook.com/sharer.php?u=%1$s&amp;t=%2$s';
				break;
			case 'twitter':
				$format = 'https://twitter.com/share?url=%1$s&amp;text=%2$s';
				break;
			case 'linkedin':
				$format = 'https://www.linkedin.com/shareArticle?mini=true&url=%1$s&title=%2$s';
				break;
			case 'email':
				$format = 'mailto:info@example.com?&subject=%4$s&body=%2$s %1$s';
				break;
		}
		$link = sprintf(
			$format,
			$permalink,
			esc_attr( $title ),
			$thumbnail_url,
			esc_attr( $blog_name )
		);
		$result[] = sprintf(
			'<li><a class="%1$s" target="_blank" href="%2$s"><span class="sr-only">%3$s</span></a></li>',
			$key,
			$link,
			$label
		);
	}
	return ( empty( $result ) ) ? '' : '<ul class="share">' . implode( "\r\n", $result ) . '</ul>';
}


function the_share( $post_id = false ) {
	echo get_share( $post_id );
}


/**
 * Подсветка результатов поиска
 **/
function search_backlight( $text ) {
	if ( is_search() ) {
		$query_terms = get_query_var( 'search_terms' );
		if ( empty( $query_terms ) ) $query_terms = array( get_query_var( 's' ) );
		if ( empty( $query_terms ) ) return $text;
		foreach( $query_terms as $term ) {
			$term = preg_quote( $term, '/' );
			$text = preg_replace_callback( "/$term/iu", function( $match ) {
				return '<span class="bg-info">'. $match[ 0 ] .'</span>';
			}, $text );
		}
	}
	return $text;
}


/**
 * Функция для очистки массива параметров
 * @param  array $default           расзерённые парметры и стандартные значения
 * @param  array $args              неочищенные параметры
 * @param  array $sanitize_callback одномерный массив с именами функция, с помощью поторых нужно очистить параметры
 * @param  array $required          обязательные параметры
 * @param  array $not_empty         параметры которые не могут быть пустыми
 * @return array                    возвращает ощиченный массив разрешённых параметров
 * */
function parse_only_allowed_args( $default, $args, $sanitize_callback = [], $required = [], $not_empty = [] ) {
	$args = ( array ) $args;
	$result = [];
	$count = 0;
	while ( ( $value = current( $default ) ) !== false ) {
		$key = key( $default );
		if ( array_key_exists( $key, $args ) ) {
			$result[ $key ] = $args[ $key ];
			if ( isset( $sanitize_callback[ $count ] ) && ! empty( $sanitize_callback[ $count ] ) ) {
				$result[ $key ] = $sanitize_callback[ $count ]( $result[ $key ] );
			}
		} elseif ( in_array( $key, $required ) ) {
			return null;
		} else {
			$result[ $key ] = $value;
		}
		if ( empty( $result[ $key ] ) && in_array( $key, $not_empty ) ) {
			return null;
		}
		$count = $count + 1;
		next( $default );
	}
	return $result;
}


/**
 * Конвертер ассоциативного массива в css правила
 * @param    array    $rules   массив параметров, где ключ это селекторы
 * @param    array    $args    дополнительные аргумаенты для преобразования
 * @return   string
 * */
function css_array_to_css( $rules, $args = [] ) {
	$args = array_merge( [
		'indent'     => 0,
		'container'  => false,
	], $args );
	$css = '';
	$prefix = str_repeat( '  ', $args[ 'indent' ] );
	foreach ($rules as $key => $value ) {
		if ( is_array( $value ) ) {
			$selector = $key;
			$properties = $value;
			$css .= $prefix . "$selector {\n";
			$css .= $prefix . css_array_to_css( $properties, [
				'indent'     => $args[ 'indent' ] + 1,
				'container'  => false,
			] );
			$css .= $prefix . "}\n";
		} else {
			$property = $key;
			if ( filter_var( $value, FILTER_VALIDATE_URL ) ) {
				$value = 'url(' . $value . ')';
			}
			$css .= $prefix . "$property: $value;\n";
		}
	}
	return ( $args[ 'container' ] ) ? "\n<style>\n" . $css . "\n</style>\n" : $css;
}