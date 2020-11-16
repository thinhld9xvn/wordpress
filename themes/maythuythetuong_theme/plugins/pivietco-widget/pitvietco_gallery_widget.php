<?php 

    function pitvietco_gallery_widget_init() {
    
    	register_widget( 'pitvietco_gallery_widget' );
    
    }
    
    add_action( 'widgets_init', 'pitvietco_gallery_widget_init' );

    class pitvietco_gallery_widget extends WP_Widget {	

    	function pitvietco_gallery_widget() {
    
    		$widget_ops = array( 'classname' => 'pitvietco-gallery', 'description' => 'pitvietco - Hiển thị gallery' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'pitvietco-gallery' );		
    
    		$this->WP_Widget( 'pitvietco-gallery', 'pitvietco - Hiển thị gallery', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
    		extract( $args );
    
    		$title = apply_filters('widget_title', $instance['title'] );
    
    		$post_type = $instance['pitvietco-gallery-mposttype'];
    	
    		$gallery_num_items = $instance['pitvietco-gallery-num-items']; 

            ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_gallery_widget.php' ); 
    			
    	  	    $contents = ob_get_contents(); 
    
    	  	   ob_end_clean(); ?>
    	  		   
    
    		<?php printf("%s", $contents); ?>
    			  
    
    	<?php }
    
    	//Update the widget 	 
    
    	function update( $new_instance, $old_instance ) {
    		
    
    		$instance = $old_instance;
    
    		//Strip tags from title and name to remove HTML
    
    		$instance['title'] = strip_tags( $new_instance['title'] );
    		
    		$instance['pitvietco-gallery-mposttype'] = $new_instance['pitvietco-gallery-mposttype'];
    
    		$instance['pitvietco-gallery-num-items'] = $new_instance['pitvietco-gallery-num-items'];
    
    		return $instance;
    
    	}
    
    	function form( $instance ) {
    
    		//Set up some default widget settings.
    
    		$defaults = array( 'title' => '', 'name' => 'pitvietco');
    
    		$instance = wp_parse_args( (array) $instance, $defaults ); ?>	
    
    		<div class="input-box">
    
    			<div>Tiêu đề:</div>
    
    			<div><input id="<?php echo $this->get_field_id( "title" ) ?>" name= "<?php echo $this->get_field_name( 'title' ) ?>" value="<?php echo $instance['title'] ?>" style="width:100%;"  /></div>
    
    		</div>
    		
    		<div class="input-box">
    
    		    <div>Post Type:</div>
    
    		    <div>
    
    		    	<select id="<?php echo $this->get_field_id('pitvietco-gallery-mposttype') ?>" name="<?php echo $this->get_field_name('pitvietco-gallery-mposttype') ?>" style="width:100%;">
    
    				<?php
                        
                        $args = array(
                          'public'   => true,
                          '_builtin' => false
                          
                        ); 
                        $output = 'objects'; // or objects
                        $operator = 'and'; // 'and' or 'or'

                        $post_types = get_post_types( $args, $output, $operator ); 

                        if ( $post_types ) :

                          foreach ( $post_types as $post_type ) : ?>

                            <option value="<?php echo $post_type->name ?>" 
                                    <?php selected( $instance['pitvietco-gallery-mposttype'], $post_type->name ) ?>>

                                    <?php echo $post_type->label ?>

                            </option>    

             <?php         endforeach;

                        endif; ?>
    
    			    </select>
    
    		 	</div>
    
    		</div>	
    
    		<div class="input-box">
    
    			<div>Số hình ảnh muốn hiển thị:</div>
    
    			<div>
                    <input id="<?php echo $this->get_field_id( "pitvietco-gallery-num-items" ) ?>" 
                           name= "<?php echo $this->get_field_name( 'pitvietco-gallery-num-items' ) ?>" 
                           value="<?php echo $instance['pitvietco-gallery-num-items'] ?>" 
                           style="width:100%;"  />
                </div>
    
    		</div>
    
    <?php
    
    	}
    
    }
?>