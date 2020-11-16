<?php 
	global $post; 

	$post_type = get_query_var('post_type');

	$post_type_obj = get_post_type_object( $post_type ); 

	$taxonomy = get_the_taxonomies( $post->ID );

 	$taxonomy_keys = array_keys( $taxonomy );

  	$taxonomy = $taxonomy_keys[ sizeof( $taxonomy_keys ) - 1 ];

  	$term = get_the_terms( $post->ID, $taxonomy );

  	$term = $term[0]; 

  	$order_contact_option = get_option( 'section-orderContact_option_name' );

  	$order_phone = $order_contact_option['orderContact-phone-id'];
  	$order_email = $order_contact_option['orderContact-email-id'];

  	$price = get_post_meta( $post->ID, '_pt-field-sp-price', true );
  	$desc = get_post_meta( $post->ID, '_pt-field-sp-desc', true ); 

  	$opcode = get_post_meta( $post->ID, '_pt-field-sp-opcode', true );   	

  	$ostatus = get_post_meta( $post->ID, '_pt-field-sp-advanced-options', true );

  	$galleries = get_post_meta( $post->ID , '_pt-field-sp-galleries', true); 

  	$_price = ! empty( $price ) && $price !== '0' ? number_format( $price, 0, ',', '.' ) : '';
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

	<!-- pageSection -->
	<div class="pageSection padtb20">

		<!-- container -->
		<div class="container">					

			<!-- productsHeading -->
			<div class="productsHeading ohidden">

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
											$attachment_tag = wp_get_attachment_image( $attachment_id, 'feature-image-product-lightgallery-large-thumbnail', false, array('class' => 'fixed-vertical') ); ?>

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
												$attachment_tag = wp_get_attachment_image( $attachment_id, 'feature-image-product-lightgallery-small-thumbnail', false, array('class' => 'fixed-vertical') ); ?>

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

					<!-- headingProductTitle -->
					<h2 class="headingProductTitle">

						<span class="fa fa-car"></span>
						<span class="caption">
							<?php echo $post->post_title; ?>
						</span>

					</h2>
					<!-- #headingProductTitle -->

					<!-- crpanelContent -->
					<div class="crpanelContent mtop20">

						<!-- opcode -->
						<div class="opcode">

							Mã sản phẩm: <strong><?php echo $opcode; ?></strong>
							
						</div>
						<!-- #opcode -->

						<!-- ostatus -->
						<div class="ostatus mtop20">

							Tình trạng sản phẩm: 
							<strong>
								<?= false === strpos( $ostatus, 'out-of-stock' ) ? 'Còn hàng' : 'Hết hàng' ?>
							</strong>
							
						</div>
						<!-- #ostatus -->

						<!-- oprice -->
						<div class="oprice mtop20">

							Giá tiền: <strong><?php echo $price; ?></strong>
							
						</div>
						<!-- #oprice -->

						<!-- oquantity -->
						<div class="oquantity mtop20">

							Số lượng:

							<input type="number"
								   id="txtQty"
							       class="inlineblock form-control"
							       style="width: 70px"
								   min="1"
								   step="1"
								   value="1" />

							<a class="orderButton btn btn-success"
							   href="#"									   
							   modal-type="master-modal"
							   modal-target="#modalOrderForm"
							   data-sp-price="<?php echo $_price ?>"
							   data-sp-opcode="<?php echo $opcode ?>">
							   Đặt hàng
							</a>
							
						</div>
						<!-- #oquantity -->

						<!-- orderContact -->
						<div class="orderContact ohidden mtop40">

							<!-- phone -->
							<div class="phone col-md-6 col-sm-6 col-xs-12">

								<span class="fa fa-phone"></span>
								<span class="padleft10">
									<?php echo $order_phone; ?>
								</span>
								
							</div>
							<!-- #phone -->

							<!-- email -->
							<div class="email col-md-6 col-sm-6 col-xs-12 padleft20-ms mtop20-xs">

								<span class="fa fa-envelope"></span>
								<span class="padleft10">
									<?php echo $order_email; ?>
								</span>
								
							</div>
							<!-- #email -->
							
						</div>
						<!-- #orderContact -->

					</div>
					<!-- #crpanelContent -->
					
				</div>
				<!-- #cright -->
									
			</div>
			<!-- #productsHeading -->

			<div class="mtop20"
				 data-navig="tabsList" 
				 data-tlist=".singleTabHeading" 
				 data-tcontent=".singleTabContent">

				<!-- singleTabBox-cn-wrapper -->
				<div class="singleTabBox-cn-wrapper">

					<!-- singleTabHeading -->
					<ul id="singleProductsTabBox" 
						class="singleTabHeading bxslider"
						data-bxslider-mode="carousel"
						data-bxslider-slidesShow="4"
						data-bxslider-margin="10"
						data-bxslider-pause="10000"
						data-bxslider-infiniteLoop="false"
						data-bxslider-hideControlOnEnd="true"
						data-bxslider-auto="false">

					    <li class="slides" data-target="#singlePTDesc">

					    	<span></span>

					    	<a href="#">
					    		Mô tả chi tiết
					    	</a>

					    </li>

					    <li class="slides" data-target="#singlePTRelated">

					    	<span></span>

					    	<a href="#">
					    		Sản phẩm liên quan
					    	</a>

					    </li>

					     <li class="slides" data-target="#singlePTComments">

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
				<div class="singleTabContent mtop10">

					<!-- singlePTDesc -->
					<div id="singlePTDesc" class="defFormat fixed-object">

						<?php echo apply_filters('the_content', $desc); ?>
						
						
					</div>
					<!-- #singlePTDesc -->								

					<!-- singlePTRelated -->
					<div id="singlePTRelated">

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
						         'paged' => $paged

						    ); 

						    query_posts( $args ); 

						    if ( have_posts() ) : ?>

								<!-- productsSection -->
								<div class="categorySection home-products-box">

									<!-- four-columns-layout -->
									<div class="split-columns four-columns-layout"
										 data-navig="compactcontent" 
										 data-multiple="false" 
										 data-object=".product" 
										 data-setcompact=".title > a" 
										 data-numCharOnIpad="40" 
										 data-numCharOnMobile="30" 
										 data-endShortContent="..." 
										 data-delimiter-css-property="clear" 
										 data-delimiter-css-value="both">

										<?php while ( have_posts() ) : the_post(); 

											$price = get_post_meta( get_the_id(), '_pt-field-sp-price', true );
											$opcode = get_post_meta( get_the_id(), '_pt-field-sp-opcode', true );

											$_price = ! empty( $price ) && '0' !== $price ? number_format( $price, 0, ',', '.') : '';
											$price = ! empty( $price ) && '0' !== $price ? number_format( $price, 0, ',', '.') . ' VNĐ' : 'Liên hệ'; ?>

											<!-- product -->
											<div class="item-layout product col-md-3 col-sm-6 col-xs-12">

												<!-- thumbnail -->
												<div class="thumbnail">

													<a href="<?php the_permalink(); ?>">

														<?php 
															the_post_thumbnail( 'feature-image-product-thumbnail', array('class' => 'fixed-vertical') ); ?>
														
													</a>

													<!-- price -->
													<div class="price">

														<?php echo $price; ?>

													</div>
													<!-- #price -->

													<!-- inside -->
													<div class="inside flex">

														<!-- inside-wrap -->
														<div class="inside-wrap tcenter">

															<!-- orderButton -->
															<a class="addToCart orderButton" 
															   href="#"
															   modal-type="master-modal"
												   			   modal-target="#modalOrderForm"
												   			   data-sp-opcode="<?php echo $opcode; ?>"
												   			   data-sp-price="<?php echo $_price; ?>">

																<span class="fa fa-plus"></span>
																<span class="padleft10">Mua hàng</span>

															</a>
															<!-- #orderButton -->

														</div>
														<!-- #inside-wrap -->
														
													</div>
													<!-- #inside -->
													
												</div>
												<!-- #thumbnail -->

												<!-- title -->
												<h4 class="title">

													<a href="<?php the_permalink(); ?>"
													   class="block"
													   data-originalContent="<?php echo title(100) ?>">
														
														<?php echo title(100) ?>

													</a>

												</h4>
												<!-- #title -->
												
											</div>
											<!-- #product -->

										<?php endwhile; ?>

									</div>
									<!-- #four-columns-layout -->

								</div>
								<!-- #productsSection -->

					  <?php endif;
					  		wp_reset_query(); ?>
						
					</div>
					<!-- #singlePTRelated -->

					<!-- singlePTComments -->
					<div id="singlePTComments" class="fbComments">						

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
	<!-- #pageSection -->

</section>
<!-- #main -->