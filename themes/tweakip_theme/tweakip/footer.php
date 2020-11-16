<?php $contactform_options = get_option( 'section-contact-form_option_name' ); ?>

	<!-- footer -->
	<footer id="footer" class="fullwidth-section padtb60-ms padtb20-xs">

		<!-- container -->
		<div class="container">

			<!-- portfolio-hash -->
			<div id="portfolio-hash">				

				<?php 
					dynamic_sidebar('Footer Column One Sidebar');
					dynamic_sidebar('Footer Column Two Sidebar');
					dynamic_sidebar('Footer Column Three Sidebar');
					dynamic_sidebar('Footer Copyright Sidebar'); ?>

			</div>
			<!-- #portfolio-hash -->
				
		</div>
		<!-- #container -->
		
	</footer>
	<!-- #footer -->

	<a class="scrollToTop" href="#"></a>
		
</div>
<!-- #wrapper -->

<?php wp_footer(); ?>

</body>

</html>