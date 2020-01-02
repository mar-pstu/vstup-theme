<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_videos",
	array(
		'title'            => __( 'Видео', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Вторая секция главной страницы. Якорь #videos', VSTUP_TEXTDOMAIN ),
		'panel'            => "{$slug}_home",
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_videos_flag",
	array(
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_videos_flag",
	array(
		'section'           => "{$slug}_videos",
		'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/






for ( $i=0; $i<3; $i++ ) {
	$wp_customize->add_setting(
		"{$slug}_videos[{$i}][label]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		)
	);
	$wp_customize->add_control(
		"{$slug}_videos[{$i}][label]",
		array(
			'section'           => "{$slug}_videos",
			'label'             => __( sprintf( 'зиголовок №%d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		"{$slug}_videos[{$i}][url]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_videos[{$i}][url]",
		array(
			'section'           => "{$slug}_videos",
			'label'             => __( sprintf( 'ссылка на YouTube видео №%d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		"{$slug}_videos[{$i}][thumbnail]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		)
	);
	$wp_customize->add_control(
	   new \WP_Customize_Image_Control(
		   $wp_customize,
		   "{$slug}_videos[{$i}][thumbnail]",
		   array(
			   'label'      => __( sprintf( 'превью №%d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			   'section'    => "{$slug}_videos",
			   'settings'   => "{$slug}_videos[{$i}]",
		   )
	   )
	);
}


