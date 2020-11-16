<?php 

    function pitvietco_feature_single_product_widget_init() {
    
        register_widget( 'pitvietco_feature_single_product_widget' );
    
    }
    
    add_action( 'widgets_init', 'pitvietco_feature_single_product_widget_init' );

    class pitvietco_feature_single_product_widget extends WP_Widget { 

        function pitvietco_feature_single_product_widget() {
    
            $widget_ops = array( 'classname' => 'pitvietco-feature-single-product', 'description' => 'pitvietco - Hiển thị những sản phẩm nổi bật' );
    
            $control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'pitvietco-feature-single-product' );     
    
            $this->WP_Widget( 'pitvietco-feature-single-product', 'pitvietco - Hiển thị những sản phẩm nổi bật', $widget_ops, $control_ops );
    
        }   
        
        function widget( $args, $instance ) {
    
            extract( $args );
    
            $title = apply_filters('widget_title', $instance['title'] );
    
            $product_id = (int) $instance['pitvietco-feature-single-product-parent'];
        
            $num_items = (int) $instance['pitvietco-feature-single-product-num-items']; 

            ob_start(); 
    
                include ( dirname(__FILE__) . '/templates/tp_feature_single_product_widget.php' ); 
                
                $contents = ob_get_contents();
    
               ob_end_clean();

               printf("%s", $contents);
        }
    
        //Update the widget      
    
        function update( $new_instance, $old_instance ) {
            
    
            $instance = $old_instance;
    
            //Strip tags from title and name to remove HTML
    
            $instance['title'] = strip_tags( $new_instance['title'] );
            
            $instance['pitvietco-feature-single-product-parent'] = (int) $new_instance['pitvietco-feature-single-product-parent'];
    
            $instance['pitvietco-feature-single-product-num-items'] = (int) $new_instance['pitvietco-feature-single-product-num-items'];
    
            return $instance;
    
        }
    
        function form( $instance ) {
    
            //Set up some default widget settings.
    
            $defaults = array( 'title' => '', 'name' => 'pitvietco');
    
            $instance = wp_parse_args( (array) $instance, $defaults ); 

            $post_type = 'san-pham'; 

            $product_id = (int) $instance['pitvietco-feature-single-product-parent'];  ?>   
    
            <div class="input-box">
    
                <div>Tiêu đề:</div>
    
                <div><input id="<?php echo $this->get_field_id( "title" ) ?>" name= "<?php echo $this->get_field_name( 'title' ) ?>" value="<?php echo $instance['title'] ?>" style="width:100%;"  /></div>
    
            </div>
            
            <div class="input-box">
    
                <div>Sản phẩm:</div>
    
                <div>

                    <select id="<?php echo $this->get_field_id( "pitvietco-feature-single-product-parent" ) ?>" name="<?php echo $this->get_field_name( "pitvietco-feature-single-product-parent" ) ?>">                      
    
                    <?php 
                        $args = array(
                           'post_type' => $post_type,                           
                           'order' => 'desc',
                           'orderby' => 'date',
                           'posts_per_page' => -1,
                           'no_paging' => true
                        );
                        query_posts( $args );

                        if ( have_posts() ) :

                            while ( have_posts() ) : the_post(); ?>

                                <option value="<?php the_ID(); ?>" <?php selected( $product_id, get_the_id(), "selected='selected'" ); ?>>
                                    <?php the_title(); ?>
                                </option>

                    <?php   endwhile;

                            wp_reset_query();

                        endif; ?>

                    </select>
    
                </div>
    
            </div>  
    
            <div class="input-box">
    
                <div>Số sản phẩm muốn hiển thị:</div>
    
                <div>
                    <input id="<?php echo $this->get_field_id( "pitvietco-feature-single-product-num-items" ) ?>" 
                           name= "<?php echo $this->get_field_name( 'pitvietco-feature-single-product-num-items' ) ?>" 
                           value="<?php echo $instance['pitvietco-feature-single-product-num-items'] ?>" 
                           style="width:100%;"  />
                </div>
    
            </div>
    
    <?php
    
        }
    
    }
?>