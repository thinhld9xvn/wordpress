<?php echo $before_widget; ?>

	<!-- home-services-box -->
	<div class="home-services-box mtop40-ms mtop20-xs">

		<!-- container -->
		<div class="container">

			<!-- headingProductTitle -->
			<h2 class="headingProductTitle">

				<span class="fa fa-file"></span>
				<span class="caption"><?php echo $title; ?></span>

			</h2>
			<!-- #headingProductTitle -->

			<?php 

				$args = array(

					'post_type' => 'post',
					'category__in' => $cat_id,
					'order' => 'desc',
					'orderby' => 'date',
					'posts_per_page' => $num_items,
					'no_paging' => true

				);

				query_posts( $args );

				if ( have_posts() ) :  ?>

					<!-- homeServicesBoxContent -->
					<div class="homeServicesBoxContent mtop20">

						<!-- bxslider-cn-wrapper -->
						<div class="homeServiceCarouselBxSlider bxslider-cn-wrapper">

							<!-- homeServiceCarouselBxSlider -->
							<div id="homeServiceCarouselBxSlider"
								 class="bxslider"
								 data-bxslider-mode="carousel"
								 data-bxslider-slidesShow="3"
								 data-bxslider-margin="30"
								 data-bxslider-infiniteLoop="false"
								 data-bxslider-auto="false"
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

									<!-- slides -->
									<div class="slides service">

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
									<!-- #slides -->

								<?php endwhile; ?>
								
							</div>
							<!-- #homeServiceCarouselBxSlider -->
							
						</div>
						<!-- #bxslider-cn-wrapper -->
						
					</div>
					<!-- #homeServicesBoxContent -->

			<?php 
				endif; 
				wp_reset_query(); ?>
			
		</div>
		<!-- #container -->
		
	</div>
	<!-- #home-services-box -->

<?php echo $after_widget; ?>