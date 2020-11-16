<?php 
	/* Template Name: Contact */ ?>

<?php get_header(); 
	global $post; ?>

<!-- main -->
	<section id="main" class="bg_white">

		<!-- container -->
		<div class="container">

			<!-- fullwidth-pagesection -->
			<div class="fullwidth-pagesection mtop20">

				<h3 class="hg-title --double-border --double-active-border">
					<?php echo $post->post_title; ?>
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
			
	</section>
	<!-- #main -->

<?php get_footer(); ?>

