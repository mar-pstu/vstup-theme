<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "ачни с нами"
 * */
function register_home_settings_action( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_action',
		[
			'title'            => __( 'Главная - Начни с нами', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Третья секция главной страницы. Якорь #action', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_home',
		]
	); /**/


	$wp_customize->add_setting(
		'action_flag',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'vstup\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'action_flag',
		array(
			'section'           => VSTUP_SLUG . '_action',
			'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		)
	); /**/


	$wp_customize->add_setting(
		'action_page_id',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		'action_page_id',
		array(
			'section'           => VSTUP_SLUG . '_action',
			'label'             => __( 'Выбор страницы', VSTUP_TEXTDOMAIN ),
			'type'              => 'dropdown-pages',
		)
	); /**/


	$wp_customize->add_setting(
		'action_title',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'action_title',
		[
			'section'           => VSTUP_SLUG . '_action',
			'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'action_excerpt',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'action_excerpt',
		[
			'section'           => VSTUP_SLUG . '_action',
			'label'             => __( 'Подзаголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/


	$wp_customize->add_setting(
		'action_label',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'action_label',
		[
			'section'           => VSTUP_SLUG . '_action',
			'label'             => __( 'Текст кнопки', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'action_bgi',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'action_bgi',
			[
				'label'         => __( 'Фон', VSTUP_TEXTDOMAIN ),
				'section'       => VSTUP_SLUG . '_action',
				'settings'      => 'action_bgi',
			]
		)
	);


	$wp_customize->add_setting(
		'action_bgc',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'action_bgc',
			[
				'label'          => __( 'Цвет фона', VSTUP_TEXTDOMAIN ),
				'section'        => VSTUP_SLUG . '_action',
				'settings'       => 'action_bgc',
			]
		)
	);


	$wp_customize->add_setting(
		'action_thumbnail',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		]
	);
	$wp_customize->add_control(
	   new \WP_Customize_Image_Control(
		   $wp_customize,
		   'action_thumbnail',
		   	[
				'label'         => __( 'Превью', VSTUP_TEXTDOMAIN ),
				'section'       => VSTUP_SLUG . '_action',
				'settings'      => 'action_thumbnail',
			]
		)
	);


	$wp_customize->add_setting(
		'action_video',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'action_video',
		[
			'section'           => VSTUP_SLUG . '_action',
			'label'             => __( 'Ссылка на YouTube видео', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

}

add_action( 'customize_register', 'vstup\register_home_settings_action', 10, 1 );