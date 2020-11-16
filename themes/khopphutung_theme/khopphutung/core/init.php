<?php
	/* Libraries Theme */
	require_once get_template_directory() . '/theme_settings/custom_post_types/options.php';
	require_once get_template_directory() . '/theme_settings/theme_options/options.php';
	require_once get_template_directory() . '/theme_settings/metaboxes/options.php';

    /* Modules Theme */
    require_once get_template_directory() . '/modules/contact_form/contact_form.php';
    require_once get_template_directory() . '/modules/optimize_images/optimize_core.php';
    require_once get_template_directory() . '/modules/qTranslate/qTranslate_core.php';

    function register_styles_scripts() {
        
        //css
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css'); 
        wp_enqueue_style('stylesheet-fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css'); 
        wp_enqueue_style('stylesheet-layout', get_template_directory_uri() . '/css/layout.css');                
        wp_enqueue_style('stylesheet', get_template_directory_uri() . '/style.css');            
        
        //script
        //wp_enqueue_script('jquery-js', get_template_directory_uri() . '/js/libraries/jquery.min.js', array('jquery'), '2.1.1', true);               

        // bxslider        
        wp_enqueue_style('stylesheet-bxslider', get_template_directory_uri() . '/bxSlider/jquery.bxslider.css');
        wp_enqueue_script('jquery-bxslider', get_template_directory_uri() . '/bxSlider/jquery.bxslider.min.js', array('jquery'), '1.1.0', false);                

        // lightGallery
        wp_enqueue_style('stylesheet-lightGallery', get_template_directory_uri() . '/lightGallery/css/lightgallery.min.css');        
        wp_enqueue_script('jquery-lightGallery', get_template_directory_uri() . '/lightGallery/js/lightgallery-all.min.js', array('jquery'), '1.1.0', false);        

        wp_enqueue_script('jquery-mod-searchproducts', get_template_directory_uri() . '/js/modules/mod_search-products.min.js', array('jquery'), '1.1.0', false);        
        wp_enqueue_script('jquery-mod-menu', get_template_directory_uri() . '/js/modules/mod_menu.min.js', array('jquery'), '1.1.0', false);        
        wp_enqueue_script('jquery-mod-slider', get_template_directory_uri() . '/js/modules/mod_slider.min.js', array('jquery'), '1.1.0', false);                
        wp_enqueue_script('jquery-mod-pvcf-orderForm', get_template_directory_uri() . '/js/modules/mod_pvcf-orderForm.min.js', array('jquery'), '1.1.0', false);        
        wp_enqueue_script('jquery-mod-navig-compactcontent', get_template_directory_uri() . '/js/modules/mod_navig-compactcontent.min.js', array('jquery'), '1.1.0', false);        
        wp_enqueue_script('jquery-mod_fixedObject', get_template_directory_uri() . '/js/modules/mod_fixedObject.min.js', array('jquery'), '1.1.0', false);        
            
        wp_enqueue_script('jquery-bootstrap', get_template_directory_uri() . '/js/libraries/bootstrap.min.js', array('jquery'), '1.1.0', false);                        

        wp_enqueue_script('jquery-mod-navigCompactWidgTitleBox', get_template_directory_uri() . '/js/modules/mod_navig-compactWidgTitleBox.min.js', array('jquery'), '1.0.0', false);       
    }

    add_action('wp_enqueue_scripts', 'register_styles_scripts');    

?>