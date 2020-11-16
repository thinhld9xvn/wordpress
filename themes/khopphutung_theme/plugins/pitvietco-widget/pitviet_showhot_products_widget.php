<?php

    function pitvietco_showhot_products_widget_init() {
    
        register_widget( 'pitvietco_showhot_products_widget' );
    
    }
    
    add_action( 'widgets_init', 'pitvietco_showhot_products_widget_init' );

    class pitvietco_showhot_products_widget extends WP_Widget { 

        function pitvietco_showhot_products_widget() {
    
            $widget_ops = array( 'classname' => 'pitvietco-showhot-products', 'description' => 'pitvietco - Hiển thị sản phẩm hot' );
    
            $control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'pitvietco-showhot-products' );     
    
            $this->WP_Widget( 'pitvietco-showhot-products', 'pitvietco - Hiển thị sản phẩm hot', $widget_ops, $control_ops );
    
        }   
        
        function widget( $args, $instance ) {
    
            extract( $args );
    
            $title = apply_filters('widget_title', $instance['title'] );
    
            $custom_post_type = $instance['pitvietco-showhot-products-custom-post-type'];
            $taxonomy_slug = $instance['pitvietco-showhot-products-mtaxonomy'];
            $term_id = $instance['pitvietco-showhot-products-mterm'];
        
            $posts_per_page = $instance['pitvietco-showhot-products-num-post']; 
            $show_posts = $instance['pitvietco-showhot-products-show-post']; 

            ob_start(); 
    
                include ( dirname(__FILE__) . '/templates/tp_showhot_products_widget.php' ); 
                
                $contents = ob_get_contents(); 
    
               ob_end_clean(); 

            printf("%s", $contents); 

         }
    
        //Update the widget      
    
        function update( $new_instance, $old_instance ) {

            $instance = $old_instance;
    
            //Strip tags from title and name to remove HTML
    
            $instance['title'] = strip_tags( $new_instance['title'] );
            
            $instance['pitvietco-showhot-products-custom-post-type'] = $new_instance['pitvietco-showhot-products-custom-post-type'];           
    
            $instance['pitvietco-showhot-products-show-post'] = $new_instance['pitvietco-showhot-products-show-post'];
            $instance['pitvietco-showhot-products-num-post'] = $new_instance['pitvietco-showhot-products-num-post'];
    
            return $instance;
    
        }
    
        function form( $instance ) {
    
            //Set up some default widget settings.
    
            $defaults = array( 'title' => '', 'name' => 'pitviet developer');
    
            $instance = wp_parse_args( (array) $instance, $defaults ); ?>   

            <div class="pitviet-widget-group-box">
    
                <div class="input-box">
        
                    <div>Tiêu đề:</div>
        
                    <div><input id="<?php echo $this->get_field_id( "title" ) ?>" name= "<?php echo $this->get_field_name( 'title' ) ?>" value="<?php echo $instance['title'] ?>" style="width:100%;"  /></div>
        
                </div>

                <div class="input-box">
        
                    <div>Custom Post Type:</div>
        
                    <div>
        
                        <select id="<?php echo $this->get_field_id('pitvietco-showhot-products-custom-post-type') ?>" name="<?php echo $this->get_field_name('pitvietco-showhot-products-custom-post-type') ?>" style="width:100%;">
                        
                        <?php                   
                        
                           $args = array(
                               'public'   => true,
                               '_builtin' => false
                            );

                            $output = 'names'; // names or objects, note names is the default
                            $operator = 'and'; // 'and' or 'or'

                            $post_types = get_post_types( $args, $output, $operator ); 

                            foreach( $post_types as $p_type ) : ?>

                                <option value="<?php echo $p_type ?>" 
                                        <?php selected( $instance['pitvietco-showhot-products-custom-post-type'], $p_type ) ?>>
                                            <?php echo $p_type ?>
                                </option>                        

                      <?php endforeach; ?>
                        
        
                        </select>
        
                    </div>
        
                </div>   

                 <div class="input-box">
        
                    <div>Số bài viết được hiển thị:</div>
        
                    <div>
                        <input id="<?php echo $this->get_field_id( "pitvietco-showhot-products-show-post" ) ?>" 
                                name= "<?php echo $this->get_field_name( 'pitvietco-showhot-products-show-post' ) ?>" 
                                value="<?php echo $instance['pitvietco-showhot-products-show-post'] ?>" 
                                style="width:100%;" />
                    </div>
        
                </div>              
        
                <div class="input-box">
        
                    <div>Số bài viết tối đa muốn hiển thị:</div>
        
                    <div>
                        <input id="<?php echo $this->get_field_id( "pitvietco-showhot-products-num-post" ) ?>" 
                               name= "<?php echo $this->get_field_name( 'pitvietco-showhot-products-num-post' ) ?>" 
                               value="<?php echo $instance['pitvietco-showhot-products-num-post'] ?>" 
                               style="width:100%;"  />
                    </div>
        
                </div>               

            </div>
    
    <?php
    
        }
    
    }
?>