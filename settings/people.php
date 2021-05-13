<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Люди"
 * */
function register_home_settings_people( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_people',
		array(
			'title'            => __( 'Главная - Люди', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Секция главной страницы. Якорь #people', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_home',
		)
	); /**/


	$wp_customize->add_setting(
		'people_flag',
		array(
			'default'           => false,
			'transport'         => 'reset',
			'sanitize_callback' => 'vstup\sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'people_flag',
		array(
			'section'           => VSTUP_SLUG . '_people',
			'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		)
	); /**/


	$wp_customize->add_setting(
		'people_page_id',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		'people_page_id',
		[
			'section'           => VSTUP_SLUG . '_people',
			'label'             => __( 'Выбор страницы', VSTUP_TEXTDOMAIN ),
			'type'              => 'dropdown-pages',
		]
	); /**/


	$wp_customize->add_setting(
		'people_title',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'people_title',
		[
			'section'           => VSTUP_SLUG . '_people',
			'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'people_description',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'people_description',
		[
			'section'           => VSTUP_SLUG . '_people',
			'label'             => __( 'Подзаголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/


	$wp_customize->add_setting(
		'people_permalink',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		'people_permalink',
		[
			'section'           => VSTUP_SLUG . '_people',
			'label'             => __( 'Сслылка на описание', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'people_label',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'people_label',
		[
			'section'           => VSTUP_SLUG . '_people',
			'label'             => __( 'Текст кнопки', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'peoples',
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
			'peoples',
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

add_action( 'customize_register', 'vstup\register_home_settings_people', 10, 1 );