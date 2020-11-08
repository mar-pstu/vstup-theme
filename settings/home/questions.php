<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Обратная связь"
 * */
function register_home_settings_questions( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_questions',
		[
			'title'            => __( 'Обратная связь', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Секция главной страницы. Якорь #questions. Предполагается наличие формы обратной связи.', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_home',
		]
	); /**/


	$wp_customize->add_setting(
		'questions_flag',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'vstup\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'questions_flag',
		[
			'section'           => VSTUP_SLUG . '_questions',
			'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	); /**/


	$wp_customize->add_setting(
		'questions_title',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'questions_title',
		[
			'section'           => VSTUP_SLUG . '_questions',
			'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'questions_permalink',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		'questions_permalink',
		[
			'section'           => VSTUP_SLUG . '_questions',
			'label'             => __( 'Ссылка на дополнительную информацию', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'questions_label',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'questions_label',
		[
			'section'           => VSTUP_SLUG . '_questions',
			'label'             => __( 'Подпись кнопки с дополнительной информацией', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'questions_form',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'questions_form',
		[
			'section'           => VSTUP_SLUG . '_questions',
			'label'             => __( 'Шорткод формы', VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/


	$wp_customize->add_setting(
		'questions_bgi',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
	   new \WP_Customize_Image_Control(
		   $wp_customize,
		   'questions_bgi',
			[
				'label'      => __( 'Фон', VSTUP_TEXTDOMAIN ),
				'section'    => VSTUP_SLUG . '_questions',
				'settings'   => 'questions_bgi',
			]
		)
	);

}

add_action( 'customize_register', 'vstup\register_home_settings_questions', 10, 1 );