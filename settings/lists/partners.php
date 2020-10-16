<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
	"{$slug}_partners",
	array(
		'title'            => __( 'Партнёры', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Вторая секция главной страницы. Якорь #partners', VSTUP_TEXTDOMAIN ),
		'panel'            => "{$slug}_lists",
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_partners_flag",
	array(
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_partners_flag",
	array(
		'section'           => "{$slug}_partners",
		'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/






$wp_customize->add_setting(
	"{$slug}_partners_number",
	array(
		'default'           => 5,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_textarea_field',
	)
);
$wp_customize->add_control(
	"{$slug}_partners_number",
	array(
		'section'           => "{$slug}_partners",
		'label'             => __( 'Количество записей', VSTUP_TEXTDOMAIN ),
		'type'              => 'number',
		'input_attrs'       => array(
			'min'             => 1,
			'max'             => 10,
		),
	)
); /**/



for ( $i=0; $i<get_theme_mod( "{$slug}_partners_number", 5 ); $i++ ) { 
	$wp_customize->add_setting(
		"{$slug}_partners[{$i}]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		)
	);
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   "{$slug}_partners[{$i}]",
		   array(
			   'label'      => sprintf( __( 'лого %d', VSTUP_TEXTDOMAIN ), ( $i + 1 ) ),
			   'section'    => "{$slug}_partners",
			   'settings'   => "{$slug}_partners[{$i}]",
		   )
	   )
	);
}


