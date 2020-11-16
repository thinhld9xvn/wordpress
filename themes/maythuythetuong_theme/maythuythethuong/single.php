<?php get_header(); 

	global $post;
	
	$categories = get_the_category();
	$parent_cat = $categories[0];

	while ( $parent_cat->parent > 0 ): 

		$parent_cat = get_category( $parent_cat->parent ); 

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
							<?php echo $parent_cat->name; ?>
						</h2>

						<!-- widgBoxContent -->
						<div class="widgBoxContent">

							<ul class="pboxlist -news">

								<?php 

									$args = array(										
										'child_of' => $parent_cat->term_id,
										'parent' => 0,
										'order' => 'desc',
										'orderby' => 'date',
										'hide_empty' => false
									);

									$categories = get_categories( $args ); 

									if ( $categories ) : 

										foreach( $categories as $c ) : ?>

										    <li>

										    	<a class="default" 
										    	   href="<?php echo get_category_link( $c ) ?>">
										    		<?php echo $c->name; ?>
										    	</a>

										    </li>

								<?php 
										endforeach; 

									else :

										$args = array(

											'post_type' => 'post',
											'category__in' => $parent_cat->term_id,
											'posts_per_page' => 10,
											'nopaging' => true,
											'orderby' => 'date',
											'order' => 'desc'
										);

										query_posts( $args );

										if ( have_posts() ) :

											while ( have_posts() ) : the_post(); ?>

												<li>

											    	<a class="default" 
											    	   href="<?php the_permalink(); ?>">
											    		<?php echo title(50); ?>
											    	</a>

										    	</li>

								<?php		endwhile;

											wp_reset_query();

										endif;

									endif; ?>
							     								    
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

					<!-- postRelatedCat -->			
					<div class="postRelatedCat mtop40-ms mtop20-xs">

						<h3 class="cprimary uppercase bold">
							Bài viết liên quan
						</h3>

						<!-- postRelatedContent -->
						<div class="productRelatedContent zoom-box productCategoryList mtop20">

							<!-- three-columns-layout -->
							<div class="split-columns three-columns-layout"
								 data-navig="compactcontent" data-multiple="false" data-object=".news" data-setcompact=".title > a" data-numcharonipad="40" data-numcharonmobile="30" data-endshortcontent="..." data-delimiter-css-property="clear" data-delimiter-css-value="both">

								<?php 
									$args = array(
										'post_type' => 'post',
										'category__in' => $parent_cat->term_id,
										'post__not_in' => array( $post->ID ),
										'posts_per_page' => 9,
										'nopaging' => true,
										'orderby' => 'date',
										'order' => 'desc'
									);

									query_posts( $args );

									if ( have_posts() ) :

										while ( have_posts() ) : the_post(); ?>

											<!-- news -->
											<div class="news zoom-item product item-layout col-md-4 col-sm-6 col-xs-6">

												<!-- thumb -->
												<div class="thumb tcenter ohidden">

													<a href="<?php the_permalink(); ?>">
														<?php 
															the_post_thumbnail( 'feature-image-product-three-columns',
																				array(
																					'class' => 'fixed-vertical'
																				)
																			  );
														?>
													</a>

												</div>
												<!-- #thumb -->

												<div class="title tcenter mtop10">

													<a class="default block uppercase" 
													    href="<?php the_permalink(); ?>" 
													    data-originalContent="<?php echo title(50); ?>">
														<?php echo title(50); ?>
													</a>

												</div>									

											</div>
											<!-- #news -->	

							<?php 		endwhile;
										wp_reset_query(); 

									endif; ?>

							</div>
							<!-- #three-columns-layout -->

						</div>
						<!-- #postRelatedContent -->

					</div>
					<!-- #postRelatedCat -->			

				</div>			
				<!-- #colRight -->	

			</div>
			<!-- #container -->

		</div>
		<!-- #main-columns-wrapper -->
		
	</section>
	<!-- #main -->

<?php get_footer(); ?>