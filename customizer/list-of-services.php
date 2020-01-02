<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


$wp_customize->add_section(
	"{$slug}_services_items",
	array(
		'title'            => __( 'Список Услуг', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Публикуется на главной странице в блоке "Услуги". Можно вывести с помощью шорткода <code>[SERVICES]</code>', VSTUP_TEXTDOMAIN ),
		'panel'            => $slug,
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_services_items_number",
	array(
		'default'           => 5,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_services_items_number",
	array(
		'section'           => "{$slug}_graduates",
		'label'             => __( 'Количество блоков', VSTUP_TEXTDOMAIN ),
		'type'              => 'number',
		'input_attrs'       => array(
			'min'             => 1,
			'max'             => 10,
		),
	)
); /**/



for ( $i=0; $i<get_theme_mod( "{$slug}_graduates_number", 5 ); $i++ ) { 
	$wp_customize->add_setting(
		"{$slug}_services_item[{$i}][title]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_services_item[{$i}][title]",
		array(
			'section'           => "{$slug}_services_items",
			'label'             => __( sprintf( 'название %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		"{$slug}_services_item[{$i}][thumbnail]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			"{$slug}_services_item[{$i}][thumbnail]",
			array(
				'label'         => __( sprintf( 'превью %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
				'section'       => "{$slug}_services_items",
				'settings'      => "{$slug}_services_item[{$i}][thumbnail]",
			)
		)
	);
	$wp_customize->add_setting(
		"{$slug}_services_item[{$i}][permalink]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		)
	);
	$wp_customize->add_control(
		"{$slug}_services_item[{$i}][permalink]",
		array(
			'section'           => "{$slug}_services_items",
			'label'             => __( sprintf( 'ссылка на описание %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/
}