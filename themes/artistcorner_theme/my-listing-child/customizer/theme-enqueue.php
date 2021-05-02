<?php 

    function enqueue_child_themes() {

        global $current_user;

        wp_enqueue_style( 'child-style', get_stylesheet_uri() );
        wp_enqueue_style( 'child-layout-style', THEME_CSS_DIR_URI . '/layout.css' );

        wp_enqueue_style( 'child-jquery-ui-css', THEME_JQUERY_UI_DIR_URI . '/jquery-ui.css' );
        wp_enqueue_script( 'child-jquery-ui-js', THEME_JQUERY_UI_DIR_URI . '/jquery-ui.js' );

        wp_enqueue_style( 'child-jquery-noty-css', THEME_NOTY_DIR_URI . '/noty.css' );
        wp_enqueue_script( 'child-jquery-noty-js', THEME_NOTY_DIR_URI . '/noty.min.js' );

        if ( is_rtl() ) {
            wp_enqueue_style( 'mylisting-rtl', get_template_directory_uri() . '/rtl.css', [], wp_get_theme()->get('Version') );
        }

        wp_dequeue_style('google-fonts-1');

        $_hook_actions = get_localize_hooks_actions();

        wp_localize_script( 'jquery', '_CHILD_HOOK_ACTIONS', $_hook_actions );

        if ( is_home() || is_front_page() ) :            

            wp_enqueue_script(
                'mapbox-gl',
                'https://api.tiles.mapbox.com/mapbox-gl-js/v1.9.0/mapbox-gl.js',
                [], \MyListing\get_assets_version(), true
            );
    
            wp_enqueue_style(
                'mapbox-gl',
                'https://api.tiles.mapbox.com/mapbox-gl-js/v1.9.0/mapbox-gl.css',
                [], \MyListing\get_assets_version()
            ); 
            
            wp_enqueue_script('mylisting-mapbox');
            wp_enqueue_style('mylisting-mapbox');

            //wp_enqueue_script('mylisting-google-maps');
            //wp_enqueue_style('mylisting-google-maps');
           

        endif;

        if ( is_view_profile_page() ) :

            wp_enqueue_script('mylisting-single');

        endif;
        
        wp_enqueue_script( 'child-pagination-js', THEME_JS_DIR_URI . '/pagination.min.js' );
        wp_enqueue_script( 'child-custom-scripts-js', THEME_JS_DIR_URI . '/custom-scripts.js' );   

        $logout_url = '';        
        
        if ( is_user_logged_in() ) :

            $logout_url = wp_logout_url( home_url() );

            wp_localize_script( 'jquery', '_CURRENT_USER', array(
                'ID' => $current_user->ID,
                'data' => array(
                    'display_name' => $current_user->data->display_name
                )
            ) ); 

        endif;

        wp_localize_script( 'jquery', '_LOGOUT_ACTION_URL', $logout_url );       
        

    }
    

    // Enqueue child theme style.css
    add_action( 'wp_enqueue_scripts', 'enqueue_child_themes', 9999 );

    function listing_form_enqueue_scripts() {

        $request_uri = $_SERVER['REQUEST_URI'];

        if ( 0 === strpos($request_uri, '/my-account/edit-account') || 
            is_singular(JOBS_POST_TYPE) ) :   
            
            wp_enqueue_script('mylisting-vendor-ajax-file-upload', 
                                PARENT_THEME_FILE_UPLOAD_JS_URI . '/ajax-file-upload.js');

            wp_enqueue_script('mylisting-vendor-jquery-fileuploads', 
                                PARENT_THEME_FILE_UPLOAD_JS_URI . '/jquery.fileupload.js');

            wp_enqueue_script('mylisting-vendor-iframe-transport', 
                                PARENT_THEME_FILE_UPLOAD_JS_URI . '/jquery.iframe-transport.js');

            wp_enqueue_script( 'mylisting-listing-form' );
            wp_enqueue_style( 'mylisting-add-listing' );

        endif;

    }

    add_action( 'wp_enqueue_scripts', 'listing_form_enqueue_scripts', 9999 );

    function listing_dashboard_proposal() {

        if ( is_in_user_dashboard() ) :

            wp_enqueue_style('mylisting-dashboard');

            $proposal_statuses = get_localize_proposal_status();

            wp_localize_script('jquery', '_PROPOSAL_STATUS', $proposal_statuses);

        endif;

    }

    add_action( 'wp_enqueue_scripts', 'listing_dashboard_proposal', 9999 );