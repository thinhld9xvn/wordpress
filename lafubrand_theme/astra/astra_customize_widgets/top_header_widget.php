<?php 

    function astra_top_header_widget_init() {

        register_widget( 'astra_top_header_widget' );
        
    }
    
    add_action( 'widgets_init', 'astra_top_header_widget_init' );

    class astra_top_header_widget extends WP_Widget {	       

    	function astra_top_header_widget() {
    
    		$widget_ops = array( 'classname' => 'astra-top-header', 'description' => 'astra - Display top header' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'astra-top-header' );		
    
    		$this->WP_Widget( 'astra-top-header', 'astra - Display top header', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
            extract( $args ); 
            
            $slogan = $instance['slogan'];
            $button_download = $instance['button_download'];
            $phone = $instance['phone'];

            $phone_text = $phone;
            $phone_url = preg_replace('/[\(\)\s]/', '', $phone);
    		
    		ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_top_header_widget.php' ); 
    			
    	  	    $contents = ob_get_contents(); 
    
    	  	   ob_end_clean(); ?>
    	  		   
    
    		<?php printf("%s", $contents); ?>
    			  
    
    	<?php }
    
    	//Update the widget 	 
    
    	function update( $new_instance, $old_instance ) {
    		
    
    		$instance = $old_instance;
    
    		//Strip tags from title and name to remove HTML 	
    		
    
            $instance['slogan'] = strip_tags( $new_instance['slogan'] );
            $instance['button_download'] = strip_tags( $new_instance['button_download'] );
            $instance['phone'] = strip_tags( $new_instance['phone'] );
    
    		return $instance;
    
    	}
    
    	function form( $instance ) {
    
    		//Set up some default widget settings.
    
            $defaults = array( 'slogan' => '', 
                               'button_download' => '', 
                               'phone' => '',
                               'name' => 'lafubrand developer');
    
    		$instance = wp_parse_args( (array) $instance, $defaults ); ?>	

            <div class="input-box">

                <div>Slogan:</div>
        
                <div>

                    <input id="<?php echo $this->get_field_id( "slogan" ) ?>" 
                           name= "<?php echo $this->get_field_name( 'slogan' ) ?>" 
                           value="<?php echo $instance['slogan'] ?>" style="width:100%;" />
                
                </div>


            </div>

            <div class="input-box" style="margin-top: 10px">

                <div>Tiêu đề nút download:</div>
        
                <div>

                    <input id="<?php echo $this->get_field_id( "button_download" ) ?>" 
                           name= "<?php echo $this->get_field_name( 'button_download' ) ?>" 
                           value="<?php echo $instance['button_download'] ?>" style="width:100%;" />
                
                </div>


            </div>

            
            <div class="input-box">

                <div>Phone:</div>
        
                <div>

                    <input id="<?php echo $this->get_field_id( "phone" ) ?>" 
                           name= "<?php echo $this->get_field_name( 'phone' ) ?>" 
                           value="<?php echo $instance['phone'] ?>" style="width:100%;" />
                
                </div>


            </div>
    
    <?php
    
    	}
    
    }
?>