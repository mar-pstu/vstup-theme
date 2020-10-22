<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$wp_customize->add_section(
	VSTUP_SLUG . '_advantages',
	array(
		'title'            => __( 'Преимущества', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Список преимуществ. Публикуется на главной странице в блоке информация. Можно вывести с помощью шорткода <code>[advantages]</code>', VSTUP_TEXTDOMAIN ),
		'panel'            => VSTUP_SLUG . '_lists',
	)
); /**/



$wp_customize->add_setting(
	'advantages_number',
	array(
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'advantages_number',
	array(
		'section'           => VSTUP_SLUG . '_advantages',
		'label'             => __( 'Количество блоков', VSTUP_TEXTDOMAIN ),
		'type'              => 'number',
		'input_attrs'       => array(
			'min'             => 1,
			'max'             => 9,
		),
	)
); /**/



for ( $i=0; $i<get_theme_mod( 'advantages_number', 3 ); $i++ ) { 
	$wp_customize->add_setting(
		"advantages[{$i}][value]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"advantages[{$i}][value]",
		array(
			'section'           => VSTUP_SLUG . '_advantages',
			'label'             => __( sprintf( 'значение %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		"advantages[{$i}][label]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"advantages[{$i}][label]",
		array(
			'section'           => VSTUP_SLUG . '_advantages',
			'label'             => __( sprintf( 'показатель %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		"advantages[{$i}][link]",
		array(
			'default'           => '#',
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		"advantages[{$i}][link]",
		array(
			'section'           => VSTUP_SLUG . '_advantages',
			'label'             => __( sprintf( 'ссылка %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		"advantages[{$i}][image]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
	   new \WP_Customize_Image_Control(
		   $wp_customize,
		   "advantages[{$i}][image]",
		   array(
			   'label'      => __( sprintf( 'изображение %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			   'section'    => VSTUP_SLUG . '_advantages',
			   'settings'   => "advantages[{$i}][image]",
		   )
	   )
	);
}