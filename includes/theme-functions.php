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
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent == $item_id ) {
			return true;
		}
	}
	return false;
}


function get_attachment_image( $attachment_id, $args = array() ) {
	$args = wp_parse_args( $args, array(
		'size'       => 'thumbnail',
		'attribute'  => 'src',
		'class_name' => 'wp-post-image',
		'alt'        => '',
	) );
	$result = '';
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


/**
 * Формирует массив идентификатор категории => название, для использования в элементах формы
 * */
function get_categories_choices() {
	$categories = get_terms( [
		'taxonomy'   => 'category',
		'hide_empty' => false,
		'fields'     => 'id=>name',
	] );
	return ( is_array( $categories ) && ! empty( $categories ) ) ? $categories : [];
}


/**
 * Подсветка результатов поиска
 **/
function search_backlight( $text ) {
	if ( is_search() ) {
		$query_terms = get_query_var( 'search_terms' );
		if ( empty( $query_terms ) ) {
			$query_terms = [ get_query_var( 's' ) ];
		}
		if ( empty( $query_terms ) ) {
			return $text;
		}
		foreach ( $query_terms as $term ) {
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
			if ( is_url( $value ) ) {
				$value = 'url(' . $value . ')';
			}
			$css .= $prefix . "$property: $value;\n";
		}
	}
	return ( $args[ 'container' ] ) ? "\n<style>\n" . $css . "\n</style>\n" : $css;
}