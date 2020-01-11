<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



if ( have_posts() ) {

  while ( have_posts() ) {

    the_post();
    the_pageheader();

    ?>

      <div class="container">
        <div class="content">
          <?php

            the_content();
            the_pager();

          ?>
        </div>
      </div>

    <?php
    
    if ( comments_open( get_the_ID() ) ) comments_template();
  }

}
