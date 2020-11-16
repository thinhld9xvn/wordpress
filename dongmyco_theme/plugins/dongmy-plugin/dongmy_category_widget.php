<?php 

    function dongmy_category_widget_init() {
    
    	register_widget( 'dongmy_category_widget' );
    
    }
    
    add_action( 'widgets_init', 'dongmy_category_widget_init' );

    class dongmy_category_widget extends WP_Widget {	

    	function dongmy_category_widget() {
    
    		$widget_ops = array( 'classname' => 'dongmy-category', 'description' => 'DongMy - Hiển thị nội dung một category' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'dongmy-category' );		
    
    		$this->WP_Widget( 'dongmy-category', 'dongmy - Hiển thị nội dung một category', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
    		extract( $args );
    
    		$title = apply_filters('widget_title', $instance['title'] );
    
    		$cat_name = $instance['dongmy-category-mcategory'];
    	
    		$num_subcat = $instance['dongmy-category-num-subcat']; ?>
    		
    
    		<?php ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_category_widget.php' ); 
    			
    	  	    $contents = ob_get_contents(); 
    
    	  	   ob_end_clean(); ?>
    	  		   
    
    		<?php printf("%s", $contents); ?>
    			  
    
    	<?php }
    
    	//Update the widget 	 
    
    	function update( $new_instance, $old_instance ) {
    		
    
    		$instance = $old_instance;
    
    		//Strip tags from title and name to remove HTML 	
    		
    
    		$instance['title'] = strip_tags( $new_instance['title'] );
    		
    		$instance['dongmy-category-mcategory'] = $new_instance['dongmy-category-mcategory'];
    
    		$instance['dongmy-category-num-subcat'] = $new_instance['dongmy-category-num-subcat'];
    
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
    
    		    	<select id="<?php echo $this->get_field_id('dongmy-category-mcategory') ?>" name="<?php echo $this->get_field_name('dongmy-category-mcategory') ?>" style="width:100%;">
    
    				<?php
    
    					   $args = array(
    							  'orderby' => 'name',
    							  'hide_empty' => 0
    						  );
    						$categories = get_categories( $args );
    
    						foreach ($categories as $cat) : ?>
    
    							<option value="<?php echo $cat->name ?>" <?php selected($instance['dongmy-category-mcategory'], $cat->name) ?>><?php echo $cat->name ?></option>						
    
    				    <?php 
    
    				    	endforeach;  
    
    				    ?>
    
    			    </select>
    
    		 	</div>
    
    		</div>	
    
    		<div class="input-box">
    
    			<div>Số danh mục con muốn hiển thị:</div>
    
    			<div><input id="<?php echo $this->get_field_id( "dongmy-category-num-subcat" ) ?>" name= "<?php echo $this->get_field_name( 'dongmy-category-num-subcat' ) ?>" value="<?php echo $instance['dongmy-category-num-subcat'] ?>" style="width:100%;"  /></div>
    
    		</div>
    
    <?php
    
    	}
    
    }
?>