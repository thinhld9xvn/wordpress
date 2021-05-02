<?php

function __ajax_unicorn_sb_get_jobs_listing() { 
    
    global $current_user;
    
    $form_data = $_POST['form_data'];  
   
    if ( is_term_search($form_data) ) :

        $results = search_query_context_term($form_data);

    else :

        $results = search_query_by_category($form_data);

    endif;

    header('header: json/application; charset: utf-8');

    echo json_encode( $results );

    die();

}

add_action("wp_ajax_sb_ajax_get_jobs_listing", "__ajax_unicorn_sb_get_jobs_listing");
add_action("wp_ajax_nopriv_sb_ajax_get_jobs_listing", "__ajax_unicorn_sb_get_jobs_listing");

function __ajax_unicorn_sb_save_profile() {
    
    //echo "<pre>"; 
    $params = $_POST['params'];

    $data = UserMemberShip::get_data_profile_by_ajax_post($params);    

    if ( ! UserMemberShip::is_user_has_profile() ) : 

        $result = UserMemberShip::create_user_profile($data);

    else :

        $result = UserMemberShip::edit_user_profile($data);
        
    endif;    

    echo $result;

    die();

}
add_action("wp_ajax_sb_ajax_save_profile", "__ajax_unicorn_sb_save_profile");
add_action("wp_ajax_nopriv_sb_ajax_save_profile", "__ajax_unicorn_sb_save_profile");

/*function wp_loaded() {
    //$post = get_post(510);
    $meta = get_post_meta(541);

    echo "<pre>";
    print_r($meta); die();
}*/
//add_action('wp_loaded', 'wp_loaded');