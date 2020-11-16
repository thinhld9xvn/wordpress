<?php 

    function dongmy_slider_widget_init() {
    	register_widget( 'dongmy_slider_widget' );
    }
    
    add_action( 'widgets_init', 'dongmy_slider_widget_init' );

    class dongmy_slider_widget extends WP_Widget {	

    	function dongmy_slider_widget() {
    
    		$widget_ops = array( 'classname' => 'dongmy-slider', 'description' => 'dongmy - Hiển thị slider' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'dongmy-slider' );		
    
    		$this->WP_Widget( 'dongmy-slider', 'dongmy - Hiển thị slider', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
    		extract( $args ); 
    		
    		ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_slider_widget.php' ); 
    			
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
    
    		$defaults = array( 'title' => '', 'name' => 'iop developer');
    
    		$instance = wp_parse_args( (array) $instance, $defaults ); ?>	
    
    <?php
    
    	}
    
    }
?>