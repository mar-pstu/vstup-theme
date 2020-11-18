<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section faculties" id="faculties">
	<div class="container text-center">

			<?php if ( isset( $title ) && ! empty( trim( $title ) ) ) : ?>
				<h2><?php echo $title; ?></h2>
			<?php endif; ?>

			<?php if ( isset( $excerpt ) && ! empty( trim( $excerpt ) ) ) : ?>
				<p><?php echo $excerpt; ?></p>
			<?php endif; ?>

	</div>
	<div class="container">
		<div class="row">