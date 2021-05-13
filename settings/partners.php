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
		'partners',
		[
			'transport'         => 'reset',
			'sanitize_callback' => function ( $data ) {
				$result = array_filter( array_map( function ( $value ) {
					return parse_only_allowed_args(
						[ 'usedby' => '', 'title' => '', 'logo' => [], 'permalink' => '' ],
						$value,
						[ 'vstup\sanitize_checkbox', 'sanitize_text_field', 'vstup\sanitize_image_data', 'esc_url_raw'  ]
					);
				}, json_decode( $data, true ) ) );
				return ( is_array( $result ) ) ? wp_json_encode( $result, JSON_UNESCAPED_UNICODE ) : '[]';
			},
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_list(
			$wp_customize,
			'partners',
			[
				'label'      => 'Список партнёров',
				'section'    => VSTUP_SLUG . '_partners',
				'type'       => 'list',
				'controls'   => [
					'permalink'      => [
						'type'     => 'url',
						'label'    => __( 'Ссылка на сайт партнёра', VSTUP_TEXTDOMAIN ),
					],
					'logo'     => [
						'type'     => 'image',
						'label'    => __( 'Выберите одно изображение для логотипа', VSTUP_TEXTDOMAIN ),
					],
				],
			]
		)
	); /**/

}

add_action( 'customize_register', 'vstup\register_lists_settings_partners', 10, 1 );