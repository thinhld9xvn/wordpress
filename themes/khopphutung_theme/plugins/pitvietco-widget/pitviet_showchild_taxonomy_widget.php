<?php 

    function pitvietco_showchildtaxonomy_widget_init() {
    
    	register_widget( 'pitvietco_showchildtaxonomy_widget' );
    
    }
    
    add_action( 'widgets_init', 'pitvietco_showchildtaxonomy_widget_init' );

    class pitvietco_showchildtaxonomy_widget extends WP_Widget {	

    	function pitvietco_showchildtaxonomy_widget() {
    
    		$widget_ops = array( 'classname' => 'pitvietco-showchildtaxonomy', 'description' => 'pitvietco - Hiển thị terms của taxonomy' );
    
    		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'pitvietco-showchildtaxonomy' );		
    
    		$this->WP_Widget( 'pitvietco-showchildtaxonomy', 'pitvietco - Hiển thị terms của taxonomy', $widget_ops, $control_ops );
    
    	}	
    	
    	function widget( $args, $instance ) {
    
    		extract( $args );
    
    		$title = apply_filters('widget_title', $instance['title'] );
    
    		$tax = $instance['pitvietco-showchildtaxonomy-tax'];
    	
    		$num_tax = $instance['pitvietco-showchildtaxonomy-num-tax']; ?>
    		
    
    		<?php ob_start(); 
    
    			include ( dirname(__FILE__) . '/templates/tp_showchild_taxonomy_widget.php' ); 
    			
    	  	    $contents = ob_get_contents(); 
    
    	  	   ob_end_clean(); ?>
    	  		   
    
    		<?php printf("%s", $contents); ?>
    			  
    
    	<?php }
    
    	//Update the widget 	 
    
    	function update( $new_instance, $old_instance ) {
    		
    
    		$instance = $old_instance;
    
    		//Strip tags from title and name to remove HTML 	    		
    
    		$instance['title'] = strip_tags( $new_instance['title'] );
    		
    		$instance['pitvietco-showchildtaxonomy-tax'] = $new_instance['pitvietco-showchildtaxonomy-tax'];
    
    		$instance['pitvietco-showchildtaxonomy-num-tax'] = $new_instance['pitvietco-showchildtaxonomy-num-tax'];
    
    		return $instance;
    
    	}
    
    	function form( $instance ) {
    
    		//Set up some default widget settings.
    
    		$defaults = array( 'title' => '', 'name' => 'iop developer');
    
    		$instance = wp_parse_args( (array) $instance, $defaults ); ?>	
    
    		<div class="input-box">
    
    			<div>Tiêu đề:</div>
    
    			<div><input id="<?php echo $this->get_field_id( "title" ) ?>" name= "<?php echo $this->get_field_name( 'title' ) ?>" value="<?php echo $instance['title'] ?>" style="width:100%;"  /></div>
    
    		</div>
    		
    		<div class="input-box">
    
    		    <div>Taxonomy:</div>
    
    		    <div> 
    
				    <select id="<?php echo $this->get_field_id('pitvietco-showchildtaxonomy-tax') ?>" name="<?php echo $this->get_field_name('pitvietco-showchildtaxonomy-tax') ?>" style="width:100%;">
    
                    <?php
    
                       $args = array(
                          'public'   => true,
                          '_builtin' => false
                          
                        ); 

                        $output = 'names'; // or objects
                        $operator = 'and'; // 'and' or 'or'
                        $taxonomies = get_taxonomies( $args, $output, $operator );

                        foreach ( $taxonomies as $taxonomy ) :?>

                            <option value="<?php echo $taxonomy ?>" <?php selected($instance['pitvietco-showchildtaxonomy-tax'], $taxonomy) ?>><?php echo $taxonomy ?></option>                        
    
                        <?php
                            endforeach; ?>
    
                    </select>
    
    		 	</div>
    
    		</div>	
    
    		<div class="input-box">
    
    			<div>Số taxonomy muốn hiển thị:</div>
    
    			<div><input id="<?php echo $this->get_field_id( "pitvietco-showchildtaxonomy-num-tax" ) ?>" name= "<?php echo $this->get_field_name( 'pitvietco-showchildtaxonomy-num-tax' ) ?>" value="<?php echo $instance['pitvietco-showchildtaxonomy-num-tax'] ?>" style="width:100%;"  /></div>
    
    		</div>
    
    <?php
    
    	}
    
    }
?>