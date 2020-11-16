<?php
class MyOptimizeImages
{   

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_menu_page' ) );
        //add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_menu_page()
    {
        // This page will be under "Media"
        add_media_page(
            'Tối ưu hóa ảnh', 
            'Tối ưu hóa ảnh', 
            'manage_options', 
            'my-optimize-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'my_optimize_option_name' ); ?>

            <div class="wrap">
                <h3>Nhấn bắt đầu để nén toàn bộ ảnh trên server</h3>
              
                <button id="btnOptimizeImages" type="button" class="button button-primary inline vmiddle">
                    Bắt đầu
                </button>

                <img src="<?php echo get_template_directory_uri() . '/modules/optimize_images/images/optimize-ajax.png' ?>" class="optimize-ajax inline vmiddle" />

                <div id="optimizeLog" style="width: 100%; margin: 20px 0 0 0; height: 400px; overflow-y: auto;">
                </div>
               
            </div>
        
        <?php
    }

}

if ( is_admin() ) :    

    if ( ! isset( $_SESSION ) ) session_start();
    
    include 'inc/optimize_lib.php'; 
    include 'optimize_media_upload.php';
    include 'optimize_callback.php';

    $my_optimize_images = new MyOptimizeImages();

endif;