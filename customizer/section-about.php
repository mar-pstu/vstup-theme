<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Информация"
 * */
function customizer_register_section_about( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_about',
		[
			'title'            => __( 'Главная - Информация', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Вторая секция главной страницы. Якорь #about', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_blocks',
		]
	); /**/

	$wp_customize->add_setting(
		'aboutusedby',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'vstup\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'aboutusedby',
		[
			'section'           => VSTUP_SLUG . '_about',
			'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	); /**/

	$wp_customize->add_setting(
		'abouttitle',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'abouttitle',
		[
			'section'           => VSTUP_SLUG . '_about',
			'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'aboutdescription',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'wp_kses_post',
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_Tinymce_Editor(
			$wp_customize,
			'aboutdescription',
			[
				'label'         => __( 'Описание', VSTUP_TEXTDOMAIN ),
				'section'       => VSTUP_SLUG . '_about',
				'settings'      => 'aboutdescription'
			]
		)
	); /**/

	$wp_customize->add_setting(
		'aboutlabel',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'aboutlabel',
		[
			'section'           => VSTUP_SLUG . '_about',
			'label'             => __( 'Текст кнопки', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'aboutpermalink',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		]
	);
	$wp_customize->add_control(
		'aboutpermalink',
		[
			'section'           => VSTUP_SLUG . '_about',
			'label'             => __( 'URL с описанием', VSTUP_TEXTDOMAIN ),
			'type'              => 'url',
		]
	); /**/

	$wp_customize->add_setting(
		'aboutthumbnail',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'aboutthumbnail',
			[
				'label'         => __( 'Фон', VSTUP_TEXTDOMAIN ),
				'section'       => VSTUP_SLUG . '_about',
				'settings'      => 'aboutthumbnail',
			]
		)
	);

	$wp_customize->add_setting(
		'aboutthumbnaillink',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		]
	);
	$wp_customize->add_control(
		'aboutthumbnaillink',
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

add_action( 'customize_register', 'vstup\customizer_register_section_about', 10, 1 );