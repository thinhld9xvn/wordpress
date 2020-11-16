<?php
	get_header();

	$post_type = get_query_var('post_type');
    $post_type_obj = get_post_type_object( $post_type );

    $taxonomy = get_object_taxonomies( $post_type, 'objects' ); 
 
    $t_keys = array_keys( $taxonomy );
    $taxonomy_slug = $t_keys[0]; ?>

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
									$terms = get_terms(

								 		array(
									    	'taxonomy' => $taxonomy_slug,
									    	'hide_empty' => false,
									    	'orderby' => 'id',
									    	'order' => 'asc',
									    	'parent' => 0									    	   	
										) 

									); 	

									if ( $terms ) :		

										foreach ( $terms as $t ) :	

											$term_meta = get_option("term_{$t->term_id}");
											$avatar_url = $term_meta['term-field-term-product-avatar'];

											$attachment_id = pn_get_attachment_id_from_url( $avatar_url ); ?>

											<!-- news -->
											<div class="news product zoom-item item-layout col-md-4 col-sm-6 col-xs-6">

												<!-- thumb -->
												<div class="thumb ohidden tcenter">

													<a href="<?php echo get_term_link( $t ); ?>">

														<?php echo wp_get_attachment_image( $attachment_id, 
															 'feature-image-product-three-columns',
															 false,
															 array(
															 	'class' => 'fixed-vertical'
															 ) 
														 ); ?>

													</a>

												</div>
												<!-- #thumb -->

												<div class="title tcenter mtop10">

													<a class="default block uppercase" href="<?php echo get_term_link( $t ); ?>" data-originalContent="<?php echo short_text( $t->name, 50 ); ?>">
														<?php echo short_text( $t->name, 50 ); ?>
													</a>

												</div>							

											</div>
											<!-- #news -->			


						<?php			endforeach;									

									endif; ?>

							</div>
							<!-- #three-columns-layout -->

						</div>
						<!-- #boxListWrap -->									

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