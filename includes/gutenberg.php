<?php 

/**
 * Регистрация блоков Гутенберга
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'init', function() {


	wp_register_script(
		'pstu-editor-clearfix',
		VSTUP_URL . 'scripts/gutenberg/clearfix.js',
		array( 'wp-blocks', 'wp-element', 'wp-i18n' ),
		filemtime( VSTUP_DIR . 'scripts/gutenberg/clearfix.js' ),
		'in_footer'
	);

	wp_register_script(
		'pstu-editor-accordio',
		VSTUP_URL . 'scripts/gutenberg/accordio.js',
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-i18n' ),
		filemtime( VSTUP_DIR . 'scripts/gutenberg/accordio.js' ),
		'in_footer'
	);

	wp_register_style(
		'pstu-next-theme-gutenberg-editor-style',
		VSTUP_URL . 'styles/gutenberg.css',
		array( 'wp-edit-blocks' ),
		filemtime( VSTUP_DIR . "styles/gutenberg.css" )
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