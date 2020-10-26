<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="item" id="<?php echo esc_attr ( isset( $category->slug ) ) ? $category->slug : 'all-categories'; ?>" role="listitem" >