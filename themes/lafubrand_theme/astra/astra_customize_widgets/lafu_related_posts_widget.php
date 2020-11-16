<?php 

    function astra_related_posts_widget_init() {

        register_widget( 'astra_related_posts_widget' );
        
    }
    
    add_action( 'widgets_init', 'astra_related_posts_widget_init' );

    class astra_related_posts_widget extends WP_Widget {	       

    	function astra_related_posts_widget() {
    
    		$widget_ops = array( 'classname' => 'astra-related-posts-widget', 'description' => 'astra - Display related posts exclude category' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'astra-related-posts-widget' );		
    
    		$this->WP_Widget( 'astra-related-posts-widget', 'astra - Display related posts exclude category', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
            extract( $args ); 
            
            $title = $instance['title'];
            $thumbnail_size = $instance['thumbnail_size'];
            $num_posts = $instance['num_posts'];
            $limit_post_title_chars = $instance['limit_post_title_chars'];

            if ( is_single() ) :
                
                $category = get_the_category();
                $category = $category[0];

                list($thumb_width, $thumb_height) = explode('x', $thumbnail_size);

                $title = str_replace('{%cat_name}', $category->name, $title);
                
            endif;            
    		
    		ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_related_posts_widget.php' ); 
    			
    	  	    $contents = ob_get_contents(); 
    
    	  	   ob_end_clean(); ?>
    	  		   
    
    		<?php printf("%s", $contents); ?>
    			  
    
    	<?php }
    
    	//Update the widget 	 
    
    	function update( $new_instance, $old_instance ) {    		
    
    		$instance = $old_instance;
    
    		//Strip tags from title and name to remove HTML
    
            $instance['title'] = strip_tags( $new_instance['title'] );
            $instance['thumbnail_size'] = strip_tags( $new_instance['thumbnail_size'] );
            $instance['num_posts'] = strip_tags( $new_instance['num_posts'] );            
            $instance['limit_post_title_chars'] = intval( $new_instance['limit_post_title_chars'] );
    
    		return $instance;
    
    	}
    
    	function form( $instance ) {
    
    		//Set up some default widget settings.
    
            $defaults = array( 'title' => 'Bài mới chuyên mục {%cat_name}', 
                               'num_posts' => 5,  
                               'thumbnail_size' => '75x75',
                               'limit_post_title_chars' => -1,  
                               'name' => 'lafubrand developer');
    
    		$instance = wp_parse_args( (array) $instance, $defaults ); ?>	

            <div class="input-box">

                <div>Title:</div>
        
                <div>

                    <input id="<?php echo $this->get_field_id( "title" ) ?>" 
                           name= "<?php echo $this->get_field_name( 'title' ) ?>" 
                           value="<?php echo $instance['title'] ?>" style="width:100%;" />
                
                </div>


            </div>

            <div class="input-box">

                <div>Số ký tự tiêu đề bài viết sẽ giới hạn (nhập "-1" là không giới hạn):</div>
        
                <div>

                    <input id="<?php echo $this->get_field_id( "limit_post_title_chars" ) ?>" 
                           name= "<?php echo $this->get_field_name( 'limit_post_title_chars' ) ?>" 
                           value="<?php echo $instance['limit_post_title_chars'] ?>" style="width:100%;" />
                
                </div>


            </div>

            <div class="input-box" style="margin-top: 10px">

                <div>Số bài viết cần hiển thị:</div>
        
                <div>

                    <input id="<?php echo $this->get_field_id( "num_posts" ) ?>" 
                           name= "<?php echo $this->get_field_name( 'num_posts' ) ?>" 
                           value="<?php echo $instance['num_posts'] ?>" style="width:100%;" />
                
                </div>


            </div>
            
            <div class="input-box">

                <div>Kích thước thumbnail([width]x[height])(px):</div>
        
                <div>

                    <input id="<?php echo $this->get_field_id( "thumbnail_size" ) ?>" 
                           name= "<?php echo $this->get_field_name( 'thumbnail_size' ) ?>" 
                           value="<?php echo $instance['thumbnail_size'] ?>" style="width:100%;" />
                
                </div>


            </div>
    
    <?php
    
    	}
    
    }
?>