<?php if ( ! defined( 'ABSPATH' ) ) { exit; }; ?>
<head>
  <meta charset="<?php echo get_bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="initial-scale=1.0, width=device-width">
  <?php wp_head(); ?>
  <?php echo get_theme_mod( 'additionalscriptshead' ); ?>
</head>