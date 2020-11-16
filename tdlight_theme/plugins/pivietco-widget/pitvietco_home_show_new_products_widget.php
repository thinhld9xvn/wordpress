<?php 

    function pitvietco_home_show_new_products_widget_init() {
    
        register_widget( 'pitvietco_home_show_new_products_widget' );
    
    }
    
    add_action( 'widgets_init', 'pitvietco_home_show_new_products_widget_init' );

    class pitvietco_home_show_new_products_widget extends WP_Widget { 

        function pitvietco_home_show_new_products_widget() {
    
            $widget_ops = array( 'classname' => 'pitvietco-home-show-new-products', 'description' => 'pitvietco - Hiển thị những sản phẩm mới' );
    
            $control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'pitvietco-home-show-new-products' );     
    
            $this->WP_Widget( 'pitvietco-home-show-new-products', 'pitvietco - Hiển thị những sản phẩm mới', $widget_ops, $control_ops );
    
        }   
        
        function widget( $args, $instance ) {
    
            extract( $args );
    
            $title = apply_filters('widget_title', $instance['title'] );
            
            $num_items = (int) $instance['num-items'];            

            ob_start(); 
    
                include ( dirname(__FILE__) . '/templates/tp_pitvietco_home_show_new_products_widget.php' ); 
                
                $contents = ob_get_contents();
    
               ob_end_clean();

               printf("%s", $contents);
        }
    
        //Update the widget      
    
        function update( $new_instance, $old_instance ) {
            
    
            $instance = $old_instance;
    
            //Strip tags from title and name to remove HTML
    
            $instance['title'] = strip_tags( $new_instance['title'] );           
        
            $instance['num-items'] = (int) $new_instance['num-items'];            
    
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
    
                <div>Số mục muốn hiển thị:</div>
    
                <div>

                    <input id="<?php echo $this->get_field_id( "num-items" ) ?>" name= "<?php echo $this->get_field_name( 'num-items' ) ?>" value="<?php echo $instance['num-items'] ?>" style="width:100%;"  />

                </div>
    
            </div>
            
            
    <?php
    
        }
    
    }
?>