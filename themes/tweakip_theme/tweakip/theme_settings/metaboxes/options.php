<?php 

	require_once get_template_directory() . '/options/config.php';
    require_once 'config.php';

	if ( is_admin() ) :
        
        function meta_boxes_register_stylesheet() { 

            global $metabox_terms_enqueue_scripts;
            global $metabox_post_type_enqueue_scripts;
            global $metabox_post_type_enqueue_scripts_where;

            $current_screen = get_current_screen();   

            // cờ load script ở terms được bật
            if ( $metabox_terms_enqueue_scripts ) :        

                // load thư viện jquery media chỉ ở màn hình terms
                if ( 'term' === $current_screen->base ) :

                    wp_enqueue_media();

                    // load script ở terms
                    wp_enqueue_style( 'my-meta-boxes-style', get_template_directory_uri() . '/theme_settings/metaboxes/css/style.css' ); 
                    wp_enqueue_script('my-meta-boxes-jquery-media-field',  get_template_directory_uri() . '/theme_settings/metaboxes/js/field_media.min.js', array('jquery'), '1.0.0', true);
                    wp_enqueue_script('my-meta-boxes-jquery-select-field',  get_template_directory_uri() . '/theme_settings/metaboxes/js/field_select.min.js', array('jquery'), '1.0.0', true);
                    wp_enqueue_script('my-meta-boxes-jquery-editor-field',  get_template_directory_uri() . '/theme_settings/metaboxes/js/field_editor.min.js', array('jquery'), '1.0.0', true);
                    wp_enqueue_script('my-meta-boxes-jquery-checkbox-field',  get_template_directory_uri() . '/theme_settings/metaboxes/js/field_checkbox.min.js', array('jquery'), '1.0.0', true);
              

                endif;

            endif;

            // cờ load script ở post type được bật
            if ( $metabox_post_type_enqueue_scripts ) : 
                
                // chỉ chấp nhận load script ở những post type đã được khai báo trong file
                // "/options/config.php" nhằm tăng cường performance
                if ( 
                     in_array( $current_screen->post_type, 
                               $metabox_post_type_enqueue_scripts_where )                      
                   ) : 

                    // load script ở post type ( chỉ trong màn hình soạn thảo )
                    if ( 'post' === $current_screen->base ) :

                        wp_enqueue_style( 'my-meta-boxes-style', get_template_directory_uri() . '/theme_settings/metaboxes/css/style.css' ); 
                        wp_enqueue_script('my-meta-boxes-jquery-media-field',  get_template_directory_uri() . '/theme_settings/metaboxes/js/field_media.min.js', array('jquery'), '1.0.0', true);
                        wp_enqueue_script('my-meta-boxes-jquery-select-field',  get_template_directory_uri() . '/theme_settings/metaboxes/js/field_select.min.js', array('jquery'), '1.0.0', true);
                        wp_enqueue_script('my-meta-boxes-jquery-editor-field',  get_template_directory_uri() . '/theme_settings/metaboxes/js/field_editor.min.js', array('jquery'), '1.0.0', true);
                        wp_enqueue_script('my-meta-boxes-jquery-checkbox-field',  get_template_directory_uri() . '/theme_settings/metaboxes/js/field_checkbox.min.js', array('jquery'), '1.0.0', true);                         
                        wp_enqueue_script('my-meta-boxes-jquery-accordion-field',  get_template_directory_uri() . '/theme_settings/metaboxes/js/field_accordion.min.js', array('jquery'), '1.0.0', true);                         

                    endif;

                endif;  
            
            endif;                  
            
        }
        
        add_action( 'admin_enqueue_scripts', 'meta_boxes_register_stylesheet' );
        
    endif;
    
    require_once 'inc/MyThemeCategoryMetaBoxes.php';
    require_once 'inc/MyThemePostTypeMetaBoxes.php';

?>