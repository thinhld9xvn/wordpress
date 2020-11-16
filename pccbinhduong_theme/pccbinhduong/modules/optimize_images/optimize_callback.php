<?php 
    
    define('COMPRESS_HIGHEST_PNG_LEVEL', 9);
    define('COMPRESS_BEST_JPEG_QUALITY', 75);

    define( 'OPTIMIZE_DIRECTORY_URI', get_template_directory_uri() . '/modules/optimize_images' );        
   
    define( 'OPTIMIZE_DIRECTORY_JS', OPTIMIZE_DIRECTORY_URI . '/js' ); 
    define( 'OPTIMIZE_DIRECTORY_CSS', OPTIMIZE_DIRECTORY_URI . '/css' ); 

    include 'optimize_images_thread.php'; 

    function sb_optimize_ajax_script() {

        $current_screen = get_current_screen();

        if ( 'media_page_my-optimize-admin' === $current_screen->base ) :
     
            wp_enqueue_style('stylesheet-ajax-optimize', OPTIMIZE_DIRECTORY_CSS . '/style.min.css');        
            wp_enqueue_script('ajax-optimize', OPTIMIZE_DIRECTORY_JS . '/optimize.min.js', array('jquery'), 'v1.0.0' , true);        
            wp_localize_script('ajax-optimize', 'sb_admin_ajax', array('url' => admin_url('admin-ajax.php') ) );

        endif;

    }

    add_action('admin_enqueue_scripts', 'sb_optimize_ajax_script');

    function sb_optimize_callback() {

        $cmd = $_POST['cmd'];

        switch ( $cmd ) :

            case 'optimize':

                $optimize_instance = new OptimizeImagesThread();
                $result = $optimize_instance->optimize();

                if ( $result ) :

                    echo 'success';                   

                endif;
                
                break;
            
            default:                
                break;

        endswitch;    
  

    }
    
    add_action('wp_ajax_sb_optimize_callback_ajax', 'sb_optimize_callback');
    add_action('wp_ajax_nopriv_sb_optimize_callback_ajax', 'sb_optimize_callback');
?>