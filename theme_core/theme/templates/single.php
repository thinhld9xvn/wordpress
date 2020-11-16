<?php 
	global $post; 

	$categories = get_the_category(); 
	$cat = $categories[0]; ?>

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
	<div class="pageSection categorySection">

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

			<!-- relatedProducts -->
			<div class="relatedProducts mtop20">

				<!-- spHeadingTitle -->
				<h2 class="spHeadingTitle">

					<span>Bài viết liên quan</span>

				</h2>
				<!-- #spHeadingTitle -->

				<?php 
					$args = array(

						'post_type' => 'post',
						'category__in' => $cat->term_id,
						'post__not_in' => array( $post->ID ),						
						'posts_per_page' => 4,
						'no_paging' => true
					);

					query_posts( $args );

					if ( have_posts() ) :  ?>

						<!-- relatedProductsContent -->
						<div class="relatedProductsContent mtop20">

							<!-- four-columns-layout -->
							<div class="split-columns four-columns-layout">

								<?php while ( have_posts() ) : the_post(); ?>

									<!-- article -->
									<div class="item-layout article col-md-3 col-sm-6 col-xs-12">

										<!-- thumbnail -->
										<div class="thumbnail">

											<a href="<?php the_permalink(); ?>">

												<?php the_post_thumbnail( 'feature-image-article-thumbnail', array('class' => 'fixed-vertical') ); ?>

											</a>
											
										</div>
										<!-- #thumbnail -->

										<!-- title -->
										<h4 class="title mtop10">

											<a class="block" 
											   href="<?php the_permalink(); ?>"
											   data-originalContent="<?php echo title(100); ?>">

												<?php echo title(100); ?>

											</a>

										</h4>
										<!-- #title -->

										<!-- excerpt -->
										<div class="excerpt mtop10"
											 data-originalContent="<?php echo excerpt(100); ?>">

											 <?php echo excerpt(100); ?>									
											
										</div>
										<!-- #excerpt -->
										
									</div>
									<!-- #article -->

								<?php endwhile; ?>
								
							</div>
							<!-- #four-columns-layout -->

						</div>
						<!-- #relatedProductsContent -->

			  <?php endif; 
			  		wp_reset_query(); ?>
				
			</div>
			<!-- #relatedProducts -->
			
		</div>
		<!-- #container -->
		
	</div>
	<!-- #pageSection -->

</section>
<!-- #main -->