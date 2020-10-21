<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$wp_customize->add_section(
	VSTUP_SLUG . '_firstscreen',
	[
		'title'            => __( 'Слайдер', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Первый слайдер главной страницы. Якорь #firstscreen', VSTUP_TEXTDOMAIN ),
		'panel'            => VSTUP_SLUG . '_home',
	]
); /**/


$wp_customize->add_setting(
	'firstscreen_flag',
	[
		'transport'         => 'reset',
		'sanitize_callback' => 'vstup\sanitize_checkbox',
	]
);
$wp_customize->add_control(
	'firstscreen_flag',
	[
		'section'           => VSTUP_SLUG . '_firstscreen',
		'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
		'type'              => 'checkbox',
	]
); /**/


$wp_customize->add_setting(
	'firstscreen_number',
	[
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	]
);
$wp_customize->add_control(
	'firstscreen_number',
	[
		'section'           => VSTUP_SLUG . '_firstscreen',
		'label'             => __( 'Количество слайдов', VSTUP_TEXTDOMAIN ),
		'type'              => 'number',
		'input_attrs'       => [
			'min'             => 1,
			'max'             => 10,
		],
	]
); /**/


for ( $i = 0; $i < get_theme_mod( 'firstscreen_number' ); $i++ ) { 
	$wp_customize->add_setting(
		"firstscreen[{$i}][title]",
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		"firstscreen[{$i}][title]",
		[
			'section'           => VSTUP_SLUG . '_firstscreen',
			'label'             => __( sprintf( 'заголовок %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/
	$wp_customize->add_setting(
		"firstscreen[{$i}][bgi]",
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			"firstscreen[{$i}][bgi]",
			[
				'label'         => __( sprintf( 'фон %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
				'section'       => VSTUP_SLUG . '_firstscreen',
				'settings'      => "firstscreen[{$i}][bgi]",
			]
		)
	);
	$wp_customize->add_setting(
		"firstscreen[{$i}][excerpt]",
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		"firstscreen[{$i}][excerpt]",
		[
			'section'           => VSTUP_SLUG . '_firstscreen',
			'label'             => __( sprintf( 'подзаголовок %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/
	$wp_customize->add_setting(
		"firstscreen[{$i}][permalink]",
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		]
	);
	$wp_customize->add_control(
		"firstscreen[{$i}][permalink]",
		[
			'section'           => VSTUP_SLUG . '_firstscreen',
			'label'             => __( sprintf( 'ссылка на полное описание %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/
	$wp_customize->add_setting(
		"firstscreen[{$i}][label]",
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		"firstscreen[{$i}][label]",
		[
			'section'           => VSTUP_SLUG . '_firstscreen',
			'label'             => __( sprintf( 'подпись кнопки %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/
}