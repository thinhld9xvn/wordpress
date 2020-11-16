<?php 
    echo $before_widget;
        echo $before_title.$title.$after_title; 
        
        $cat = get_term_by( 'name', $cat_name, 'category' ); 
        
        $args = array(
            'hide_empty' => 0,
            'parent' => $cat->term_id,
            'number' => $num_subcat,
            'order' => 'asc',
            'orderby' => 'id'
        );
        $categories = get_categories( $args  ) ?>
        
    <!-- wigcontent -->
	<div class="wigcontent">
	    
	    <?php foreach ( $categories as $cat1 ) : ?>
	    
	        <h4 class="boxheadcat --hasborder mtop10 padleft10">
	            <a href="<?php echo get_category_link($cat1); ?>">
    	            <span class="fa fa-chevron-right"></span> 
    	            <?php echo $cat1->name; ?>
    	        </a>
	        </h4>
	        
	        <ul class="pboxlist --listcat">
		    
                <?php 
                     $list_args = array(
                        'hide_empty' => 0,
                        'title_li' => __( '' ),
                        'child_of' => $cat1->term_id,
                        'depth' => 2,
                        'current_category' => 0,
                        'show_option_none' => __( '' ),
                        'order' => 'asc',
                        'orderby' => 'id'
                     );
                    wp_list_categories( $list_args ); ?>
    		
		    </ul>
	        
	    <?php endforeach; ?>
		
	</div>
	 <!-- #wigcontent -->
    	
<?php echo $after_widget; ?>