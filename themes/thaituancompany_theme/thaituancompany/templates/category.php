<?php 
	$cat_id = get_query_var('cat');
	$paged = get_query_var('paged') ? absint( get_query_var('paged') ) : 1; ?>

<!-- main -->
<section id="main">	

	<?php 
		dynamic_sidebar( 'Slider Sidebar' ); ?>

	<div id="breadcumbs">

		<div class="container">

			<?php the_breadcrumbs('bread-cumbs', 'bread-cumbs', 'Trang chủ', '<span class="divide"></span>');?>
			
		</div>
		
	</div>	

	<!-- categoryNews -->
	<div class="categoryNews mtop20">

		<!-- container -->
		<div class="container">

			<h2 class="toursCatListHeading -linebottom">
				<?php echo single_cat_title(); ?>
			</h2>

			<!-- categoryBoxContent -->
			<div class="categoryBoxContent ohidden mtop20">

				<div class="split-columns two-columns-layout">

					<?php 
						$args = array(
							'post_type' => 'post',
							'category__in' => $cat_id ,
							'order' => 'desc',
							'orderby' => 'date'
						);

						query_posts( $args );

						if ( have_posts() ) :

							while ( have_posts() ) : the_post(); ?>
				
								<!-- article -->
								<div class="item-layout article col-md-6 col-sm-6 col-xs-6">

									<div class="thumbnail col-md-4 col-sm-4 col-xs-4">

										<?php the_post_thumbnail( 'feature-image-service-thumbnail', array('class' => 'fixed-vertical') ); ?>
										
										
									</div>

									<div class="content col-md-8 col-sm-8 col-xs-8 padleft20">

										<div class="title">

											<a href="<?php the_permalink(); ?>">
												<?php echo title(50); ?>
											</a>
											
										</div>

										<div class="excerpt mtop10">

											<?php echo excerpt(100); ?>
											
										</div>

										<div class="readmore mtop10">

											<a class="btn btn-success" href="<?php the_permalink(); ?>">Đọc tiếp</a>
											
										</div>
										
									</div>
									
								</div>
								<!-- #article -->	

					<?php 	endwhile;
							wp_reset_query();

						else : ?>

							<div class="empty mtop10">
								Không có bài viết nào ở mục này.
							</div>

				  <?php endif; ?>								

				</div>
				
			</div>
			<!-- #categoryBoxContent -->

			<?php the_page_navigation('mtop20'); ?>
			
		</div>
		<!-- #container -->
		
	</div>
	<!-- #categoryNews -->

</section>	
<!-- #main -->