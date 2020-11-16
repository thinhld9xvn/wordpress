<?php 

    function pitvietco_partner_logo_widget_init() {
    
    	register_widget( 'pitvietco_partner_logo_widget' );
    
    }
    
    add_action( 'widgets_init', 'pitvietco_partner_logo_widget_init' );

    class pitvietco_partner_logo_widget extends WP_Widget {	

    	function pitvietco_partner_logo_widget() {
    
    		$widget_ops = array( 'classname' => 'pitvietco-partner-logo', 'description' => 'pitvietco - Hiển thị Logo đối tác' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'pitvietco-partner-logo' );		
    
    		$this->WP_Widget( 'pitvietco-partner-logo', 'pitvietco - Hiển thị Logo đối tác', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
    		extract( $args );
    
    		$title = apply_filters('widget_title', $instance['title'] );
    
    		$post_type = $instance['pitvietco-partner-logo-mposttype'];
    	
    		$num_items = $instance['pitvietco-partner-logo-num-items']; 

            ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_partner_logo_widget.php' ); 
    			
    	  	    $contents = ob_get_contents(); 
    
    	  	   ob_end_clean(); ?>
    	  		   
    
    		<?php printf("%s", $contents); ?>
    			  
    
    	<?php }
    
    	//Update the widget 	 
    
    	function update( $new_instance, $old_instance ) {
    		
    
    		$instance = $old_instance;
    
    		//Strip tags from title and name to remove HTML
    
    		$instance['title'] = strip_tags( $new_instance['title'] );
    		
    		$instance['pitvietco-partner-logo-mposttype'] = $new_instance['pitvietco-partner-logo-mposttype'];
    
    		$instance['pitvietco-partner-logo-num-items'] = $new_instance['pitvietco-partner-logo-num-items'];
    
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
    
    		    	<select id="<?php echo $this->get_field_id('pitvietco-partner-logo-mposttype') ?>" name="<?php echo $this->get_field_name('pitvietco-partner-logo-mposttype') ?>" style="width:100%;">
    
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
                                    <?php selected( $instance['pitvietco-partner-logo-mposttype'], $post_type->name ) ?>>

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
                    <input id="<?php echo $this->get_field_id( "pitvietco-partner-logo-num-items" ) ?>" 
                           name= "<?php echo $this->get_field_name( 'pitvietco-partner-logo-num-items' ) ?>" 
                           value="<?php echo $instance['pitvietco-partner-logo-num-items'] ?>" 
                           style="width:100%;"  />
                </div>
    
    		</div>
    
    <?php
    
    	}
    
    }
?>