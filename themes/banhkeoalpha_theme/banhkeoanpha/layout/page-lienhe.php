<?php 

	/* Template Name: Trang liên hệ */ 

	get_header(); 

	global $post; ?>

<!-- main -->

<section id="main">

	<!-- container -->

	<div class="container">

		<!-- fullwidth-pagesection -->

		<div class="fullwidth-pagesection hBorder --left-lightgray --top-lightgray pad20-ms mtop20 mbot20">



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

</section>

<!-- #main -->



<?php get_footer(); ?>



