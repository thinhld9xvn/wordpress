<?php 

    function vietnhat_category_widget_init() {
    
    	register_widget( 'vietnhat_category_widget' );
    
    }
    
    add_action( 'widgets_init', 'vietnhat_category_widget_init' );

    class vietnhat_category_widget extends WP_Widget {	

    	function vietnhat_category_widget() {
    
    		$widget_ops = array( 'classname' => 'vietnhat-category', 'description' => 'VietNhat - Hiển thị nội dung một category' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'vietnhat-category' );		
    
    		$this->WP_Widget( 'vietnhat-category', 'VietNhat - Hiển thị nội dung một category', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
    		extract( $args );
    
    		$title = apply_filters('widget_title', $instance['title'] );
    
    		$cat_name = $instance['vietnhat-category-mcategory'];
    	
    		$num_subcat = $instance['vietnhat-category-num-subcat']; ?>
    		
    
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
    		
    		$instance['vietnhat-category-mcategory'] = $new_instance['vietnhat-category-mcategory'];
    
    		$instance['vietnhat-category-num-subcat'] = $new_instance['vietnhat-category-num-subcat'];
    
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
    
    		    	<select id="<?php echo $this->get_field_id('vietnhat-category-mcategory') ?>" name="<?php echo $this->get_field_name('vietnhat-category-mcategory') ?>" style="width:100%;">
    
    				<?php
    
    					   $args = array(
    							  'orderby' => 'name',
    							  'hide_empty' => 0
    						  );
    						$categories = get_categories( $args );
    
    						foreach ($categories as $cat) : ?>
    
    							<option value="<?php echo $cat->name ?>" <?php selected($instance['vietnhat-category-mcategory'], $cat->name) ?>><?php echo $cat->name ?></option>						
    
    				    <?php 
    
    				    	endforeach;  
    
    				    ?>
    
    			    </select>
    
    		 	</div>
    
    		</div>	
    
    		<div class="input-box">
    
    			<div>Số danh mục con muốn hiển thị:</div>
    
    			<div><input id="<?php echo $this->get_field_id( "vietnhat-category-num-subcat" ) ?>" name= "<?php echo $this->get_field_name( 'vietnhat-category-num-subcat' ) ?>" value="<?php echo $instance['vietnhat-category-num-subcat'] ?>" style="width:100%;"  /></div>
    
    		</div>
    
    <?php
    
    	}
    
    }
?>