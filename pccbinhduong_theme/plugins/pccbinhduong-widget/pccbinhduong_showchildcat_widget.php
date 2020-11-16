<?php 

    function pccbinhduong_showchildcat_widget_init() {
    
    	register_widget( 'pccbinhduong_showchildcat_widget' );
    
    }
    
    add_action( 'widgets_init', 'pccbinhduong_showchildcat_widget_init' );

    class pccbinhduong_showchildcat_widget extends WP_Widget {	

    	function pccbinhduong_showchildcat_widget() {
    
    		$widget_ops = array( 'classname' => 'pccbinhduong-showchildcat', 'description' => 'pccbinhduong - Hiển thị sub categories' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'pccbinhduong-showchildcat' );		
    
    		$this->WP_Widget( 'pccbinhduong-showchildcat', 'pccbinhduong - Hiển thị sub categories', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
    		extract( $args );
    
    		$title = apply_filters('widget_title', $instance['title'] );
    
    		$cat_id = $instance['pccbinhduong-showchildcat-category'];
    	
    		$num_cat = $instance['pccbinhduong-showchildcat-num-cat']; ?>
    		
    
    		<?php ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_showchildcat_widget.php' ); 
    			
    	  	    $contents = ob_get_contents(); 
    
    	  	   ob_end_clean(); ?>
    	  		   
    
    		<?php printf("%s", $contents); ?>
    			  
    
    	<?php }
    
    	//Update the widget 	 
    
    	function update( $new_instance, $old_instance ) {
    		
    
    		$instance = $old_instance;
    
    		//Strip tags from title and name to remove HTML 	    		
    
    		$instance['title'] = strip_tags( $new_instance['title'] );
    		
    		$instance['pccbinhduong-showchildcat-category'] = $new_instance['pccbinhduong-showchildcat-category'];
    
    		$instance['pccbinhduong-showchildcat-num-cat'] = $new_instance['pccbinhduong-showchildcat-num-cat'];
    
    		return $instance;
    
    	}
    
    	function form( $instance ) {
    
    		//Set up some default widget settings.
    
    		$defaults = array( 'title' => '', 'name' => 'iop developer');
    
    		$instance = wp_parse_args( (array) $instance, $defaults ); ?>	
    
    		<div class="input-box">
    
    			<div>Tiêu đề:</div>
    
    			<div><input id="<?php echo $this->get_field_id( "title" ) ?>" name= "<?php echo $this->get_field_name( 'title' ) ?>" value="<?php echo $instance['title'] ?>" style="width:100%;"  /></div>
    
    		</div>
    		
    		<div class="input-box">
    
    		    <div>Danh mục:</div>
    
    		    <div> 
    
				    <?php

                        $args = array(
                            'id' => $this->get_field_id('pccbinhduong-showchildcat-category'),
                            'name' => $this->get_field_name('pccbinhduong-showchildcat-category'),
                            'class' => 'wp-dropdown-select',
                            'value_field' => 'term_id',
                            'selected' => 0,
                            'hide_empty' => 0,
                            'show_option_none' => __( 'Trống' ),
                            'show_count'       => 0,
                            'orderby'          => 'name',
                            'echo'             => 1,
                        );

                        wp_dropdown_categories( $args ); ?> 

                        <input type="hidden" id="<?php echo $this->get_field_id('pccbinhduong-showchildcat-category') . '-select-input' ?>" value="<?php echo $instance['pccbinhduong-showchildcat-category'] ?>" />
    
    		 	</div>
    
    		</div>	
    
    		<div class="input-box">
    
    			<div>Số danh mục muốn hiển thị:</div>
    
    			<div><input id="<?php echo $this->get_field_id( "pccbinhduong-showchildcat-num-cat" ) ?>" name= "<?php echo $this->get_field_name( 'pccbinhduong-showchildcat-num-cat' ) ?>" value="<?php echo $instance['pccbinhduong-showchildcat-num-cat'] ?>" style="width:100%;"  /></div>
    
    		</div>
    
    <?php
    
    	}
    
    }
?>