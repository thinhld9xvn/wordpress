<?php 

    function pccbinhduong_carousel_feedback_customer_widget_init() {
    
    	register_widget( 'pccbinhduong_carousel_feedback_customer_widget' );
    
    }
    
    add_action( 'widgets_init', 'pccbinhduong_carousel_feedback_customer_widget_init' );

    class pccbinhduong_carousel_feedback_customer_widget extends WP_Widget {	

    	function pccbinhduong_carousel_feedback_customer_widget() {
    
    		$widget_ops = array( 'classname' => 'pccbinhduong-carousel-feedback-customer', 'description' => 'pccbinhduong - Hiển thị carousel ý kiến khách hàng' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'pccbinhduong-carousel-feedback-customer' );		
    
    		$this->WP_Widget( 'pccbinhduong-carousel-feedback-customer', 'pccbinhduong - Hiển thị carousel ý kiến khách hàng', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
    		extract( $args );
    
    		$title = apply_filters('widget_title', $instance['title'] );
    
    		$post_type = $instance['pccbinhduong-carousel-feedback-customer-post-type'];
    	
    		$posts_per_page = $instance['pccbinhduong-carousel-feedback-customer-num-post']; ?>
    		
    
    		<?php ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_carousel_feedback_customer_widget.php' ); 
    			
    	  	    $contents = ob_get_contents(); 
    
    	  	   ob_end_clean(); ?>
    	  		   
    
    		<?php printf("%s", $contents); ?>
    			  
    
    	<?php }
    
    	//Update the widget 	 
    
    	function update( $new_instance, $old_instance ) {
    		
    
    		$instance = $old_instance;
    
    		//Strip tags from title and name to remove HTML 	
    		
    
    		$instance['title'] = strip_tags( $new_instance['title'] );
    		
    		$instance['pccbinhduong-carousel-feedback-customer-post-type'] = $new_instance['pccbinhduong-carousel-feedback-customer-post-type'];
    
    		$instance['pccbinhduong-carousel-feedback-customer-num-post'] = $new_instance['pccbinhduong-carousel-feedback-customer-num-post'];
    
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
    
    		    <div>Mục khách hàng:</div>
    
    		    <div>
    
    		    	<select id="<?php echo $this->get_field_id('pccbinhduong-carousel-feedback-customer-post-type') ?>" name="<?php echo $this->get_field_name('pccbinhduong-carousel-feedback-customer-post-type') ?>" style="width:100%;">
    
    				<?php
    
    					  $args = array(
                               'public'   => true,
                               '_builtin' => false
                            );
                            
                            $output = 'objects'; // names or objects, note names is the default
                            $operator = 'and'; // 'and' or 'or'
                            
                            $post_types = get_post_types( $args, $output, $operator ); 
    
    						foreach ( $post_types as $post_type ) : ?>
    
    							<option value="<?php echo $post_type->name ?>" <?php selected($instance['pccbinhduong-carousel-feedback-customer-post-type'], $post_type->name ) ?>><?php echo $post_type->label ?></option>						
    
    				    <?php 
    
    				    	endforeach;  
    
    				    ?>
    
    			    </select>
    
    		 	</div>
    
    		</div>	
    
    		<div class="input-box">
    
    			<div>Số mục muốn hiển thị:</div>
    
    			<div><input id="<?php echo $this->get_field_id( "pccbinhduong-carousel-feedback-customer-num-post" ) ?>" name= "<?php echo $this->get_field_name( 'pccbinhduong-carousel-feedback-customer-num-post' ) ?>" value="<?php echo $instance['pccbinhduong-carousel-feedback-customer-num-post'] ?>" style="width:100%;"  /></div>
    
    		</div>
    
    <?php
    
    	}
    
    }
?>