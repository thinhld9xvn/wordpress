<?php 

    function pccbinhduong_recentposts_cat_widget_init() {
    
    	register_widget( 'pccbinhduong_recentposts_cat_widget' );
    
    }
    
    add_action( 'widgets_init', 'pccbinhduong_recentposts_cat_widget_init' );

    class pccbinhduong_recentposts_cat_widget extends WP_Widget {	

    	function pccbinhduong_recentposts_cat_widget() {
    
    		$widget_ops = array( 'classname' => 'pccbinhduong-recentposts-cat', 'description' => 'pccbinhduong - Hiển thị bài gần đây của danh mục' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'pccbinhduong-recentposts-cat' );		
    
    		$this->WP_Widget( 'pccbinhduong-recentposts-cat', 'pccbinhduong - Hiển thị bài gần đây của danh mục', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
    		extract( $args );
    
    		$title = apply_filters('widget_title', $instance['title'] );
    
    		$cat_id = $instance['pccbinhduong-recentposts-cat-category'];
    	
    		$posts_per_page = $instance['pccbinhduong-recentposts-post-num-cat']; ?>
    		
    
    		<?php ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_recentposts_cat_widget.php' ); 
    			
    	  	    $contents = ob_get_contents(); 
    
    	  	   ob_end_clean(); ?>
    	  		   
    
    		<?php printf("%s", $contents); ?>
    			  
    
    	<?php }
    
    	//Update the widget 	 
    
    	function update( $new_instance, $old_instance ) {
    		
    
    		$instance = $old_instance;
    
    		//Strip tags from title and name to remove HTML 	    		
    
    		$instance['title'] = strip_tags( $new_instance['title'] );
    		
    		$instance['pccbinhduong-recentposts-cat-category'] = $new_instance['pccbinhduong-recentposts-cat-category'];
    
    		$instance['pccbinhduong-recentposts-post-num-cat'] = $new_instance['pccbinhduong-recentposts-post-num-cat'];
    
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
                            'id' => $this->get_field_id('pccbinhduong-recentposts-cat-category'),
                            'name' => $this->get_field_name('pccbinhduong-recentposts-cat-category'),
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

                        <input type="hidden" id="<?php echo $this->get_field_id('pccbinhduong-recentposts-cat-category') . '-select-input' ?>" value="<?php echo $instance['pccbinhduong-recentposts-cat-category'] ?>" />
    
    		 	</div>
    
    		</div>	
    
    		<div class="input-box">
    
    			<div>Số bài muốn hiển thị:</div>
    
    			<div><input id="<?php echo $this->get_field_id( "pccbinhduong-recentposts-post-num-cat" ) ?>" name= "<?php echo $this->get_field_name( 'pccbinhduong-recentposts-post-num-cat' ) ?>" value="<?php echo $instance['pccbinhduong-recentposts-post-num-cat'] ?>" style="width:100%;"  /></div>
    
    		</div>
    
    <?php
    
    	}
    
    }
?>