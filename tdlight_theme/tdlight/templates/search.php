<?php 
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;	

	$s = get_search_query();

    $args = array(

         'post_type' => 'products',
         's' => $s,
         'order' => 'desc',
         'orderby' => 'date',
         'paged' => $paged

    ); 

    query_posts( $args ); ?>

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

	<!-- categorySection -->
	<div class="categorySection padtb20">

		<!-- container -->
		<div class="container">

			<!-- home-products-box -->
			<div class="home-products-box">
				
				<!-- headingProductTitle -->
				<h2 class="headingProductTitle">

					<span class="fa fa-car"></span>
					<span class="caption">
						Từ khóa tìm kiếm : "<?php echo $s; ?>"
					</span>

				</h2>
				<!-- #headingProductTitle -->

				<?php if ( have_posts() ) : ?>

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

					<?php 
						the_page_navigation();

					endif; 
					wp_reset_query(); ?>
				
			</div>
			<!-- #home-products-box -->
			
		</div>
		<!-- #container -->
		
	</div>
	<!-- #categorySection -->

</section>
<!-- #main -->