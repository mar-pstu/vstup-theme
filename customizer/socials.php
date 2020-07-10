<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
	"{$slug}_socials",
	array(
		'title'            => __( 'Социальные сети', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Список ссылок на страницы социальных сетей организации', VSTUP_TEXTDOMAIN ),
		'panel'            => "{$slug}_list",
	)
); /**/



foreach ( array(
	'facebook'  => __( 'Facebook', VSTUP_TEXTDOMAIN ),
	'twitter'   => __( 'Twitter', VSTUP_TEXTDOMAIN ),
	'instagram' => __( 'Instagram', VSTUP_TEXTDOMAIN ),
	'youtube'   => __( 'YouTube', VSTUP_TEXTDOMAIN ),
) as $key => $label ) {
	$wp_customize->add_setting(
		"{$slug}_socials[{$key}]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_socials[{$key}]",
		array(
			'section'           => "{$slug}_socials",
			'label'             => $label,
			'type'              => 'text',
		)
	); /**/
}