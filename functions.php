<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


define( 'VSTUP_URL', get_template_directory_uri() . '/' );
define( 'VSTUP_DIR', get_template_directory() . '/' );
define( 'VSTUP_TEXTDOMAIN', 'pstu-vstup' );
define( 'VSTUP_SLUG', 'pstu_vstup' );


get_template_part( 'includes/textdomain' );
get_template_part( 'includes/theme-supports' );
get_template_part( 'includes/template-functions' );
get_template_part( 'includes/shortcodes' );
get_template_part( 'includes/gutenberg' );
get_template_part( 'includes/menus' );
get_template_part( 'includes/sidebars' );


if ( function_exists( 'pll_register_string' ) && function_exists( 'pll__' ) ) {
	get_template_part( 'includes/translate-setting' );
	get_template_part( 'includes/register-strings' );
}


if ( is_admin() && ! wp_doing_ajax() ) {
	get_template_part( 'includes/enqueue-admin' );
	get_template_part( 'includes/metabox-promo' );
	get_template_part( 'includes/custom-asides-admin' );
	get_template_part( 'includes/theme-activate' );
	new vstup\MetaboxPromo();
} else {
	get_template_part( 'includes/lazyload.php' );
	get_template_part( 'includes/enqueue-public' );
	get_template_part( 'includes/custom-asides-public' );
	get_template_part( 'includes/search-result' );
}


if ( is_customize_preview() ) {
	get_template_part( 'includes/customizer' );
	get_template_part( 'includes/sanitize-settings' );
}