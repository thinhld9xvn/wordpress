<?php echo $before_widget; ?>

	<!-- home-cat-carousel -->
	<div class="fullwidth-section home-cat-carousel mtop20">

		<div class="container">

			<div class="home-carousel-wrapper">	

				<h3 class="headingCarouselTitle">
					<?php echo $title; ?>
				</h3>

				<!-- carouselContent -->
				<div class="carouselContent mtop20">

					<div class="bxslider-cn-wrapper maunhadep-cn-wrapper">

						<div id="maunhadep-Carousel" class="bxslider" data-bxslider-mode="carousel" data-bxslider-numSlidesShow="4" data-bxslider-moveSlides="1">

							<?php 
								$args = array(

									'post_type' => 'post',
									'category__in' => $cat_id,
									'posts_per_page' => $num_items,
									'no_paging' => true,
									'order' => 'desc',
									'orderby' => 'date'

								);

								query_posts( $args );

								if ( have_posts() ) :

									while ( have_posts() ) : the_post(); ?>

										<div class="slide">

											<div class="thumbnail">

												<a href="<?php the_permalink(); ?>">
													<?php the_post_thumbnail( 'feature-image-news-carousel', array('class' => 'fixed-vertical') ); ?>
												</a>

											</div>

											<h4 class="title mtop10">

												<a href="<?php the_permalink(); ?>">
													<?php echo title(50); ?>
												</a>
												
											</h4>

											<div class="desc mtop10">
												<?php echo excerpt(100); ?>
											</div>

											<h3 class="readmore mtop10">

												<a href="<?php the_permalink(); ?>">
													Xem chi tiết
												</a>
												
											</h3>

										</div>	

							<?php 	endwhile;
									wp_reset_query();

								endif; ?>										
							
						</div>
						
					</div>
					
				</div>
				<!-- #carouselContent -->

			</div>
			
		</div>
		
	</div>
	<!-- #home-cat-carousel -->

<?php echo $after_widget; ?>