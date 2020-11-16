<?php 

    function vietnhat_showcat_products_widget_init() {
    
    	register_widget( 'vietnhat_showcat_products_widget' );
    
    }
    
    add_action( 'widgets_init', 'vietnhat_showcat_products_widget_init' );

    class vietnhat_showcat_products_widget extends WP_Widget {	

    	function vietnhat_showcat_products_widget() {
    
    		$widget_ops = array( 'classname' => 'vietnhat-showcat-products', 'description' => 'VietNhat - Hiển thị list sản phẩm của category' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'vietnhat-showcat-products-category' );		
    
    		$this->WP_Widget( 'vietnhat-showcat-products-category', 'VietNhat - Hiển thị list sản phẩm của category', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
    		extract( $args );
    
    		$title = apply_filters('widget_title', $instance['title'] );
    
    		$cat_id = $instance['vietnhat-showcat-products-category-mcategory'];
    	
    		$posts_per_page = $instance['vietnhat-showcat-products-category-posts-per-page']; ?>
    		
    
    		<?php ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_showcat_products_widget.php' ); 
    			
    	  	    $contents = ob_get_contents(); 
    
    	  	   ob_end_clean(); ?>
    	  		   
    
    		<?php printf("%s", $contents); ?>
    			  
    
    	<?php }
    
    	//Update the widget 	 
    
    	function update( $new_instance, $old_instance ) {
    		
    
    		$instance = $old_instance;
    
    		//Strip tags from title and name to remove HTML 	
    		
    
    		$instance['title'] = strip_tags( $new_instance['title'] );
    		
    		$instance['vietnhat-showcat-products-category-mcategory'] = $new_instance['vietnhat-showcat-products-category-mcategory'];
    
    		$instance['vietnhat-showcat-products-category-posts-per-page'] = $new_instance['vietnhat-showcat-products-category-posts-per-page'];
    
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
    
    		    	<select id="<?php echo $this->get_field_id('vietnhat-showcat-products-category-mcategory') ?>" name="<?php echo $this->get_field_name('vietnhat-showcat-products-category-mcategory') ?>" style="width:100%;">
    
    				<?php
    
    					   $args = array(
    							  'orderby' => 'name',
    							  'hide_empty' => 0
    						  );
    						$categories = get_categories( $args );
    
    						foreach ($categories as $cat) : ?>
    
    							<option value="<?php echo $cat->term_id ?>" <?php selected($instance['vietnhat-showcat-products-category-mcategory'], $cat->term_id) ?>><?php echo $cat->name ?></option>						
    
    				    <?php 
    
    				    	endforeach;  
    
    				    ?>
    
    			    </select>
    
    		 	</div>
    
    		</div>	
    
    		<div class="input-box">
    
    			<div>Số sản phẩm muốn hiển thị:</div>
    
    			<div><input id="<?php echo $this->get_field_id( "vietnhat-showcat-products-category-posts-per-page" ) ?>" name= "<?php echo $this->get_field_name( 'vietnhat-showcat-products-category-posts-per-page' ) ?>" value="<?php echo $instance['vietnhat-showcat-products-category-posts-per-page'] ?>" style="width:100%;"  /></div>
    
    		</div>
    
    <?php
    
    	}
    
    }
?>