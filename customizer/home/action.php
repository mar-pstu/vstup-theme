<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_action",
	array(
		'title'            => __( 'Начни с нами', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Третья секция главной страницы. Якорь #action', VSTUP_TEXTDOMAIN ),
		'panel'            => "{$slug}_home"
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_action_flag",
	array(
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_action_flag",
	array(
		'section'           => "{$slug}_action",
		'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/


$wp_customize->add_setting(
	"{$slug}_action_page_id",
	array(
		'default'           => '',
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	"{$slug}_action_page_id",
	array(
		'section'           => "{$slug}_action",
		'label'             => __( 'Выбор страницы', VSTUP_TEXTDOMAIN ),
		'type'              => 'dropdown-pages',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_action_title",
	array(
		'default'           => __( 'Начни с нами', VSTUP_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_action_title",
	array(
		'section'           => "{$slug}_action",
		'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_action_description",
	array(
		'default'           => '',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_textarea_field',
	)
);
$wp_customize->add_control(
	"{$slug}_action_description",
	array(
		'section'           => "{$slug}_action",
		'label'             => __( 'Подзаголовок', VSTUP_TEXTDOMAIN ),
		'type'              => 'textarea',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_action_label",
	array(
		'default'           => __( 'Подробней', VSTUP_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_action_label",
	array(
		'section'           => "{$slug}_action",
		'label'             => __( 'Текст кнопки', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_action_thumbnail",
	array(
		'default'           => VSTUP_URL . '/images/gerb.png',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_url',
	)
);
$wp_customize->add_control(
   new \WP_Customize_Image_Control(
	   $wp_customize,
	   "{$slug}_action_thumbnail",
	   array(
		   'label'      => __( 'Фон', VSTUP_TEXTDOMAIN ),
		   'section'    => "{$slug}_action",
		   'settings'   => "{$slug}_action_thumbnail"
	   )
   )
);


$wp_customize->add_setting(
	"{$slug}_action_video",
	array(
		'default'           => '',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_action_video",
	array(
		'section'           => "{$slug}_action",
		'label'             => __( 'Ссылка на YouTube видео', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/