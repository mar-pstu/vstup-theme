<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };



$title = get_theme_mod( 'questions_title', __( 'Остались вопросы? Звони или пиши нам!', VSTUP_TEXTDOMAIN ) );
$bgi = get_theme_mod( 'questions_bgi', VSTUP_URL . '/images/questions/bg.jpg' );
$form = get_theme_mod( 'questions_form', '' );
$permalink = get_theme_mod( 'question_permalink' );
$label = get_theme_mod( 'question_label' );


include get_theme_file_path( 'views/home/questions.php' );