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
			'panel'            => VSTUP_SLUG . '_blocks',
		]
	); /**/

	$wp_customize->add_setting(
		'actionusedby',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'vstup\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'actionusedby',
		array(
			'section'           => VSTUP_SLUG . '_action',
			'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'actionpageid',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		'actionpageid',
		array(
			'section'           => VSTUP_SLUG . '_action',
			'label'             => __( 'Выбор страницы', VSTUP_TEXTDOMAIN ),
			'type'              => 'dropdown-pages',
		)
	); /**/

	$wp_customize->add_setting(
		'actiontitle',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'actiontitle',
		[
			'section'           => VSTUP_SLUG . '_action',
			'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'actionexcerpt',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'actionexcerpt',
		[
			'section'           => VSTUP_SLUG . '_action',
			'label'             => __( 'Подзаголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/

	$wp_customize->add_setting(
		'actionlabel',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'actionlabel',
		[
			'section'           => VSTUP_SLUG . '_action',
			'label'             => __( 'Текст кнопки', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'actionbgi',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'actionbgi',
			[
				'label'         => __( 'Фон', VSTUP_TEXTDOMAIN ),
				'section'       => VSTUP_SLUG . '_action',
				'settings'      => 'action_bgi',
			]
		)
	);

	$wp_customize->add_setting(
		'actionbgc',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'actionbgc',
			[
				'label'          => __( 'Цвет фона', VSTUP_TEXTDOMAIN ),
				'section'        => VSTUP_SLUG . '_action',
				'settings'       => 'actionbgc',
			]
		)
	);

	$wp_customize->add_setting(
		'actionthumbnail',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
	   new \WP_Customize_Image_Control(
		   $wp_customize,
		   'actionthumbnail',
		   	[
				'label'         => __( 'Превью', VSTUP_TEXTDOMAIN ),
				'section'       => VSTUP_SLUG . '_action',
				'settings'      => 'action_thumbnail',
			]
		)
	);

	$wp_customize->add_setting(
		'actionvideo',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'actionvideo',
		[
			'section'           => VSTUP_SLUG . '_action',
			'label'             => __( 'Ссылка на YouTube видео', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

}

add_action( 'customize_register', 'vstup\register_home_settings_action', 10, 1 );