<?php

define('_FAQ_OPTION_NAME', '_gig_faq_questions');

include 'includes/MyHelperOptionPage.php';

class MyFAQPage {
    
    /**
     * Holds the values to be used in the fields callbacks
     */
    
    private $options;   
  
    
    /**
     * Start up
     */       
    public function __construct() {  
        
        add_action('admin_menu', array(
            $this,
            'add_plugin_page'
        ));

        add_action('wp_ajax_sb_gig_faq_get_data', array($this, 'gig_faq_ajax_get_data'));
        add_action('wp_ajax_nopriv_sb_gig_faq_get_data', array($this, 'gig_faq_ajax_get_data'));

        add_action('wp_ajax_sb_gig_faq_update_data', array($this, 'gig_faq_ajax_update_data'));
        add_action('wp_ajax_nopriv_sb_gig_faq_update_data', array($this, 'gig_faq_ajax_update_data'));

        
        
        /*add_action('admin_init', array(
            $this,
            'page_init'
        ));*/
    }
    
    /**
     * Add options page
     */
    
    public function add_plugin_page() {
     
        add_menu_page(__( 'Khảo sát', 'gig' ), // Thay title của trang Theme Option
            'Khảo sát', // Thay tên hiển thị trên Menu
            'manage_options', 'gig-faq', array($this, 'gig_faq_settings_page'), 'dashicons-chart-pie' // Thay icon của bạn
            );         
    }  

    public function gig_faq_settings_page() { 

        include dirname(__FILE__) . '/admin/admin.php';
  
    }   

    public function gig_faq_ajax_get_data() {

        $data = get_option( _FAQ_OPTION_NAME );

        //echo var_dump( $data );

        if ( ! $data || empty( $data ) ) :

            echo 'null';
            die();

        endif;

        header('Content-Type: application/json; charset: utf-8');
        echo json_encode( $data );

        die();

    }

    public function gig_faq_ajax_update_data() {

        $faq_questions = $_POST['faq_questions'];

        /*if ( empty( $faq_questions ) ) :

            if ( get_option( _FAQ_OPTION_NAME ) ) :

                delete_option( _FAQ_OPTION_NAME );

                echo 'success';

                die();

            endif;

        endif;*/

        update_option( _FAQ_OPTION_NAME, $faq_questions );

        echo 'success';

        die();

    }

    
    
  
}

function gig_ks_load_style() {

    global $uc_enqueues;

    $css_path = get_template_directory() . '/faq/frontend/faq.css';
    $js_path = get_template_directory() . '/faq/frontend/faq.js';

    $uc_enqueues['stylesheets'][] = $css_path;
    $uc_enqueues['scripts'][] = $js_path;

    //print_r( $uc_enqueues ); die();



}

    
function gig_admin_ks_load_style() {   

    if ( $_GET['page'] === 'gig-faq' ) :
        
        //wp_enqueue_media();

        /*$combine_admin_enqueue['stylesheet'][] = get_template_directory_uri() . '/theme_settings/theme_options/css/style.min.css';
        
        $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/theme_settings/theme_options/js/field_media.min.js';
        $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/theme_settings/theme_options/js/field_editor.min.js';                
        $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/theme_settings/theme_options/js/field_typical.min.js';*/

        wp_enqueue_style( 'admin-bootstrap-css', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'  );

        wp_enqueue_style( 'gig-faq-datatable-css', get_template_directory_uri() . '/faq/admin/css/jquery.dataTables.min.css' );

        wp_enqueue_style( 'gig-faq-admin-css', get_template_directory_uri() . '/faq/admin/css/style.css' );
        wp_enqueue_style( 'gig-faq-treant-css', get_template_directory_uri() . '/faq/admin/treant-master/Treant.css' );

        wp_enqueue_script( 'admin-bootstrap-js', get_template_directory_uri() . '/faq/admin/js/bootstrap.min.js' );

        wp_enqueue_script( 'admin-faq-datatable-js', get_template_directory_uri() . '/faq/admin/js/jquery.dataTables.min.js' );

        wp_enqueue_script( 'admin-raphael-js', get_template_directory_uri() . '/faq/admin/treant-master/raphael.js' );
        wp_enqueue_script( 'admin-treant-js', get_template_directory_uri() . '/faq/admin/treant-master/Treant.js' );
        wp_enqueue_script( 'gig-faq-admin-js', get_template_directory_uri() . '/faq/admin/js/faq.js' );
        
        
    endif;
    
}

add_action( 'admin_enqueue_scripts', 'gig_admin_ks_load_style' );
add_action( 'after_setup_theme', 'gig_ks_load_style', 100 );

function faq_add_shortcode($atts) {

    $is_sidebar = $atts['show_on_sidebar'];
    $cid = $atts['cid'];

    ob_start(); ?>

    <div class="gig-khaosat" data-cid="<?= $cid ?>" data-is-sidebar="<?= $is_sidebar ?>">
    </div>

<?php 
    $contents = ob_get_contents();

    ob_end_clean();

    return $contents;

}

add_shortcode( 'faqks_sc', 'faq_add_shortcode');

if ( is_admin() ) :

    new MyFAQPage();

endif;