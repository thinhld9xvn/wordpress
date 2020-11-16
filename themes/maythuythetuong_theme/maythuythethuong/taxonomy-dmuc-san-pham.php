<?php get_header(); 
	
	$taxonomy_slug = get_query_var('taxonomy');
    $taxonomy = get_taxonomy( $taxonomy_slug );

    $term = get_term_by( 'slug', get_query_var('term'), $taxonomy_slug );

    $post_type = $taxonomy->object_type[0];    
    $post_type_obj = get_post_type_object( $post_type ); ?>

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
							<?php echo $post_type_obj->label ?>
						</h2>

						<!-- widgBoxContent -->
						<div class="widgBoxContent">

							<ul class="pboxlist -news">

								<?php 

									$terms = get_terms(

								 		array(

									    	'taxonomy' => $taxonomy_slug,
									    	'hide_empty' => false,
									    	'orderby' => 'id',
									    	'order' => 'asc',
									    	'parent' => 0,
									    	'number' => 10
										) 

									); 	

									if ( $terms ) :		

										foreach ( $terms as $t ) :  ?>

										    <li>

										    	<a class="default" 
										    	   href="<?php echo get_term_link( $t ) ?>">
										    		<?php echo $t->name; ?>
										    	</a>

										    </li>

								<?php 
										endforeach; 

									else :

										$args = array(

											'post_type' => $post_type,
											'posts_per_page' => 10,
											'nopaging' => true,
											'orderby' => 'date',
											'order' => 'desc',
											'tax_query' => array(
													array(
														'taxonomy' => $taxonomy_slug,
														'field' => 'slug',
														'terms' => array( $term->slug ) 
													)
												)
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
										'post_type' => $post_type,
										'orderby' => 'date',
										'order' => 'desc',
										'tax_query' => array(

											array(
												'taxonomy' => $taxonomy_slug,
												'field' => 'slug',
												'terms' => array( $term->slug ) 
											)

										),
										'paged' => $paged
									);

									query_posts( $args );

									if ( have_posts() ) :

										while ( have_posts() ) : the_post(); 

											$opcode = get_post_meta( get_the_id(), '_pt-field-san-pham-opcode', true );	?>

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

												<div class="popcode tcenter mtop10">										
													<span class="clightgray">Mã sản phẩm:</span> 
													<span class="cprimary"><?php echo $opcode; ?></span>	

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