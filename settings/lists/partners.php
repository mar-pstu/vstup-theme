<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация настроек списка "Партнёры"
 * */
function register_lists_settings_partners( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_partners',
		[
			'title'            => __( 'Партнёры', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Список партнёров, якорь #partners', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_lists',
		]
	); /**/


	$wp_customize->add_setting(
		'partners_flag',
		[
			'default'           => false,
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'partners_flag',
		[
			'section'           => VSTUP_SLUG . '_partners',
			'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	); /**/


	$wp_customize->add_setting(
		'partners_number',
		[
			'default'           => 5,
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'partners_number',
		[
			'section'           => VSTUP_SLUG . '_partners',
			'label'             => __( 'Количество записей', VSTUP_TEXTDOMAIN ),
			'type'              => 'number',
			'input_attrs'       => [
				'min'             => 1,
				'max'             => 10,
			],
		]
	); /**/


	for ( $i = 0; $i < get_theme_mod( 'partners_number' ); $i++ ) { 
		$wp_customize->add_setting(
			"partners[{$i}]",
			[
				'transport'         => 'reset',
				'sanitize_callback' => 'esc_url_raw',
			]
		);
		$wp_customize->add_control(
		   new \WP_Customize_Image_Control(
				$wp_customize,
				"partners[{$i}]",
				[
					'label'      => sprintf( __( 'лого %d', VSTUP_TEXTDOMAIN ), ( $i + 1 ) ),
					'section'    => VSTUP_SLUG . '_partners',
					'settings'   => "partners[{$i}]",
				]
			)
		);
	}

}

add_action( 'customize_register', 'vstup\register_lists_settings_partners', 10, 1 );