<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Подключение скриптов
 *
 * @param string $handle Имя / идентификатор скрипта
 * @param string $src URL на файл скрипта
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param bool $in_footer подключать в шапке или подвале
 */
function scripts() {
	wp_enqueue_script( 'vstup-public', get_theme_file_uri( 'scripts/public.js' ), [ 'jquery', 'fancybox' ], filemtime( get_theme_file_path( 'scripts/public.js' ) ), true );
	wp_localize_script( 'vstup-public', 'VstupTheme', [ 'toTopBtn' => 'Наверх' ] );
	wp_enqueue_script( 'lazyload', get_theme_file_uri( 'scripts/lazyload.js' ), [ 'jquery' ], '1.7.6', true );
	wp_enqueue_script( 'fancybox', get_theme_file_uri( 'scripts/fancybox.js' ), [ 'jquery' ], '3.3.5', true );
	wp_enqueue_script( 'slick', get_theme_file_uri( 'scripts/slick.js' ), [ 'jquery' ], '1.8.0', true );
	wp_add_inline_script( 'fancybox', "jQuery( '.fancybox' ).fancybox();", 'after' );
	wp_add_inline_script( 'lazyload', "jQuery( '.lazy' ).lazy();", 'after' );
	wp_enqueue_script( 'superembed', get_theme_file_uri( 'scripts/superembed.js' ), [ 'jquery' ], '3.1', true );
}
add_action( 'wp_enqueue_scripts', 'vstup\scripts' );


/**
 * Отключение стилей при выводе их в шапке, чтобы подкючить в подвале сайта
 */
function print_styles() {
	wp_dequeue_style( 'contact-form-7' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wpdiscuz-font-awesome' );
	wp_dequeue_style( 'wpdiscuz-frontend-css' );
	wp_dequeue_style( 'wpdiscuz-user-content-css' );
}

add_action( 'wp_print_styles', 'vstup\print_styles' );


/**
 * Подключение стилей
 *
 * @param string $handle Имя / идентификатор стиля
 * @param string $src URL на файла стиля
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param string $media для каких устройств подключать
 */
function styles() {
	wp_enqueue_style( 'vstup-public', get_theme_file_uri( 'styles/public.css' ), [], filemtime( get_theme_file_path( 'styles/public.css' ) ), 'all' );
	wp_enqueue_style( 'vstup-fonts', get_theme_file_uri( 'styles/fonts.css' ), [], filemtime( get_theme_file_path( 'styles/fonts.css' ) ), 'all' );
	wp_enqueue_style( 'fancybox', get_theme_file_uri( 'styles/fancybox.css' ), [], '3.3.5', 'all' );
	wp_enqueue_style( 'slick', get_theme_file_uri( 'styles/slick.css' ), [], '1.8.0', 'all' );
	wp_enqueue_style( 'contact-form-7' );
	wp_enqueue_style( 'wp-block-library' );
	wp_enqueue_style( 'wpdiscuz-font-awesome' );
	wp_enqueue_style( 'wpdiscuz-frontend-css' );
	wp_enqueue_style( 'wpdiscuz-user-content-css' );
}
add_action( 'get_footer', 'vstup\styles', 10, 0 );


/**
 * Подключение стилей инлайн для более быстрой отрисовки страницы
 * */
function ctitical_styles() {
	if ( file_exists( get_theme_file_path( 'styles/critical.css' ) ) ) {
		echo '<style type="text/css">' . file_get_contents( get_theme_file_path( 'styles/critical.css' ) ) . '</style>';
	}
}
add_action( 'wp_head', 'vstup\ctitical_styles', 10, 0 );