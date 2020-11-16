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
	<div class="pageSection">

		<!-- container -->
		<div class="container">

			<!-- headingPgTitle -->
			<h2 class="headingPgTitle">

				<?php echo $post->post_title ?>
				
			</h2>
			<!-- #headingPgTitle -->

			<!-- pageContent -->
			<div class="pageContent defFormat fixed-object mtop20">

				<?php echo apply_filters( 'the_content', $post->post_content ); ?>

			</div>
			<!-- #pageContent -->

			<!-- fbComments -->
			<div class="fbComments mtop20">	

				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>				

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