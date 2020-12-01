<?php 

/**
 * Регистрация блоков Гутенберга
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'enqueue_block_assets', function () {

	if ( is_admin() && ( ! wp_doing_ajax() ) ) {
		wp_enqueue_script(
			'pstu-editor-core-styles',
			PSTU_NEXT_THEME_URL . 'gutenberg/core-styles.js',
			array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-i18n' ),
			filemtime( PSTU_NEXT_THEME_DIR . 'gutenberg/core-styles.js' ),
			'in_footer'
		);

		wp_enqueue_script(
	        'pstu-editor-richtext-button',
			PSTU_NEXT_THEME_URL . 'gutenberg/richtext-button.js',
	        array( 'wp-element', 'wp-rich-text', 'wp-editor', 'wp-i18n' ),
	        filemtime( PSTU_NEXT_THEME_DIR . 'gutenberg/richtext-button.js' ),
			'in_footer'
	    );

	    wp_enqueue_style(
			'pstu-editor-richtext-button',
			PSTU_NEXT_THEME_URL . 'styles/richtext-button.css',
			array( 'wp-edit-blocks' ),
			filemtime( PSTU_NEXT_THEME_DIR . "styles/richtext-button.css" )
		);
	}

} );



add_action( 'init', function() {


	wp_register_script(
		'pstu-editor-clearfix',
		PSTU_NEXT_THEME_URL . 'gutenberg/clearfix.js',
		array( 'wp-blocks', 'wp-element', 'wp-i18n' ),
		filemtime( PSTU_NEXT_THEME_DIR . 'gutenberg/clearfix.js' ),
		'in_footer'
	);

	wp_register_script(
		'pstu-editor-accordio',
		PSTU_NEXT_THEME_URL . 'gutenberg/accordio.js',
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-i18n' ),
		filemtime( PSTU_NEXT_THEME_DIR . 'gutenberg/accordio.js' ),
		'in_footer'
	);

	wp_register_style(
		'pstu-next-theme-gutenberg-editor-style',
		PSTU_NEXT_THEME_URL . 'gutenberg/editor.css',
		array( 'wp-edit-blocks' ),
		filemtime( PSTU_NEXT_THEME_DIR . "gutenberg/editor.css" )
	);


	register_block_type( 'pstu-next-theme/clearfix', array(
		'editor_style' => 'pstu-next-theme-gutenberg-editor-style',
		'editor_script' => 'pstu-editor-clearfix',
	) );

	register_block_type( 'pstu-next-theme/accordio', array(
		'editor_style' => 'pstu-next-theme-gutenberg-editor-style',
		'editor_script' => 'pstu-editor-accordio',
	) );

} );