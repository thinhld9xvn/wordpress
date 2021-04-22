<?php 
	function register_theme_stylesheet_scripts() {  

		if ( ! is_admin() ) :

			global $uc_cache;

			if ( ! $uc_cache->has_cached() ) :

    			global $combine_admin_enqueue;

    			// css
    			$combine_admin_enqueue['stylesheet'][] = get_template_directory() . '/css/bootstrap.min.css';
    			$combine_admin_enqueue['stylesheet'][] = get_template_directory() . '/css/font-awesome.min.css';    			
    			$combine_admin_enqueue['stylesheet'][] = get_template_directory() . '/css/layout.css';	        
    			$combine_admin_enqueue['stylesheet'][] = get_template_directory() . '/style.css';    		

    			// jquery
    			array_splice( $combine_admin_enqueue['scripts'], 0, 0, array( get_template_directory() . '/js/libraries/jquery.min.js' ) );               
    			

                // jquery-ui
                $combine_admin_enqueue['scripts'][] = get_template_directory() . '/js/libraries/jquery-ui.js';

                $combine_admin_enqueue['stylesheet'][] = get_template_directory() . '/css/jquery-ui.css'; 

		        // js		        
		        $combine_admin_enqueue['scripts'][] = get_template_directory() . '/js/modules/form-tablists.js';
		       

	    	endif;

	    endif;

    }

    add_action('init', 'register_theme_stylesheet_scripts');