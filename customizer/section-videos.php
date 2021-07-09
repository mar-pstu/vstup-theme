<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Видео"
 * */
function customizer_register_section_videos( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_videos',
		[
			'title'            => __( 'Главная - Видео', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Вторая секция главной страницы. Якорь #videos', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_blocks',
		]
	); /**/


	$wp_customize->add_setting(
		'videosusedby',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'vstup\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'videosusedby',
		[
			'section'           => VSTUP_SLUG . '_videos',
			'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	); /**/

	$wp_customize->add_setting(
		'videos',
		[
			'transport'         => 'reset',
			'sanitize_callback' => function ( $data ) {
				$result = array_filter( array_map( function ( $value ) {
					return parse_only_allowed_args(
						[ 'usedby' => '', 'title' => '', 'thumbnail' => [], 'description' => '', 'permalink' => '' ],
						$value,
						[ 'vstup\sanitize_checkbox', 'sanitize_text_field', 'vstup\sanitize_image_data', 'wp_kses_post', 'esc_url_raw' ]
					);
				}, json_decode( $data, true ) ) );
				return ( is_array( $result ) ) ? wp_json_encode( $result, JSON_UNESCAPED_UNICODE ) : '[]';
			},
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_list(
			$wp_customize,
			'videos',
			[
				'label'      => __( 'Видео', VSTUP_TEXTDOMAIN ),
				'section'    => VSTUP_SLUG . '_videos',
				'type'       => 'list',
				'controls'   => [
					'thumbnail' => [
						'type'     => 'image',
						'label'    => __( 'Выберите фото с соотношением сторон 2:3', VSTUP_TEXTDOMAIN ),
					],
					'description' => [
						'type'     => 'editor',
						'label'    => __( 'Краткое описание', VSTUP_TEXTDOMAIN ),
					],
					'permalink' => [
						'type'     => 'url',
						'label'    => __( 'Ссылка на YouTube видео', VSTUP_TEXTDOMAIN ),
					],
				],
			]
		)
	); /**/

}

add_action( 'customize_register', 'vstup\customizer_register_section_videos', 10, 1 );