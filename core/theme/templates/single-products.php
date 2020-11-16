<?php 
	global $post; 

	$post_type = get_query_var('post_type');

	$post_type_obj = get_post_type_object( $post_type ); 

	$taxonomy = get_the_taxonomies( $post->ID );

 	$taxonomy_keys = array_keys( $taxonomy );

  	$taxonomy = $taxonomy_keys[ sizeof( $taxonomy_keys ) - 1 ];

  	$term = get_the_terms( $post->ID, $taxonomy );

  	$term = $term[0];   

  	$price = get_post_meta( $post->ID, '_pt-field-sp-price', true );
  	$desc = get_post_meta( $post->ID, '_pt-field-sp-desc', true ); 
  	$details = get_post_meta( $post->ID, '_pt-field-sp-details', true ); 

  	$opcode = get_post_meta( $post->ID, '_pt-field-sp-opcode', true );   	 	

  	$galleries = get_post_meta( $post->ID , '_pt-field-sp-galleries', true); 

  	$_price = ! empty( $price ) && $price !== '0' ? number_format( $price, 0, ',', '.' ) : '';
  	$_cart_price = ! empty( $price ) && '0' !== $price  ? $price : '0';
  	$price = ! empty( $price ) && $price !== '0' ? number_format( $price, 0, ',', '.' ) . ' VNĐ' : 'Liên hệ' ?>

