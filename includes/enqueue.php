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
	wp_enqueue_script( 'vstup-main', VSTUP_URL . 'scripts/main.js', array( 'jquery', 'fancybox' ), filemtime( get_theme_file_path( 'scripts/main.js' ) ), true );
	wp_localize_script( 'vstup-main', 'StarterTheme', array( 'toTopBtn' => 'Наверх' ) );
	wp_enqueue_script( 'lazyload', VSTUP_URL . 'scripts/lazyload.js', array( 'jquery' ), '1.7.6', true );
	wp_enqueue_script( 'fancybox', VSTUP_URL . 'scripts/fancybox.js', array( 'jquery' ), '3.3.5', true );
	wp_add_inline_script( 'fancybox', "jQuery( '.fancybox' ).fancybox();", 'after' );
	wp_add_inline_script( 'lazyload', "jQuery( '.lazy' ).lazy();", 'after' );
	wp_enqueue_script( 'superembed', VSTUP_URL . 'scripts/superembed.js', array( 'jquery' ), '3.1', true );
}
add_action( 'wp_enqueue_scripts', 'vstup\scripts' );






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
	wp_enqueue_style( 'vstup-main', VSTUP_URL . 'styles/main.css', array(), filemtime( get_theme_file_path( 'styles/main.css' ) ), 'all' );
	wp_enqueue_style( 'fancybox', VSTUP_URL . 'styles/fancybox.css', array(), '3.3.5', 'all' );
	wp_enqueue_style( 'slick', VSTUP_URL . 'styles/slick.css', array(), '1.8.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'vstup\styles', 10, 0 );







function ctitical_styles() {
	if ( file_exists( VSTUP_DIR . 'styles/critical.css' ) ) {
		echo '<style type="text/css">' . file_get_contents( VSTUP_DIR . 'styles/critical.css' ) . '</style>';
	}
}
add_action( 'wp_head', 'vstup\ctitical_styles', 10, 0 );