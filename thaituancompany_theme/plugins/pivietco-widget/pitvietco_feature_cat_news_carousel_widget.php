<?php 

    function pitvietco_feature_cat_news_carousel_widget_init() {
    
        register_widget( 'pitvietco_feature_cat_news_carousel_widget' );
    
    }
    
    add_action( 'widgets_init', 'pitvietco_feature_cat_news_carousel_widget_init' );

    class pitvietco_feature_cat_news_carousel_widget extends WP_Widget { 

        function pitvietco_feature_cat_news_carousel_widget() {
    
            $widget_ops = array( 'classname' => 'pitvietco-feature-cat-news-carousel', 'description' => 'pitvietco - Hiển thị danh mục tin nổi bật ( dạng carousel )' );
    
            $control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'pitvietco-feature-cat-news-carousel' );     
    
            $this->WP_Widget( 'pitvietco-feature-cat-news-carousel', 'pitvietco - Hiển thị danh mục tin nổi bật ( dạng carousel )', $widget_ops, $control_ops );
    
        }   
        
        function widget( $args, $instance ) {
    
            extract( $args );
    
            $title = apply_filters('widget_title', $instance['title'] );
    
            $cat_id = (int) $instance['pitvietco-feature-cat-news-carousel-cat-id'];
        
            $num_items = (int) $instance['pitvietco-feature-cat-news-carousel-num-items']; 

            ob_start(); 
    
                include ( dirname(__FILE__) . '/templates/tp_feature_cat_news_carousel.php' ); 
                
                $contents = ob_get_contents();
    
               ob_end_clean();

               printf("%s", $contents);
        }
    
        //Update the widget      
    
        function update( $new_instance, $old_instance ) {
            
    
            $instance = $old_instance;
    
            //Strip tags from title and name to remove HTML
    
            $instance['title'] = strip_tags( $new_instance['title'] );
            
            $instance['pitvietco-feature-cat-news-carousel-cat-id'] = (int) $new_instance['pitvietco-feature-cat-news-carousel-cat-id'];
    
            $instance['pitvietco-feature-cat-news-carousel-num-items'] = (int) $new_instance['pitvietco-feature-cat-news-carousel-num-items'];
    
            return $instance;
    
        }
    
        function form( $instance ) {
    
            //Set up some default widget settings.
    
            $defaults = array( 'title' => '', 'name' => 'pitvietco');
    
            $instance = wp_parse_args( (array) $instance, $defaults ); 
            $selected_term = $instance['pitvietco-feature-cat-news-carousel-cat-id'] ? 
                            (int) $instance['pitvietco-feature-cat-news-carousel-cat-id'] :
                            -1; ?>   
    
            <div class="input-box">
    
                <div>Tiêu đề:</div>
    
                <div>
                    <input id="<?php echo $this->get_field_id( "title" ) ?>" name= "<?php echo $this->get_field_name( 'title' ) ?>" value="<?php echo $instance['title'] ?>" style="width:100%;"  />
                </div>
    
            </div>
            
            <div class="input-box">
    
                <div>Danh mục:</div>
    
                <div>

                   <?php

                        $args = array(                        
                            'show_option_none'   => 'Trống',
                            'option_none_value'  => '-1',
                            'orderby'            => 'ID',
                            'order'              => 'DESC',                     
                            'id'                 => $this->get_field_id( 'pitvietco-feature-cat-news-carousel-cat-id' ),
                            'name'               => $this->get_field_name( 'pitvietco-feature-cat-news-carousel-cat-id' ),
                            'hide_empty'         => 0,                        
                            'selected'           => $selected_term,
                            'hierarchical'       => 1,
                            'taxonomy'           => 'category',
                            'hide_if_empty'      => false,
                            'value_field'        => 'term_id',
                        ); 

                        wp_dropdown_categories( $args ); ?>
    
                </div>
    
            </div>  
    
            <div class="input-box">
    
                <div>Số bài viết muốn hiển thị:</div>
    
                <div>
                    <input id="<?php echo $this->get_field_id( "pitvietco-feature-cat-news-carousel-num-items" ) ?>" 
                           name= "<?php echo $this->get_field_name( 'pitvietco-feature-cat-news-carousel-num-items' ) ?>" 
                           value="<?php echo $instance['pitvietco-feature-cat-news-carousel-num-items'] ?>" 
                           style="width:100%;"  />
                </div>
    
            </div>
    
    <?php
    
        }
    
    }
?>