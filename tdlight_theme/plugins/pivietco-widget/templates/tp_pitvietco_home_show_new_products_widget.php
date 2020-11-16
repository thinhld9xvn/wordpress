<?php echo $before_widget; ?>

	<!-- home-products-box -->
	<div class="home-products-box mtop20">

		<!-- container -->
		<div class="container">

			<h2 class="headingProductTitle">

				<span class="fa fa-car"></span>
				<span class="caption"><?php echo $title; ?></span>

			</h2>

			<?php 

				$args = array(

					'post_type' => 'products',
					'order' => 'desc',
					'orderby' => 'date',
					'posts_per_page' => $num_items,
					'meta_key' => '_pt-field-sp-advanced-options',
					'meta_value' => 'show-on-product-newbox',
					'meta_compare' => 'LIKE',
					'no_paging' => true

				);

				query_posts( $args );

				if ( have_posts() ) : ?>

					<!-- productContainer -->
					<div class="productContainer mtop20">

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
					<!-- #productContainer -->

		  <?php endif; 
		  		wp_reset_query(); ?>

		</div>
		<!-- #container -->

	</div>
	<!-- #home-products-box -->

<?php echo $after_widget; ?>