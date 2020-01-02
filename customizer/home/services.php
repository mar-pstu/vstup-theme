<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_services",
	array(
		'title'            => __( 'Услуги', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #services. Содержит список услуг университета. Услуги могут публиковаться с помощью шорткода <code>[SRVICES]</code> и доступны в редакторе Gutenberg.', VSTUP_TEXTDOMAIN ),
		'panel'            => "{$slug}_home"
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_services_flag",
	array(
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_services_flag",
	array(
		'section'           => "{$slug}_services",
		'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_services_ct",
	array(
		'default'           => 'services',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_services_ct",
	array(
		'section'           => "{$slug}_services",
		'label'             => __( 'Выбор страницы с описанием', VSTUP_TEXTDOMAIN ),
		'type'              => 'select',
		'choices'           => array(
			'services'        => __( 'список услуг', VSTUP_TEXTDOMAIN ),
			'content'         => __( 'содержимое страницы', VSTUP_TEXTDOMAIN ),
		),
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_services_page_id",
	array(
		'default'           => '',
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	"{$slug}_services_page_id",
	array(
		'section'           => "{$slug}_services",
		'label'             => __( 'Выбор страницы с описанием', VSTUP_TEXTDOMAIN ),
		'type'              => 'dropdown-pages',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_services_title",
	array(
		'default'           => __( 'Услуги', VSTUP_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_services_title",
	array(
		'section'           => "{$slug}_services",
		'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_services_label",
	array(
		'default'           => __( 'Подробней', VSTUP_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_services_label",
	array(
		'section'           => "{$slug}_services",
		'label'             => __( 'Текст кнопки', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



