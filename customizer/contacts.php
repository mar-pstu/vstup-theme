<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
	"{$slug}_contacts",
	array(
		'title'            => __( 'Контакты', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Список контактов организации', VSTUP_TEXTDOMAIN ),
		'panel'            => "{$slug}_list",
	)
); /**/



foreach ( array(
	'phone' => __( 'Телефон', VSTUP_TEXTDOMAIN ),
	'email' => __( 'Email', VSTUP_TEXTDOMAIN ),
) as $key => $label ) {
	$wp_customize->add_setting(
		"{$slug}_contacts[{$key}]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_contacts[{$key}]",
		array(
			'section'           => "{$slug}_contacts",
			'label'             => $label,
			'type'              => 'text',
		)
	); /**/
}