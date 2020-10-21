<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	VSTUP_SLUG . '_services',
	[
		'title'            => __( 'Услуги', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #services. Содержит список услуг университета. Услуги могут публиковаться с помощью шорткода <code>[SRVICES]</code> и доступны в редакторе Gutenberg.', VSTUP_TEXTDOMAIN ),
		'panel'            => "{$slug}_home"
	]
); /**/



$wp_customize->add_setting(
	'services_flag',
	[
		'transport'         => 'reset',
		'sanitize_callback' => 'vstup\sanitize_checkbox',
	]
);
$wp_customize->add_control(
	'services_flag',
	[
		'section'           => VSTUP_SLUG . '_services',
		'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
		'type'              => 'checkbox',
	]
); /**/



$wp_customize->add_setting(
	'services_ct',
	[
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	]
);
$wp_customize->add_control(
	'services_ct',
	[
		'section'           => VSTUP_SLUG . '_services',
		'label'             => __( 'Тип контента', VSTUP_TEXTDOMAIN ),
		'type'              => 'select',
		'choices'           => [
			'services'        => __( 'список услуг', VSTUP_TEXTDOMAIN ),
			'content'         => __( 'содержимое страницы', VSTUP_TEXTDOMAIN ),
		],
	]
); /**/



$wp_customize->add_setting(
	'services_page_id',
	[
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	]
);
$wp_customize->add_control(
	'services_page_id',
	[
		'section'           => VSTUP_SLUG . '_services',
		'label'             => __( 'Выбор страницы с описанием', VSTUP_TEXTDOMAIN ),
		'type'              => 'dropdown-pages',
	]
); /**/



$wp_customize->add_setting(
	'services_title',
	[
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	]
);
$wp_customize->add_control(
	'services_title',
	array(
		'section'           => VSTUP_SLUG . '_services',
		'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	'services_label',
	[
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	]
);
$wp_customize->add_control(
	'services_label',
	[
		'section'           => VSTUP_SLUG . '_services',
		'label'             => __( 'Текст кнопки', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	]
); /**/



