<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


$wp_customize->add_section(
	"{$slug}_graduates",
	array(
		'title'            => __( 'Список выпускников', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Список выпускников. Публикуется на главной странице в блоке "Люди". Можно вывести с помощью шорткода <code>[GRADUATES]</code>', VSTUP_TEXTDOMAIN ),
		'panel'            => $slug,
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_graduates_number",
	array(
		'default'           => 5,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_graduates_number",
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
		"{$slug}_graduates[{$i}][name]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_graduates[{$i}][name]",
		array(
			'section'           => "{$slug}_graduates",
			'label'             => __( sprintf( 'имя %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		"{$slug}_graduates[{$i}][foto]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control(
			$wp_customize,
			"{$slug}_graduates[{$i}][foto]",
			array(
				'label'         => __( sprintf( 'фото %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
				'section'       => "{$slug}_graduates",
				'settings'      => "{$slug}_graduates[{$i}][foto]",
				'flex_width'    => false,
				'flex_height'   => false,
				'width'         => 250,
				'height'        => 250,
			)
		)
	);
	$wp_customize->add_setting(
		"{$slug}_graduates[{$i}][excerpt]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_graduates[{$i}][excerpt]",
		array(
			'section'           => "{$slug}_graduates",
			'label'             => __( sprintf( 'описание %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'textarea',
		)
	); /**/
	$wp_customize->add_setting(
		"{$slug}_graduates[{$i}][specialty][title]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_graduates[{$i}][specialty][title]",
		array(
			'section'           => "{$slug}_graduates",
			'label'             => __( sprintf( 'специальность %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		"{$slug}_graduates[{$i}][specialty][permalink]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_graduates[{$i}][specialty][permalink]",
		array(
			'section'           => "{$slug}_graduates",
			'label'             => __( sprintf( 'ссылка на описание специальности %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		"{$slug}_graduates[{$i}][specialty][thumbnail]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control(
			$wp_customize,
			"{$slug}_graduates[{$i}][specialty][thumbnail]",
			array(
				'label'         => __( sprintf( 'лого специальности %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
				'section'       => "{$slug}_graduates",
				'settings'      => "{$slug}_graduates[{$i}][specialty][thumbnail]",
				'flex_width'    => false,
				'flex_height'   => false,
				'width'         => 150,
				'height'        => 150,
			)
		)
	);
}