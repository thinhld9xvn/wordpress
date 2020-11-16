<?php
	/* Libraries Theme */
	require_once get_template_directory() . '/theme_settings/custom_post_types/options.php';
	require_once get_template_directory() . '/theme_settings/theme_options/options.php';
	require_once get_template_directory() . '/theme_settings/metaboxes/options.php';

    /* Modules Theme */
    require_once get_template_directory() . '/modules/contact_form/contact_form.php';   
    require_once get_template_directory() . '/modules/optimize_images/optimize_core.php';      

	function register_styles_scripts() {
		
		//css
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');	
		wp_enqueue_style('stylesheet-fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css');	
		wp_enqueue_style('stylesheet-layout', get_template_directory_uri() . '/css/layout.css');				
		wp_enqueue_style('stylesheet', get_template_directory_uri() . '/style.css');			
    	
    	//script
    	//wp_enqueue_script('jquery-js', get_template_directory_uri() . '/js/libraries/jquery.min.js', array('jquery'), '2.1.1', true);
    	
    	// flex slider
    	wp_enqueue_style('stylesheet-flexslider-main', get_template_directory_uri() . '/flexslider/flexslider.css');
    	wp_enqueue_style('stylesheet-flexslider-layout', get_template_directory_uri() . '/flexslider/style.css');
    	wp_enqueue_script('jquery-flexslider-main-js', get_template_directory_uri() . '/flexslider/jquery.flexslider-min.js', array('jquery'), '1.1.0', true);
    	
    	// owl-carousel
    	wp_enqueue_style('stylesheet-owl-carousel', get_template_directory_uri() . '/owl-carousel/owl.carousel.css');
    	wp_enqueue_style('stylesheet-owl-carousel-theme', get_template_directory_uri() . '/owl-carousel/owl.theme.css');			
    	wp_enqueue_script('jquery-owl-carousel-all', get_template_directory_uri() . '/owl-carousel/owl.carousel.min.js', array('jquery'), '1.1.0', true);
    	
    	// lightGallery
    	wp_enqueue_style('stylesheet-lightGallery', get_template_directory_uri() . '/lightGalery/css/lightgallery.min.css');
    	wp_enqueue_style('stylesheet-lightGallery-transitions', get_template_directory_uri() . '/lightGalery/css/lg-transitions.min.css');
    	wp_enqueue_script('jquery-lightGallery-all', get_template_directory_uri() . '/lightGalery/js/lightgallery-all.min.js', array('jquery'), '1.1.0', true);

        // simple ajax pager
        wp_enqueue_script('jquery-simple-ajax-pager', get_template_directory_uri() . '/js/libraries/simple-ajax-pager.min.js', array('jquery'), '1.0.0', true);    	
    	
    	wp_enqueue_script('jquery-bootstrap', get_template_directory_uri() . '/js/libraries/bootstrap.min.js', array('jquery'), '1.1.0', true);                
        wp_enqueue_script('jquery-menu', get_template_directory_uri() . '/js/modules/menu.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('jquery-slider', get_template_directory_uri() . '/js/modules/slider.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('jquery-pagination', get_template_directory_uri() . '/js/modules/pagination.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('jquery-order-form', get_template_directory_uri() . '/js/modules/order-form.min.js', array('jquery'), '1.0.0', true);        
        wp_enqueue_script('jquery-compactcontent', get_template_directory_uri() . '/js/modules/navig-compactcontent.min.js', array('jquery'), '1.0.0', true);
        
	}

	add_action( 'wp_footer', 'register_styles_scripts' );

?>