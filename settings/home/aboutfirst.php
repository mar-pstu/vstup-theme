<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Информация"
 * */
function register_home_settings_aboutfirst( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_aboutfirst',
		[
			'title'            => __( 'Первая информация', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Вторая секция главной страницы. Якорь #aboutfirst', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_home',
		]
	); /**/


	$wp_customize->add_setting(
		'aboutfirst_flag',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'vstup\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'aboutfirst_flag',
		[
			'section'           => VSTUP_SLUG . '_aboutfirst',
			'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	); /**/


	$wp_customize->add_setting(
		'aboutfirst_title',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'aboutfirst_title',
		[
			'section'           => VSTUP_SLUG . '_aboutfirst',
			'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'aboutfirstdescription',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		]
	);
	$wp_customize->add_control( new WP_Customize_Control_Tinymce_Editor( $wp_customize, 'aboutfirstdescription', [
	    'label'                 => __( 'Описание', VSTUP_TEXTDOMAIN ),
	    'section'               => VSTUP_SLUG . '_aboutfirst',
	    'settings'              => 'aboutfirstdescription'
	] ) ); /**/


	$wp_customize->add_setting(
		'aboutfirst_label',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'aboutfirst_label',
		[
			'section'           => VSTUP_SLUG . '_aboutfirst',
			'label'             => __( 'Текст кнопки', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'aboutfirst_permalink',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		]
	);
	$wp_customize->add_control(
		'aboutfirst_permalink',
		[
			'section'           => VSTUP_SLUG . '_aboutfirst',
			'label'             => __( 'URL с описанием', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'aboutfirst_thumbnail',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'aboutfirst_thumbnail',
			[
				'label'         => __( 'Фон', VSTUP_TEXTDOMAIN ),
				'section'       => VSTUP_SLUG . '_aboutfirst',
				'settings'      => 'aboutfirst_thumbnail',
			]
		)
	);

	$wp_customize->add_setting(
		'aboutfirst_thumbnail_link',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		]
	);
	$wp_customize->add_control(
		'aboutfirst_thumbnail_link',
		[
			'section'           => VSTUP_SLUG . '_aboutfirst',
			'label'             => __( 'URL изображения', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

}

add_action( 'customize_register', 'vstup\register_home_settings_aboutfirst', 10, 1 );