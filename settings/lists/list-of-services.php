<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


$wp_customize->add_section(
	VSTUP_SLUG . '_services_items',
	[
		'title'            => __( 'Список Услуг', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Публикуется на главной странице в блоке "Услуги". Можно вывести с помощью шорткода <code>[SERVICES]</code>', VSTUP_TEXTDOMAIN ),
		'panel'            => VSTUP_SLUG . '_lists',
	]
); /**/


$wp_customize->add_setting(
	'services_items_number',
	[
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	]
);
$wp_customize->add_control(
	'services_items_number',
	[
		'section'           => VSTUP_SLUG . '_services_items',
		'label'             => __( 'Количество блоков', VSTUP_TEXTDOMAIN ),
		'type'              => 'number',
		'input_attrs'       => [
			'min'             => 1,
			'max'             => 10,
		],
	]
); /**/


for ( $i = 0; $i < get_theme_mod( 'services_items_number', 5 ); $i++ ) { 
	$wp_customize->add_setting(
		"services_items[{$i}][title]",
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		"services_items[{$i}][title]",
		[
			'section'           => VSTUP_SLUG . '_services_items',
			'label'             => __( sprintf( 'название %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/
	$wp_customize->add_setting(
		"services_items[{$i}][thumbnail]",
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			"services_items[{$i}][thumbnail]",
			[
				'label'         => __( sprintf( 'превью %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
				'section'       => VSTUP_SLUG . '_services_items',
				'settings'      => "services_items[{$i}][thumbnail]",
			]
		)
	);
	$wp_customize->add_setting(
		"services_items[{$i}][permalink]",
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		"services_items[{$i}][permalink]",
		[
			'section'           => VSTUP_SLUG . '_services_items',
			'label'             => __( sprintf( 'ссылка на описание %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/
}