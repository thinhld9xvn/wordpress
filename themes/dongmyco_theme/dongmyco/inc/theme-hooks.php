<?php 
	add_filter( 'show_admin_bar', '__return_false' );

	add_action('get_header', 'remove_admin_login_header');
	
	function remove_admin_login_header() {
	 remove_action('wp_head', '_admin_bar_bump_cb');
	}
    
    /**
     * Disable the emoji's
     */
    function disable_emojis() {
            remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
            remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
            remove_action( 'wp_print_styles', 'print_emoji_styles' );
            remove_action( 'admin_print_styles', 'print_emoji_styles' );    
            remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
            remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );      
            remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
            add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    }
    add_action( 'init', 'disable_emojis' );
     
    /**
     * Filter function used to remove the tinymce emoji plugin.
     * 
     * @param    array  $plugins  
     * @return   array             Difference betwen the two arrays
     */
    function disable_emojis_tinymce( $plugins ) {
        if ( is_array( $plugins ) ) {
                return array_diff( $plugins, array( 'wpemoji' ) );
        } else {
                return array();
        }
    }
    
    function vc_remove_wp_ver_css_js( $src ) {
        if ( strpos( $src, 'ver=' ) )
            $src = remove_query_arg( 'ver', $src );
        return $src;
    }
    add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
    add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

    function my_login_logo() { ?>
        <style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png');
                background-size: 100%;
                width: 134px;
                height: 106px;
            }
        </style>
