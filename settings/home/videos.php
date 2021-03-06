<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Видео"
 * */
function register_home_settings_videos( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_videos',
		[
			'title'            => __( 'Видео', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Вторая секция главной страницы. Якорь #videos', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_home',
		]
	); /**/


	$wp_customize->add_setting(
		'videos_flag',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'vstup\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'videos_flag',
		[
			'section'           => VSTUP_SLUG . '_videos',
			'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	); /**/


	for ( $i = 0; $i < 3; $i++ ) {
		$wp_customize->add_setting(
			"videos[{$i}][label]",
			[
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_text_field',
			]
		);
		$wp_customize->add_control(
			"videos[{$i}][label]",
			[
				'section'           => VSTUP_SLUG . '_videos',
				'label'             => __( sprintf( 'заголовок №%d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
				'type'              => 'text',
			]
		); /**/
		$wp_customize->add_setting(
			"videos[{$i}][description]",
			[
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_textarea_field',
			]
		);
		$wp_customize->add_control(
			"videos[{$i}][description]",
			[
				'section'           => VSTUP_SLUG . '_videos',
				'label'             => __( sprintf( 'описание №%d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
				'type'              => 'textarea',
			]
		); /**/
		$wp_customize->add_setting(
			"videos[{$i}][permalink]",
			[
				'transport'         => 'reset',
				'sanitize_callback' => 'esc_url_raw',
			]
		);
		$wp_customize->add_control(
			"videos[{$i}][permalink]",
			[
				'section'           => VSTUP_SLUG . '_videos',
				'label'             => __( sprintf( 'ссылка на YouTube видео №%d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
				'type'              => 'text',
			]
		); /**/
		$wp_customize->add_setting(
			"videos[{$i}][thumbnail]",
			[
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'esc_url_raw',
			]
		);
		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				"videos[{$i}][thumbnail]",
				[
					'label'          => __( sprintf( 'превью №%d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
					'section'        => VSTUP_SLUG . '_videos',
					'settings'       => "videos[{$i}][thumbnail]",
				]
			)
		);
	}

}

add_action( 'customize_register', 'vstup\register_home_settings_videos', 10, 1 );