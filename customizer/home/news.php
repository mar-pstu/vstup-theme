<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_news",
	array(
		'title'            => __( 'Новости', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы для вывода постов из категории. Публикуются 6 последних постов, в которые в первую очередь включаются 3 последних закреплённых поста. Якорь #news', VSTUP_TEXTDOMAIN ),
		'panel'            => "{$slug}_home"
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_news_flag",
	array(
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_news_flag",
	array(
		'section'           => "{$slug}_news",
		'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/


$wp_customize->add_setting(
	"{$slug}_news_category_id",
	array(
		'default'           => '',
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	"{$slug}_news_category_id",
	array(
		'section'           => "{$slug}_news",
		'label'             => __( 'Выбор категории', VSTUP_TEXTDOMAIN ),
		'type'              => 'select',
		'choices'           => get_categories_choices(),
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_news_numberposts",
	array(
		'default'           => 3,
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	"{$slug}_news_numberposts",
	array(
		'section'           => "{$slug}_news",
		'label'             => __( 'Количество незакреплённых постов', VSTUP_TEXTDOMAIN ),
		'type'              => 'number',
		'input_attrs'       => array(
			'min'             => '1',
			'max'             => '5',
		),
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_news_heading",
	array(
		'default'           => __( 'Новости', VSTUP_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_news_heading",
	array(
		'section'           => "{$slug}_news",
		'label'             => __( 'Заголовок секции', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/

