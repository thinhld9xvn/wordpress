<?php


class qTranslatePage {

    /**

     * Holds the values to be used in the fields callbacks

     */

    private $options;

    private $option_page_url;

    private $languages;
    private $mydb;
    private $langhelper;
    private $themehelper;

    private $theme_ui_language;

    /**

     * Start up

     */

    public function __construct() {               

        include "packages/languages.php";
        require_once QTRANSLATE_DIRECTORY_HELPER . '/theme_helper.php';

        require_once QTRANSLATE_DIRECTORY . "/options/config.php";

        global $theme_ui_language;

        $this->mydb = new qTranslate_db();  
        $this->langhelper = new LanguagesHelper();
        $this->themehelper = new QT_ThemeHelper();

        $this->theme_ui_language = $theme_ui_language;

        $this->option_page_url = "qtranslate-settings-admin";

        add_action( "admin_menu", array( $this, "add_plugin_page" ) );        

    }

    /**

     * Add options page

     */

    public function add_plugin_page() {

        // This page will be under "Settings"

        add_options_page(

            'QTranslate', 

            'QTranslate', 

            'manage_options', 

            $this->option_page_url, 

            array( $this, 'create_admin_page' )

        );

    }

    /**

     * Options page callback

     */

    public function create_admin_page() {          

        $theme_ui_language = $this->theme_ui_language;

        $languages = $this->languages;
        $themehelper = $this->themehelper;

        $current_screen = get_current_screen();

        $lang_helper = $this->langhelper;

        $tab_id = $_GET['tab_id']; 

        ! isset( $tab_id ) ? $tab_id = 'nav-tab-setting-lang' : '' ?>

        <div class="wrap">

            <h1>
                <?php echo $themehelper->translate("Cài đặt đa ngôn ngữ"); ?>
            </h1>

            <h2 class="nav-tab-wrapper">

                <a href="<?php echo admin_url( "$current_screen->parent_file?page=$this->option_page_url&tab_id=nav-tab-setting-lang" ) ?>" 

                    id="nav-tab-setting-lang" 

                    class="nav-tab <?= 'nav-tab-setting-lang' === $tab_id ? 'nav-tab-active' : '' ?>">

                    <?php echo $themehelper->translate("Thiết lập ngôn ngữ"); ?>                    

                </a>

                <a href="<?php echo admin_url( "$current_screen->parent_file?page=$this->option_page_url&tab_id=nav-tab-translate-lang" ) ?>" 

                   id="nav-tab-translate-lang" 

                   class="nav-tab <?= 'nav-tab-translate-lang' === $tab_id ? 'nav-tab-active' : '' ?>">

                    <?php echo $themehelper->translate("Dịch chuỗi ngôn ngữ"); ?>

                </a>

                <a href="<?php echo admin_url( "$current_screen->parent_file?page=$this->option_page_url&tab_id=nav-tab-navmenus-lang" ) ?>" 

                   id="nav-tab-navmenus-lang" 

                   class="nav-tab <?= 'nav-tab-navmenus-lang' === $tab_id ? 'nav-tab-active' : '' ?>">

                    Thiết lập Nav Menus

                </a>

                 <a href="<?php echo admin_url( "$current_screen->parent_file?page=$this->option_page_url&tab_id=nav-tab-advanced-settings" ) ?>" 

                   id="nav-tab-advanced-settings" 

                   class="nav-tab <?= 'nav-tab-advanced-settings' === $tab_id ? 'nav-tab-active' : '' ?>">

                    <?php echo $themehelper->translate("Thiết lập nâng cao"); ?>

                </a>

            </h2>

            <div class="nav-container form-wrap mtop20">

                <?php

                    if ( 'nav-tab-setting-lang' === $tab_id ) : 

                        include 'templates/qTranslate_lang_settings_tab.php';

                    elseif ( 'nav-tab-translate-lang' === $tab_id ) :                      

                        include 'templates/qTranslate_lang_translate_tab.php';

                    elseif ( 'nav-tab-navmenus-lang' === $tab_id ) :                      

                        include 'templates/qTranslate_lang_navmenus_tab.php';

                    elseif ( 'nav-tab-advanced-settings' === $tab_id ) :

                        include 'templates/qTranslate_advanced_settings_tab.php';

                    endif; ?>

            </div>

        </div>

        <?php

    }

}

if ( session_status() == PHP_SESSION_NONE ) :

    session_start();

endif;

//echo $_SESSION['qtranslate_active_lang']; die();

global $q_db;

require_once dirname(__FILE__) . '/inc/qTranslate_db.php';

$q_db = new qTranslate_db();

require_once 'qTranslate_constants.php';

require_once 'qTranslate_enqueue.php';

require_once 'qTranslate_init.php';

$qtranslate_init = new qTranslateInitialize();

require_once QTRANSLATE_DIRECTORY_UTILS . '/qTranslate_utils.php';

if ( is_admin() ) :

    require_once 'inc/helper/languages_helper.php';      

    require_once 'qTranslate_event.php'; 

    require_once 'inc/utils/qTranslate_duplicate.php';

    require_once 'inc/metaboxes/qtranslate_metaboxes.php'; 

    $qtranslate_event = new qTranslateEvent();    

    $qtranslate_page = new qTranslatePage();

endif;

require_once 'inc/qTranslate_hook.php';