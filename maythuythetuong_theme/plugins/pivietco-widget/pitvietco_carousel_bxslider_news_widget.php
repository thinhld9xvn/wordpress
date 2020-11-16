<?php 

    function pitvietco_carousel_bxslider_news_widget_init() {
    
    	register_widget( 'pitvietco_carousel_bxslider_news_widget' );
    
    }
    
    add_action( 'widgets_init', 'pitvietco_carousel_bxslider_news_widget_init' );

    class pitvietco_carousel_bxslider_news_widget extends WP_Widget {	

    	function pitvietco_carousel_bxslider_news_widget() {
    
    		$widget_ops = array( 'classname' => 'pitvietco-carousel-bxslider-news', 'description' => 'pitvietco - Hiển thị carousel tin tức' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'pitvietco-carousel-bxslider-news' );		
    
    		$this->WP_Widget( 'pitvietco-carousel-bxslider-news', 'pitvietco - Hiển thị carousel tin tức', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
    		extract( $args );
    
    		$title = apply_filters('widget_title', $instance['title'] );
    
    		$cat_id = $instance['pitvietco-carousel-bxslider-news-mcat'];
    	
    		$num_post = $instance['pitvietco-carousel-bxslider-news-num-post']; 

            ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_carousel_bxslider_news_widget.php' ); 
    			
    	  	    $contents = ob_get_contents(); 
    
    	  	   ob_end_clean(); ?>
    	  		   
    
    		<?php printf("%s", $contents); ?>
    			  
    
    	<?php }
    
    	//Update the widget 	 
    
    	function update( $new_instance, $old_instance ) {
    		
    
    		$instance = $old_instance;
    
    		//Strip tags from title and name to remove HTML
    
    		$instance['title'] = strip_tags( $new_instance['title'] );
    		
    		$instance['pitvietco-carousel-bxslider-news-mcat'] = $new_instance['pitvietco-carousel-bxslider-news-mcat'];
    
    		$instance['pitvietco-carousel-bxslider-news-num-post'] = $new_instance['pitvietco-carousel-bxslider-news-num-post'];
    
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
    
    		    <div>Danh mục:</div>
    
    		    <div>
    
    		    	<select id="<?php echo $this->get_field_id('pitvietco-carousel-bxslider-news-mcat') ?>" name="<?php echo $this->get_field_name('pitvietco-carousel-bxslider-news-mcat') ?>" style="width:100%;">
    
    				<?php
                        
                       $args = array(
                            'order' => 'desc',
                            'orderby' => 'date',
                            'hide_empty' => false
                        );

                       $categories = get_categories( $args );

                        if ( $categories ) :

                          foreach ( $categories as $category ) : ?>

                            <option value="<?php echo $category->term_id ?>" 
                                    <?php selected( $instance['pitvietco-carousel-bxslider-news-mcat'], $category->term_id ) ?>>

                                    <?php echo $category->name ?>

                            </option>    

             <?php         endforeach;

                        endif; ?>
    
    			    </select>
    
    		 	</div>
    
    		</div>	
    
    		<div class="input-box">
    
    			<div>Số bài viết muốn hiển thị:</div>
    
    			<div>
                    <input id="<?php echo $this->get_field_id( "pitvietco-carousel-bxslider-news-num-post" ) ?>" 
                           name= "<?php echo $this->get_field_name( 'pitvietco-carousel-bxslider-news-num-post' ) ?>" 
                           value="<?php echo $instance['pitvietco-carousel-bxslider-news-num-post'] ?>" 
                           style="width:100%;"  />
                </div>
    
    		</div>
    
    <?php
    
    	}
    
    }
?>