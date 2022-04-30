<?php 

    function gco_danhgia_widget_init() {
    	register_widget( 'gco_danhgia_widget' );
    }
    
    add_action( 'widgets_init', 'gco_danhgia_widget_init' );

    class gco_danhgia_widget extends WP_Widget {	

    	function gco_danhgia_widget() {
    
    		$widget_ops = array( 'classname' => 'gco-danhgia', 'description' => 'GCO GROUP - Hiển thị phần đánh giá (trang chủ)' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'gco-danhgia' );		
    
    		$this->WP_Widget( 'gco-danhgia', 'GCO GROUP - Hiển thị phần đánh giá (trang chủ)', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
    		extract( $args ); 
    		
    		ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_danhgia_widget.php' ); 
    			
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