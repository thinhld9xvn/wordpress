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

         wp_enqueue_style('flexslider-main-stylesheet', get_template_directory_uri() . '/flexslider/flexslider.css');			
         wp_enqueue_style('flexslider-stylesheet', get_template_directory_uri() . '/flexslider/style.css');
         wp_enqueue_script('jquery-flexslider-js', get_template_directory_uri() . '/flexslider/jquery.flexslider-min.js', array('jquery'), '1.0.0', false);

         wp_enqueue_script('jquery-bootstrap', get_template_directory_uri() . '/js/libraries/bootstrap.min.js', array('jquery'), '1.1.0', true);
         wp_enqueue_script('jquery-navig-drawline', get_template_directory_uri() . '/js/modules/navig-drawline.min.js', array('jquery'), '1.0.0', true);
         wp_enqueue_script('jquery-navig-jtooltip', get_template_directory_uri() . '/js/modules/navig-jtooltip.min.js', array('jquery'), '1.0.0', true);         
         wp_enqueue_script('jquery-navig-setequalheight', get_template_directory_uri() . '/js/modules/navig-setequalheight.min.js', array('jquery'), '1.0.0', true);
         wp_enqueue_script('jquery-menu', get_template_directory_uri() . '/js/modules/menu.min.js', array('jquery'), '1.0.0', true);
         wp_enqueue_script('jquery-fixedObject', get_template_directory_uri() . '/js/modules/fixedObject.min.js', array('jquery'), '1.0.0', true);
         wp_enqueue_script('jquery-slider', get_template_directory_uri() . '/js/modules/slider.min.js', array('jquery'), '1.0.0', true);
	}

	add_action('wp_footer', 'register_styles_scripts');

?>