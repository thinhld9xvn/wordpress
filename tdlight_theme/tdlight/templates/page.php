<?php 
	global $post; ?>

<!-- main -->
<section id="main">

	<!-- breadcumbs -->
	<div id="breadcumbs">

		<!-- container -->
		<div class="container">

			<?php
				the_breadcrumbs('_breadcumbs', '_breadcumbs', 'Trang chủ', '<span class="divide"></span>'); ?>	

		</div>
		<!-- #container -->

	</div>
	<!-- #breadcumbs -->

	<!-- pageSection -->
	<div class="pageSection padtb20">

		<!-- container -->
		<div class="container">

			<!-- headingProductTitle -->
			<h2 class="headingProductTitle">

				<span class="fa fa-file"></span>
				<span class="caption">
					<?php echo $post->post_title; ?>
				</span>

			</h2>
			<!-- #headingProductTitle -->

			<!-- pageSectionContent -->
			<div class="pageSectionContent defFormat fixed-object mtop20">

				<?php echo apply_filters( 'the_content', $post->post_content ); ?>
				
			</div>
			<!-- #pageSectionContent -->

			<!-- fbComments -->
			<div class="fbComments mtop20">			

				<div class="fb-comments" 
					 data-href="<?php echo get_the_permalink( $post->ID ) ?>" 
					 data-numposts="5">

				</div>
				
			</div>
			<!-- #fbComments -->
			
		</div>
		<!-- #container -->
		
	</div>
	<!-- #pageSection -->

</section>
<!-- #main -->