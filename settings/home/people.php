<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_people",
	array(
		'title'            => __( 'Люди', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #people', VSTUP_TEXTDOMAIN ),
		'panel'            => "{$slug}_home"
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_people_flag",
	array(
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_people_flag",
	array(
		'section'           => "{$slug}_people",
		'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/


$wp_customize->add_setting(
	"{$slug}_people_page_id",
	array(
		'default'           => '',
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	"{$slug}_people_page_id",
	array(
		'section'           => "{$slug}_people",
		'label'             => __( 'Выбор страницы', VSTUP_TEXTDOMAIN ),
		'type'              => 'dropdown-pages',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_people_title",
	array(
		'default'           => __( 'Выпускники', VSTUP_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_people_title",
	array(
		'section'           => "{$slug}_people",
		'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_people_description",
	array(
		'default'           => '',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_textarea_field',
	)
);
$wp_customize->add_control(
	"{$slug}_people_description",
	array(
		'section'           => "{$slug}_people",
		'label'             => __( 'Подзаголовок', VSTUP_TEXTDOMAIN ),
		'type'              => 'textarea',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_people_label",
	array(
		'default'           => __( 'Подробней', VSTUP_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_people_label",
	array(
		'section'           => "{$slug}_people",
		'label'             => __( 'Текст кнопки', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/