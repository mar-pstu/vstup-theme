<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Загрузка "переводов"
 */
function load_textdomain() {
	load_theme_textdomain( VSTUP_TEXTDOMAIN, VSTUP_DIR . 'languages/' );
}
add_action( 'after_setup_theme', 'vstup\load_textdomain' );
