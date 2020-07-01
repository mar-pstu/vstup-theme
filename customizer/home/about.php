<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_about",
	array(
		'title'            => __( 'Информация', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Вторая секция главной страницы. Якорь #about', VSTUP_TEXTDOMAIN ),
		'panel'            => "{$slug}_home"
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_about_flag",
	array(
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_about_flag",
	array(
		'section'           => "{$slug}_about",
		'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/


$wp_customize->add_setting(
	"{$slug}_about_page_id",
	array(
		'default'           => '',
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	"{$slug}_about_page_id",
	array(
		'section'           => "{$slug}_about",
		'label'             => __( 'Выбор страницы', VSTUP_TEXTDOMAIN ),
		'type'              => 'dropdown-pages',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_about_title",
	array(
		'default'           => get_bloginfo( 'name' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_about_title",
	array(
		'section'           => "{$slug}_about",
		'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_about_description",
	array(
		'default'           => get_bloginfo( 'description' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_textarea_field',
	)
);
$wp_customize->add_control(
	"{$slug}_about_description",
	array(
		'section'           => "{$slug}_about",
		'label'             => __( 'Подзаголовок', VSTUP_TEXTDOMAIN ),
		'type'              => 'textarea',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_about_label",
	array(
		'default'           => __( 'Подробней', VSTUP_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_about_label",
	array(
		'section'           => "{$slug}_about",
		'label'             => __( 'Текст кнопки', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_about_thumbnail",
	array(
		'default'           => get_custom_logo_src( 'large' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_url',
	)
);
$wp_customize->add_control(
   new \WP_Customize_Image_Control(
	   $wp_customize,
	   "{$slug}_about_thumbnail",
	   array(
		   'label'      => __( 'Фон', VSTUP_TEXTDOMAIN ),
		   'section'    => "{$slug}_about",
		   'settings'   => "{$slug}_about_thumbnail"
	   )
   )
);