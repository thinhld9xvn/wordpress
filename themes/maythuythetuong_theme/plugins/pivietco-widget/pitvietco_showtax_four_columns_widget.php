<?php 

    function pitvietco_showtax_four_columns_widget_init() {
    
    	register_widget( 'pitvietco_showtax_four_columns_widget' );
    
    }
    
    add_action( 'widgets_init', 'pitvietco_showtax_four_columns_widget_init' );

    class pitvietco_showtax_four_columns_widget extends WP_Widget {	

    	function pitvietco_showtax_four_columns_widget() {
    
    		$widget_ops = array( 'classname' => 'pitvietco-showtax-four-columns', 'description' => 'pitvietco - Hiển thị các term trong taxonomy ( 4 cột )' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'pitvietco-showtax-four-columns' );		
    
    		$this->WP_Widget( 'pitvietco-showtax-four-columns', 'pitvietco - Hiển thị các term trong taxonomy ( 4 cột )', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
    		extract( $args );
    
    		$title = apply_filters('widget_title', $instance['title'] );
    
    		$taxonomy = $instance['pitvietco-showtax-four-columns-mtaxonomy'];
    	
    		$terms_number = $instance['pitvietco-showtax-four-columns-num-term']; 

            ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_showtax_four_columns_widget.php' ); 
    			
    	  	    $contents = ob_get_contents(); 
    
    	  	   ob_end_clean(); ?>
    	  		   
    
    		<?php printf("%s", $contents); ?>
    			  
    
    	<?php }
    
    	//Update the widget 	 
    
    	function update( $new_instance, $old_instance ) {
    		
    
    		$instance = $old_instance;
    
    		//Strip tags from title and name to remove HTML
    
    		$instance['title'] = strip_tags( $new_instance['title'] );
    		
    		$instance['pitvietco-showtax-four-columns-mtaxonomy'] = $new_instance['pitvietco-showtax-four-columns-mtaxonomy'];
    
    		$instance['pitvietco-showtax-four-columns-num-term'] = $new_instance['pitvietco-showtax-four-columns-num-term'];
    
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
    
    		    <div>Taxonomy:</div>
    
    		    <div>
    
    		    	<select id="<?php echo $this->get_field_id('pitvietco-showtax-four-columns-mtaxonomy') ?>" name="<?php echo $this->get_field_name('pitvietco-showtax-four-columns-mtaxonomy') ?>" style="width:100%;">
    
    				<?php
                        
                        $args = array(
                          'public'   => true,
                          '_builtin' => false
                          
                        ); 
                        $output = 'objects'; // or objects
                        $operator = 'and'; // 'and' or 'or'

                        $taxonomies = get_taxonomies( $args, $output, $operator ); 

                        if ( $taxonomies ) :

                          foreach ( $taxonomies as $taxonomy ) : ?>

                            <option value="<?php echo $taxonomy->name ?>" 
                                    <?php selected( $instance['pitvietco-showtax-four-columns-mtaxonomy'], $taxonomy->name ) ?>>

                                    <?php echo $taxonomy->label ?>

                            </option>    

             <?php         endforeach;

                        endif; ?>
    
    			    </select>
    
    		 	</div>
    
    		</div>	
    
    		<div class="input-box">
    
    			<div>Số term muốn hiển thị:</div>
    
    			<div>
                    <input id="<?php echo $this->get_field_id( "pitvietco-showtax-four-columns-num-term" ) ?>" 
                           name= "<?php echo $this->get_field_name( 'pitvietco-showtax-four-columns-num-term' ) ?>" 
                           value="<?php echo $instance['pitvietco-showtax-four-columns-num-term'] ?>" 
                           style="width:100%;"  />
                </div>
    
    		</div>
    
    <?php
    
    	}
    
    }
?>