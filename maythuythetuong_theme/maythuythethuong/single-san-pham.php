<?php get_header(); 

	global $post;

	$post_type = get_query_var('post_type');
    $post_type_obj = get_post_type_object( $post_type );

    $taxonomy = get_object_taxonomies( $post_type, 'objects' );

    $t_keys = array_keys( $taxonomy );
    $taxonomy_slug = $t_keys[0];

    $terms = get_the_terms( $post->ID, $taxonomy_slug );
    $term = $terms[0];  

	$gia_sp = get_post_meta( $post->ID, '_pt-field-san-pham-giatien', true ); 
	$gia_sp = ! empty( $gia_sp ) && '0' !== $gia_sp ? $gia_sp : 'Liên hệ';

	$tt_sp = get_post_meta( $post->ID, '_pt-field-san-pham-tt', true );	  

	$opcode_sp = get_post_meta( $post->ID, '_pt-field-san-pham-opcode', true );
	$opcode_sp = ! empty( $opcode_sp ) ? $opcode_sp : 'Đang cập nhật';
   
    $tskt_sp = get_post_meta( $post->ID, '_pt-field-san-pham-tskt', true ); ?>

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

					<!-- productContentWrap -->
						<div class="productContentWrap mtop20">

							<!-- productContentColumns -->
							<div class="productContentColumns ohidden">

								<!-- pthumbnail -->
								<div class="pthumbnail tcenter col-md-6 col-sm-6 col-xs-12">

									<?php echo get_the_post_thumbnail( $post->ID, 'feature-image-product-thumbnail-details');  ?>

								</div>
								<!-- #pthumbnail -->

								<!-- ptskt -->
								<div class="ptskt padleft20-ms mtop20-xs col-md-6 col-sm-6 col-xs-12">

									<!-- ptskt-wrap -->
									<div class="ptskt-wrap vcenter">

										<h3 class="uppercase mtop10">
											<?php the_title(); ?>
										</h3>

										<!-- price -->
										<div class="price mtop20">

											Giá tiền: 
											<span class="cred bold">
												<?php echo $gia_sp; ?>
											</span>

										</div>
										<!-- #price -->

										<!-- popcode -->
										<div class="popcode mtop10">

											<span class="clightgray">
												Mã sản phẩm: 
											</span>

											<span class="cprimary">
												<?php echo $opcode_sp; ?>
											</span>

										</div>
										<!-- #popcode -->

										<!-- pmota -->
										<div class="pmota mtop20">
											<?php echo $tt_sp; ?>
										</div>
										<!-- #pmota -->

										<!-- porder -->
										<div class="porder mtop20">

											<a class="btn btn-primary orderButton"
											   modal-type="master-modal"
	                                           modal-target="#orderFormModal"
	                                           data-pname="<?php echo $post->post_title ?>"
	                                           data-popcode="<?php echo $opcode_sp ?>">

												<span class="fa fa-shopping-basket"></span>
												Đặt hàng

											</a>

										</div>
										<!-- #porder -->

									</div>
									<!-- #ptskt-wrap -->

								</div>
								<!-- #ptskt -->

							</div>
							<!-- #productContentColumns -->

							<!-- productDetails -->
							<div class="productDetails mtop20">

								<h2 class="headingTabTitle">
									<span>Thông số kỹ thuật</span>
								</h2>

								<!-- pDetailsContent -->
								<div class="pDetailsContent pad10">

									<div class="-scrollauto">

										<?php echo $tskt_sp; ?>

									</div>

								</div>
								<!-- #pDetailsContent -->

							</div>
							<!-- #productDetails -->

						</div>		
						<!-- #productContentWrap -->	

					<!-- postRelatedCat -->			
					<div class="postRelatedCat mtop40-ms mtop20-xs">

						<h3 class="cprimary uppercase bold">
							Sản phẩm liên quan
						</h3>

						<!-- postRelatedContent -->
						<div class="productRelatedContent zoom-box productCategoryList mtop20">

							<!-- three-columns-layout -->
							<div class="split-columns three-columns-layout"
								 data-navig="compactcontent" data-multiple="false" data-object=".product" data-setcompact=".title > a" data-numcharonipad="40" data-numcharonmobile="30" data-endshortcontent="..." data-delimiter-css-property="clear" data-delimiter-css-value="both">

								<?php 
									$args = array(
										'post_type' => $post_type,
										'post__not_in' => array( $post->ID ),
										'posts_per_page' => 9,
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

										while ( have_posts() ) : the_post(); 

											$_opcode_sp = get_post_meta( get_the_id(), '_pt-field-san-pham-opcode', true ); ?>

											<!-- product -->
											<div class="zoom-item product item-layout col-md-4 col-sm-6 col-xs-6">

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

												<div class="popcode tcenter mtop10">										
													<span class="clightgray">Mã sản phẩm:</span> 
													<span class="cprimary"><?php echo $_opcode_sp; ?></span>	

												</div>									

											</div>
											<!-- #product -->	

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