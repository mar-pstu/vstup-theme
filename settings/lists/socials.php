<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
	VSTUP_SLUG . '_socials',
	array(
		'title'            => __( 'Социальные сети', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Список ссылок на страницы социальных сетей организации', VSTUP_TEXTDOMAIN ),
		'panel'            => VSTUP_SLUG . '_lists',
	)
); /**/



foreach ( array(
	'facebook'  => __( 'Facebook', VSTUP_TEXTDOMAIN ),
	'twitter'   => __( 'Twitter', VSTUP_TEXTDOMAIN ),
	'instagram' => __( 'Instagram', VSTUP_TEXTDOMAIN ),
	'youtube'   => __( 'YouTube', VSTUP_TEXTDOMAIN ),
) as $key => $label ) {
	$wp_customize->add_setting(
		"socials[{$key}]",
		array(
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"socials[{$key}]",
		array(
			'section'           => VSTUP_SLUG . '_socials',
			'label'             => $label,
			'type'              => 'text',
		)
	); /**/
}