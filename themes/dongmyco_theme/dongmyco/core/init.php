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
        
        // datatables
        wp_enqueue_style('stylesheet-datatables', get_template_directory_uri() . '/datatables/jquery.dataTables.css');
        wp_enqueue_style('stylesheet-datatables-responsive', get_template_directory_uri() . '/datatables/dataTables.responsive.css');
        wp_enqueue_script('jquery-dataTables', get_template_directory_uri() . '/datatables/jquery.dataTables.min.js', array('jquery'), '1.1.0', true);
        wp_enqueue_script('jquery-dataTables-responsive', get_template_directory_uri() . '/datatables/jquery.dataTables.responsive.min.js', array('jquery'), '1.1.0', true);

        // flexslider
        wp_enqueue_style('stylesheet-flexslider-main', get_template_directory_uri() . '/flexslider/flexslider.css');
        wp_enqueue_style('stylesheet-flexslider-style', get_template_directory_uri() . '/flexslider/style.css');
        wp_enqueue_script('jquery-flexslider', get_template_directory_uri() . '/flexslider/jquery.flexslider-min.js', array('jquery'), '1.1.0', true);
        
            
        wp_enqueue_script('jquery-bootstrap', get_template_directory_uri() . '/js/libraries/bootstrap.min.js', array('jquery'), '1.1.0', true);
        wp_enqueue_script('jquery-menu', get_template_directory_uri() . '/js/modules/menu.min.js', array('jquery'), '1.1.0', true);
        wp_enqueue_script('jquery-slider', get_template_directory_uri() . '/js/modules/slider.min.js', array('jquery'), '1.1.0', true);
        wp_enqueue_script('jquery-navig-setequalheight', get_template_directory_uri() . '/js/modules/navig-setequalheight.min.js', array('jquery'), '1.1.0', true);
        wp_enqueue_script('jquery-jtable', get_template_directory_uri() . '/js/modules/jtable.min.js', array('jquery'), '1.1.0', true);
        wp_enqueue_script('jquery-fixedObject', get_template_directory_uri() . '/js/modules/fixedObject.min.js', array('jquery'), '1.1.0', true);
        wp_enqueue_script('jquery-currency', get_template_directory_uri() . '/js/utils/currency.min.js', array('jquery'), '1.0.0', true);
        
    }

    add_action('wp_enqueue_scripts', 'register_styles_scripts');   

    require_once get_template_directory() . '/modules/shoppingcart/shoppingcart.php';
    

?>