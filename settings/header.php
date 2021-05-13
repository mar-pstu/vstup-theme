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
		'header_blog_name_full',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'header_blog_name_full',
		[
			'section'           => VSTUP_SLUG . '_header',
			'label'             => __( 'Имя сайта (полное)', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'header_blog_name_short',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'header_blog_name_short',
		[
			'section'           => VSTUP_SLUG . '_header',
			'label'             => __( 'Имя сайта (короткое)', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

}

add_action( 'customize_register', 'vstup\register_blocks_settings_header', 10, 1 );