<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Слайдер"
 * */
function customizer_register_section_firstscreen( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_firstscreen',
		[
			'title'            => __( 'Главная - Слайдер', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Первый слайдер главной страницы. Якорь #firstscreen', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_blocks',
		]
	); /**/

	$wp_customize->add_setting(
		'firstscreenusedby',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'vstup\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'firstscreenusedby',
		[
			'section'           => VSTUP_SLUG . '_firstscreen',
			'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	); /**/

	$wp_customize->add_setting(
		'firstscreenbgtitle',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'firstscreenbgtitle',
		[
			'section'           => VSTUP_SLUG . '_firstscreen',
			'label'             => __( 'Фоновый заголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);

	$wp_customize->add_setting(
		'firstscreen',
		[
			'transport'         => 'reset',
			'sanitize_callback' => function ( $data ) {
				$result = array_filter( array_map( function ( $value ) {
					return parse_only_allowed_args(
						[ 'usedby' => '', 'title' => '', 'bgi' => [], 'excerpt' => '', 'permalink' => '', 'label' => '', 'nav_menu' => '' ],
						$value,
						[ 'vstup\sanitize_checkbox', 'sanitize_text_field', 'vstup\sanitize_image_data', 'sanitize_textarea_field', 'esc_url_raw', 'sanitize_text_field', 'absint' ]
					);
				}, json_decode( $data, true ) ) );
				return ( is_array( $result ) ) ? wp_json_encode( $result, JSON_UNESCAPED_UNICODE ) : '[]';
			},
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_list(
			$wp_customize,
			'firstscreen',
			[
				'label'      => __( 'Слайды', VSTUP_TEXTDOMAIN ),
				'section'    => VSTUP_SLUG . '_firstscreen',
				'type'       => 'list',
				'controls'   => [
					'bgi'       => [
						'type'     => 'image',
						'label'    => __( 'Фоновое изображение', VSTUP_TEXTDOMAIN ),
					],
					'excerpt'   => [
						'type'     => 'textarea',
						'label'    => __( 'Краткое описание', VSTUP_TEXTDOMAIN ),
					],
					'permalink' => [
						'type'     => 'url',
						'label'    => __( 'Ссылка на полное описание', VSTUP_TEXTDOMAIN ),
					],
					'label'     => [
						'type'     => 'text',
						'label'    => __( 'Подпись кнопки со ссылкой на описание', VSTUP_TEXTDOMAIN ),
					],
					'nav_menu'  => [
						'type'     => 'select',
						'label'    => __( 'Навигационное меню', VSTUP_TEXTDOMAIN ),
						'choices'  => wp_get_nav_menus( [ 'fields' => 'id=>name' ] ),
					],
				],
			]
		)
	); /**/

}

add_action( 'customize_register', 'vstup\customizer_register_section_firstscreen', 10, 1 );