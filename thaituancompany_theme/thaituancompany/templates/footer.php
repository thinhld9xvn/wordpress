		<!-- footer -->
		<footer id="footer" class="mtop20">

			<!-- container -->
			<div class="container">

				<!-- footer-row -->
				<div class="footer-row ohidden padtb20">

					<?php
						dynamic_sidebar( 'Footer Column One Sidebar' );
						dynamic_sidebar( 'Footer Column Two Sidebar' ); ?>

				</div>
				<!-- #footer-row -->

				<?php
					dynamic_sidebar( 'Footer Copyright Sidebar' ); ?>

			</div>
			<!-- #container -->

		</footer>
		<!-- #footer -->


	</div>
	<!-- #wrapper -->
	
	<?php wp_footer(); ?>

</body>

</html>