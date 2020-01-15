<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


the_pageheader();


?>


<!-- <form>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-4">
				<label for="based_education">Базовое образование</label>
				<select id="based_education">
					<option> </option>
					<option>БАК (бакалавр)</option>
					<option>МС (молодший спеціаліст)</option>
					<option>паралельне навчання</option>
					<option>ПЗСО (повна загальна середня освіта)</option>
				</select>
			</div>
			<div class="col-xs-12 col-sm-4">
				<label for="okr">ОКР</label>
				<select id="okr">
					<option> </option>
					<option>Бакалавр</option>
					<option>Магистр</option>
				</select>
			</div>
			<div class="col-xs-12 col-sm-4">
				<Label for="order">Сортировать</Label>
				<select id="order">
					<option> </option>
					<option>по алфавиту</option>
					<option>по номеру</option>
				</select>
			</div>
		</div>
	</div>
</form> -->


<div class="container">

	<?php

	$terms = get_terms( array(
		'taxonomy'   => 'specialties',
		'hide_empty' => true,
	) );

	if ( is_array( $terms ) && ! empty( $terms ) ) {

		$specialties = wp_list_filter( $terms, array( 'parent' => 0 ), 'NOT' );

		if ( empty( $specialties ) ) {

			_e( 'Специальности не заполнены', VSTUP_TEXTDOMAIN );

		} else {

			?>

				<div class="row">
				
					<?php

					foreach ( $specialties as $specialty ) {
						
						$educational_programs = get_posts( array(
							'numberposts' => -1,
							'orderby'     => 'name',
							'order'       => 'DESC',
							'post_type'   => 'educational_program',
							'specialties' => $specialty->term_id
						) );

						if ( is_array( $educational_programs ) && ! empty( $educational_programs ) ) {

							$sector = array_shift( wp_list_filter( $terms, array( 'parent' => $specialty->parent ), 'AND' ) );
							$thumbnail = get_term_meta( $specialty->term_id, 'pstu_specialties_logo', true );
							$code = get_term_meta( $specialty->term_id, 'pstu_specialties_code', true );
							if ( empty( trim( $code ) ) ) {
								$code = '-';
							}

							?>
								
								<div class="col-xs-12 col-sm-6">
									<?php if ( empty( $thumbnail ) ) : ?>
										<div class="heading heading--icon">
											<img class="heading__thumbnail thumbnail lazy" src="#" data-src="<?php echo $thumbnail; ?>" alt="<?php echo esc_attr( $specialty->post_title ); ?>" style="border: medium none;"/>
											<h3 class="heading__title title"><?php echo $specialty->name; ?></h3>
										</div>
									<?php else : ?>
										<h3><?php echo $specialty->name; ?></h3>
									<?php endif; ?>
									<ul class="small list-unsltyled list-inline">
										<li>Код: <?php echo $code; ?></li>
										<li>Сектор: <?php echo $sector->name; ?></li>
									</ul>
									<ul>
										<?php foreach ( $educational_programs as $educational_program ) : setup_postdata( $educational_program ); ?>
											<li>
												<a href="<?php echo get_permalink( $educational_program->ID ); ?>">
													<?php echo apply_filters( 'the_title', $educational_program->post_title, $educational_program->ID ); ?>
												</a>
											</li>
										<?php endforeach; wp_reset_postdata(); ?>
									</ul>
								</div>

							<?php

						}

					}

					?>

				</div>

			<?php

		}

	}

	?>


						


</div>