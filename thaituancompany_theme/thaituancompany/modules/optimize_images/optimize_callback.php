<?php 
    
    define('COMPRESS_HIGHEST_PNG_LEVEL', 9);
    define('COMPRESS_BEST_JPEG_QUALITY', 80);
    define( 'OPTIMIZE_DIRECTORY_URI', get_template_directory_uri() . '/modules/optimize_images' );        
   
    define( 'OPTIMIZE_DIRECTORY_JS', OPTIMIZE_DIRECTORY_URI . '/js' ); 
    define( 'OPTIMIZE_DIRECTORY_CSS', OPTIMIZE_DIRECTORY_URI . '/css' ); 
    
    include 'optimize_images_thread.php'; 

    function register_optimize_stylesheet_scripts() {

        global $combine_admin_enqueue;

        $request_uri = $_SERVER['REQUEST_URI'];
        
        if (  false !== strpos( $request_uri, 'my-optimize-admin' ) ) :

            $combine_admin_enqueue['stylesheet'][] = OPTIMIZE_DIRECTORY_CSS . '/style.min.css';
            $combine_admin_enqueue['scripts'][] = OPTIMIZE_DIRECTORY_JS . '/optimize.min.js';     

        endif;
    }

    add_action('admin_init', 'register_optimize_stylesheet_scripts');

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