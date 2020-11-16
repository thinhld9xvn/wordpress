<?php get_header(); 
	
	$category = get_category( get_query_var('cat') ); ?>

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
							<?php echo $category->name ?>
						</h2>

						<!-- widgBoxContent -->
						<div class="widgBoxContent">

							<ul class="pboxlist -news">

								<?php 

									$args = array(										
										'child_of' => $category->term_id,
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
											'category__in' => $category->term_id,
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

					<!-- newsCategoryList -->
					<div class="newsCategoryList productCategoryList zoom-box mtop20">

						<!-- boxListWrap -->
						<div class="boxListWrap ohidden">

							<!-- three-columns-layout -->
							<div class="split-columns three-columns-layout" 
								data-navig="compactcontent" data-multiple="false" data-object=".news" data-setcompact=".title > a" data-numcharonipad="40" data-numcharonmobile="30" data-endshortcontent="..." data-delimiter-css-property="clear" data-delimiter-css-value="both">

								<?php 
									$args = array(
										'post_type' => 'post',
										'category__in' => $category->term_id,
										'orderby' => 'date',
										'order' => 'desc',
										'paged' => $paged
									);

									query_posts( $args );

									if ( have_posts() ) :

										while ( have_posts() ) : the_post(); ?>

											<!-- news -->
											<div class="news product zoom-item item-layout col-md-4 col-sm-6 col-xs-6">

												<!-- thumb -->
												<div class="thumb ohidden tcenter">

													<a href="<?php the_permalink(); ?>">

														<?php the_post_thumbnail( 'feature-image-product-three-columns' ); ?>

													</a>

												</div>
												<!-- #thumb -->

												<div class="title tcenter mtop10">

													<a class="default block uppercase" href="<?php the_permalink(); ?>" data-originalContent="<?php echo title(50); ?>">
														<?php echo title(50); ?>
													</a>

												</div>

											</div>
											<!-- #news -->			


						<?php			endwhile;									

									endif; ?>

							</div>
							<!-- #three-columns-layout -->

						</div>
						<!-- #boxListWrap -->

					<?php the_page_navigation( 'mtop20' );
						  wp_reset_query(); ?>						

					</div>
					<!-- #newsCategoryList -->

				</div>			
				<!-- #colRight -->	

			</div>
			<!-- #container -->

		</div>
		<!-- #main-columns-wrapper -->
		
	</section>
	<!-- #main -->

<?php get_footer(); ?>