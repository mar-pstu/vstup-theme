<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Подключение скриптов административной части сайта
 */
function admin_scripts() {
	wp_enqueue_style( 'vstup-admin', get_theme_file_uri( 'styles/admin.css' ), [], filemtime( get_theme_file_path( 'styles/admin.css' ) ), 'all' );
}
add_action( 'admin_enqueue_scripts', 'vstup\admin_scripts', 10, 1 );