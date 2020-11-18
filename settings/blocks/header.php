<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Информация"
 * */
function register_blocks_settings_header( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_header',
		[
			'title'            => __( 'Шапка сайта', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Шапка сайта, якорь #header', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_blocks',
		]
	); /**/


	$wp_customize->add_setting(
		'header_blog_name',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'header_blog_name',
		[
			'section'           => VSTUP_SLUG . '_header',
			'label'             => __( 'Имя сайта', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

}

add_action( 'customize_register', 'vstup\register_blocks_settings_header', 10, 1 );