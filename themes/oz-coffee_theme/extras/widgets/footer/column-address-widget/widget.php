<?php 

    function gco_address_widget_init() {
    	register_widget( 'gco_address_widget' );
    }
    
    add_action( 'widgets_init', 'gco_address_widget_init' );

    class gco_address_widget extends WP_Widget {	

    	function gco_address_widget() {
    
    		$widget_ops = array( 'classname' => 'gco-address', 'description' => 'GCO GROUP - Hiển thị cột địa chỉ footer' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'gco-address' );		
    
    		$this->WP_Widget( 'gco-address', 'GCO GROUP - Hiển thị cột địa chỉ footer', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
    		extract( $args ); 
    		
    		ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_widget.php' ); 
    			
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
    
    		$defaults = array( 'title' => '', 'name' => 'gco developer');
			
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>	
    
    <?php
    
    	}
    
    }
?>