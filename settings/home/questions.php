<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_questions",
	array(
		'title'            => __( 'Обратная связь', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #questions. Предполагается наличие формы обратной связи.', VSTUP_TEXTDOMAIN ),
		'panel'            => "{$slug}_home"
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_questions_flag",
	array(
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_questions_flag",
	array(
		'section'           => "{$slug}_questions",
		'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/





$wp_customize->add_setting(
	"{$slug}_questions_title",
	array(
		'default'           => __( 'Остались вопросы? Звони или пиши нам!', VSTUP_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_questions_title",
	array(
		'section'           => "{$slug}_questions",
		'label'             => __( 'Заголовок', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_questions_form",
	array(
		'default'           => '',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_questions_form",
	array(
		'section'           => "{$slug}_questions",
		'label'             => __( 'Шорткод формы', VSTUP_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_questions_bgi",
	array(
		'default'           => VSTUP_URL . '/images/questions/bg.jpg',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_url',
	)
);
$wp_customize->add_control(
   new \WP_Customize_Image_Control(
	   $wp_customize,
	   "{$slug}_questions_bgi",
	   array(
		   'label'      => __( 'Фон', VSTUP_TEXTDOMAIN ),
		   'section'    => "{$slug}_questions",
		   'settings'   => "{$slug}_questions_bgi"
	   )
   )
);