<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация настроек списка "Контакты"
 * */
function register_lists_settings_contacts( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_contacts',
		[
			'title'            => __( 'Контакты', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Список контактов организации', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_lists',
		]
	); /**/

	foreach ( [
		'phone' => __( 'Телефон', VSTUP_TEXTDOMAIN ),
		'email' => __( 'Email', VSTUP_TEXTDOMAIN ),
	] as $key => $label ) {
		$wp_customize->add_setting(
			"contacts[{$key}]",
			[
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_text_field',
			]
		);
		$wp_customize->add_control(
			"contacts[{$key}]",
			[
				'section'           => VSTUP_SLUG . '_contacts',
				'label'             => $label,
				'type'              => 'text',
			]
		); /**/
	}

}

add_action( 'customize_register', 'vstup\register_lists_settings_contacts', 10, 1 );