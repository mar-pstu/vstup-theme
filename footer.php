

<?php if ( ! defined( 'ABSPATH' ) ) { exit; }; ?>

			</main>
			<footer id="footer" class="wrapper__item wrapper__item--footer footer">
				<?php
					get_sidebar();
					if ( get_theme_mod( 'partners_flag', false ) ) {
						get_template_part( "parts/partners" );
					}
				?>
				<div class="container">
					<div class="row middle-xs">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<p class="copyright">
								<a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a>
							</p>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<p class="developer">
								<a href="https://cct.pstu.edu/" target="_blank">ДВНЗ "ПДТУ" ЦКТ</a>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
		
		<?php
			// if ( is_front_page() ) {
			// 	get_template_part( 'parts/christmas' );
			// }
			wp_footer();
		?>
	</body>
</html>