<?php 

    function astra_most_popular_posts_widget_init() {

        register_widget( 'astra_most_popular_posts_widget' );
        
    }
    
    add_action( 'widgets_init', 'astra_most_popular_posts_widget_init' );

    class astra_most_popular_posts_widget extends WP_Widget {	       

    	function astra_most_popular_posts_widget() {
    
    		$widget_ops = array( 'classname' => 'astra-most-popular-posts-widget', 'description' => 'astra - Display most popular posts in category' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'astra-most-popular-posts-widget' );		
    
    		$this->WP_Widget( 'astra-most-popular-posts-widget', 'astra - Display most popular posts in category', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
            extract( $args );

            $title = $instance['title'];
    		
    		ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_most_popular_posts_widget.php' ); 
    			
    	  	    $contents = ob_get_contents(); 
    
    	  	   ob_end_clean(); ?>
    	  		   
    
    		<?php printf("%s", $contents); ?>
    			  
    
    	<?php }
    
    	//Update the widget 	 
    
    	function update( $new_instance, $old_instance ) {    		
    
    		$instance = $old_instance;
    
    		//Strip tags from title and name to remove HTML  
 
            $instance['title'] = strip_tags( $new_instance['title'] );
    
    		return $instance;
    
    	}
    
    	function form( $instance ) {
    
    		//Set up some default widget settings.
    
            $defaults = array(  'title' => 'Bài viết xem nhiều nhất',
                                'name' => 'lafubrand developer');
    
    		$instance = wp_parse_args( (array) $instance, $defaults ); ?>	

             <div class="input-box">

                <div>Title:</div>
        
                <div>

                    <input id="<?php echo $this->get_field_id( "title" ) ?>" 
                           name= "<?php echo $this->get_field_name( 'title' ) ?>" 
                           value="<?php echo $instance['title'] ?>" style="width:100%;" />
                
                </div>


            </div>


            
    
    <?php
    
    	}
    
    }
?>