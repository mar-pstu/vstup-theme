<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Люди"
 * */
function register_home_settings_people( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_people',
		array(
			'title'            => __( 'Люди', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Секция главной страницы. Якорь #people', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_home',
		)
	); /**/


	$wp_customize->add_setting(
		'people_flag',
		array(
			'default'           => false,
			'transport'         => 'reset',
			'sanitize_callback' => 'vstup\sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'people_flag',
		array(
			'section'           => VSTUP_SLUG . '_people',
			'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		)
	); /**/


	$wp_customize->add_setting(
		'people_page_id',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		'people_page_id',
		[
			'section'           => VSTUP_SLUG . '_people',
			'label'             => __( 'Выбор страницы', VSTUP_TEXTDOMAIN ),
			'type'              => 'dropdown-pages',
		]
	); /**/


	$wp_customize->add_setting(
		'people_title',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'people_title',
		[
			'section'           => VSTUP_SLUG . '_people',
			'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'people_description',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'people_description',
		[
			'section'           => VSTUP_SLUG . '_people',
			'label'             => __( 'Подзаголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/


	$wp_customize->add_setting(
		'people_permalink',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		'people_permalink',
		[
			'section'           => VSTUP_SLUG . '_people',
			'label'             => __( 'Сслылка на описание', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'people_label',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'people_label',
		[
			'section'           => VSTUP_SLUG . '_people',
			'label'             => __( 'Текст кнопки', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

}

add_action( 'customize_register', 'vstup\register_home_settings_people', 10, 1 );