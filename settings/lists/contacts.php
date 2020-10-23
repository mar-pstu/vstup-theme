<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


$wp_customize->add_section(
	VSTUP_SLUG . '_contacts',
	array(
		'title'            => __( 'Контакты', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Список контактов организации', VSTUP_TEXTDOMAIN ),
		'panel'            => VSTUP_SLUG . '_lists',
	)
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