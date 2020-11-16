<?php 
    echo $before_widget;
        echo $before_title.$title.$after_title; 
        
        $args = array(
                'post_type' => 'post',
                'category__id' => $cat_id,
                'order' => 'desc',
                'orderby' => 'id',
                'posts_per_page' => $posts_per_page
            ); 
            
        query_posts( $args ); ?>
        
        <!-- spboxcontent -->
    	<div class="spboxcontent split-columns five-columns-layout" data-navig="setequalheight" data-object=".sp" data-css-delimiter-property="clear" data-css-delimiter-value="both" data-setheight=".title">
    	    
    	    <?php while ( have_posts() ) : the_post(); 
    	            
    	            $thumb_id = get_post_thumbnail_id(); 
    	            $thumb_tag = wp_get_attachment_image( 
                                                          $thumb_id, 
                                                          'theme-feature-image-product', 
                                                          false, array(
                                                            'data-navig' => 'jtooltip',
                                                            'data-parent' => '.sp',
                                                            'data-target' => '.jtooltip'
                                                          ) 
                                                        ); 
    	            
    	            $mota_ngan = get_post_meta( get_the_id(), '_pt-field-san-pham-mo-ta-ngan', true); ?>
    
        		<!-- sp -->
        		<div class="sp item-layout col-md-2 col-sm-4 col-xs-6">
        
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
        	    wp_reset_query(); ?>
    		
    	</div>
    	<!-- #spboxcontent -->
      
    	
<?php echo $after_widget; ?>