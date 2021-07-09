<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация настроек списка "Преимущества"
 * */
function register_lists_settings_advantages( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_advantages',
		[
			'title'            => __( 'Преимущества', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Список преимуществ. Публикуется на главной странице в блоке информация. Можно вывести с помощью шорткода <code>[advantages]</code>', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_lists',
		]
	); /**/


	$wp_customize->add_setting(
		'advantages_number',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'advantages_number',
		[
			'section'           => VSTUP_SLUG . '_advantages',
			'label'             => __( 'Количество блоков', VSTUP_TEXTDOMAIN ),
			'type'              => 'number',
			'input_attrs'       => [
				'min'             => 1,
				'max'             => 9,
			],
		]
	); /**/


	for ( $i = 0; $i < get_theme_mod( 'advantages_number' ); $i++ ) { 
		$wp_customize->add_setting(
			"advantages[{$i}][value]",
			[
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_text_field',
			]
		);
		$wp_customize->add_control(
			"advantages[{$i}][value]",
			[
				'section'           => VSTUP_SLUG . '_advantages',
				'label'             => __( sprintf( 'значение %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
				'type'              => 'text',
			]
		); /**/
		$wp_customize->add_setting(
			"advantages[{$i}][label]",
			[
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_text_field',
			]
		);
		$wp_customize->add_control(
			"advantages[{$i}][label]",
			[
				'section'           => VSTUP_SLUG . '_advantages',
				'label'             => __( sprintf( 'показатель %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
				'type'              => 'text',
			]
		); /**/
		$wp_customize->add_setting(
			"advantages[{$i}][link]",
			[
				'default'           => '#',
				'transport'         => 'reset',
				'sanitize_callback' => 'esc_url_raw',
			]
		);
		$wp_customize->add_control(
			"advantages[{$i}][link]",
			[
				'section'           => VSTUP_SLUG . '_advantages',
				'label'             => __( sprintf( 'ссылка %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
				'type'              => 'text',
			]
		); /**/
		$wp_customize->add_setting(
			"advantages[{$i}][image]",
			[
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'esc_url_raw',
			]
		);
		$wp_customize->add_control(
		   new \WP_Customize_Image_Control(
				$wp_customize,
				"advantages[{$i}][image]",
				[
					'label'      => __( sprintf( 'изображение %d', ( $i + 1 ) ), VSTUP_TEXTDOMAIN ),
					'section'    => VSTUP_SLUG . '_advantages',
					'settings'   => "advantages[{$i}][image]",
				]
			)
		);
	}

}

add_action( 'customize_register', 'vstup\register_lists_settings_advantages', 10, 1 );