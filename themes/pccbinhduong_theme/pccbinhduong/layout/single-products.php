<?php 
	global $post;
	$sp_giatien = get_post_meta($post->ID, '_pt-field-san-pham-price', true);
	$sp_opcode = get_post_meta($post->ID, '_pt-field-san-pham-opcode', true);
	$sp_hangsx = get_post_meta($post->ID, '_pt-field-san-pham-hangsx', true);
	$sp_gallery = get_post_meta($post->ID, '_pt-field-san-pham-gallery', true);
 
	$thumb_id = get_post_thumbnail_id();
	$thumb = wp_get_attachment_image_src( $thumb_id, 'full' );
	$thumb = $thumb[0];
	$thumb_tilte = get_the_title( $thumb_id ); ?>

	<!-- articlesBoxLayout -->
	<div class="articlesBoxLayout articleSingleProduct ohidden mtop20">

		<!-- two-columns-layout -->
		<div class="split-columns two-columns-layout">

			<div class="item-layout col-md-3 col-sm-3 col-xs-12">

				<?php dynamic_sidebar('ColLeft Products Sidebar') ?>

			</div>

			<!-- col-right -->
			<div class="col-right item-layout boxColumnHBorder --left --top pad20-ms col-md-9 col-sm-9 col-xs-12 pull-right">						

				<!-- boxProductDetails -->
				<div class="boxProductDetails col-xs-12">

					<!-- pthumb -->
					<div class="pthumb p_relative padleft40 col-md-5 col-sm-5 col-xs-12">

						<!-- thumb -->
						<div class="thumb">
							<img src="<?php echo $thumb; ?>" alt="thumb_tilte" />
						</div>
						<!-- #thumb -->

						<!-- sale -->
						<div class="sale --pdetails">
							Sale
						</div>
						<!-- #sale -->

						<!-- zoom -->
						<div class="zoom singleGallery allGalleryObjects mtop20">

							<!-- zoom-sp -->
							<a class="lightgallery-thumbnail zoom-sp" href="#">
								Xem ảnh lớn
							</a>
							<!-- zoom-sp -->

							<!-- zoom-sp-content -->
							<div class="lightgallery galleryObjects zoom-sp-content">

								<?php foreach ( $sp_gallery as $gallery ) : 

										$id = pn_get_attachment_id_from_url( $gallery ); 
										$gallery_title = get_the_title( $id ); ?>

										<a href="<?php echo $gallery ?>">
											<img src="<?php echo $gallery ?>" alt="<?php echo $gallery_title; ?>" />
										</a>	
									
								<?php endforeach; ?>																		

							</div>
							<!-- #zoom-sp-content -->

						</div>
						<!-- #zoom -->

					</div>
					<!-- #pthumb -->

					<!-- pcontent -->
					<div class="pcontent padleft20-ms mtop20-xs col-md-7 col-sm-7 col-xs-12">

						<h3 class="bold uppercase padtb5 boxColumnHBorder --bottom"><?php the_title(); ?></h3>

						<div class="price mtop10">
							<strong>Giá tiền:</strong> 

							<?= ! empty( $sp_giatien ) && '0' !== $sp_giatien
								? 
								number_format( $sp_giatien, 0, ',', '.' ) . ' VNĐ'
								:
								'Liên hệ' ?>

						</div>

						<div class="opcode mtop40">
							<strong>Mã sản phẩm:</strong>

							<?= ! empty( $sp_opcode )
								? 
								$sp_opcode
								:
								'Đang cập nhật' ?>

						</div>

						<!-- manufacter -->
						<div class="manufacter mtop20">
							<strong>Xuất xứ:</strong> 
							<?= ! empty( $sp_hangsx )
								? 
								$sp_hangsx
								:
								'Đang cập nhật' ?>
						</div>
						<!-- #manufacter -->

						<!-- order -->
						<div class="order mtop20">

							<!-- quantity -->
							<div class="quantity">
								<strong>Số lượng:</strong>
								<input style="width: 60px" id="quantity" class="form-control inlineblock" type="number" min="1" value="1" />
							</div>
							<!-- #quantity -->

							<!-- requestOrder -->
							<div class="requestOrder mtop10">

								<input id="requestOrder" 								
									   type="button" 
									   class="btn btn-success" 
									   data-pname="<?php the_title() ?>"
									   data-popcode="<?php echo $sp_hangsx ?>"
									   value="Đặt hàng" />

							</div>
							<!-- #requestOrder -->

						</div>
						<!-- #order -->


					</div>
					<!-- #pcontent -->

					<div class="clearfix"></div>

					<!-- pdetails -->
					<div class="pdetails mtop20">

						<h4 class="pboxtitle bold">Chi tiết sản phẩm</h4>

						<!-- specification -->
						<div class="specification mtop20">

							<?php echo apply_filters( 'the_content', $post->post_content ); ?>

						</div>
						<!-- #specification -->
						
					</div>
					<!-- #pdetails -->

					<!-- related-prod -->
					<div class="related-prod boxCatProduct mtop40">

						<h4 class="bold">Sản phẩm liên quan</h4>

						<!-- related-content -->
						<div class="related-content mtop20">

							<!-- four-columns-layout -->
							<div class="split-columns four-columns-layout" data-navig="compactcontent" data-multiple="false" data-object=".product" data-setcompact=".title > a" data-numCharOnIpad="100" data-numCharOnMobile="30" data-endShortContent="..." data-delimiter-css-property="clear" data-delimiter-css-value="both">

								<?php 
									$args = array(
										'post_type' => 'post',
										'category__in' => $cat_id,
										'post__not_in' => array( $post->ID ),
										'order' => 'desc',
										'orderby' => 'date',
										'posts_per_page' => 4
									); 
									query_posts( $args ); 

									if ( have_posts() ) :

										while ( have_posts() ) : the_post(); ?>

											<!-- product -->
											<div class="product item-layout col-md-3 col-sm-6 col-xs-6">

												<!-- thumb -->
												<div class="thumb p_relative">

													<a href="<?php the_permalink(); ?>">
														<?php the_post_thumbnail( 'theme-feature-image-carousel-news' ); ?>
													</a>	

													<!-- sale -->
													<div class="sale">
														Sale
													</div>
													<!-- #sale -->

												</div>
												<!-- #thumb -->

												<!-- title -->
												<div class="title mtop10">

													<a class="block" data-originalContent="<?php echo title(50); ?>" href="<?php the_permalink(); ?>">
														<?php echo title(50); ?>
													</a>

												</div>
												<!-- #title -->

												<!-- details -->
												<div class="details mtop10 pull-right">

													<a href="<?php the_permalink(); ?>">Chi tiết</a>
													
												</div>
												<!-- #details -->

											</div>
											<!-- #product -->	

								<?php   endwhile; 
										wp_reset_query(); 

									else : ?>

										<div class="catempty col-xs-12 tcenter">
											<strong>Không có sản phẩm nào trong mục này</strong>
										</div>

							<?php	endif;?>

							</div>
							<!-- #four-columns-layout -->

						</div>
						<!-- #related-content -->

					</div>
					<!-- #related-prod -->
					
				</div>
				<!-- #boxProductDetails -->

			</div>
			<!-- #col-right -->

		</div>
		<!-- #two-columns-layout -->

	</div>
	<!-- #articlesBoxLayout -->

	<!-- orderFormModal-->
	<div id="orderFormModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Yêu cầu đặt hàng</h4>
	      </div>
	      <div class="modal-body">

	      	<?php echo do_shortcode( '[pvcf_contactform id="246"]' ); ?>
	        
	      </div>
	     
	    </div>

	  </div>
	</div>
	<!-- #orderFormModal -->