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
                
                $combine_admin_enqueue['stylesheet'][] = dirname(__FILE__) . '/jcustomtag/jcustomtag.css';
                $combine_admin_enqueue['scripts'][] = dirname(__FILE__) . '/jcustomtag/jcustomtag.min.js';

                $combine_admin_enqueue['stylesheet'][] = dirname(__FILE__) . '/css/style.css';    

                $combine_admin_enqueue['scripts'][] = dirname(__FILE__) . '/js/field_accordion.min.js';                                      
                $combine_admin_enqueue['scripts'][] = dirname(__FILE__) . '/js/field_editor.min.js';                                      
                $combine_admin_enqueue['scripts'][] = dirname(__FILE__) . '/js/field_media.min.js';                                      
                $combine_admin_enqueue['scripts'][] = dirname(__FILE__) . '/js/field_select.min.js';                                      
                $combine_admin_enqueue['scripts'][] = dirname(__FILE__) . '/js/field_typical.min.js';                                     

                $combine_admin_enqueue['scripts'][] = dirname(__FILE__) . '/js/field_tag.min.js';

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

                $combine_admin_enqueue['stylesheet'][] = dirname(__FILE__) . '/jcustomtag/jcustomtag.css';
                $combine_admin_enqueue['scripts'][] = dirname(__FILE__) . '/jcustomtag/jcustomtag.min.js';

                $combine_admin_enqueue['stylesheet'][] = dirname(__FILE__) . '/css/style.css';                    
                $combine_admin_enqueue['stylesheet'][] = dirname(__FILE__) . '/css/jquery-ui.min.css';                    
                $combine_admin_enqueue['scripts'][] = dirname(__FILE__) . '/js/field_accordion.min.js';                                      
                $combine_admin_enqueue['scripts'][] = dirname(__FILE__) . '/js/field_editor.min.js';                                      
                $combine_admin_enqueue['scripts'][] = dirname(__FILE__) . '/js/field_media.min.js';                                                      
                $combine_admin_enqueue['scripts'][] = dirname(__FILE__) . '/js/field_select.min.js';                                     
                $combine_admin_enqueue['scripts'][] = dirname(__FILE__) . '/js/jquery-ui.min.js';                                     
                $combine_admin_enqueue['scripts'][] = dirname(__FILE__) . '/js/field_datepicker.min.js';  
                $combine_admin_enqueue['scripts'][] = dirname(__FILE__) . '/js/field_typical.min.js';
                $combine_admin_enqueue['scripts'][] = dirname(__FILE__) . '/js/field_textbox.min.js';
                $combine_admin_enqueue['scripts'][] = dirname(__FILE__) . '/js/field_tag.min.js';

            endif;  
        
        endif;                  
        
    }
    
    add_action( 'admin_init', 'meta_boxes_register_stylesheet' ); 

    function sb_meta_boxes_tag_ajax_callback() {

        $form_data = array();

        $cmd = $_POST['cmd'];      

        switch ($cmd) {

            case 'get_tags_by_theme_option':

                $option_name = $_POST['option_name'] . '_option_name';
                $field_name = $_POST['option_field'] . '-id';

                $option = get_option( $option_name );
                $values = $option[ $field_name ];

                $arr_values = explode( PHP_EOL, $values );
                $arr_json_objects = array();

                foreach ($arr_values as $v ) :

                    $arr_json_objects[] = array(

                        'name' => $v

                    );
                    
                endforeach;

                header("Content-Type: application/json; charset: UTF-8");
                echo json_encode( $arr_json_objects );

                die();

                break;

            default:

                break;

        }

    }

    add_action('wp_ajax_sb_meta_boxes_tag_ajax', 'sb_meta_boxes_tag_ajax_callback');
    add_action('wp_ajax_nopriv_sb_meta_boxes_tag_ajax', 'sb_meta_boxes_tag_ajax_callback');   
    
    require_once 'inc/MyThemeTermsMetaBoxes.php';
    require_once 'inc/MyThemePostTypeMetaBoxes.php';

?>