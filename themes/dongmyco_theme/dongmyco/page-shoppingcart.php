<?php 
	/* Template Name: Giỏ hàng */
	global $post;	

	get_header(); ?>
	
	<!-- main -->
	<section id="main">

		<!-- spboxlist -->
		<div class="spboxlist">

			<!-- container -->
			<div class="container">
				
				<!-- home-cblockquote -->
				<div class="home-cblockquote main-columns-layout padtb2per col-xs-12">

				<!-- colleft -->
				<div class="column left bg_white pad5 col-md-3 col-sm-3 col-xs-12">

					<?php dynamic_sidebar('ColLeft Sidebar'); ?>

				</div>
				<!-- #colleft -->

				<!-- colright -->
				<div class="column right bg_white pad15 col-md-8 col-sm-8 col-xs-12 pull-right">
				
					<!-- shoppingcart-pagebox -->
					<div class="shoppingcart-pagebox">

						<h3 class="hg-title --double-border --double-active-border">
							<?php echo $post->post_title; ?>
						</h3>			

						<!-- articleboxcontent -->
						<div class="articleboxcontent mtop20">

							<?php echo apply_filters( 'the_content', $post->post_content ); ?>

						</div>
						<!-- #shoppingcart-pagebox -->

					</div>
					<!-- #aticlepagebox -->		
					
				</div>
				<!-- #colright -->

			</div>
			<!-- #container -->

		</div>
		<!-- #home-cblockquote -->
		
	</section>
	<!-- #main -->

<?php get_footer() ?>