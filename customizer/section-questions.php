<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Обратная связь"
 * */
function customizer_register_section_questions( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_questions',
		[
			'title'            => __( 'Главная - Обратная связь', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Секция главной страницы. Якорь #questions. Предполагается наличие формы обратной связи.', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_blocks',
		]
	); /**/

	$wp_customize->add_setting(
		'questionsusedby',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'vstup\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'questionsusedby',
		[
			'section'           => VSTUP_SLUG . '_questions',
			'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	); /**/

	$wp_customize->add_setting(
		'questionstitle',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'questionstitle',
		[
			'section'           => VSTUP_SLUG . '_questions',
			'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'questionspermalink',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		'questionspermalink',
		[
			'section'           => VSTUP_SLUG . '_questions',
			'label'             => __( 'Ссылка на дополнительную информацию', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'questionslabel',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'questionslabel',
		[
			'section'           => VSTUP_SLUG . '_questions',
			'label'             => __( 'Подпись кнопки с дополнительной информацией', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'questionsform',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'questionsform',
		[
			'section'           => VSTUP_SLUG . '_questions',
			'label'             => __( 'Шорткод формы', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'questionsbgi',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
	   new \WP_Customize_Image_Control(
		   $wp_customize,
		   'questionsbgi',
			[
				'label'      => __( 'Фон', VSTUP_TEXTDOMAIN ),
				'section'    => VSTUP_SLUG . '_questions',
				'settings'   => 'questionsbgi',
			]
		)
	);

}

add_action( 'customize_register', 'vstup\customizer_register_section_questions', 10, 1 );