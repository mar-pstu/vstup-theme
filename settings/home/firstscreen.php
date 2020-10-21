<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
	"{$slug}_firstscreen",
	array(
		'title'            => __( 'Слайдер', VSTUP_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Первый слайдер главной страницы. Якорь #firstscreen', VSTUP_TEXTDOMAIN ),
		'panel'            => "{$slug}_home"
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_firstscreen_flag",
	array(
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'vstup\sanitize_checkbox',
	)
);
$wp_customize->add_control(
	"{$slug}_firstscreen_flag",
	array(
		'section'           => "{$slug}_firstscreen",
		'label'             => __( 'Использовать секцию', VSTUP_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/


$wp_customize->add_setting(
	"{$slug}_firstscreen_number",
	array(
		'default'           => '5',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_firstscreen_number",
	array(
		'section'           => "{$slug}_firstscreen",
		'label'             => __( 'Количество слайдов', VSTUP_TEXTDOMAIN ),
		'type'              => 'number',
		'input_attrs'       => array(
			'min'             => 1,
			'max'             => 10,
		),
	)
); /**/


for ( $i=0; $i<get_theme_mod( "{$slug}_firstscreen_number", 5 ); $i++ ) { 
	$wp_customize->add_setting(
		"{$slug}_firstscreen[{$i}][title]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_firstscreen[{$i}][title]",
		array(
			'section'           => "{$slug}_firstscreen",
			'label'             => __( sprintf( 'заголовок %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		"{$slug}_firstscreen[{$i}][bgi]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		)
	);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			"{$slug}_firstscreen[{$i}][bgi]",
			array(
				'label'         => __( sprintf( 'фон %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
				'section'       => "{$slug}_firstscreen",
				'settings'      => "{$slug}_firstscreen[{$i}][bgi]",
			)
		)
	);
	$wp_customize->add_setting(
		"{$slug}_firstscreen[{$i}][excerpt]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_firstscreen[{$i}][excerpt]",
		array(
			'section'           => "{$slug}_firstscreen",
			'label'             => __( sprintf( 'подзаголовок %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'textarea',
		)
	); /**/
	$wp_customize->add_setting(
		"{$slug}_firstscreen[{$i}][permalink]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		)
	);
	$wp_customize->add_control(
		"{$slug}_firstscreen[{$i}][permalink]",
		array(
			'section'           => "{$slug}_firstscreen",
			'label'             => __( sprintf( 'ссылка на полное описание %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		"{$slug}_firstscreen[{$i}][label]",
		array(
			'default'           => __( 'Подробней', VSTUP_TEXTDOMAIN ),
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_firstscreen[{$i}][label]",
		array(
			'section'           => "{$slug}_firstscreen",
			'label'             => __( sprintf( 'подпись кнопки %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/
}