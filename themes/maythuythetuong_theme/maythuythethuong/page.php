<?php get_header(); 

	global $post; 

	$parent = $post;

	while ( $parent->post_parent > 0 ) :

		$parent = get_page( $parent->post_parent );

	endwhile; ?>

	<!-- main -->
	<section id="main">

		<?php 
			dynamic_sidebar( 'Slider Sidebar' ); ?>

		<!-- main-columns-wrapper -->
		<div class="main-columns-wrapper padtb40-ms padtb20-xs">

			<!-- container -->
			<div class="container">

				<!-- colLeft -->
				<div class="colLeft col-md-3 col-sm-3 col-xs-12">

					<!-- widgBox -->
					<div class="widgBox">

						<h2 class="headWidgBoxTitle">
							<span class="fa fa-navicon mright10"></span>
							<?php echo $parent->post_title; ?>
						</h2>

						<!-- widgBoxContent -->
						<div class="widgBoxContent">

							<ul class="pboxlist -news">

								<?php
									$args = array(
										'post_type' => 'page',
										'child_of' => $post->ID,
										'hierarchical' => 0,
										'parent' => $post->ID,
										'sort_order' => 'asc',
										'sort_column' => 'post_date',
										'number' => 10
									);

									$child_pages = get_pages( $args );

									foreach ( $child_pages as $c_page ) : ?>

										<li>

									    	<a class="default" 
									    	   href="<?php echo get_page_link( $c_page ) ?>">
									    		<?php echo $c_page->post_title; ?>
									    	</a>

									    </li>

						<?php		endforeach; ?>
							     								    
							</ul>

						</div>
						<!-- #widgBoxContent -->

					</div>
					<!-- #widgBox -->

				</div>
				<!-- #colLeft -->

				<!-- colRight -->
				<div class="colRight padleft20-ms mtop20-xs col-md-9 col-sm-9 col-xs-12">

					<?php the_breadcrumbs('breadcumbs', 'breadcumbs', 'Trang chủ', '<span class="fa fa-chevron-right"></span>') ?>					

					<!-- postContentWrap -->
					<div class="postContentWrap mtop20">	

						<h3 class="title bold"><?php echo $post->post_title; ?></h3>

						<div class="content mtop20">

							<?php echo apply_filters( 'the_content', $post->post_content ); ?>

						</div>				

					</div>		
					<!-- #postContentWrap -->							

				</div>			
				<!-- #colRight -->	

			</div>
			<!-- #container -->

		</div>
		<!-- #main-columns-wrapper -->
		
	</section>
	<!-- #main -->

<?php get_footer(); ?>