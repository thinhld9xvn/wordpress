<?php 
	/* Template Name: Contact Template */  

	global $post;

	get_header(); ?>

	<!-- main -->
	<section id="main">

		<!-- page-contact -->
		<div class="page-custom-fullwidth page-contact fixed-object">

			<!-- container -->
			<div class="container">

				<!-- fullwidth-pagesection -->
				<div class="fullwidth-pagesection boxColumnHBorder --left --top pad20-ms mtop20">

					<h3 class="uppercase">
						<strong><?php echo $post->post_title; ?></strong>
					</h3>

					<!-- page-content -->
					<div class="page-content page-contact mtop20">					

						<?php echo apply_filters( 'the_content', $post->post_content ); ?>

					</div>
					<!-- #page-content -->


				</div>
				<!-- #fullwidth-pagesection -->			
			

			</div>
			<!-- #container -->

		</div>
		<!-- #page-contact -->
		
	</section>
	<!-- #main -->

<?php 
	get_footer(); ?>