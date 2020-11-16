<?php 

    define('METABOX_DIRECTORY_URI', get_template_directory_uri() . '/theme_settings/metaboxes');
    define('METABOX_DIRECTORY', get_template_directory_uri() . '/theme_settings/metaboxes');

    define('METABOX_DIRECTORY_OPTIONS', get_template_directory() . '/options');

    define('METABOX_DIRECTORY_IMAGES_URI', METABOX_DIRECTORY_URI . '/images');  

    define('METABOX_EMPTY_THUMBNAIL_URI', METABOX_DIRECTORY_IMAGES_URI . '/empty-thumbnail.png');

	require_once METABOX_DIRECTORY_OPTIONS . '/config.php';	
        
    function meta_boxes_register_stylesheet() { 

        global $combine_admin_enqueue;

        global $metabox_terms_enqueue_scripts;
        global $metabox_post_type_enqueue_scripts;
        global $metabox_post_type_enqueue_scripts_where;          

        $request_uri = $_SERVER['REQUEST_URI'];

        // cờ load script ở terms được bật
        if ( $metabox_terms_enqueue_scripts ) :                

            // load thư viện jquery media chỉ ở màn hình edit-tags
            if ( false !== strpos( $request_uri, 'edit-tags.php' ) ) :

                wp_enqueue_media();

                $combine_admin_enqueue['stylesheet'][] = get_template_directory_uri() . '/theme_settings/metaboxes/css/style.css';                    
                $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/theme_settings/metaboxes/js/field_accordion.min.js';                                      
                $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/theme_settings/metaboxes/js/field_editor.min.js';                                      
                $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/theme_settings/metaboxes/js/field_media.min.js';                                      
                $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/theme_settings/metaboxes/js/field_select.min.js';                                      
                $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/theme_settings/metaboxes/js/field_typical.min.js';                                      

            endif;

        endif;

        // cờ load script ở post type được bật
        if ( $metabox_post_type_enqueue_scripts ) : 

            $post_type = '';

            if ( false !== strpos( $request_uri, 'post.php' ) ) :

                $post_id = $_GET['post'];            

                $post = get_post( $post_id );

                $post_type = $post->post_type;

            elseif ( false !== strpos( $request_uri, 'post-new.php' ) ) :
                
                $post_type = $_GET['post_type'];

                if ( ! isset( $post_type ) ) :

                    $post_type = 'post';

                endif;

            endif;
            
            // chỉ chấp nhận load script ở những post type đã được khai báo trong file
            // "/options/config.php" nhằm tăng cường performance
            if ( 
                 in_array( $post_type, 
                           $metabox_post_type_enqueue_scripts_where )                      
               ) :

                $combine_admin_enqueue['stylesheet'][] = get_template_directory_uri() . '/theme_settings/metaboxes/css/style.css';                    
                $combine_admin_enqueue['stylesheet'][] = get_template_directory_uri() . '/theme_settings/metaboxes/css/jquery-ui.min.css';                    
                $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/theme_settings/metaboxes/js/field_accordion.min.js';                                      
                $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/theme_settings/metaboxes/js/field_editor.min.js';                                      
                $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/theme_settings/metaboxes/js/field_media.min.js';                                                      
                $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/theme_settings/metaboxes/js/field_select.min.js';                                     
                $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/theme_settings/metaboxes/js/jquery-ui.min.js';                                     
                $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/theme_settings/metaboxes/js/field_datepicker.min.js';  
                $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/theme_settings/metaboxes/js/field_typical.min.js';
                $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/theme_settings/metaboxes/js/field_textbox.min.js';

            endif;  
        
        endif;                  
        
    }
    
    add_action( 'admin_init', 'meta_boxes_register_stylesheet' );       
   
    
    require_once 'inc/MyThemeTermsMetaBoxes.php';
    require_once 'inc/MyThemePostTypeMetaBoxes.php';

?>