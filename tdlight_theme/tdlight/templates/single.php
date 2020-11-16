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

			<!-- relatedBox -->
			<div class="relatedBox homeServiceCarouselBxSlider padtb20">								

				<!-- headingProductTitle -->
				<h2 class="headingProductTitle">

					<span class="fa fa-file"></span>
					<span class="caption">
						Bài viết liên quan
					</span>

				</h2>
				<!-- #headingProductTitle -->

				<?php

					$args = array(

				         'post_type' => 'post',
				         'category__in' => $cat->term_id,
				         'post__not_in' => array( $post->ID ),
				         'order' => 'desc',
				         'orderby' => 'date'

				    ); 

				    query_posts( $args );

					if ( have_posts() ) : ?>

						<!-- categoryContainer -->
						<div class="categoryContainer mtop20">

							<!-- four-columns-layout -->
							<div class="split-columns four-columns-layout"
								 data-navig="compactcontent"
								 data-multiple="true"
								 data-object=".service" 
								 data-setcompact=".title > a, .excerpt" 
								 data-numCharOnIpad="40, 40" 
								 data-numCharOnMobile="30, 30" 
								 data-endShortContent="[...], ..." 
								 data-delimiter-css-property="clear" 
								 data-delimiter-css-value="both">

								<?php while ( have_posts() ) : the_post(); ?>

									<!-- service -->
									<div class="item-layout service col-md-3 col-sm-6 col-xs-12">

										<!-- thumbnail -->
										<div class="thumbnail">

											<a href="<?php the_permalink(); ?>">

												<?php the_post_thumbnail( 'feature-image-article-carousel-thumbnail', array('class' => 'fixed-vertical') ); ?>

											</a>
											
										</div>
										<!-- #thumbnail -->

										<!-- title -->
										<h4 class="title mtop10">

											<a href="<?php the_permalink(); ?>"
											   class="block"
											   data-originalContent="<?php echo title(100); ?>">
												<?php echo title(100); ?>
											</a>

										</h4>
										<!-- #title -->

										<!-- excerpt -->
										<div class="excerpt mtop10"
										     data-originalContent="<?php echo excerpt(200); ?>">

											<?php echo excerpt(200); ?>
											
										</div>
										<!-- #excerpt -->

										<!-- readmore -->
										<div class="readmore mtop10">

											<a href="<?php the_permalink(); ?>">
												Đọc tiếp
											</a>
											
										</div>
										<!-- #readmore -->
										
									</div>
									<!-- #service -->

								<?php endwhile; ?>
								
							</div>
							<!-- #four-columns-layout -->

						</div>
						<!-- #categoryContainer -->

						<?php the_page_navigation(); ?>

				<?php endif; 
					 wp_reset_query(); ?>
				
			</div>
			<!-- #relatedBox -->
			
		</div>
		<!-- #container -->
		
	</div>
	<!-- #pageSection -->

</section>
<!-- #main -->