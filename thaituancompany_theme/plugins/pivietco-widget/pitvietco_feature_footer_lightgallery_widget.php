<?php 

    function pitvietco_feature_footer_lightgallery_widget_init() {
    
        register_widget( 'pitvietco_feature_footer_lightgallery_widget' );
    
    }
    
    add_action( 'widgets_init', 'pitvietco_feature_footer_lightgallery_widget_init' );

    class pitvietco_feature_footer_lightgallery_widget extends WP_Widget { 

        function pitvietco_feature_footer_lightgallery_widget() {
    
            $widget_ops = array( 'classname' => 'pitvietco-feature-footer-lightgallery', 'description' => 'pitvietco - Hiển thị thumbnail slideshow' );
    
            $control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'pitvietco-feature-footer-lightgallery' );     
    
            $this->WP_Widget( 'pitvietco-feature-footer-lightgallery', 'pitvietco - Hiển thị thumbnail slideshow', $widget_ops, $control_ops );
    
        }   
        
        function widget( $args, $instance ) {
    
            extract( $args );
    
            $title = apply_filters('widget_title', $instance['title'] );
    
            $post_type = $instance['pitvietco-feature-footer-lightgallery-post-type'];
        
            $num_items = (int) $instance['pitvietco-feature-footer-lightgallery-num-items']; 

            ob_start(); 
    
                include ( dirname(__FILE__) . '/templates/tp_pitvietco_feature_footer_lightgallery.php' ); 
                
                $contents = ob_get_contents();
    
               ob_end_clean();

               printf("%s", $contents);
        }
    
        //Update the widget      
    
        function update( $new_instance, $old_instance ) {
            
    
            $instance = $old_instance;
    
            //Strip tags from title and name to remove HTML
    
            $instance['title'] = strip_tags( $new_instance['title'] );
            
            $instance['pitvietco-feature-footer-lightgallery-post-type'] = $new_instance['pitvietco-feature-footer-lightgallery-post-type'];
    
            $instance['pitvietco-feature-footer-lightgallery-num-items'] = (int) $new_instance['pitvietco-feature-footer-lightgallery-num-items'];
    
            return $instance;
    
        }
    
        function form( $instance ) {
    
            //Set up some default widget settings.
    
            $defaults = array( 'title' => '', 'name' => 'pitvietco');
    
            $instance = wp_parse_args( (array) $instance, $defaults ); ?>   
    
            <div class="input-box">
    
                <div>Tiêu đề:</div>
    
                <div>
                    <input id="<?php echo $this->get_field_id( "title" ) ?>" name= "<?php echo $this->get_field_name( 'title' ) ?>" value="<?php echo $instance['title'] ?>" style="width:100%;"  />
                </div>
    
            </div>
            
            <div class="input-box">
    
                <div>Post type</div>
    
                <div>

                    <select id="<?php echo $this->get_field_id('pitvietco-feature-footer-lightgallery-post-type') ?>" name="<?php echo $this->get_field_name('pitvietco-feature-footer-lightgallery-post-type') ?>" style="width:100%;">
    
                    <?php
                        
                        $args = array(
                           'public'   => true,
                           '_builtin' => false
                        );

                        $output = 'objects'; 
                        $operator = 'and';

                        $post_types = get_post_types( $args, $output, $operator );

                        if ( $post_types ) :

                          foreach ( $post_types as $post_type ) : ?>

                            <option value="<?php echo $post_type->name ?>" 
                                    <?php selected( $instance['pitvietco-feature-footer-lightgallery-post-type'], $post_type->name ) ?>>

                                    <?php echo $post_type->label ?>

                            </option>    

             <?php         endforeach;

                        endif; ?>
    
                    </select>
    
                </div>
    
            </div>  
    
            <div class="input-box">
    
                <div>Số ảnh muốn hiển thị:</div>
    
                <div>
                    <input id="<?php echo $this->get_field_id( "pitvietco-feature-footer-lightgallery-num-items" ) ?>" 
                           name= "<?php echo $this->get_field_name( 'pitvietco-feature-footer-lightgallery-num-items' ) ?>" 
                           value="<?php echo $instance['pitvietco-feature-footer-lightgallery-num-items'] ?>" 
                           style="width:100%;"  />
                </div>
    
            </div>
    
    <?php
    
        }
    
    }
?>