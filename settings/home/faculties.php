<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Факультеты"
 * */
function register_home_settings_faculties( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_faculties',
		[
			'title'            => __( 'Факультеты', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Секция главной страницы. Якорь #faculties.', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_home',
		]
	); /**/


	$wp_customize->add_setting(
		'faculties_flag',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'vstup\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'faculties_flag',
		[
			'section'           => VSTUP_SLUG . '_faculties',
			'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	); /**/


	$wp_customize->add_setting(
		'faculties_title',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'faculties_title',
		[
			'section'           => VSTUP_SLUG . '_faculties',
			'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'faculties_excerpt',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'faculties_excerpt',
		[
			'section'           => VSTUP_SLUG . '_faculties',
			'label'             => __( 'Описание', VSTUP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/


	$wp_customize->add_setting(
		'faculties_numberposts',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		'faculties_numberposts',
		[
			'section'           => VSTUP_SLUG . '_faculties',
			'label'             => __( 'Количество записей', VSTUP_TEXTDOMAIN ),
			'type'              => 'number',
			'input_attrs'       => [
				'min'             => '1',
				'max'             => '5',
			],
		]
	); /**/


	for ( $i = 0; $i < get_theme_mod( 'faculties_numberposts' ); $i++ ) { 
		$wp_customize->add_setting(
			"faculties[{$i}][name]",
			[
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_text_field',
			]
		);
		$wp_customize->add_control(
			"faculties[{$i}][name]",
			[
				'section'           => VSTUP_SLUG . '_faculties',
				'label'             => sprintf( __( 'название %s', VSTUP_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'text',
			]
		); /**/
		$wp_customize->add_setting(
			"faculties[{$i}][excerpt]",
			[
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_textarea_field',
			]
		);
		$wp_customize->add_control(
			"faculties[{$i}][excerpt]",
			[
				'section'           => VSTUP_SLUG . '_faculties',
				'label'             => sprintf( __( 'описание %s', VSTUP_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'textarea',
			]
		); /**/
		$wp_customize->add_setting(
			"faculties[{$i}][permalink]",
			[
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_text_field',
			]
		);
		$wp_customize->add_control(
			"faculties[{$i}][permalink]",
			[
				'section'           => VSTUP_SLUG . '_faculties',
				'label'             => sprintf( __( 'ссылка %s', VSTUP_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'text',
			]
		); /**/
		$wp_customize->add_setting(
			"faculties[{$i}][logo]",
			[
				'transport'         => 'reset',
				'sanitize_callback' => 'esc_url_raw',
			]
		);
		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				"faculties[{$i}][logo]",
				[
					'label'         => __( sprintf( 'логотип %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
					'section'       => VSTUP_SLUG . '_faculties',
					'settings'      => "faculties[{$i}][logo]",
				]
			)
		);
	}

}

add_action( 'customize_register', 'vstup\register_home_settings_faculties', 10, 1 );