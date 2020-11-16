<?php 

    define('METABOX_DIRECTORY_URI', get_template_directory_uri() . '/theme_settings/metaboxes');
    define('METABOX_DIRECTORY', get_template_directory_uri() . '/theme_settings/metaboxes');

    define('METABOX_DIRECTORY_OPTIONS', get_template_directory() . '/options');

    define('METABOX_DIRECTORY_IMAGES_URI', METABOX_DIRECTORY_URI . '/images');  

    define('METABOX_EMPTY_THUMBNAIL_URI', METABOX_DIRECTORY_IMAGES_URI . '/empty-thumbnail.png');

	require_once METABOX_DIRECTORY_OPTIONS . '/config.php';

	if ( is_admin() ) :
        
        function meta_boxes_register_stylesheet() { 

            global $metabox_terms_enqueue_scripts;
            global $metabox_post_type_enqueue_scripts;
            global $metabox_post_type_enqueue_scripts_where;

            $current_screen = get_current_screen();  

            $request_uri = $_SERVER['REQUEST_URI'];

            // cờ load script ở terms được bật
            if ( $metabox_terms_enqueue_scripts ) :                

                // load thư viện jquery media chỉ ở màn hình edit-tags
                if ( false !== strpos( $request_uri, 'edit-tags.php' ) ) :

                    wp_enqueue_media();

                    // load script ở terms
                    wp_enqueue_style( 'my-meta-boxes-style', get_template_directory_uri() . '/theme_settings/metaboxes/css/style.css' ); 
                    wp_enqueue_script('my-meta-boxes-jquery-field-metaboxes',  get_template_directory_uri() . '/theme_settings/metaboxes/js/field_metaboxes.min.js', array('jquery'), '1.0.0', true);                    
              

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
                        wp_enqueue_script('my-meta-boxes-jquery-field-metaboxes',  get_template_directory_uri() . '/theme_settings/metaboxes/js/field_metaboxes.min.js', array('jquery'), '1.0.0', true);                    

                    endif;

                endif;  
            
            endif;                  
            
        }
        
        add_action( 'admin_enqueue_scripts', 'meta_boxes_register_stylesheet' );
        
    endif;
    
    require_once 'inc/MyThemeTermsMetaBoxes.php';
    require_once 'inc/MyThemePostTypeMetaBoxes.php';

?>