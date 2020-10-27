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
 * Возвращает настройки темы
 * @param    $name    идентификатор опции
 * @return            значение опции
 **/
// function get_theme_setting( $name ) {
// 	$value = get_theme_mod( VSTUP_SLUG . '_' . $name, apply_filters( 'get_default_setting', $name ) );
// 	return apply_filters( 'get_theme_setting', $value, $name );
// }


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


/**
 * Выводит хлебные крошки 
 */
function the_breadcrumb() {
	ob_start();
	if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb();
	} else {
			if ( ! is_front_page() ) {
				echo '<a href="';
				echo home_url();
				echo '">'.__( 'Главная', VSTUP_TEXTDOMAIN );
				echo "</a> » ";
				if ( is_category() || is_single() ) {
						the_category(' ');
						if ( is_single() ) {
								echo " » ";
								the_title();
						}
				} elseif ( is_page() ) {
						echo the_title();
				}
			}
			else {
				echo __( 'Домашняя страница', VSTUP_TEXTDOMAIN );
			}
	}
	$result = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $result ) ) {
		echo '<div class="breadcrumbs">';
		echo $result;
		echo '</div>';
	}
}


/**
 * Получает перевод поста/страницы/терма
 * @param   int      $id     идентификатор переводимого объекта
 * @param   string   $type   тип парадаваемого объекта
 **/
function get_translate_id( $id, $type = 'post' ) {
	$result = $id;
	if ( defined( 'POLYLANG_FILE' ) && ! empty( $id ) && function_exists( 'pll_current_language' ) && function_exists( 'pll_get_term' ) && function_exists( 'pll_get_post' ) ) {
		switch ( $type ) {
			case 'category':
				$result = pll_get_term( $id, pll_current_language( 'slug' ) );
				break;
			case 'post':
			case 'page':
			default:
				$result = pll_get_post( $id, pll_current_language( 'slug' ) );
				break;
		}
	}
	return $result;
}







function the_pager() {
	ob_start();
	foreach ( array(
		'previous'  => array(
			'entry'     => get_previous_post(),
			'label'     => __( 'Смотреть предыдущий пост', VSTUP_TEXTDOMAIN ),
		),
		'next'      => array(
			'entry'     => get_next_post(),
			'label'     => __( 'Смотреть следующий пост', VSTUP_TEXTDOMAIN ),
		),
	) as $key => $value ) {
		if ( $value[ 'entry' ] && ! is_wp_error( $value[ 'entry' ] ) ) {
			$title = apply_filters( 'the_title', $value[ 'entry' ]->post_title, $value[ 'entry' ]->ID );
			$label = $value[ 'label' ];
			$permalink = get_permalink( $value[ 'entry' ]->ID );
			include get_theme_file_path( 'views/adjacent-post.php' );
		}
	}
	$content = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $content ) ) {
		echo '<nav class="pager">' . $content . '</nav>';
	}
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




function get_services_list() {
	$result = __return_empty_array();
	$services = get_theme_mod( VSTUP_SLUG . '_services_items', array() );
	if ( is_array( $services ) && ! empty( $services ) ) {
		for ( $i = 0;  $i < get_theme_mod( VSTUP_SLUG . '_services_items_number', 6 );  $i++ ) { 
			if ( isset( $services[ $i ] ) ) {
				$service = array_merge( array(
					'title'     => '',
					'permalink' => '#',
					'thumbnail' => '',
				), ( array ) $services[ $i ] );
				if ( ! empty( trim( $service[ 'title' ] ) ) ) {
					extract( $service );
					ob_start();
					include get_theme_file_path( 'views/flatitem.php' );
					$result[] = ob_get_contents();
					ob_end_clean();
				}
			}
		}
	}
	return ( empty( $result ) ) ? __return_empty_string() : '<div class="row">' . implode( "\r\n", $result ) . '</div>';
}





function get_slider_arrow_buttons( $slug ) {
	$result = __return_empty_array();
	foreach ( array(
		'prev' => __( 'Предыдущий слайд', VSTUP_TEXTDOMAIN ),
		'next' => __( 'Следующий слайд', VSTUP_TEXTDOMAIN ),
	) as $key => $label ) {
		$result[] = sprintf(
			'<button class="slider-arrow arrow-%1$s" id="%2$s-arrow-%1$s"><span class="sr-only">%2$s</span></button>',
			$key,
			$slug,
			$label
		);
	}
	return implode( "\r\n", $result );
}


