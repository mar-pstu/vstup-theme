<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Новости"
 * */
function customizer_register_section_news( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_news',
		[
			'title'            => __( 'Главная - Новости', VSTUP_TEXTDOMAIN ),
			'priority'         => 30,
			'description'      => __( 'Секция главной страницы для вывода постов из категории. Публикуются 6 последних постов, в которые в первую очередь включаются 3 последних закреплённых поста. Якорь #news', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_blocks',
		]
	); /**/


	$wp_customize->add_setting(
		'newsusedby',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'vstup\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'newsusedby',
		[
			'section'           => VSTUP_SLUG . '_news',
			'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	); /**/


	$wp_customize->add_setting(
		'newstitle',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'newstitle',
		[
			'section'           => VSTUP_SLUG . '_news',
			'label'             => __( 'Заголовок секции', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'newslabel',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'newslabel',
		[
			'section'           => VSTUP_SLUG . '_news',
			'label'             => __( 'Кнопка "далее"', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'newspermalink',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'newspermalink',
		[
			'section'           => VSTUP_SLUG . '_news',
			'label'             => __( 'Ссылка "далее"', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'newstermsnumber',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		'newstermsnumber',
		[
			'section'           => VSTUP_SLUG . '_news',
			'label'             => __( 'Количество категорий', VSTUP_TEXTDOMAIN ),
			'type'              => 'number',
			'input_attrs'       => [
				'min'             => '1',
				'max'             => '5',
			],
		]
	); /**/


	for ( $i = 0; $i < get_theme_mod( 'news_terms_number' ); $i++ ) { 
		$wp_customize->add_setting(
			"newscategories[{$i}]",
			array(
				'transport'         => 'reset',
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control(
			"newscategories[{$i}]",
			array(
				'section'           => VSTUP_SLUG . '_news',
				'label'             => sprintf( __( 'Выбор категории %s', VSTUP_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'select',
				'choices'           => get_categories_choices(),
			)
		); /**/
	}


	$wp_customize->add_setting(
		'newsentries',
		[
			'transport'         => 'reset',
			'sanitize_callback' => function ( $data ) {
				$result = array_filter( array_map( function ( $value ) {
					return parse_only_allowed_args(
						[ 'usedby' => '', 'title' => '', 'permalink' => '', 'thumbnail' => [] ],
						$value,
						[ 'vstup\sanitize_checkbox', 'sanitize_text_field', 'esc_url_raw', 'vstup\sanitize_image_data' ]
					);
				}, json_decode( $data, true ) ) );
				return ( is_array( $result ) ) ? wp_json_encode( $result, JSON_UNESCAPED_UNICODE ) : '[]';
			},
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_list(
			$wp_customize,
			'newsentries',
			[
				'label'      => 'Список записей',
				'section'    => VSTUP_SLUG . '_news',
				'type'       => 'list',
				'controls'   => [
					'permalink'  => [
						'type'     => 'url',
						'label'    => __( 'Ссылка на страницу с описанием', VSTUP_TEXTDOMAIN ),
					],
					'thumbnail'  => [
						'type'     => 'image',
						'label'    => __( 'Превью', VSTUP_TEXTDOMAIN ),
					],
				],
			]
		)
	); /**/

}

add_action( 'customize_register', 'vstup\customizer_register_section_news', 10, 1 );