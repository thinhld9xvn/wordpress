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

    add_action( 'admin_bar_menu', 'remove_wp_node', 999 );

    function remove_dashboard_widgets() {
        global $wp_meta_boxes;

        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);        

    }

    add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );  

    remove_action( 'welcome_panel', 'wp_welcome_panel' ); 

    function remove_wp_node( $wp_admin_bar ) {
        $wp_admin_bar->remove_node( 'wp-logo' );
        $wp_admin_bar->remove_node( 'new-content' );       
    }

    add_filter( 'contextual_help', 'mytheme_remove_help_tabs', 999, 3 );
    function mytheme_remove_help_tabs($old_help, $screen_id, $screen){
        $screen->remove_help_tabs();
        return $old_help;
    }

    add_filter('screen_options_show_screen', '__return_false');

    /*function hide_menu_items() { 
        remove_menu_page( 'edit.php' );  
    }
    add_action( 'admin_menu', 'hide_menu_items' );    */

    add_filter( 'admin_footer_text', '__return_empty_string', 11 ); 
    add_filter( 'update_footer', '__return_empty_string', 11 );
?>