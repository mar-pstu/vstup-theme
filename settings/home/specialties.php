<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_specialties",
	array(
		'title'            => __( 'Специальности', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #specialties. Содержит список услуг университета. Услуги могут публиковаться с помощью шорткода <code>[SRVICES]</code> и доступны в редакторе Gutenberg.', VSTUP_TEXTDOMAIN ),
		'panel'            => "{$slug}_home"
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_specialties_flag",
	array(
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'vstup\sanitize_checkbox',
	)
);
$wp_customize->add_control(
	"{$slug}_specialties_flag",
	array(
		'section'           => "{$slug}_specialties",
		'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/




$wp_customize->add_setting(
	"{$slug}_specialties_permalink",
	array(
		'default'           => get_post_type_archive_link( 'educational_program' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_url',
	)
);
$wp_customize->add_control(
	"{$slug}_specialties_permalink",
	array(
		'section'           => "{$slug}_specialties",
		'label'             => __( 'Выбор страницы с описанием', VSTUP_TEXTDOMAIN ),
		'type'              => 'dropdown-pages',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_specialties_title",
	array(
		'default'           => __( 'Специальности', VSTUP_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_specialties_title",
	array(
		'section'           => "{$slug}_specialties",
		'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_specialties_excerpt",
	array(
		'default'           => '',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_specialties_excerpt",
	array(
		'section'           => "{$slug}_specialties",
		'label'             => __( 'Описание', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_specialties_label",
	array(
		'default'           => __( 'Все специальности', VSTUP_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_specialties_label",
	array(
		'section'           => "{$slug}_specialties",
		'label'             => __( 'Текст кнопки', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/
