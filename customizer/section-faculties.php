<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Факультеты"
 * */
function customizer_register_section_faculties( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_faculties',
		[
			'title'            => __( 'Главная - Факультеты', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Секция главной страницы. Якорь #faculties.', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_blocks',
		]
	); /**/

	$wp_customize->add_setting(
		'facultiesusedby',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'vstup\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'facultiesusedby',
		[
			'section'           => VSTUP_SLUG . '_faculties',
			'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	); /**/

	$wp_customize->add_setting(
		'facultiestitle',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'facultiestitle',
		[
			'section'           => VSTUP_SLUG . '_faculties',
			'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'facultiesexcerpt',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'facultiesexcerpt',
		[
			'section'           => VSTUP_SLUG . '_faculties',
			'label'             => __( 'Описание', VSTUP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/

	$wp_customize->add_setting(
		'facultieslabel',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'facultieslabel',
		[
			'section'           => VSTUP_SLUG . '_faculties',
			'label'             => __( 'Кнопка "далее"', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'facultiespermalink',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'facultiespermalink',
		[
			'section'           => VSTUP_SLUG . '_faculties',
			'label'             => __( 'Ссылка "далее"', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'faculties',
		[
			'transport'         => 'reset',
			'sanitize_callback' => function ( $data ) {
				$result = array_filter( array_map( function ( $value ) {
					return parse_only_allowed_args(
						[ 'usedby' => '', 'title' => '', 'excerpt' => '', 'logo' => [], 'permalink' => '' ],
						$value,
						[ 'vstup\sanitize_checkbox', 'sanitize_text_field', 'sanitize_textarea_field', 'vstup\sanitize_image_data', 'esc_url_raw'  ]
					);
				}, json_decode( $data, true ) ) );
				return ( is_array( $result ) ) ? wp_json_encode( $result, JSON_UNESCAPED_UNICODE ) : '[]';
			},
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_list(
			$wp_customize,
			'faculties',
			[
				'label'      => 'Список факультетов',
				'section'    => VSTUP_SLUG . '_faculties',
				'type'       => 'list',
				'controls'   => [
					'excerpt'  => [
						'type'     => 'textarea',
						'label'    => __( 'Краткое описание', VSTUP_TEXTDOMAIN ),
					],
					'permalink' => [
						'type'     => 'url',
						'label'    => __( 'Ссылка на страницу факультета', VSTUP_TEXTDOMAIN ),
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

add_action( 'customize_register', 'vstup\customizer_register_section_faculties', 10, 1 );