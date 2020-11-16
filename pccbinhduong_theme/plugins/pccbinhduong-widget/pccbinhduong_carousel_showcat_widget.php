<?php 

    function pccbinhduong_carousel_showcat_widget_init() {
    
    	register_widget( 'pccbinhduong_carousel_showcat_widget' );
    
    }
    
    add_action( 'widgets_init', 'pccbinhduong_carousel_showcat_widget_init' );

    class pccbinhduong_carousel_showcat_widget extends WP_Widget {	

    	function pccbinhduong_carousel_showcat_widget() {
    
    		$widget_ops = array( 'classname' => 'pccbinhduong-carousel-showcat', 'description' => 'pccbinhduong - Hiển thị carousel nội dung một category' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'pccbinhduong-carousel-showcat' );		
    
    		$this->WP_Widget( 'pccbinhduong-carousel-showcat', 'pccbinhduong - Hiển thị carousel nội dung một category', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
    		extract( $args );
    
    		$title = apply_filters('widget_title', $instance['title'] );
    
    		$cat_id = $instance['pccbinhduong-carousel-showcat-mcategory'];
    	
    		$posts_per_page = $instance['pccbinhduong-carousel-showcat-num-post']; ?>
    		
    
    		<?php ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_carousel_showcat_widget.php' ); 
    			
    	  	    $contents = ob_get_contents(); 
    
    	  	   ob_end_clean(); ?>
    	  		   
    
    		<?php printf("%s", $contents); ?>
    			  
    
    	<?php }
    
    	//Update the widget 	 
    
    	function update( $new_instance, $old_instance ) {
    		
    
    		$instance = $old_instance;
    
    		//Strip tags from title and name to remove HTML 	
    		
    
    		$instance['title'] = strip_tags( $new_instance['title'] );
    		
    		$instance['pccbinhduong-carousel-showcat-mcategory'] = $new_instance['pccbinhduong-carousel-showcat-mcategory'];
    
    		$instance['pccbinhduong-carousel-showcat-num-post'] = $new_instance['pccbinhduong-carousel-showcat-num-post'];
    
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
    
    		    	<select id="<?php echo $this->get_field_id('pccbinhduong-carousel-showcat-mcategory') ?>" name="<?php echo $this->get_field_name('pccbinhduong-carousel-showcat-mcategory') ?>" style="width:100%;">
    
    				<?php
    
    					   $args = array(
    							  'orderby' => 'name',
    							  'hide_empty' => 0
    						  );
    						$categories = get_categories( $args );
    
    						foreach ($categories as $cat) : ?>
    
    							<option value="<?php echo $cat->term_id ?>" <?php selected($instance['pccbinhduong-carousel-showcat-mcategory'], $cat->term_id) ?>><?php echo $cat->name ?></option>						
    
    				    <?php 
    
    				    	endforeach;  
    
    				    ?>
    
    			    </select>
    
    		 	</div>
    
    		</div>	
    
    		<div class="input-box">
    
    			<div>Số bài viết muốn hiển thị:</div>
    
    			<div><input id="<?php echo $this->get_field_id( "pccbinhduong-carousel-showcat-num-post" ) ?>" name= "<?php echo $this->get_field_name( 'pccbinhduong-carousel-showcat-num-post' ) ?>" value="<?php echo $instance['pccbinhduong-carousel-showcat-num-post'] ?>" style="width:100%;"  /></div>
    
    		</div>
    
    <?php
    
    	}
    
    }
?>