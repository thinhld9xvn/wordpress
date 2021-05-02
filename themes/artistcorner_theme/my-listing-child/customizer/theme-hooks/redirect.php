<?php

function filter_woocommerce_registration_redirect( $var ) { 
    return _SET_ACCOUNT_SETTINGS_URL;
}

add_filter( 'woocommerce_registration_redirect', 
    'filter_woocommerce_registration_redirect', 10, 1 );

add_filter( 'woocommerce_login_redirect', 'njengah_woocommerce_redirect_after_login', 9999, 2 );

function njengah_woocommerce_redirect_after_login( $redirect, $user ) {
        
        //$redirect = get_home_url(); // homepage
        //$redirect = wc_get_page_permalink( 'shop' ); // shop page
        //$redirect = '/custom_url'; // custom URL same site
        //$redirect = 'https://example.com'; // External url
        //$redirect = add_query_arg( 'password-reset', 'true', wc_get_page_permalink( 'myaccount' ) ); // custom My Account tab

    $redirect = wc_get_page_permalink('myaccount');    
    
    return $redirect;
}


function theme_template_redirect() {

    if ( _is_in_edit_account_page() ) :

        if ( ! UserMemberShip::has_action_permission(UserPermission::SHOW_EDIT_PROFILE_DETAILS) ) :

            wp_redirect(_EDIT_ACCOUNT_URL);

        else :

            wp_redirect(_EDIT_PROFILE_URL);

        endif;    
        
        die();

    endif;

    if ( is_in_edit_profile_page() && 
        ! UserMemberShip::has_action_permission(UserPermission::SHOW_EDIT_PROFILE_DETAILS) ) :

       wp_redirect(_EDIT_ACCOUNT_URL);

       die();

    endif;    

}

add_action('wp', 'theme_template_redirect');