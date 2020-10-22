<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$wp_customize->add_section(
	VSTUP_SLUG . '_graduates',
	[
		'title'            => __( 'Список выпускников', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Список выпускников. Публикуется на главной странице в блоке "Люди". Можно вывести с помощью шорткода <code>[GRADUATES]</code>', VSTUP_TEXTDOMAIN ),
		'panel'            => VSTUP_SLUG . '_lists',
	]
); /**/


$wp_customize->add_setting(
	'graduates_number',
	[
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	]
);
$wp_customize->add_control(
	'graduates_number',
	[
		'section'           => VSTUP_SLUG . '_graduates',
		'label'             => __( 'Количество блоков', VSTUP_TEXTDOMAIN ),
		'type'              => 'number',
		'input_attrs'       => [
			'min'             => 1,
			'max'             => 10,
		],
	]
); /**/


for ( $i = 0; $i < get_theme_mod( 'graduates_number' ); $i++ ) { 
	$wp_customize->add_setting(
		'graduates[{$i}][name]',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'graduates[{$i}][name]',
		[
			'section'           => VSTUP_SLUG . '_graduates',
			'label'             => __( sprintf( 'имя %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/
	$wp_customize->add_setting(
		"graduates[{$i}][foto]",
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control(
			$wp_customize,
			"graduates[{$i}][foto]",
			[
				'label'         => __( sprintf( 'фото %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
				'section'       => VSTUP_SLUG . '_graduates',
				'settings'      => "graduates[{$i}][foto]",
				'flex_width'    => false,
				'flex_height'   => false,
				'width'         => 250,
				'height'        => 250,
			]
		)
	);
	$wp_customize->add_setting(
		"graduates[{$i}][excerpt]",
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		"graduates[{$i}][excerpt]",
		[
			'section'           => VSTUP_SLUG . '_graduates',
			'label'             => __( sprintf( 'описание %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/
	$wp_customize->add_setting(
		"graduates[{$i}][specialty][title]",
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		"graduates[{$i}][specialty][title]",
		[
			'section'           => VSTUP_SLUG . '_graduates',
			'label'             => __( sprintf( 'специальность %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/
	$wp_customize->add_setting(
		"graduates[{$i}][specialty][permalink]",
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		"graduates[{$i}][specialty][permalink]",
		[
			'section'           => VSTUP_SLUG . '_graduates',
			'label'             => __( sprintf( 'ссылка на описание специальности %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/
	$wp_customize->add_setting(
		"graduates[{$i}][specialty][thumbnail]",
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control(
			$wp_customize,
			"graduates[{$i}][specialty][thumbnail]",
			[
				'label'         => __( sprintf( 'лого специальности %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
				'section'       => VSTUP_SLUG . '_graduates',
				'settings'      => "graduates[{$i}][specialty][thumbnail]",
				'flex_width'    => false,
				'flex_height'   => false,
				'width'         => 150,
				'height'        => 150,
			]
		)
	);
}