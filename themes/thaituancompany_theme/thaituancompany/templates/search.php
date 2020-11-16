<?php 	
	$paged = get_query_var('paged') ? absint( get_query_var('paged') ) : 1;
	$s = get_search_query(); 

	$post_type = 'tour-du-lich'; 
	
	$param_orderby = strtolower( mysql_escape_string( $_GET['sort'] ) );

    $metakey = '';
    $metakey_orderby = '';

    switch ( $param_orderby ) :

    	case 'arrivedate-near':

    		$metakey = '_pt-field-tour-arriveBegin-first';
    		$metavalue = date( 'Y-m-d', time() );
    		$metakey_orderby = 'asc';
    		$meta_type = 'date';
    		$meta_compare = '>=';

    		break;

    	case 'price-asc':

    		$metakey = '_pt-field-tour-price';
    		$metakey_orderby = 'asc';
    		$meta_type = 'numeric';
    		$meta_compare = '=';

    		break;

    	case 'price-desc':

    		$metakey = '_pt-field-tour-price'; 
    		$metakey_orderby = 'desc';   
    		$meta_type = 'numeric';
    		$meta_compare = '=';
    		
    		break;
    	
    	default: 

    		break;

    endswitch; ?>


<!-- main -->
<section id="main">	

	<?php 
		dynamic_sidebar( 'Slider Sidebar' ); ?>

	<div id="breadcumbs">

		<div class="container">

			<?php the_breadcrumbs('bread-cumbs', 'bread-cumbs', 'Trang chủ', '<span class="divide"></span>'); ?>
			
		</div>
		
	</div>	

	<!-- toursCatList -->
	<div class="toursCatList">

		<!-- container -->
		<div class="container">

			<!-- mainColumns -->
			<div class="mainColumns">

				<!-- mainColLeft -->
				<div class="mainColLeft col-md-9 col-sm-12 col-xs-12">

					<h2 class="toursCatListHeading -linebottom">
						<?php echo "Từ khóa tour cần tìm: $s" ?>
					</h2>

					<!-- toursFilter -->
					<div class="toursFilter mtop20">

						Sắp xếp theo: 

						<select id="slToursFilter" class="form-control slToursFilter inlineblock">

							<option value="null">
								Mời chọn
							</option>							

							<option value="arrivedate-near" <?php selected( 'arrivedate-near', $param_orderby, 'selected="selected"' ); ?>>
								Ngày khởi hành gần nhất
							</option>

							<option value="price-asc" <?php selected( 'price-asc', $param_orderby, 'selected="selected"' ); ?>>
								Giá tour tăng dần
							</option>

							<option value="price-desc" <?php selected( 'price-desc', $param_orderby, 'selected="selected"' ); ?>>
								Giá tour giảm dần
							</option>
							
						</select>
						
					</div>
					<!-- #toursFilter -->

					<!-- toursCatListContent -->
					<div class="toursCatListContent mtop20">

						<div class="container-inside w80p-sm">

							<!-- three-columns-layout -->
							<div class="split-columns three-columns-layout">

								<?php 
									$args = array(

										'post_type' => $post_type,
										's' => $s,

										'paged' => $paged

									);

									if ( $metakey ) :									
										$args['meta_key'] = $metakey;
										$args['orderby'] = 'meta_value';
									endif;

									if ( $metavalue ) :
										$args['meta_value'] = $metavalue;
									endif;

									if ( $meta_type ) :
										$args['meta_type'] = $meta_type;
									endif;

									if ( $meta_compare ) :
										$args['meta_compare'] = $meta_compare;
									endif;

									if ( $metakey_orderby ) :
										$args['order'] = $metakey_orderby;
									else :
										$args['order'] = 'desc';
									endif;
									
									query_posts( $args );

									if ( have_posts() ) :

										while ( have_posts() ) : the_post(); 

											$dateBegin = strip_tags( get_post_meta( get_the_id(), '_pt-field-tour-arriveBegin', true ) ); 

											if ( $dateBegin ) :

												$arr_dateBegin = explode( ',', $dateBegin );
												$dateBegin = $arr_dateBegin[0];

											endif;	

											$location = strip_tags( get_post_meta( get_the_id(), '_pt-field-tour-arrivePlace', true ) ); 
											$num_days = strip_tags( get_post_meta( get_the_id(), '_pt-field-tour-arriveTime', true ) ); 											

											$price = strip_tags( get_post_meta( get_the_id(), '_pt-field-tour-price', true ) );
											$price = ! empty( $price ) && $price !== '0' ? number_format( $price, 0, ',', '.' ) . ' VNĐ' : 'Liên hệ'; 

											$cycles = strip_tags( get_post_meta( get_the_id(), '_pt-field-tour-maybay', true ) ); 

											$cycles_icons = '';

											if ( $cycles ) :

												$arr_cycles = explode(',', $cycles);

												foreach ( $arr_cycles as $cycle ) :

													if ( $cycle === 'o-to' ) :

														$cycles_icons .= '<span class="fa fa-automobile"></span>';

													else :

														$cycles_icons .= '<span class="fa fa-plane"></span>';

													endif;

													if ( $cycle !== end( $arr_cycles ) ) :

														$cycles_icons .= ',';

													endif;
												 	
												endforeach;

											endif; ?>

											<!-- tour-item -->
											<div class="item-layout col-md-4 col-sm-6 col-xs-6 tour-item">

												<!-- thumbnail -->
												<div class="thumbnail">

													<?php 
														the_post_thumbnail( 'feature-image-tour-thumbnail', array('class' => 'fixed-vertical') ); ?>																		

													<!-- outside -->
													<div class="outside">

														<a href="<?php the_permalink(); ?>"></a>

														<!-- location -->
														<div class="location">

															<span class="fa fa-map-marker mright5"></span> 
															<?php echo $location; ?>
															
														</div>
														<!-- #location -->

														<!-- title -->
														<h4 class="title flex">

															<span>
																<?php echo title(50); ?>
															</span>
															
														</h4>
														<!-- #title -->
														
													</div>
													<!-- #outside -->

													<!-- inside -->
													<div class="inside hidden-xs">

														<div class="inside-wrap">

															<h4 class="title">

																<a href="<?php the_permalink(); ?>">

																	<?php echo title(50); ?>

																</a>
																
															</h4>

															<div class="tour-date small-caption mtop5">

																<span class="fa fa-calendar"></span> 
																<?php echo $num_days; ?> | 
																Phương tiện: 
																<?php echo $cycles_icons; ?>
																
															</div>

															<div class="arriveFrom cwhite">

																<span class="fa fa-map-marker"></span> 
																<?php echo $location; ?>
																<span class="fa fa-calendar-check-o"></span>
																Khởi hành <?php echo $dateBegin; ?>
																
															</div>

															<div class="person small-caption">
																Giá 1 khách
															</div>

															<div class="price mtop5">
																<?php echo $price; ?>
															</div>

															<div class="infooter">

																<div class="infooter-wrap vcenter">

																	<a class="tourBtn orderTourBtn" 
																	   data-tid="<?php echo get_the_id(); ?>"
																	   data-permalink="<?php echo get_bloginfo('url') . '/dat-tour-du-lich' ?>"
																	   href="#">
																		Đặt Tour
																	</a>

																	<a class="tourBtn detailTourBtn" 
																	   href="<?php the_permalink(); ?>">
																		Xem chi tiết
																	</a>

																</div>
																
															</div>

														</div>

													</div>
													<!-- #inside -->

												</div>
												<!-- #thumbnail -->
												
											</div>
											<!-- #tour-item -->	

								<?php 
										endwhile; 										

									else : ?>

										<div class="empty mtop10">

											Không có tour nào ở mục này.
											
										</div>

								<?php endif; ?>
								
							</div>
							<!-- #three-columns-layout -->

						</div>
						
					</div>
					<!-- #toursCatListContent -->

					<?php 
						the_page_navigation('mtop20'); 
						wp_reset_query(); ?>

				</div>
				<!-- #mainColLeft -->

				<div class="mainColRight col-md-3 col-sm-12 col-xs-12">

					<?php dynamic_sidebar( 'ColRight Sidebar' ); ?>
					
				</div>

			</div>
			<!-- #mainColumns -->
			
		</div>
		<!-- #container -->
		
	</div>
	<!-- #toursCatList -->		

</section>	
<!-- #main -->