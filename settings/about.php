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
			'title'            => __( 'Главная - Информация', VSTUP_TEXTDOMAIN ),
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
		'about_permalink',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		]
	);
	$wp_customize->add_control(
		'about_permalink',
		[
			'section'           => VSTUP_SLUG . '_about',
			'label'             => __( 'URL с описанием', VSTUP_TEXTDOMAIN ),
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

	$wp_customize->add_setting(
		'about_thumbnail_link',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		]
	);
	$wp_customize->add_control(
		'about_thumbnail_link',
		[
			'section'           => VSTUP_SLUG . '_about',
			'label'             => __( 'URL изображения', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'advantages',
		[
			'transport'         => 'reset',
			'sanitize_callback' => function ( $data ) {
				$result = array_filter( array_map( function ( $value ) {
					return parse_only_allowed_args(
						[ 'usedby' => '', 'title' => '', 'value' => '', 'thumbnail' => [], 'permalink' => '' ],
						$value,
						[ 'vstup\sanitize_checkbox', 'sanitize_text_field', 'sanitize_text_field', 'vstup\sanitize_image_data', 'esc_url_raw' ]
					);
				}, json_decode( $data, true ) ) );
				return ( is_array( $result ) ) ? wp_json_encode( $result, JSON_UNESCAPED_UNICODE ) : '[]';
			},
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_list(
			$wp_customize,
			'advantages',
			[
				'label'      => __( 'Преимущества', VSTUP_TEXTDOMAIN ),
				'section'    => VSTUP_SLUG . '_about',
				'type'       => 'list',
				'controls'   => [
					'value'     => [
						'type'     => 'url',
						'label'    => __( 'Значение', VSTUP_TEXTDOMAIN ),
					],
					'thumbnail' => [
						'type'     => 'image',
						'label'    => __( 'Изображение', VSTUP_TEXTDOMAIN ),
					],
					'permalink' => [
						'type'     => 'url',
						'label'    => __( 'Ссылка на описание', VSTUP_TEXTDOMAIN ),
					],
				],
			]
		)
	); /**/

}

add_action( 'customize_register', 'vstup\register_home_settings_about', 10, 1 );