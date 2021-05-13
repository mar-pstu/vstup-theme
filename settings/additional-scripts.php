<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация настроек для ввода дополнительных скриптов
 * */
function register_settings_additional_script( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_additional_scripts',
		[
			'title'            => __( 'Дополнительные скрипты', VSTUP_TEXTDOMAIN ),
			'priority'         => 70,
		]
	); /**/


	$wp_customize->add_setting(
		'additionalscriptshead',
		[
			'transport'         => 'reset',
		]
	);
	$wp_customize->add_control(
		'additionalscriptshead',
		[
			'section'           => VSTUP_SLUG . '_additional_scripts',
			'label'             => __( 'После тега head', VSTUP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/

	$wp_customize->add_setting(
		'additionalscriptsbody',
		[
			'transport'         => 'reset',
		]
	);

	$wp_customize->add_control(
		'additionalscriptsbody',
		[
			'section'           => VSTUP_SLUG . '_additional_scripts',
			'label'             => __( 'После тега body', VSTUP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/

}

add_action( 'customize_register', 'vstup\register_settings_additional_script', 10, 1 );