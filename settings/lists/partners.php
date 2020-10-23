<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$wp_customize->add_section(
	VSTUP_SLUG . '_partners',
	[
		'title'            => __( 'Партнёры', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Вторая секция главной страницы. Якорь #partners', VSTUP_TEXTDOMAIN ),
		'panel'            => VSTUP_SLUG . '_lists',
	]
); /**/



$wp_customize->add_setting(
	'partners_flag',
	[
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	]
);
$wp_customize->add_control(
	'partners_flag',
	[
		'section'           => VSTUP_SLUG . '_partners',
		'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
		'type'              => 'checkbox',
	]
); /**/


$wp_customize->add_setting(
	'partners_number',
	[
		'default'           => 5,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_textarea_field',
	]
);
$wp_customize->add_control(
	'partners_number',
	[
		'section'           => VSTUP_SLUG . '_partners',
		'label'             => __( 'Количество записей', VSTUP_TEXTDOMAIN ),
		'type'              => 'number',
		'input_attrs'       => [
			'min'             => 1,
			'max'             => 10,
		],
	]
); /**/


for ( $i = 0; $i < get_theme_mod( 'partners_number' ); $i++ ) { 
	$wp_customize->add_setting(
		"partners[{$i}]",
		[
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
	   new \WP_Customize_Image_Control(
			$wp_customize,
			"partners[{$i}]",
			[
				'label'      => sprintf( __( 'лого %d', VSTUP_TEXTDOMAIN ), ( $i + 1 ) ),
				'section'    => VSTUP_SLUG . '_partners',
				'settings'   => "partners[{$i}]",
			]
		)
	);
}