<?php 

    function astra_categories_widget_init() {

        register_widget( 'astra_categories_widget' );
        
    }
    
    add_action( 'widgets_init', 'astra_categories_widget_init' );

    class astra_categories_widget extends WP_Widget {	       

    	function astra_categories_widget() {
    
    		$widget_ops = array( 'classname' => 'astra-categories-widget', 'description' => 'astra - Display current category and subjects' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'astra-categories-widget' );		
    
    		$this->WP_Widget( 'astra-categories-widget', 'astra - Display current category and subjects', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
            extract( $args );             
    		
    		ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_categories_widget.php' ); 
    			
    	  	    $contents = ob_get_contents(); 
    
    	  	   ob_end_clean(); ?>
    	  		   
    
    		<?php printf("%s", $contents); ?>
    			  
    
    	<?php }
    
    	//Update the widget 	 
    
    	function update( $new_instance, $old_instance ) {    		
    
    		$instance = $old_instance;
    
    		//Strip tags from title and name to remove HTML  
    
    		return $instance;
    
    	}
    
    	function form( $instance ) {
    
    		//Set up some default widget settings.
    
            $defaults = array( 'name' => 'lafubrand developer');
    
    		$instance = wp_parse_args( (array) $instance, $defaults ); ?>	

            
    
    <?php
    
    	}
    
    }
?>