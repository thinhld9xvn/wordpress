<?php 

    function gco_dichvu_widget_init() {
    	register_widget( 'gco_dichvu_widget' );
    }
    
    add_action( 'widgets_init', 'gco_dichvu_widget_init' );

    class gco_dichvu_widget extends WP_Widget {	

    	function gco_dichvu_widget() {
    
    		$widget_ops = array( 'classname' => 'gco-dichvu', 'description' => 'GCO GROUP - Hiển thị phần dịch vụ (trang chủ)' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'gco-dichvu' );		
    
    		$this->WP_Widget( 'gco-dichvu', 'GCO GROUP - Hiển thị phần dịch vụ (trang chủ)', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
    		extract( $args ); 
    		
    		ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_dichvu_widget.php' ); 
    			
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