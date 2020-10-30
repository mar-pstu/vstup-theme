<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Информация"
 * */
function register_home_settings_about( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_about',
		[
			'title'            => __( 'Информация', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Вторая секция главной страницы. Якорь #about', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_home',
		]
	); /**/


	$wp_customize->add_setting(
		'about_flag',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'vstup\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'about_flag',
		[
			'section'           => VSTUP_SLUG . '_about',
			'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	); /**/


	$wp_customize->add_setting(
		'about_page_id',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		'about_page_id',
		[
			'section'           => VSTUP_SLUG . '_about',
			'label'             => __( 'Выбор страницы', VSTUP_TEXTDOMAIN ),
			'type'              => 'dropdown-pages',
		]
	); /**/


	$wp_customize->add_setting(
		'about_title',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'about_title',
		[
			'section'           => VSTUP_SLUG . '_about',
			'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'about_description',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'about_description',
		[
			'section'           => VSTUP_SLUG . '_about',
			'label'             => __( 'Подзаголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/


	$wp_customize->add_setting(
		'about_label',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'about_label',
		[
			'section'           => VSTUP_SLUG . '_about',
			'label'             => __( 'Текст кнопки', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'about_thumbnail',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'about_thumbnail',
			[
				'label'         => __( 'Фон', VSTUP_TEXTDOMAIN ),
				'section'       => VSTUP_SLUG . '_about',
				'settings'      => 'about_thumbnail',
			]
		)
	);

}

add_action( 'customize_register', 'vstup\register_home_settings_about', 10, 1 );