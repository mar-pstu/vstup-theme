<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	VSTUP_SLUG . '_questions',
	array(
		'title'            => __( 'Обратная связь', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #questions. Предполагается наличие формы обратной связи.', VSTUP_TEXTDOMAIN ),
		'panel'            => "{$slug}_home"
	)
); /**/



$wp_customize->add_setting(
	'questions_flag',
	[
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	]
);
$wp_customize->add_control(
	'questions_flag',
	[
		'section'           => VSTUP_SLUG . '_questions',
		'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
		'type'              => 'checkbox',
	]
); /**/





$wp_customize->add_setting(
	'questions_title',
	[
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	]
);
$wp_customize->add_control(
	'questions_title',
	[
		'section'           => VSTUP_SLUG . '_questions',
		'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	]
); /**/



$wp_customize->add_setting(
	'questions_form',
	[
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	]
);
$wp_customize->add_control(
	'questions_form',
	[
		'section'           => VSTUP_SLUG . '_questions',
		'label'             => __( 'Шорткод формы', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	]
); /**/



$wp_customize->add_setting(
	'questions_bgi',
	[
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_url',
	]
);
$wp_customize->add_control(
   new \WP_Customize_Image_Control(
	   $wp_customize,
	   'questions_bgi',
	   [
		   'label'      => __( 'Фон', VSTUP_TEXTDOMAIN ),
		   'section'    => VSTUP_SLUG . '_questions',
		   'settings'   => 'questions_bgi',
	   ]
   )
);