<?php }
    add_action( 'login_enqueue_scripts', 'my_login_logo' );  

    function optimize_heartbeat_settings( $settings ) {
        $settings['autostart'] = false;
        $settings['interval'] = 60;
        return $settings;
    }
    add_filter( 'heartbeat_settings', 'optimize_heartbeat_settings' );

    function disable_heartbeat_unless_post_edit_screen() {
        global $pagenow;
        if ( $pagenow != 'post.php' && $pagenow != 'post-new.php' )
            wp_deregister_script('heartbeat');
    }
    add_action( 'init', 'disable_heartbeat_unless_post_edit_screen', 1 ); 

    function query_posts_per_page( $query ) {

        if ( is_home() ) {
       
            $query->set( 'posts_per_page', 10 );
            return;
        }
        
    }
    add_action( 'pre_get_posts', 'query_posts_per_page', 1 ); 


     class WP_ADMIN_OPTIMIZER
    {      
    
        // Variables
        protected $html;
        public function __construct($html)
        {
            if ( ! empty( $html ) ) :
            
                $this->parseHTML( $html );                 

            endif;
        }
        public function __toString()
        {
            return $this->html;
        }      
       

        public function findAndReplaceStyleSheetHtml( $html, $beginTagSearch, $array_keys, $endTagSearch  ) {

            $continue = true;
            $output = '';

            $found_key = false;

            $start = 0;

            while ( $continue ) :

                // bắt đầu tìm từ vị trí 0 của chuỗi $html
                $pos_bg = strpos( $html, $beginTagSearch, $start );

                if ( false !== $pos_bg ) :

                    $pos_end = strpos( $html, $endTagSearch, $pos_bg );

                    if ( false !== $pos_end ) :

                        $output = substr( $html, $pos_bg, $pos_end + strlen( $endTagSearch ) - $pos_bg ); 

                        // tìm key trong $output
                        foreach ( $array_keys as $key ) :

                            $has_key = strpos( $output, $key . '-css' );

                            if ( false !== $has_key ) :

                                $found_key = true;

                                break;

                            endif;                           

                        endforeach; 

                        if ( $found_key ) :
                            
                            $html = substr( $html, 0, $pos_bg ) . substr( $html, $pos_end + strlen( $endTagSearch )  );

                            // mỗi lần tìm xong thì cập nhật lại vị trí tìm kiếm mới                    
                            $start = $pos_bg;

                            $found_key = false; 

                        else:

                            $start = $pos_end;

                        endif;     

                    endif;     

                else :

                    $continue = false;

                endif;

            endwhile;

            return $html;

        }

        public function findAndReplaceScriptHtml( $html, $beginTagSearch, $array_keys, $endTagSearch ) {

            $continue = true;
            $output = '';

            $start = 0;

            $found_key = false;

            while ( $continue ) :

                // bắt đầu tìm từ vị trí 0 của chuỗi $html
                $pos_bg = strpos( $html, $beginTagSearch, $start );

                if ( false !== $pos_bg ) :                     

                    $pos_end = strpos( $html, $endTagSearch, $pos_bg );

                    if ( false !== $pos_end ) :

                        $output = substr( $html, $pos_bg, $pos_end + strlen( $endTagSearch ) - $pos_bg );                                                 

                        // tìm key trong $output
                        foreach ( $array_keys as $key ) :

                            $has_key = strpos( $output, $key );

                            if ( false !== $has_key ) :

                                $found_key = true;

                                break;

                            endif;                           

                        endforeach; 

                        if ( $found_key ) :

                            $html = substr( $html, 0, $pos_bg ) . substr( $html, $pos_end + strlen( $endTagSearch )  );                                 

                            // mỗi lần tìm xong thì cập nhật lại vị trí tìm kiếm mới                    
                            $start = $pos_bg;  

                            $found_key = false; 

                        else: 

                            $start = $pos_end;

                        endif;                     

                    endif;     

                else :

                    $continue = false;

                endif;

            endwhile;

            return $html;
        }

        
        public function removeDefaultStyleSheet( $html ) {

            $current_screen = get_current_screen();

            $css_removes = array();          

            $stylesheet_begin_tag_search = "<link rel='stylesheet'";
            $stylesheet_end_tag_search = "/>";

            switch ( $current_screen->base ) :

                case 'dashboard':

                    $css_removes = array(
                        'list-tables', 'revisions',
                        'media', 'themes', 'about', 'nav-menus', 'widgets',
                        'site-icon', 'l10n', 'wp-auth-check', 'ie'
                    );

                    break;

                case 'edit':

                    $css_removes = array(
                        'revisions', 'dashboard', 'edit',
                        'media', 'themes', 'about', 'nav-menus', 'widgets',
                        'site-icon', 'l10n', 'wp-auth-check', 'ie'
                    );
                    
                    break;

                case 'post':

                    $css_removes = array(
                        'revisions', 'dashboard', 'list-tables',
                        'mediaelement', 'wp-mediaelement',
                        'media', 'themes', 'about', 'nav-menus', 'widgets',
                        'site-icon', 'l10n', 'wp-auth-check', 'ie'
                    );

                    break;

                case 'edit-tags':
                case 'term':

                    $css_removes = array(
                        'revisions', 'dashboard',
                        'media', 'themes', 'about', 'nav-menus', 'widgets',
                        'site-icon', 'l10n', 'wp-auth-check', 'ie'
                    );        

                    break;

                case 'upload':

                    $css_removes = array(
                        'revisions', 'dashboard', 
                        'themes', 'about', 'nav-menus', 'widgets',
                        'site-icon', 'l10n', 'wp-auth-check', 'ie'
                    );

                     break;
                
                default:                   
                    break;

            endswitch;                          

            $html = $this->findAndReplaceStyleSheetHtml( $html, $stylesheet_begin_tag_search, $css_removes , $stylesheet_end_tag_search );

            $html = preg_replace('/^[ \t]*[\r\n]+/m', '', $html);

            return $html;

        }

        public function removeDefaultScripts( $html ) {

            $current_screen = get_current_screen();

            $script_removes = array();

            $script_begin_tag_search = "<script type='text/javascript'"; 
            $script_end_tag_search = "</script>";

            switch ( $current_screen->base ) :

                case 'dashboard':

                    $script_removes = array(
                        'jquery-migrate.min.js',
                        'utils.min.js', 'underscore.min.js', 
                        'json2.min.js', 'updates.min.js', 'hoverIntent.min.js',
                        'wp-util.min.js', 'wp-a11y.min.js', 'wp-ajax-response.min.js',
                        'jquery.color.min.js', 'wp-lists.min.js', 'quicktags.min.js',
                        'jquery.query.js', 'edit-comments.min.js', 'thickbox.js',
                        'customize-loader.min.js', 'customize-base.min.js', 'plugin-install.min.js',
                        'shortcode.min.js', 'media-upload.min.js',
                        '_wpUpdatesSettings', '_wpUtilSettings', 'quicktagsL10n',
                        'adminCommentsL10n', 'thickboxL10n', 'plugininstallL10n',
                        '_wpCustomizeLoaderSettings'
                    );

                    break;

                case 'edit':

                    $script_removes = array(
                        'jquery-migrate.min.js',
                        'utils.min.js', 'underscore.min.js', 
                        'json2.min.js', 'updates.min.js', 'hoverIntent.min.js',
                        'wp-util.min.js', 'wp-a11y.min.js', 'wp-ajax-response.min.js',
                        'jquery.color.min.js', 'wp-lists.min.js', 'quicktags.min.js',
                        'jquery.query.js', 'edit-comments.min.js', 'thickbox.js',
                        'customize-loader.min.js', 'customize-base.min.js', 'plugin-install.min.js',
                        'shortcode.min.js', 'media-upload.min.js',
                        '_wpUpdatesSettings', '_wpUtilSettings', 'quicktagsL10n',
                        'adminCommentsL10n', 'thickboxL10n', 'plugininstallL10n',
                        '_wpCustomizeLoaderSettings'
                    );
                   
                    break;

                case 'post':

                    $script_removes = array(
                        'jquery-migrate.min.js',                     
                        'json2.min.js', 
                        'updates.min.js', 
                        'hoverIntent.min.js',                      
                        'wp-ajax-response.min.js',
                        'jquery.color.min.js',                       
                        'edit-comments.min.js',                        
                        'customize-loader.min.js', 
                        'customize-base.min.js', 
                        'plugin-install.min.js',                      
                        '_wpUpdatesSettings',                        
                        'adminCommentsL10n',                       
                        'plugininstallL10n',
                        '_wpCustomizeLoaderSettings'
                    );

                     break;

                case 'edit-tags':
                case 'term':

                    $script_removes = array(
                        'jquery-migrate.min.js',
                        'utils.min.js', 'underscore.min.js', 
                        'json2.min.js', 'updates.min.js', 'hoverIntent.min.js',
                        'wp-util.min.js', 'wp-a11y.min.js', 'wp-ajax-response.min.js',
                        'jquery.color.min.js', 'wp-lists.min.js', 'quicktags.min.js',
                        'jquery.query.js', 'edit-comments.min.js', 'thickbox.js',
                        'customize-loader.min.js', 'customize-base.min.js', 'plugin-install.min.js',
                        'shortcode.min.js', 'media-upload.min.js',
                        '_wpUpdatesSettings', '_wpUtilSettings', 'quicktagsL10n',
                        'adminCommentsL10n', 'thickboxL10n', 'plugininstallL10n',
                        '_wpCustomizeLoaderSettings'
                    ); 

                    break;

                case 'upload':

                    $script_removes = array(
                        'jquery-migrate.min.js',                      
                        'json2.min.js', 'updates.min.js', 'hoverIntent.min.js',                       
                        'wp-ajax-response.min.js',
                        'jquery.color.min.js', 
                        'wp-lists.min.js', 
                        'quicktags.min.js',                     
                        'edit-comments.min.js',                       
                        'customize-loader.min.js', 
                        'customize-base.min.js', 
                        'plugin-install.min.js',
                        'shortcode.min.js',
                        '_wpUpdatesSettings',
                        'quicktagsL10n',
                        'adminCommentsL10n',
                        'plugininstallL10n',
                        '_wpCustomizeLoaderSettings'
                    ); 
                     

                     break;
                
                case 'media':

                    break;

                default:                   
                    break;

            endswitch;            

            $html = $this->findAndReplaceScriptHtml( $html, $script_begin_tag_search, $script_removes, $script_end_tag_search );            

            $html = preg_replace('/^[ \t]*[\r\n]+/m', '', $html);

            return $html;           
    

        }
 
        public function removeAllStyleScripts( $html ) { 

            $html = $this->removeDefaultStyleSheet( $html );
            $html = $this->removeDefaultScripts( $html );
            
            return $html;

        }
            
        public function parseHTML( $html )
        { 
            $this->html = $this->removeAllStyleScripts( $html );
            //$this->html = $this->minifyHTML( $html );
        }        
       
    }

    function wp_disable_default_stylesheet_finish($html) {
        return new WP_ADMIN_OPTIMIZER($html);      

    }

    function disable_default_stylesheet_start() {
        
       ob_start('wp_disable_default_stylesheet_finish');

    }
    //add_action( 'admin_init', 'disable_default_stylesheet_start' );   
    
?>