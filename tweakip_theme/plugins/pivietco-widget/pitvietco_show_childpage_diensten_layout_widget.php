<?php

    function pitvietco_show_childpage_diensten_widget_init() {
    
        register_widget( 'pitvietco_show_childpage_diensten_widget' );
    
    }
    
    add_action( 'widgets_init', 'pitvietco_show_childpage_diensten_widget_init' );

    class pitvietco_show_childpage_diensten_widget extends WP_Widget { 

        function pitvietco_show_childpage_diensten_widget() {
    
            $widget_ops = array( 'classname' => 'pitvietco-show-childpage-diensten', 'description' => 'pitvietco - Display child page diensten layout' );
    
            $control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'pitvietco-show-childpage-diensten' );     
    
            $this->WP_Widget( 'pitvietco-show-childpage-diensten', 'pitvietco - Display child page diensten layout', $widget_ops, $control_ops );
    
        }   
        
        function widget( $args, $instance ) {
    
            extract( $args );
    
            $title = apply_filters('widget_title', $instance['title'] );
            
            $p_id = $instance['pitvietco-show-childpage-diensten-id']; 
            $p_class = $instance['pitvietco-show-childpage-diensten-class']; 

            $p_layout = $instance['pitvietco-show-childpage-diensten-layout'];

            $page_id = $instance['pitvietco-show-childpage-diensten-page'];                   
            

            ob_start(); 
    
                include ( dirname(__FILE__) . '/templates/tp_show_childpage_diensten_layout_widget.php' ); 
                
                $contents = ob_get_contents(); 
    
               ob_end_clean(); 

            printf("%s", $contents); 

         }
    
        //Update the widget      
    
        function update( $new_instance, $old_instance ) {

            $instance = $old_instance;
    
            //Strip tags from title and name to remove HTML
    
            $instance['title'] = strip_tags( $new_instance['title'] );

            $instance['pitvietco-show-childpage-diensten-id'] = strip_tags( $new_instance['pitvietco-show-childpage-diensten-id'] );
            $instance['pitvietco-show-childpage-diensten-class'] = strip_tags( $new_instance['pitvietco-show-childpage-diensten-class'] );
            
            $instance['pitvietco-show-childpage-diensten-page'] = $new_instance['pitvietco-show-childpage-diensten-page'];               
            
    
            return $instance;
    
        }
    
        function form( $instance ) {
    
            //Set up some default widget settings.
    
            $defaults = array( 'title' => '', 'name' => 'pitviet developer');
    
            $instance = wp_parse_args( (array) $instance, $defaults ); ?>   

            <div class="pitviet-widget-group-box">                
    
                <div class="input-box">
        
                    <div>Title:</div>
        
                    <div>
                        <input id="<?php echo $this->get_field_id( "title" ) ?>" 
                               name= "<?php echo $this->get_field_name( 'title' ) ?>" 
                               value="<?php echo $instance['title'] ?>" 
                               style="width:100%;"  />
                    </div>
        
                </div>

                <div class="input-box">
        
                    <div>ID:</div>
        
                    <div>
                        <input id="<?php echo $this->get_field_id( "pitvietco-show-childpage-diensten-id" ) ?>" 
                               name= "<?php echo $this->get_field_name( "pitvietco-show-childpage-diensten-id" ) ?>" 
                               value="<?php echo $instance["pitvietco-show-childpage-diensten-id"] ?>" 
                               style="width:100%;"  />
                    </div>
        
                </div>

                <div class="input-box">
        
                    <div>Class:</div>
        
                    <div>
                        <input id="<?php echo $this->get_field_id( "pitvietco-show-childpage-diensten-class" ) ?>" 
                               name= "<?php echo $this->get_field_name( "pitvietco-show-childpage-diensten-class" ) ?>" 
                               value="<?php echo $instance["pitvietco-show-childpage-diensten-class"] ?>" 
                               style="width:100%;"  />
                    </div>
        
                </div>

                <div class="input-box">
        
                    <div>Page:</div>
        
                    <div>
        
                        <select id="<?php echo $this->get_field_id('pitvietco-show-childpage-diensten-page') ?>" 
                                name="<?php echo $this->get_field_name('pitvietco-show-childpage-diensten-page') ?>" 
                                style="width:100%;">
                        
                        <?php  

                           $pages = get_pages();

                            foreach( $pages as $p ) : ?>

                                <option value="<?php echo $p->ID ?>" 
                                        <?php selected( $instance['pitvietco-show-childpage-diensten-page'], $p->ID ) ?>>
                                            <?php echo $p->post_title ?>
                                </option>                        

                      <?php endforeach; ?>
                        
        
                        </select>
        
                    </div>
        
                </div> 

            </div>
    
    <?php
    
        }
    
    }
?>