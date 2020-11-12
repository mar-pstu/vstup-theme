<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="col-xs-11 col-sm-12 col-md-6 col-lg-6">

	<?php if ( isset( $news_title ) && ! empty( trim( $news_title ) ) ) : ?>
		<h2><?php echo $news_title; ?></h2>
	<?php endif; ?>

	<div id="news-list-entries" role="list">