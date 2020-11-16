<?php get_header(); 
	  global $post;	

	  $gia_sp = get_post_meta( $post->ID, '_pt-field-san-pham-giatien', true ); 
	  $hangsx_sp = get_post_meta( $post->ID, '_pt-field-san-pham-hangsx', true );	  
	  $opcode_sp = get_post_meta( $post->ID, '_pt-field-san-pham-opcode', true );

	  $gallery_sp = get_post_meta( $post->ID, '_pt-field-san-pham-gallery', true );
	  $gallery_sp = ! is_array($gallery_sp) || empty( $gallery_sp[0] ) ? null : $gallery_sp;

	  $thumbnail_id = get_post_thumbnail_id( $post->ID );	  
	  $thumbnail_tag = wp_get_attachment_image( $thumbnail_id, 'feature-image-product-thumbnail-detail' ); 

	  $thumbnail_title = get_the_title( $thumbnail_id );
	  $thumbnail_src = wp_get_attachment_image_src( $thumbnail_id, 'full' );
	  $thumbnail_src = $thumbnail_src[0]; ?>

	<!-- main -->
	<section id="main">

		<!-- container -->
		<div class="container">

			<!-- mainColLeft -->
			<div class="mainColLeft col-md-3 col-sm-4 col-xs-12">

				<?php dynamic_sidebar( 'ColLeft Sidebar' ); ?>

			</div>
			<!-- #mainColLeft -->

			<!-- mainColRight -->
			<div class="mainColRight col-md-9 col-sm-8 col-xs-12 mtop20-xs">

				<!-- menu -->
				<div id="menu" class="lapmenu padleft20 shown-lap">

					<?php 							  
						$args = array(
							'theme_location' => 'primary'
						);
					
						wp_nav_menu( $args ); ?>

				</div>
				<!-- #menu -->

				<!-- m-menu -->
				<div class="lapmenu m-menu shown-mb cushidden-xs">									

					<div class="m-menuicon tcenter">
						<span class="fa fa-navicon"></span>
						Main Menu
					</div>

					<?php 							  
						$args = array(
							'theme_location' => 'primary',
							'menu_class' => 'm-mainmenu'
						);
					
						wp_nav_menu( $args ); ?>

				</div>
				<!-- #m-menu -->

				<!-- mColumnContent -->
				<div class="mColumnContent padleft20-ms">

					<?php 
						dynamic_sidebar( 'Slider Sidebar' ); ?>

					<!-- boxMainProdDetails -->
					<div class="boxMainProdDetails mtop20">

						<!-- boxProdDetailsTitle -->
						<h3 class="boxProdDetailsTitle widgTitleBox"
							data-navig="compactWidgTitleBox">
							<span><?php echo $post->post_title ?></span>
						</h3>
						<!-- #boxProdDetailsTitle -->

						<!-- boxProdDetailsContent -->
						<div class="boxProdDetailsContent mtop20 ohidden">

							<!-- boxProdThumb -->
							<div class="boxProdThumb col-md-5 col-sm-5 col-xs-12">

								<?php echo $thumbnail_tag; ?>

								<!-- allGalleryObjects -->
								<div class="zoom singleGallery allGalleryObjects mtop20">  
									<a class="lightgallery-thumbnail zoom-button zoom-sp" href="#"> Xem ảnh lớn </a> 

									<div class="lightgallery galleryObjects zoom-sp-content hidden">
										
										<?php 
											if ( $gallery_sp ) :

												foreach ( $gallery_sp as $gsp ) : 

													$gallery_id = pn_get_attachment_id_from_url( $gsp );
													$gallery_tag = wp_get_attachment_image( $gallery_id, 'full' ); ?>

													<a href="<?php echo $gsp ?>">
														<?php echo $gallery_tag ?>
													</a>	


									<?php	
												endforeach;

											else : ?>

												<a href="<?php echo $thumbnail_src ?>">
													<img src="<?php echo $thumbnail_src; ?>"
														 alt="<?php echo $thumbnail_title ?>"
														 title="<?php echo $thumbnail_title ?>" />
												</a>

									<?php	endif; ?>						

									</div>

								</div>
								<!-- #allGalleryObjects -->

							</div>				
							<!-- #boxProdThumb -->

							<!-- boxProdTS -->
							<div class="boxProdTS col-md-7 col-sm-7 col-xs-12 padleft20-ms mtop20-xs">

								<!-- boxProdTSHTitle -->
								<h3 class="boxProdTSHTitle">
									<?php echo $post->post_title ?>
								</h3>
								<!-- #boxProdTSHTitle -->

								<!-- price -->
								<div class="price mtop20">

									<strong>Giá tiền:</strong> 

									<?= 
										$gia_sp && '0' !== $gia_sp
										?
										'<strong class="cred">' . number_format( $gia_sp, 0, ',', '.' ) . ' VNĐ</strong>'
										:
										'Liên hệ'
									?>

								</div>
								<!-- #price -->

								<!-- hangsx -->
								<div class="hangsx mtop20">
									<strong>Hãng sản xuất:</strong> 
									<?= 
										$hangsx_sp
										?
										$hangsx_sp
										:
										'Đang cập nhật'
									?>
								</div>
								<!-- #hangsx -->

								<!-- quantity -->
								<div class="quantity mtop20">

									<strong>Số lượng:</strong> 

									<input id="numQty" type="number" class="form-control w60p inlineblock" min="1" step="1" value="1" arial-numberonly="true" />

								</div>
								<!-- #quantity -->

								<!-- order -->
								<div class="order mtop20">

									<a class="btn btn-success btnOrderProd"
									   target-href="#orderFormModal"
									   data-pname="<?php the_title(); ?>" 
									   data-popcode="<?php echo $opcode_sp ?>"> 
										   Đặt hàng
									</a>

								</div>
								<!-- #order -->

							</div>				
							<!-- #boxProdTS -->

							<div class="clearfix"></div>

							<!-- boxProdTabs -->
							<div class="boxProdTabs mtop20">

								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">

								    <li role="presentation" class="active">
								    	<a href="#gtsp" aria-controls="gtsp" role="tab" data-toggle="tab">Giới thiệu sản phẩm</a>
								    </li>
								   
								</ul>

								<!-- tab-content -->
								<div class="tab-content">

									<!-- gtsp -->
								    <div role="tabpanel" id="gtsp" class="tab-pane fade in active">

								    	<div class="pad20">

									    	<?php 
									    		if ( $post->post_content ) :

									    			echo wpautop( $post->post_content );

									    		else :

									    			echo 'Nội dung đang cập nhật ...';

									    		endif; ?>

									    </div>

								    </div>
								    <!-- #gtsp -->
								   
								</div>
								<!-- #tab-content -->

							</div>
							<!-- #boxProdTabs -->

						</div>
						<!-- #boxProdDetailsContent -->

					</div>
					<!-- #boxMainProdDetails -->		

				</div>
				<!-- #mColumnContent -->

			</div>
			<!-- #mainColRight -->

		</div>
		<!-- #container -->
		
	</section>
	<!-- #main -->

<?php get_footer() ?>