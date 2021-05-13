<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Услуги"
 * */
function register_home_settings_services( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_services',
		[
			'title'            => __( 'Главная - Услуги', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Секция главной страницы. Якорь #services. Содержит список услуг университета. Услуги могут публиковаться с помощью шорткода <code>[SRVICES]</code> и доступны в редакторе Gutenberg.', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_home',
		]
	); /**/

	$wp_customize->add_setting(
		'services_flag',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'vstup\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'services_flag',
		[
			'section'           => VSTUP_SLUG . '_services',
			'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	); /**/

	$wp_customize->add_setting(
		'services_page_id',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		'services_page_id',
		[
			'section'           => VSTUP_SLUG . '_services',
			'label'             => __( 'Выбор страницы с описанием', VSTUP_TEXTDOMAIN ),
			'type'              => 'dropdown-pages',
		]
	); /**/

	$wp_customize->add_setting(
		'services_title',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'services_title',
		[
			'section'           => VSTUP_SLUG . '_services',
			'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'services_label',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'services_label',
		[
			'section'           => VSTUP_SLUG . '_services',
			'label'             => __( 'Текст кнопки', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'services',
		[
			'transport'         => 'reset',
			'sanitize_callback' => function ( $data ) {
				$result = array_filter( array_map( function ( $value ) {
					return parse_only_allowed_args(
						[ 'usedby' => '', 'title' => '', 'thumbnail' => [], 'permalink' => '' ],
						$value,
						[ 'vstup\sanitize_checkbox', 'sanitize_text_field', 'vstup\sanitize_image_data', 'esc_url_raw' ]
					);
				}, json_decode( $data, true ) ) );
				return ( is_array( $result ) ) ? wp_json_encode( $result, JSON_UNESCAPED_UNICODE ) : '[]';
			},
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_list(
			$wp_customize,
			'services',
			[
				'label'      => __( 'Список услуг', VSTUP_TEXTDOMAIN ),
				'section'    => VSTUP_SLUG . '_services',
				'type'       => 'list',
				'controls'   => [
					'thumbnail'      => [
						'type'     => 'image',
						'label'    => __( 'Выберите изображение услуга (будет использоваться как фон)', VSTUP_TEXTDOMAIN ),
					],
					'permalink' => [
						'type'     => 'url',
						'label'    => __( 'Ссылка на описание услуги', VSTUP_TEXTDOMAIN ),
					],
				],
			]
		)
	); /**/

}

add_action( 'customize_register', 'vstup\register_home_settings_services', 10, 1 );