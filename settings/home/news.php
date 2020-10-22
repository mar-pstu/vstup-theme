<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$wp_customize->add_section(
	VSTUP_SLUG . '_news',
	[
		'title'            => __( 'Новости', VSTUP_TEXTDOMAIN ),
		'priority'         => 30,
		'description'      => __( 'Секция главной страницы для вывода постов из категории. Публикуются 6 последних постов, в которые в первую очередь включаются 3 последних закреплённых поста. Якорь #news', VSTUP_TEXTDOMAIN ),
		'panel'            => VSTUP_SLUG . '_home',
	]
); /**/


$wp_customize->add_setting(
	'news_flag',
	[
		'transport'         => 'reset',
		'sanitize_callback' => 'vstup\sanitize_checkbox',
	]
);
$wp_customize->add_control(
	'news_flag',
	[
		'section'           => VSTUP_SLUG . '_news',
		'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
		'type'              => 'checkbox',
	]
); /**/


$wp_customize->add_setting(
	'news_title',
	[
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	]
);
$wp_customize->add_control(
	'news_title',
	[
		'section'           => VSTUP_SLUG . '_news',
		'label'             => __( 'Заголовок секции', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	]
); /**/


$wp_customize->add_setting(
	'news_terms_number',
	[
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	]
);
$wp_customize->add_control(
	'news_terms_number',
	[
		'section'           => VSTUP_SLUG . '_news',
		'label'             => __( 'Количество категорий', VSTUP_TEXTDOMAIN ),
		'type'              => 'number',
		'input_attrs'       => [
			'min'             => '1',
			'max'             => '5',
		],
	]
); /**/


for ( $i = 0; $i < get_theme_mod( 'news_terms_number' ); $i++ ) { 
	$wp_customize->add_setting(
		"news_categories[{$i}]",
		array(
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		"news_categories[{$i}]",
		array(
			'section'           => VSTUP_SLUG . '_news',
			'label'             => sprintf( __( 'Выбор категории %s', VSTUP_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'select',
			'choices'           => get_categories_choices(),
		)
	); /**/
}


$wp_customize->add_setting(
	'news_numberposts',
	[
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	]
);
$wp_customize->add_control(
	'news_numberposts',
	[
		'section'           => VSTUP_SLUG . '_news',
		'label'             => __( 'Количество постов из категорий', VSTUP_TEXTDOMAIN ),
		'type'              => 'number',
		'input_attrs'       => [
			'min'             => '1',
			'max'             => '5',
		],
	]
); /**/


$wp_customize->add_setting(
	'news_numberentries',
	[
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	]
);
$wp_customize->add_control(
	'news_numberentries',
	[
		'section'           => VSTUP_SLUG . '_news',
		'label'             => __( 'Количество превью слайдера', VSTUP_TEXTDOMAIN ),
		'type'              => 'number',
		'input_attrs'       => [
			'min'             => '1',
			'max'             => '15',
		],
	]
); /**/


for ( $i = 0; $i < get_theme_mod( 'news_numberentries' ); $i++ ) { 
	$wp_customize->add_setting(
		"news_entries[{$i}][title]",
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		"news_entries[{$i}][title]",
		[
			'section'           => VSTUP_SLUG . '_news',
			'label'             => sprintf( __( 'Заголовок %s', VSTUP_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'text',
		]
	); /**/
	$wp_customize->add_setting(
		"news_entries[{$i}][link]",
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		"news_entries[{$i}][link]",
		[
			'section'           => VSTUP_SLUG . '_news',
			'label'             => sprintf( __( 'Ссылка %s', VSTUP_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'text',
		]
	); /**/
	$wp_customize->add_setting(
		"news_entries[{$i}][thumbnail]",
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
	   new \WP_Customize_Image_Control(
		   $wp_customize,
		   "news_entries[{$i}][thumbnail]",
		   	[
				'label'         => sprintf( __( 'Превью %s', VSTUP_TEXTDOMAIN ), ( $i + 1 ) ),
				'section'       => VSTUP_SLUG . '_news',
				'settings'      => "news_entries[{$i}][thumbnail]",
			]
		)
	);
}