function the_slider_arrow_buttons( $slug ) {
	echo get_slider_arrow_buttons( $slug );
}



function get_specialties_slider( $args = array() ) {
	$args = wp_parse_args( $args, array(
		'wrap'    => 1,
	) );
	$result = __return_empty_string();
	$terms = get_terms( array(
		'taxonomy'      => 'specialties',
		'orderby'       => 'name',
		'order'         => 'ASC',
		'hide_empty'    => true, 
		'number'        => '', 
		'fields'        => 'all', 
		'hierarchical'  => true, 
	) );
	if ( is_array( $terms ) && ! empty( $terms ) ) {
		$specialties = wp_list_filter( $terms, array( 'parent' => 0 ), 'NOT' );
		if ( ! empty( $specialties ) ) {
			$slides = __return_empty_array();
			wp_enqueue_scripts( 'slick' );
			wp_enqueue_style( 'slick' );
			foreach ( $specialties as $specialty ) {
				$parent = array_shift( wp_list_filter( $terms, array( 'parent' => $specialty->parent ), 'AND' ) );
				$attachment_id = get_term_meta( $parent->term_id, 'pstu_specialties_logo', true );
				$slides[] = sprintf(
					'<a class="specialties__item item" href="%1$s"><h3 class="title">%2$s</h3><div class="sector">%3$s</div><img class="thumbnail" src="#" data-lazy="%4$s" alt="%5$s"></a>',
					get_term_link( $specialty->term_id, 'specialties' ),
					wp_strip_all_tags( apply_filters( 'single_term_title', $specialty->name ) ),
					wp_strip_all_tags( apply_filters( 'single_term_title', $parent->name ) ),
					( empty( $attachment_id ) ) ? VSTUP_SLUG . 'images/sector.png' : wp_get_attachment_image_url( $attachment_id, 'thumbnail', false ),
					esc_attr( $specialty->name )
				);
			}
			if ( ! empty( $slides ) ) {
				?>
					<div class="slider">
						<div id="specialties-list">
							<?php echo implode( "\r\n", $slides ); ?>
						</div>
						<?php the_slider_arrow_buttons( 'specialties' ); ?>
					</div>
				<?php
			}
		}
	}
	return $result;
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




function the_pageheader() {
	if ( is_archive() ) {
		$title = get_the_archive_title();
		$excerpt = do_shortcode( get_the_archive_description() );
		$thumbnail = __return_empty_string();
	} elseif ( is_search() ) {
		$title = __( 'Результаты поиска' );
		$excerpt = __return_empty_string();
		$thumbnail = __return_empty_string();
	} else {
		$title = single_post_title( '', false );
		$excerpt = ( has_excerpt( get_the_ID() ) ) ? get_the_excerpt( get_the_ID() ) : false;
		$thumbnail_id  = get_post_thumbnail_id( get_the_ID() );
		$thumbnail = ( ( bool ) $thumbnail_id ) ? get_attachment_image( $thumbnail_id, array(
			'size'       => 'thumbnail',
			'attribute'  => 'src',
			'class_name' => 'thumbnail',
			'alt'        => '',
		) ) : __return_empty_string();
	}
	include get_theme_file_path( 'views/pageheader.php' );
}





function get_warning_nav_menu() {
	$result = __return_empty_array();
	$nav_menu_locations = get_nav_menu_locations();
	if ( $nav_menu_locations && isset( $nav_menu_locations[ 'warning' ] ) ) {
		$items = wp_get_nav_menu_items( $nav_menu_locations[ 'warning' ] );
			if ( is_array( $items ) && ! empty( $items ) ) {
				$items = wp_list_filter( $items, array( 'menu_item_parent' => 0 ), 'AND' );
				foreach ( $items as $item ) {
					$result[] = sprintf(
						'<li class="%1$s"><a href="%2$s" title="%3$s">%4$s</a></li>',
						implode( " ", $item->classes ),
						esc_attr( $item->url ),
						esc_attr( $item->description ),
						$item->title
					);
				}
			}
	}
	return ( empty( $result ) ) ? __return_empty_string() : '<ul class="warning list-inline small">' . implode( "\r\n", $result ) . '</ul>';
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