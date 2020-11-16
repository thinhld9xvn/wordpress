<?php
	$thumb = get_post_meta( $post->ID, '_pt-field-san-pham-large-avatar', true ); 
	$thumb_id = pn_get_attachment_id_from_url( $thumb );
	$thumb_tag = wp_get_attachment_image( $thumb_id, 'theme-feature-image-product-large' );
	$tssp = get_post_meta( $post->ID, '_pt-field-san-pham-bang-ts', true );
	$mota = get_post_meta( $post->ID, '_pt-field-san-pham-mo-ta-ctiet', true ); ?>

		<!-- spboxlist -->
		<div class="spboxlist">

			<!-- container -->
			<div class="container">

				<!-- colleft -->
				<div class="colleft col-md-3 col-sm-3 col-xs-12">

					<?php dynamic_sidebar('ColLeft Sidebar'); ?>

				</div>
				<!-- #colleft -->

				<!-- colright -->
				<div class="colright padleft20-md padleft20-sm mtop20-xs col-md-9 col-sm-9 col-xs-12">	
				
					<!-- sp-details -->
					<div class="sp-details">

						<h3 class="spboxtitle --no-padlr" data-navig="drawline" data-childcompare=".caption" data-childtarget=".hr">
							<span class="caption"><?php echo $post->post_title; ?></span>
							<span class="hr"></span>
						</h3>

						<!-- sp-boxcontent -->
						<div class="sp-boxcontent">

							<div class="sp-rowbox ohidden">

								<!-- sp-thumb -->
								<div class="sp-thumb padright10-md padright10-sm col-md-4 col-sm-4 col-xs-12">
									<?php echo $thumb_tag; ?>
								</div>
								<!-- #sp-thumb -->

								<!-- sp-ctiet -->
								<div class="sp-ctiet padleft10-md padleft10-sm mtop20-xs col-md-8 col-sm-8 col-xs-12">

									<?= ! empty( $tssp ) ? $tssp : 'Không có thông số sản phẩm ...' ?>

								</div>
								<!-- #sp-ctiet -->

							</div>

							<div class="sp-rowbox mtop20">

								<!-- Nav tabs -->
							  <ul class="nav nav-tabs" role="tablist">

							    <li role="presentation" class="active">
							    	<a href="#navtab-sp-mota" aria-controls="navtab-sp-mota" role="tab" data-toggle="tab">Mô tả</a>
							    </li>								   

							  </ul>

							  <!-- Tab panes -->
							  <div class="tab-content">

							    <div role="tabpanel" class="tab-pane active" id="navtab-sp-mota">

							    	<div class="navtabcontent mtop10">

								    	<?= ! empty( $mota ) ? $mota : 'Không có mô tả sản phẩm ...' ?>							

									</div>

							    </div>								  

							  </div>

							</div>

						</div>
						<!-- #sp-boxcontent -->
						
						<?php 
							$args = array(
									'post_type' => 'post',
									'post__not_in' => array($post->ID),
									'category__in' => $cat->term_id,
									'posts_per_page' => 12,
									'order' => 'desc',
									'orderby' => 'id'
								);
							
							query_posts( $args ); 
							
							if ( have_posts() ) : ?>

								<!-- sp-relate -->
								<div class="sp-relate mtop20 col-xs-12">
		
									<h3 class="spboxtitle --no-padlr" data-navig="drawline" data-childcompare=".caption" data-childtarget=".hr">
										<span class="caption">Sản phẩm cùng loại</span>
										<span class="hr"></span>
									</h3>
		
									<!-- sp-relate-boxcontent -->
									<div class="sp-relate-boxcontent col-xs-12">
		
										<!-- four-column-layout -->
										<div class="spboxcontent split-columns four-columns-layout" data-navig="setequalheight" data-object=".sp" data-css-delimiter-property="clear" data-css-delimiter-value="both" data-setheight=".title">
											
											<?php while ( have_posts() ) : the_post(); 
													
													$thumb_id = get_post_thumbnail_id();
													$thumb_tag = wp_get_attachment_image( $thumb_id, 'theme-feature-image-product', false, array(
																								'data-navig' => 'jtooltip',
																								'data-parent' => '.sp',
																								'data-target' => '.jtooltip'
																							) 
																						);
													
													$cmota_ngan = get_post_meta( get_the_id(), '_pt-field-san-pham-mo-ta-ngan', true ); ?>
		
												<!-- sp -->
												<div class="sp item-layout col-md-3 col-sm-6 col-xs-6">
			
													<!-- thumb -->
													<div class="thumb">
														<a href="<?php the_permalink(); ?>">
															<?php echo $thumb_tag; ?>
														</a>
													</div>
													<!-- #thumb -->
													
													<!-- tooltip -->
													<div class="jtooltip">
													    <p><strong><?php the_title(); ?></strong></p>
														<?php echo wpautop( $cmota_ngan ); ?>
													</div>
													<!-- #tooltip -->
			
													<!-- title -->
													<div class="title tcenter mtop10">
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													</div>
													<!-- #title -->
			
													<!-- readmore -->
													<div class="readmore mtop10">
														<a href="<?php the_permalink(); ?>">Xem tiếp</a>
													</div>
													<!-- #readmore -->
			
												</div>
												<!-- #sp -->
												
											<?php endwhile; 
												  wp_reset_query(); ?>
		
										</div>
										<!-- #four-column-layout -->
		
									</div>
									<!-- #sp-relate-boxcontent -->
		
								</div>
								<!-- #sp-relate -->	
							
					  <?php endif; ?>
					  
					  <?php 
							$args = array(
									'post_type' => 'post',
									'$category_name' => 'tin-tuc',
									'posts_per_page' => 6,
									'order' => 'desc',
									'orderby' => 'id'
								);
							
							query_posts( $args ); 
							
							if ( have_posts() ) : ?>

								<!-- boxnews-relate -->
								<div class="boxnews-relate mtop20 clearfix">
			
									<h3 class="spboxtitle --no-padlr" data-navig="drawline" data-childcompare=".caption" data-childtarget=".hr">
										<span class="caption">Có thể bạn quan tâm</span>
										<span class="hr"></span>
									</h3>
			
									<ul class="pboxlist --newslist --hasborder --hasicon --green">
										
										<?php while ( have_posts() ) : the_post(); ?>
										
										    <li>
										    	<a href="<?php the_permalink(); ?>">
										    		<?php the_title(); ?>
										    	</a>
										    </li>
										    
										<?php endwhile; 
											  wp_reset_query(); ?>
										
									</ul>
			
								</div>
								<!-- #boxnews-relate -->
								
						<?php endif; ?>
						
					</div>
					<!-- #sp-details -->
					
				</div>
				<!-- #colright -->

			</div>
			<!-- #container -->

		</div>
		<!-- #spboxlist -->
		
	</section>
	<!-- #main -->

<?php get_footer() ?>