<!-- main -->
<section id="main">	

	<!-- breadcumbs -->
	<div id="breadcumbs">

		<!-- container -->
		<div class="container">

			<?php
				the_breadcrumbs('_breadcumbs', '_breadcumbs', 'Trang chủ', '<span class="divide"></span>'); ?>	

		</div>
		<!-- #container -->

	</div>
	<!-- #breadcumbs -->

	<!-- productsSection -->
	<div class="pageSection productsSection">

		<!-- container -->
		<div class="container">					

			<!-- singleProductsHeading -->
			<div class="singleProductsHeading ohidden">

				<!-- cleft -->
				<div class="cleft col-md-6 col-sm-6 col-xs-12">

					<?php if ( $galleries ) : ?>
					
							<!-- bxslider-cn-wrapper -->
							<div class="bxslider-cn-wrapper">

								<ul id="products-galleries-bxslider" 
									class="bxslider"
									data-bxslider-mode="fade"
									data-bxslider-pagethumb-target="#products-galleries-pagethumb-bxslider">

									<?php foreach ( $galleries as $gallery ) : 

											$attachment_id = pn_get_attachment_id_from_url( $gallery ); 
											$attachment_tag = wp_get_attachment_image( $attachment_id, 'full', false ); ?>

									    <li>
									    	<?php echo $attachment_tag; ?>
									    </li>

									<?php endforeach; ?>

								</ul>

							</div>	
							<!-- #bxslider-cn-wrapper -->						

							<!-- bxslider-cn-wrapper -->
							<div class="bxslider-cn-wrapper productsGalleriesPagethumbBxslider mtop20">

								<div class="container">

									<!-- products-galleries-pagethumb-bxslider -->
									<div id="products-galleries-pagethumb-bxslider" 
										class="bx-pagethumb"								
										data-bxslider-target="#products-galleries-bxslider">

										<?php 
											$count = 0;
											foreach ( $galleries as $gallery ) : 

												$attachment_id = pn_get_attachment_id_from_url( $gallery ); 
												$attachment_tag = wp_get_attachment_image( $attachment_id, 'full', false, array('class' => 'fixed-vertical') ); ?>

												<!-- slider -->
											    <div class="slide pageitem">

											    	<a data-slide-index="<?php echo $count; ?>"
											    	   href="">

											    		<div class="image-wrap">

											    			<?php echo $attachment_tag; ?>

											    		</div>

											    	</a>

											    </div>	
											    <!-- #slider -->

										<?php 
												$count++;
											endforeach; ?>

									</div>	
									<!-- #products-galleries-pagethumb-bxslider -->

								</div>

							</div>		
							<!-- #bxslider-cn-wrapper -->

						<?php endif; ?>
					
				</div>
				<!-- #cleft -->

				<!-- cright -->
				<div class="cright col-md-6 col-sm-6 col-xs-12 padleft40-ms mtop20-xs">
					
					<h3>
						<?php echo $post->post_title; ?>
					</h3>				

					<!-- opcode -->
					<div class="opcode mtop20">

						Mã sản phẩm: <b><?php echo $opcode; ?></b>
						
					</div>
					<!-- #opcode -->

					<!-- price -->
					<div class="price mtop20">

						Giá tiền: <b><?php echo $price; ?></b>
						
					</div>
					<!-- #price -->

					<!-- intro -->
					<div class="intro mtop40-ms mtop20-xs">

						<?php echo $desc; ?>
						
					</div>
					<!-- #intro -->

					<!-- orderBox -->
					<div class="orderBox mtop40-ms mtop20-xs">

						Số lượng: 

						<input type="number"
							   id="txtQty"
							   class="form-control inlineblock"
							   style="width: 75px"
							   min="1"
							   step="1"
							   value="1" />

						<a href="#"
						   class="btn btn-success addToCart addToScButton"
						   modal-type="master-modal"
						   modal-target="#modalOrderForm"
						   data-pid="<?php echo get_the_id() ?>" 
						   data-sp-name="<?php echo get_the_title() ?>" 
						   data-sp-opcode="<?php echo $opcode ?>" 
						   data-sp-price="<?php echo $_cart_price  ?>">
						   Đặt hàng
						</a>
						
					</div>
					<!-- #orderBox -->
					
				</div>
				<!-- #cright -->
									
			</div>
			<!-- #singleProductsHeading -->

			<div class="spMainBox mtop20"
				 data-navig="tabsList" 
				 data-tlist=".singleTabHeading" 
				 data-tcontent=".singleTabContent">

				<!-- singleTabBox-cn-wrapper -->
				<div class="singleTabBox-cn-wrapper">

					<!-- singlePgProductTabs -->
					<ul id="singlePgProductTabs" 
						class="singleTabHeading bxslider"
						data-bxslider-mode="carousel"
						data-bxslider-object="tab"
						data-bxslider-slidesShow="3"
						data-bxslider-margin="0"
						data-bxslider-pause="10000"
						data-bxslider-infiniteLoop="false"
						data-bxslider-auto="false">

					    <li class="slides" 
					    	data-target="#singlePTDesc">

					    	<span></span>

					    	<a href="#">
					    		Chi tiết sản phẩm
					    	</a>

					    </li>

					    <li class="slides" 
					    	data-target="#singlePTRelated">

					    	<span></span>

					    	<a href="#">
					    		Sản phẩm liên quan
					    	</a>

					    </li>

					     <li class="slides" 
					     	 data-target="#singlePTComments">

					    	<span></span>

					    	<a href="#">
					    		Bình luận
					    	</a>

					    </li>

					</ul>
					<!-- #singleTabHeading -->							
					
				</div>
				<!-- #singleTabBox-cn-wrapper -->

				<!-- singleTabContent -->
				<div class="singleTabContent">

					<!-- singlePTDesc -->
					<div id="singlePTDesc" class="defFormat fixed-object">

						<?php echo apply_filters('the_content', $details); ?>
						
						
					</div>
					<!-- #singlePTDesc -->								

					<!-- singlePTRelated -->
					<div id="singlePTRelated"
						 class="sp-hfeatured-box">

						<?php 
							 $args = array(

						         'post_type' => $post_type,
						         'order' => 'desc',
						         'orderby' => 'date',
						         'tax_query' => array(

						         	array(

						         		'taxonomy' => $taxonomy,
						         		'field' => 'id',
						         		'terms' => array( $term->term_id )

						         	)

						         ),  
						         'post__not_in' => array( $post->ID ),
						         'posts_per_page' => 5,
						         'no_paging' => true

						    ); 

						    query_posts( $args ); 

						    if ( have_posts() ) :

						    	while ( have_posts() ) : the_post();

									$opcode = get_post_meta( get_the_id(), '_pt-field-sp-opcode', true );
									$tskt = get_post_meta( get_the_id(), '_pt-field-sp-tskt', true );
									$price = get_post_meta( get_the_id(), '_pt-field-sp-price', true );

									$price = ! empty( $price ) && $price !== '0' ? number_format( $price, 0, ',', '.' ) . ' đ' : 'Liên hệ'; ?>

									<!-- product -->
									<div class="product">

										<!-- thumbnail -->
										<div class="thumbnail">

											<!-- thumbnail-wrap -->
											<div class="thumbnail-wrap ohidden">

												<a href="<?php the_permalink(); ?>">

													<?php 
														the_post_thumbnail('full'); ?>

												</a>

											</div>
											<!-- #thumbnail-wrap -->			

										</div>
										<!-- #thumbnail -->

										<!-- title -->
										<h4 class="title tcenter">

											<a class="block" 
											   href="<?php the_permalink(); ?>"
											   data-originalContent="<?php echo title(100) ?>">
												<?php echo title(100) ?>
											</a>

										</h4>
										<!-- #title -->

										<!-- opcode -->
										<div class="opcode tcenter mtop5">

											Mã sản phẩm: <strong><?php echo $opcode; ?></strong>
											
										</div>
										<!-- #opcode -->

										<!-- price -->
										<div class="price tcenter mtop5">

											Giá tiền: <strong><?php echo $price; ?></strong>
											
										</div>
										<!-- #price -->

										<!-- inside -->
										<div class="inside">

											<?php echo $tskt ?>														

											<p class="mtop20">

												<a class="details" 
												   href="<?php the_permalink(); ?>">

													<span class="fa fa-plus"></span>
													<span class="padleft10">Chi tiết</span>

												</a>

											</p>
											
										</div>
										<!-- #inside -->
										
									</div>
									<!-- #product -->		

					  <?php 
					  			endwhile;

					  		endif;
					  		
					  		wp_reset_query(); ?>
						
					</div>
					<!-- #singlePTRelated -->

					<!-- singlePTComments -->
					<div id="singlePTComments" class="fbComments">

						<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>

						<div class="fb-comments" 
						     data-href="<?php echo get_the_permalink( $post ); ?>" 
						     data-numposts="5">
						</div>
						
					</div>
					<!-- #singlePTComments -->
					
				</div>
				<!-- #singleTabContent -->

			</div>
			
		</div>
		<!-- #container -->
		
	</div>
	<!-- #productsSection -->

</section>
<!-- #main -->