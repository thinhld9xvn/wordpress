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
    			$combine_admin_enqueue['stylesheet'][] = get_template_directory() . '/css/template-control.css';    			   			

    			// jquery
    			array_splice( $combine_admin_enqueue['scripts'], 0, 0, array( get_template_directory() . '/js/libraries/jquery.min.js' ) );
    			$combine_admin_enqueue['scripts'][] = get_template_directory() . '/jquery-ui/jquery-ui.min.js';

		        // bxslider
		        $combine_admin_enqueue['stylesheet'][] = get_template_directory() . '/bxslider/jquery.bxslider.min.css';
		        $combine_admin_enqueue['scripts'][] = get_template_directory() . '/bxslider/jquery.bxslider.min.js';		        		        		        

		        // lightGallery
		        $combine_admin_enqueue['stylesheet'][] = get_template_directory() . '/lightGallery/css/lightgallery.min.css';
		        $combine_admin_enqueue['stylesheet'][] = get_template_directory() . '/lightGallery/css/lg-transitions.min.css';

		        $combine_admin_enqueue['scripts'][] = get_template_directory() . '/lightGallery/js/lightgallery-all.min.js';

		        // jquery.master-modal
		        $combine_admin_enqueue['stylesheet'][] = get_template_directory() . '/jquery.master-modal/jquery.modal.min.css';
		        $combine_admin_enqueue['scripts'][] = get_template_directory() . '/jquery.master-modal/jquery.modal.min.js';

		        $combine_admin_enqueue['scripts'][] = get_template_directory() . '/js/modules/mod_master-modal.min.js';

		        // jquery.tabLists
		        $combine_admin_enqueue['stylesheet'][] = get_template_directory() . '/jquery.tabLists/jquery.tabLists.css';
		        $combine_admin_enqueue['scripts'][] = get_template_directory() . '/jquery.tabLists/mod_navig-tabsList.min.js';		       		     

		        // js		        
		        $combine_admin_enqueue['scripts'][] = get_template_directory() . '/js/modules/mod_slider.min.js';
		        $combine_admin_enqueue['scripts'][] = get_template_directory() . '/js/modules/mod_menu.min.js';		        		        
		        $combine_admin_enqueue['scripts'][] = get_template_directory() . '/js/modules/mod_fixedObject.min.js';		      
		        $combine_admin_enqueue['scripts'][] = get_template_directory() . '/js/modules/mod_navig-compactcontent.min.js';
		        $combine_admin_enqueue['scripts'][] = get_template_directory() . '/js/modules/mod_searchbox.min.js';
		        $combine_admin_enqueue['scripts'][] = get_template_directory() . '/js/modules/mod_togglebar.min.js';
		        $combine_admin_enqueue['scripts'][] = get_template_directory() . '/js/utils/currency.min.js';

	    	endif;

	    endif;

    }

    add_action('init', 'register_theme_stylesheet_scripts');