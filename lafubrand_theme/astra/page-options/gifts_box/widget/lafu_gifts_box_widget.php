<?php 

    function lafu_gifts_box_widget_init() {

        register_widget( 'lafu_gifts_box_widget' );
        
    }
    
    add_action( 'widgets_init', 'lafu_gifts_box_widget_init' );

    class lafu_gifts_box_widget extends WP_Widget {	       

    	function lafu_gifts_box_widget() {
    
    		$widget_ops = array( 'classname' => 'lafu-gifts-box-widget', 'description' => 'astra - Display gifts box in categories and subjects' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'lafu-gifts-box-widget' );		
    
    		$this->WP_Widget( 'lafu-gifts-box-widget', 'astra - Display gifts box in categories and subjects', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
            extract( $args ); 
            
            $title = $instance['title'];                 
    		
    		ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_gifts_box_widget.php' ); 
    			
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
    
            $defaults = array( 'title' => 'Quà tặng',
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