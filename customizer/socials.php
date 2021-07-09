<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация настроек списка "Социальные сети"
 * */
function register_lists_settings_socials( $wp_customize ) {

	$wp_customize->add_section(
		VSTUP_SLUG . '_socials',
		array(
			'title'            => __( 'Социальные сети', VSTUP_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Список ссылок на страницы социальных сетей организации', VSTUP_TEXTDOMAIN ),
			'panel'            => VSTUP_SLUG . '_lists',
		)
	); /**/

	foreach ( apply_filters( 'socials_list', [
		'facebook'  => __( 'Facebook', VSTUP_TEXTDOMAIN ),
		'twitter'   => __( 'Twitter', VSTUP_TEXTDOMAIN ),
		'instagram' => __( 'Instagram', VSTUP_TEXTDOMAIN ),
		'youtube'   => __( 'YouTube', VSTUP_TEXTDOMAIN ),
	] ) as $key => $label ) {
		$wp_customize->add_setting(
			"socials[{$key}]",
			array(
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			"socials[{$key}]",
			[
				'section'           => VSTUP_SLUG . '_socials',
				'label'             => $label,
				'type'              => 'text',
			]
		); /**/
	}

}

add_action( 'customize_register', 'vstup\register_lists_settings_socials', 10, 1 );