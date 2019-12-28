<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


$wp_customize->add_section(
	"{$slug}_advantages",
	array(
		'title'            => __( 'Преимущества', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Список преимуществ. Публикуется на главной странице в блоке информация. Можно вывести с помощью шорткода <code>[ADVANTAGES]</code>', VSTUP_TEXTDOMAIN ),
		'panel'            => $slug,
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_advantages_number",
	array(
		'default'           => 3,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_advantages_number",
	array(
		'section'           => "{$slug}_advantages",
		'label'             => __( 'Количество блоков', VSTUP_TEXTDOMAIN ),
		'type'              => 'number',
	)
); /**/



for ( $i=0; $i<get_theme_mod( "{$slug}_advantages_number", 3 ); $i++ ) { 
	$wp_customize->add_setting(
		"{$slug}_advantages[{$i}][value]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_advantages[{$i}][value]",
		array(
			'section'           => "{$slug}_advantages",
			'label'             => __( sprintf( 'значение %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		"{$slug}_advantages[{$i}][label]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_advantages[{$i}][label]",
		array(
			'section'           => "{$slug}_advantages",
			'label'             => __( sprintf( 'показатель %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/
}