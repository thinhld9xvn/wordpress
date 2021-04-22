<?php

require_once dirname(__FILE__) . '/constants.php';

require_once dirname(__FILE__) . '/utils/mycommercants-enqueue-utils.php';

require_once dirname(__FILE__) . '/utils/mycommercants-languages-options-enqueue-utils.php';

require_once dirname(__FILE__) . '/utils/ajax/mycommercants-update-coords-data-utils.php';

require_once dirname(__FILE__) . '/utils/ajax/mycommercants-import-mercant-data-utils.php';

require_once dirname(__FILE__) . '/utils/ajax/mycommercants-update-merchant-data-utils.php';

require_once dirname(__FILE__) . '/utils/ajax/mycommercant-import-categories-data-utils.php';

require_once dirname(__FILE__) . '/utils/ajax/mycommercants-update-categories-data-utils.php';

require_once dirname(__FILE__) . '/utils/ajax/mycommercant-create-new-store-account-utils.php';

require_once dirname(__FILE__) . '/utils/ajax/mycommercant-remove-stores-account-utils.php';

require_once dirname(__FILE__) . '/utils/mycommercants-action-init-utils.php';

class MyCommercantsPage {
    
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
     
        \MyCommercantsPage\MyCommercantsActionInitUtils::init();
        
    }
    
    /**
     * Add options page
     */
    
    public function add_plugin_page() {
     
        add_menu_page(__( 'Commercants', 'unicorn' ), // Thay title của trang Theme Option
            'Commercants', // Thay tên hiển thị trên Menu
            'manage_options', 'unicorn-faq', array($this, 'unicorn_commercants_settings_page'), 'dashicons-chart-pie' // Thay icon của bạn
            ); 
            
        add_submenu_page( 'tools.php', 
                            'Languages option', 
                            'Languages option', 
                            'manage_options', 
                            'unicorn-languages-options', 
                            array($this, 'unicorn_languages_option_page') );            
          
    }  

    public function unicorn_commercants_settings_page() {         

       include dirname(__FILE__) . '/admin.php';

       //echo get_option(_COM_COORDS_OPTION_NAME);
  
    }   
    
    public static function unicorn_languages_option_page() { 
        
        $languages = get_option('section-message-notifications_option_name'); 
        
        if ( isset( $_POST['btnSm'] ) ) :

            $languages_options = htmlspecialchars_decode($_POST['txtLanguagesOptions'], ENT_QUOTES); 
            
            $languages_options = stripslashes($languages_options);           

            update_option('section-message-notifications_option_name', 
                            json_decode($languages_options, true));
        
        endif; ?>

        <div id="commercants-page">

            <form method="post" action="">

                <div class="languages-option-wrapper">

                    <h2>Languages Extra</h2>

                    <div class="lang-extra-box">
                        <label>Languages settings</label>
                        <textarea id="txtLanguagesOptions" name="txtLanguagesOptions" rows="10"><?= htmlspecialchars(json_encode($languages)) ?></textarea>
                    </div>

                    <div class="submit">
                        <button name="btnSm" class="button button-primary">Save changes</button>
                    </div>

                </div>

            </form>

        </div>

    <?php }  
  
}
    
function unicorn_admin_ks_load_style() {   

    if ( $_GET['page'] === 'unicorn-faq' ) :

        \MyCommercantsPage\MyCommercantsEnqueueUtils::render();

    else :

        if ( $_GET['page'] === 'unicorn-languages-options' ) :

            \MyCommercantsPage\MyCommercantsLanguagesOptionsEnqueueUtils::render();
        
        endif;
        
    endif;
    
}

add_action( \Actions\ACTIONS::UNICORN_ADMIN_ENQUEUE_SCRIPTS_ACTION, 'unicorn_admin_ks_load_style', 9999 );

add_filter( \Actions\ACTIONS::UNICORN_SCRIPT_LOADER_TAG_ACTION, array('\MyCommercantsPage\MyCommercantsEnqueueUtils', 'registerModule'), 10, 3 );

if ( is_admin() ) :

    new MyCommercantsPage();

endif;
