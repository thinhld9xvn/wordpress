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
        wp_enqueue_style('stylesheet-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
        wp_enqueue_style('stylesheet-fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css');
        wp_enqueue_style('stylesheet-layout', get_template_directory_uri() . '/css/layout.css');
        wp_enqueue_style('stylesheet-template-control', get_template_directory_uri() . '/css/template-control.css');
        wp_enqueue_style('stylesheet', get_template_directory_uri() . '/style.css');

        // bxslider
        wp_enqueue_style('stylesheet-bxslider', get_template_directory_uri() . '/bxslider/jquery.bxslider.min.css');
        wp_enqueue_script('jquery-bxslider', get_template_directory_uri() . '/bxslider/jquery.bxslider.min.js', array('jquery'), '1.1.0', false);

        // lightGallery
        wp_enqueue_style('stylesheet-lightGallery', get_template_directory_uri() . '/lightGallery/css/lightgallery.min.css');
        wp_enqueue_script('jquery-lightGallery', get_template_directory_uri() . '/lightGallery/js/lightgallery-all.min.js', array('jquery'), '1.1.0', false);

        // master-modal
        wp_enqueue_style('stylesheet-master-modal', get_template_directory_uri() . '/jquery.master-modal/jquery.modal.min.css');
        wp_enqueue_script('jquery-master-modal', get_template_directory_uri() . '/jquery.master-modal/jquery.modal.min.js', array('jquery'), '1.1.0', false);
        wp_enqueue_script('jquery-mod-master-modal', get_template_directory_uri() . '/js/modules/mod_master-modal.min.js', array('jquery'), '1.1.0', false);
        
        wp_enqueue_script('jquery-mod-menu', get_template_directory_uri() . '/js/modules/mod_menu.min.js', array('jquery'), '1.1.0', false);
        wp_enqueue_script('jquery-mod-slider', get_template_directory_uri() . '/js/modules/mod_slider.min.js', array('jquery'), '1.1.0', false);
        wp_enqueue_script('jquery-mod-fixedObject', get_template_directory_uri() . '/js/modules/mod_fixedObject.min.js', array('jquery'), '1.1.0', false);
        wp_enqueue_script('jquery-mod-navig-drawline', get_template_directory_uri() . '/js/modules/navig-drawline.min.js', array('jquery'), '1.1.0', false);
        wp_enqueue_script('jquery-mod-navig-compactcontent', get_template_directory_uri() . '/js/modules/mod_navig-compactcontent.min.js', array('jquery'), '1.1.0', false);
        wp_enqueue_script('jquery-order-form', get_template_directory_uri() . '/js/modules/order-form.min.js', array('jquery'), '1.1.0', false);
        
    }

    add_action('wp_enqueue_scripts', 'register_styles_scripts'); ?>