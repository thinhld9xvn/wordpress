<?php   

    echo $before_widget;
        echo $before_title.$title.$after_title; 
        
        $args = array(
                'post_type' => 'post',
                'category__in' => $cat_id,
                'order' => 'desc',
                'orderby' => 'id',
                'posts_per_page' => $posts_per_page                  
                
            ); 
            
        query_posts( $args ); ?>        
        
        <!-- wigcontent -->
		<div class="wigcontent col-xs-12 mtop20">

			<!-- sp-layout -->
			<div class="sp-layout split-columns four-columns-layout" data-navig="setequalheight" data-object=".item-layout" data-css-delimiter-property="clear" data-css-delimiter-value="both" data-setheight=".item-title">
			    
			    <?php while ( have_posts() ) : the_post(); 
			    
			            $thumb_id = get_post_thumbnail_id();
                        $thumb_tag = wp_get_attachment_image( 

                            $thumb_id, 'theme-feature-image-product', false,

                            array(
                                'data-navig' => 'jtooltip',
                                'data-parent' => '.sp',
                                'data-target' => '.jtooltip'
                            )         
                                                                  
                        ); ?>

    				<!-- item-layout -->
    				<div class="item-layout col-md-3 col-sm-6 col-xs-6">
    
    					<!-- item-thumb -->
    					<div class="item-thumb">
    						<a href="<?php the_permalink(); ?>">
    							<?php echo $thumb_tag; ?>
    						</a>
    					</div>
    					<!-- #item-thumb -->
    
    					<!-- item-title -->
    					<div class="item-title mtop10">
    						<a href="<?php the_permalink(); ?>"><?php echo title(40); ?></a>
    					</div>
    					<!-- #item-title -->
    
    					<!-- item-readmore -->
    					<div class="item-readmore mtop20">
    						<a href="<?php the_permalink(); ?>">Xem chi tieát</a>
    					</div>
    					<!-- #item-readmore -->
    
    				</div>
    				<!-- #item-layout -->
    				
    			<?php endwhile; ?>                  			    


			</div>
			<!-- #sp-layout -->

        <?php wp_reset_query(); ?>

		</div>
		<!-- #wigcontent -->     
      
    	
<?php echo $after_widget; ?>