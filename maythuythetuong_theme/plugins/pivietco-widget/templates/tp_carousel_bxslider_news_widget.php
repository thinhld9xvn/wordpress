<!-- home-catnews -->
<div class="home-catnews zoom-box padtb40-ms padtb20-xs">

	<!-- container -->
	<div class="container">

		<h2 class="headCatNews">
			<?php echo $title; ?>
		</h2>

		<!-- bxslider-cn-wrapper -->
		<div class="bxslider-cn-wrapper -hidecontrols mtop20">

			<!-- bxslider-home-catnews -->
			<div id="bxslider-home-catnews" class="bxslider bxslider-home-catnews --carousel" data-navig="compactcontent" data-multiple="true" data-object=".slide" data-setcompact=".title > a, .excerpt" data-numcharonipad="40, 100" data-numcharonmobile="30, 40" data-endshortcontent="..., [...]" data-delimiter-css-property="clear" data-delimiter-css-value="both">

				<?php 
					$args = array(
						'post_type' => 'post',
						'category__in' => $cat_id,
						'order' => 'desc',
						'orderby' => 'date',
						'nopaging' => true,
						'posts_per_page' => $num_post
					);

					query_posts( $args ); 

					if ( have_posts() ) :

						while ( have_posts() ) : the_post(); ?>

							<!-- slide -->
							<div class="slide zoom-item">

								<!-- thumb -->
								<div class="thumb -responsive tcenter ohidden">

									<a href="<?php the_permalink(); ?>">
										<?php 
											the_post_thumbnail( 'feature-image-carousel-news',
																array(
																	'class' => 'inline fixed-vertical'
																) 
															  ); ?>
										
									</a>

								</div>		
								<!-- #thumb -->	

								<!-- title -->
								<div class="title tcenter mtop10">

									<a class="default block bold" 
									   href="<?php the_permalink(); ?>" 
									   data-original="<?php echo title(50); ?>">		
										<?php echo title(50); ?>
									</a>

								</div>		
								<!-- #title -->	

								<!-- excerpt -->
								<div class="excerpt tcenter mtop10" 
									 data-original="<?php echo excerpt(100); ?>">
									<?php echo excerpt(100); ?>
								</div>		
								<!-- #excerpt -->	

								<!-- readmore -->
								<div class="readmore mtop10">

									<a class="mybutton readmore vcenter" 
									   href="<?php the_permalink(); ?>">
										Xem chi tiết 
										<span class="dash">|</span>
										<span class="icon fa fa-play"></span>
									</a>

								</div>		
								<!-- #readmore -->			

							</div>
							<!-- #slide -->

			<?php 		endwhile; 
						wp_reset_query();

					endif; ?>	

			</div>
			<!-- #bxslider-home-catnews -->

			<!-- bxslider-custom-controls -->
			<div class="bxslider-custom-controls">

				<a class="bx-next" href="#"></a>
				<a class="bx-prev" href="#"></a>

			</div>
			<!-- #bxslider-custom-controls -->

		</div>
		<!-- #bxslider-cn-wrapper -->

	</div>
	<!-- #container -->

</div>
<!-- #home-catnews -->		