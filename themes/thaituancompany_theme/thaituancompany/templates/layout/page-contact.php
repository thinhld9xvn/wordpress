<?php global $post; ?>

<!-- main -->
<section id="main">

	<!-- page-contact -->
	<div class="page-custom-fullwidth page-contact mtop20">

		<!-- container -->
		<div class="container">
		
			<div class="page-columns padbot20 ohidden">

				<?php echo apply_filters('the_content', $post->post_content); ?>

			</div>

		</div>
		<!-- #container -->

	</div>
	<!-- #page-contact -->
	
</section>
<!-- #main -->