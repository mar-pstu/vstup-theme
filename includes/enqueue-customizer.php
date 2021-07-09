<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Подключение скриптов и стилей в панель настройщика
 * */
function customize_controls_enqueue_scripts() {
	wp_enqueue_style(
		'vstup-customizer-controls',
		get_theme_file_uri( 'styles/customizer-controls.css' ),
		[],
		filemtime( get_theme_file_path( 'styles/customizer-controls.css' ) ),
		'all'
	);
}

add_action( 'customize_controls_enqueue_scripts', 'vstup\customize_controls_enqueue_scripts', 10, 0 );