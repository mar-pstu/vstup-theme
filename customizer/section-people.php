<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Люди"
 * */
function customizer_register_section_people( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_people',
		array(
			'title'            => __( 'Главная - Люди', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Секция главной страницы. Якорь #people', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_blocks',
		)
	); /**/

	$wp_customize->add_setting(
		'peopleusedby',
		array(
			'default'           => false,
			'transport'         => 'reset',
			'sanitize_callback' => 'vstup\sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'peopleusedby',
		array(
			'section'           => VSTUP_SLUG . '_people',
			'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'peopletitle',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'peopletitle',
		[
			'section'           => VSTUP_SLUG . '_people',
			'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'peopledescription',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'wp_kses_post',
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_Tinymce_Editor(
			$wp_customize,
			'homeaboutdescription',
			[
				'label'         => __( 'Описание', VSTUP_TEXTDOMAIN ),
				'section'       => VSTUP_SLUG . '_people',
				'settings'      => 'peopledescription'
			]
		)
	);

	$wp_customize->add_setting(
		'peoplepermalink',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		'peoplepermalink',
		[
			'section'           => VSTUP_SLUG . '_people',
			'label'             => __( 'Сслылка на описание', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'peoplelabel',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'peoplelabel',
		[
			'section'           => VSTUP_SLUG . '_people',
			'label'             => __( 'Текст кнопки', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'graduates',
		[
			'transport'         => 'reset',
			'sanitize_callback' => function ( $data ) {
				$result = array_filter( array_map( function ( $value ) {
					return parse_only_allowed_args(
						[ 'usedby' => '', 'title' => '', 'foto' => [], 'excerpt' => '', 'specialty' => '', 'permalink' => '', 'logo' => [] ],
						$value,
						[ 'vstup\sanitize_checkbox', 'sanitize_text_field', 'vstup\sanitize_image_data', 'sanitize_textarea_field', 'sanitize_text_field', 'esc_url_raw', 'vstup\sanitize_image_data' ]
					);
				}, json_decode( $data, true ) ) );
				return ( is_array( $result ) ) ? wp_json_encode( $result, JSON_UNESCAPED_UNICODE ) : '[]';
			},
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_list(
			$wp_customize,
			'graduates',
			[
				'label'      => __( 'Список выпускников', VSTUP_TEXTDOMAIN ),
				'section'    => VSTUP_SLUG . '_people',
				'type'       => 'list',
				'controls'   => [
					'foto'      => [
						'type'     => 'image',
						'label'    => __( 'Выберите фото с соотношением сторон 1:1', VSTUP_TEXTDOMAIN ),
					],
					'excerpt'   => [
						'type'     => 'textarea',
						'label'    => __( 'Краткое описание', VSTUP_TEXTDOMAIN ),
					],
					'specialty' => [
						'type'     => 'text',
						'label'    => __( 'Название специальности', VSTUP_TEXTDOMAIN ),
					],
					'permalink' => [
						'type'     => 'url',
						'label'    => __( 'Ссылка на специальность', VSTUP_TEXTDOMAIN ),
					],
					'logo'      => [
						'type'     => 'image',
						'label'    => __( 'Логотип специальности или факультета соотношением сторон 1:1', VSTUP_TEXTDOMAIN ),
					],
				],
			]
		)
	); /**/

}

add_action( 'customize_register', 'vstup\customizer_register_section_people', 10, 1 );