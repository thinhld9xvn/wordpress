<?php 
	/* Template Name: Contact Template */  

	global $post;

	get_header(); ?>

	<!-- main -->
	<section id="main">

		<!-- page-contact -->
		<div class="page-custom-fullwidth page-contact">

			<!-- container -->
			<div class="container">
			
				<div class="page-columns ohidden">

					<?php echo apply_filters('the_content', $post->post_content); ?>

				</div>

			</div>
			<!-- #container -->

		</div>
		<!-- #page-contact -->
		
	</section>
	<!-- #main -->

<?php 
	get_footer(); ?>