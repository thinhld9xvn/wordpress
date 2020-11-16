<?php 
    echo $before_widget;
        echo $before_title.$title.$after_title; 
        
        $cat = get_term_by( 'name', $cat_name, 'category' ); 
        
        $args = array(
                'hide_empty' => 0,
                'parent' => $cat->term_id,
                'number' => $num_subcat,
                'order' => 'desc',
                'orderby' => 'id'
            );
        $categories = get_categories( $args  ) ?>
    			    
        <ul class="pboxlist --hasborder --newslist">
            
            <?php foreach ( $categories as $c ) : ?>
            
    		    <li>
    		    	<a href="<?php echo get_category_link( $c ); ?>"><?php echo $c->name; ?></a>
    		    </li>	
    		    
    		<?php endforeach; ?>
    		
		</ul>
    	
<?php echo $after_widget; ?>