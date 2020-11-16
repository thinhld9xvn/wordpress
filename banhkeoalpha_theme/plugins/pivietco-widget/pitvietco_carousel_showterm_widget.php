<?php

    function pitvietco_carousel_showterm_widget_init() {
    
        register_widget( 'pitvietco_carousel_showterm_widget' );
    
    }
    
    add_action( 'widgets_init', 'pitvietco_carousel_showterm_widget_init' );

    class pitvietco_carousel_showterm_widget extends WP_Widget { 

        function pitvietco_carousel_showterm_widget() {
    
            $widget_ops = array( 'classname' => 'pitvietco-carousel-showterm', 'description' => 'pitvietco - Hiển thị carousel nội dung một term' );
    
            $control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'pitvietco-carousel-showterm' );     
    
            $this->WP_Widget( 'pitvietco-carousel-showterm', 'pitvietco - Hiển thị nội dung một term', $widget_ops, $control_ops );
    
        }   
        
        function widget( $args, $instance ) {
    
            extract( $args );
    
            $title = apply_filters('widget_title', $instance['title'] );
    
            $custom_post_type = $instance['pitvietco-carousel-showterm-custom-post-type'];
            $taxonomy_slug = $instance['pitvietco-carousel-showterm-mtaxonomy'];
            $term_id = $instance['pitvietco-carousel-showterm-mterm'];
        
            $posts_per_page = $instance['pitvietco-carousel-showterm-num-post']; 

            ob_start(); 
    
                include ( dirname(__FILE__) . '/templates/tp_carousel_showterm_widget.php' ); 
                
                $contents = ob_get_contents(); 
    
               ob_end_clean(); 

            printf("%s", $contents); 

         }
    
        //Update the widget      
    
        function update( $new_instance, $old_instance ) {

            $instance = $old_instance;
    
            //Strip tags from title and name to remove HTML
    
            $instance['title'] = strip_tags( $new_instance['title'] );
            
            $instance['pitvietco-carousel-showterm-custom-post-type'] = $new_instance['pitvietco-carousel-showterm-custom-post-type'];
            $instance['pitvietco-carousel-showterm-mtaxonomy'] = $new_instance['pitvietco-carousel-showterm-mtaxonomy'];
            $instance['pitvietco-carousel-showterm-mterm'] = $new_instance['pitvietco-carousel-showterm-mterm'];
    
            $instance['pitvietco-carousel-showterm-num-post'] = $new_instance['pitvietco-carousel-showterm-num-post'];
    
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
        
                        <select class="slCPostType" id="<?php echo $this->get_field_id('pitvietco-carousel-showterm-custom-post-type') ?>" name="<?php echo $this->get_field_name('pitvietco-carousel-showterm-custom-post-type') ?>" style="width:100%;">
                        
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
                                        <?php selected( $instance['pitvietco-carousel-showterm-custom-post-type'], $p_type ) ?>>
                                            <?php echo $p_type ?>
                                </option>                        

                      <?php endforeach; ?>
                        
        
                        </select>
        
                    </div>
        
                </div>  

                <div class="input-box">
        
                    <div>Taxonomy:</div>
        
                    <div>

                        <?php 
                            $c_post_type = $instance['pitvietco-carousel-showterm-custom-post-type']; ?>
        
                            <select class="slCTaxonomy" id="<?php echo $this->get_field_id('pitvietco-carousel-showterm-mtaxonomy') ?>" name="<?php echo $this->get_field_name('pitvietco-carousel-showterm-mtaxonomy') ?>" style="width:100%;">
                            
                                <?php 

                                    if ( isset( $c_post_type ) && ! empty( $c_post_type ) ) :

                                        $taxonomies = get_object_taxonomies( $c_post_type, 'names' ); 

                                        foreach( $taxonomies as $taxonomy ) : ?>

                                            <option value="<?php echo $taxonomy ?>" 
                                                    <?php selected( $instance['pitvietco-carousel-showterm-mtaxonomy'], $taxonomy ) ?>>
                                                        <?php echo $taxonomy ?>
                                            </option>                        

                              <?php     endforeach; ?>                

                              <?php endif; ?>?>
                            
            
                            </select>
        
                    </div>
        
                </div>  
                
                <div class="input-box">
        
                    <div>Term:</div>
        
                    <div>

                        <?php 
                            $c_taxonomy = $instance['pitvietco-carousel-showterm-mtaxonomy']; ?>
        
                         <select class="slCTerm" id="<?php echo $this->get_field_id('pitvietco-carousel-showterm-mterm') ?>" name="<?php echo $this->get_field_name('pitvietco-carousel-showterm-mterm') ?>" style="width:100%;">
                        
                            <?php  

                                if ( isset( $c_taxonomy ) && ! empty( $c_taxonomy ) ) :                  
                            
                                    $args = array(
                                        'hide_empty' => 0,
                                        'orderby' => 'date',
                                        'order' => 'desc',
                                        'taxonomy' => $c_taxonomy
                                    );

                                    $terms = get_terms( $args );

                                    foreach( $terms as $term ) : ?>

                                        <option value="<?php echo $term->term_id ?>" 
                                                <?php selected( $instance['pitvietco-carousel-showterm-mterm'], $term->term_id ) ?>>
                                                    <?php echo $term->name ?>
                                        </option>                        

                              <?php endforeach; 

                                endif; ?>                   
        
                        </select>
        
                    </div>
        
                </div>  
        
                <div class="input-box">
        
                    <div>Số bài viết muốn hiển thị:</div>
        
                    <div><input id="<?php echo $this->get_field_id( "pitvietco-carousel-showterm-num-post" ) ?>" name= "<?php echo $this->get_field_name( 'pitvietco-carousel-showterm-num-post' ) ?>" value="<?php echo $instance['pitvietco-carousel-showterm-num-post'] ?>" style="width:100%;"  /></div>
        
                </div>

            </div>
    
    <?php
    
        }
    
    }
?>