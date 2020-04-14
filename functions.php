<?php


// namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


define( 'VSTUP_URL', get_template_directory_uri() . '/' );
define( 'VSTUP_DIR', get_template_directory() . '/' );
define( 'VSTUP_TEXTDOMAIN', 'pstu-vstup' );
define( 'VSTUP_SLUG', 'pstu_vstup' );




get_template_part( 'includes/enqueue' );
get_template_part( 'includes/template-functions' );
get_template_part( 'includes/gutenberg' );





/**
 * Регистрация переводов строк
 */
if ( function_exists( 'pll_register_string' ) ) {
	include get_theme_file_path( 'includes/register-strings.php' );
}



/**
 * Скрипты админки
 **/
if ( is_admin() && ! wp_doing_ajax() ) {
	include get_theme_file_path( 'includes/metabox-promo.php' );
	include get_theme_file_path( 'includes/custom-asides.php' );
	new vstup\MetaboxPromo();
}




/**
 * Регистрация настроек кастомайзера
 */
if ( is_customize_preview() ) {
	add_action( 'customize_register', function ( $wp_customize ) {
		$slug = VSTUP_SLUG;
		$wp_customize->add_panel(
			"{$slug}_home",
			array(
				'capability'      => 'edit_theme_options',
				'title'           => __( 'Секции главной страницы', VSTUP_TEXTDOMAIN ),
				'priority'        => 200
			)
		);
		$wp_customize->add_panel(
			$slug,
			array(
				'capability'      => 'edit_theme_options',
				'title'           => __( 'Настройки темы', VSTUP_TEXTDOMAIN ),
				'priority'        => 300
			)
		);
		include get_theme_file_path( 'customizer/home/firstscreen.php' );
		include get_theme_file_path( 'customizer/home/about.php' );
		include get_theme_file_path( 'customizer/home/news.php' );
		include get_theme_file_path( 'customizer/home/action.php' );
		if ( post_type_exists( 'educational_program' ) && taxonomy_exists( 'specialties' ) ) {
			include get_theme_file_path( 'customizer/home/specialties.php' );
		}
		include get_theme_file_path( 'customizer/home/videos.php' );
		include get_theme_file_path( 'customizer/home/people.php' );
		include get_theme_file_path( 'customizer/home/services.php' );
		include get_theme_file_path( 'customizer/home/questions.php' );
		include get_theme_file_path( 'customizer/advantages.php' );
		include get_theme_file_path( 'customizer/partners.php' );
		include get_theme_file_path( 'customizer/contacts.php' );
		include get_theme_file_path( 'customizer/socials.php' );
		include get_theme_file_path( 'customizer/graduate-list.php' );
		include get_theme_file_path( 'customizer/list-of-services.php' );
	} );
}




function vstup_theme_supports() {
	add_theme_support( 'menus' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_filter( 'widget_text', 'do_shortcode' );
	add_post_type_support( 'page', 'excerpt' );
	add_image_size( 'thumbnail-3x2', 600, 400, true ); // размер миниатюры 3x2 с жестким кадрированием
	add_filter( 'image_size_names_choose', function ( $sizes ) {
		return array_merge( $sizes, array(
			'thumbnail-3x2' => __( '2x3 жесткое кадрирование', 'pstu-next-theme' ),
		) );
	}, 10, 1 );
}
add_action( 'after_setup_theme', 'vstup_theme_supports' );



/**
 * Загрузка "переводов"
 */
function vstup_load_textdomain() {
	load_theme_textdomain( VSTUP_TEXTDOMAIN, VSTUP_DIR . 'languages/' );
}
add_action( 'after_setup_theme', 'vstup_load_textdomain' );



/**
 * Регистрация меню
 */
function vstup_register_nav_menus() {
	$slug = VSTUP_SLUG;
	$menus = array(
		'main'        => __( 'Главное меню', VSTUP_TEXTDOMAIN ),
		'quick_links' => __( 'Быстрые ссылки (faq, schedule)', VSTUP_TEXTDOMAIN ),
		'warning'     => __( 'Важное', VSTUP_TEXTDOMAIN ),
	);
	if ( get_theme_mod( "{$slug}_news_flag", false ) ) {
		array_merge( $menus, array(
			'home_news' => sprintf( __( 'Секция "%1$s" главной страницы', VSTUP_TEXTDOMAIN ), get_theme_mod( "{$slug}_news_heading", __( 'Новости', VSTUP_TEXTDOMAIN ) ) ),
		) );
	}
	register_nav_menus( $menus );
}
add_action( 'after_setup_theme', 'vstup_register_nav_menus' );




/**
 * Регистрация "сайдбаров"
 */
function vstup_register_sidebars() {
	$asides = array_merge( [ [
		'name'          => __( 'Сайдбар подвала', VSTUP_TEXTDOMAIN ),
		'id'            => 'footer',
		'description'   => '',
		'class'         => '',
	] ], get_theme_mod( 'register_asides', [] ) );
	foreach ( $asides as $aside ) {
		register_sidebar( array(
			'name'             => $aside[ 'name' ],
			'id'               => $aside[ 'id' ],
			'description'      => $aside[ 'description' ],
			'class'            => $aside[ 'class' ],
			'before_widget'    => '<div class="col-xs-12 col-sm-6 col-md-3"><div id="%1$s" class="widget %2$s">',
			'after_widget'     => '</div></div>',
			'before_title'     => '<h3 class="widget__title">',
			'after_title'      => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'vstup_register_sidebars' );




/**
 * Редирект на запись со страницы поиска, если найдена всего одна запись
 */
function vstup_single_result(){  
	if( ! is_search() ) return;
	global $wp_query;
	if( $wp_query->post_count == 1 ) {  
		wp_redirect( get_permalink( reset( $wp_query->posts )->ID ) );
		die;
	}  
}
add_action( 'template_redirect', 'vstup_single_result' );









/**
 * Добавление ленивой загрузки для изображений контента
 */
function vstup_add_content_lazyload_images( $content ) {
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
add_filter( 'the_content', 'vstup_add_content_lazyload_images', 10, 1 );





/**
 * Проверяем есть нужна ли замена колонки у страницы и если есть,
 * то регистрируем соответствующий фильтр
 */
function vstup_replace_default_column() {
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
add_action( 'wp', 'vstup_replace_default_column' );