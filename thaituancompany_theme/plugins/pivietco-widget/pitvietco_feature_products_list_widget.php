<?php 

    function pitvietco_feature_products_list_widget_init() {
    
        register_widget( 'pitvietco_feature_products_list_widget' );
    
    }
    
    add_action( 'widgets_init', 'pitvietco_feature_products_list_widget_init' );

    class pitvietco_feature_products_list_widget extends WP_Widget { 

        function pitvietco_feature_products_list_widget() {
    
            $widget_ops = array( 'classname' => 'pitvietco-feature-products-list', 'description' => 'pitvietco - Hiển thị danh sách sản phẩm' );
    
            $control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'pitvietco-feature-products-list' );     
    
            $this->WP_Widget( 'pitvietco-feature-products-list', 'pitvietco - Hiển thị danh sách sản phẩm', $widget_ops, $control_ops );
    
        }   
        
        function widget( $args, $instance ) {
    
            extract( $args );
    
            $title = apply_filters('widget_title', $instance['title'] );
    
            $post_type = $instance['pitvietco-feature-products-list-post-type'];
        
            $num_items = (int) $instance['pitvietco-feature-products-list-num-items']; 

            ob_start(); 
    
                include ( dirname(__FILE__) . '/templates/tp_pitvietco_feature_products_list_widget.php' ); 
                
                $contents = ob_get_contents();
    
               ob_end_clean();

               printf("%s", $contents);
        }
    
        //Update the widget      
    
        function update( $new_instance, $old_instance ) {
            
    
            $instance = $old_instance;
    
            //Strip tags from title and name to remove HTML
    
            $instance['title'] = strip_tags( $new_instance['title'] );
            
            $instance['pitvietco-feature-products-list-post-type'] = $new_instance['pitvietco-feature-products-list-post-type'];
    
            $instance['pitvietco-feature-products-list-num-items'] = (int) $new_instance['pitvietco-feature-products-list-num-items'];
    
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

                    <select id="<?php echo $this->get_field_id('pitvietco-feature-products-list-post-type') ?>" name="<?php echo $this->get_field_name('pitvietco-feature-products-list-post-type') ?>" style="width:100%;">
    
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
                                    <?php selected( $instance['pitvietco-feature-products-list-post-type'], $post_type->name ) ?>>

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
                    <input id="<?php echo $this->get_field_id( "pitvietco-feature-products-list-num-items" ) ?>" 
                           name= "<?php echo $this->get_field_name( 'pitvietco-feature-products-list-num-items' ) ?>" 
                           value="<?php echo $instance['pitvietco-feature-products-list-num-items'] ?>" 
                           style="width:100%;"  />
                </div>
    
            </div>
    
    <?php
    
        }
    
    }
?>