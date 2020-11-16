<!-- newsboxlist -->
<div class="newsboxlist">

	<!-- container -->
	<div class="container">

		<!-- colleft -->
		<div class="colleft col-md-3 col-sm-3 col-xs-12">

			<?php dynamic_sidebar('ColLeft Sidebar'); ?>

		</div>
		<!-- #colleft -->

		<!-- colright -->
		<div class="colright padleft20-md padleft20-sm mtop20-xs col-md-9 col-sm-9 col-xs-12">	
		
			<!-- rowspbox -->
			<div class="rowspbox">

				<h3 class="spboxtitle newsboxtitle --no-padlr" data-navig="drawline" data-childcompare=".caption" data-childtarget=".hr">
					<span class="caption"><?php echo single_cat_title(); ?></span>
					<span class="hr"></span>
				</h3>
				
				<?php 
				    $args = array(
				            'post_type' => 'post',
				            'category__in' => $cat->term_id,
				            'posts_per_page' => 20,
				            'order' => 'desc',
				            'orderby' => 'id'
				        );
				    query_posts( $args ); ?>

				<!-- spboxcontent -->
				<div class="spboxcontent split-columns five-columns-layout" data-navig="setequalheight" data-object=".sp" data-css-delimiter-property="clear" data-css-delimiter-value="both" data-setheight=".title">
				    
				    <?php while ( have_posts() ) : the_post(); 
				    
				            $thumb_id = get_post_thumbnail_id(); 
				            $thumb_title = get_the_title( $thumb_id );
				            $thumb = wp_get_attachment_image_src( $thumb_id, 'full');
				            $thumb = $thumb[0]; 
				            
				            $mota_ngan = get_post_meta( get_the_id(), 'wpcf-mo-ta-ngan-sp', true); ?>

    					<!-- sp -->
    					<div class="sp item-layout col-md-2 col-sm-4 col-xs-6">
    
    						<!-- thumb -->
    						<div class="thumb tcenter">
    							<a href="<?php the_permalink(); ?>">
    								<img src="<?php echo $thumb; ?>" alt="<?php echo $thumb_title; ?>" data-navig="jtooltip" data-parent=".sp" data-target=".jtooltip" />
    							</a>
    						</div>
    						<!-- #thumb -->
    						
    						<!-- tooltip -->
        					<div class="jtooltip">
        					    <p><strong><?php the_title(); ?></strong></p>
        						<?php echo wpautop( $mota_ngan ); ?>
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
    					wp_page_navigation();
    				    wp_reset_query(); ?>
					
				</div>
				<!-- #spboxcontent -->

			</div>
			<!-- #rowspbox -->	
			
		</div>
		<!-- #colright -->

	</div>
	<!-- #container -->

</div>
<!-- #newsboxlist -->