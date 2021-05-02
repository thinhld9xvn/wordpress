<?php 

function __ajax_unicorn_sb_ajax_save_password() {

    global $current_user;

    $params = $_POST['params'];

    $data = extract_params_serialized($params);

    extract($data);

    $userdata = UserMemberShip::get_userdata($current_user->ID);   
    $user_pass = $userdata->data->user_pass;

    if ($mylisting_user_role) :

        if ( in_array($mylisting_user_role, [_ACCOUNT_ROLE_CUSTOMER, _ACCOUNT_ROLE_PROVIDER] ) ) :

            UserMemberShip::set_account_role($current_user->ID, $mylisting_user_role);

        endif;

    endif;

    // only apply for set password form
    if ( $password_current === $user_pass ) :

        UserMemberShip::change_password($password_1, $current_user);

        wp_die('success');  

    endif;

    if ( ! wp_check_password($password_current, $user_pass, $current_user->ID) || 
            $password_1 !== $password_2 ) :

        wp_die('password not match');

    endif;
    
    UserMemberShip::change_password($password_1, $current_user);

    wp_die('success');

}

add_action("wp_ajax_sb_ajax_save_password", "__ajax_unicorn_sb_ajax_save_password");
add_action("wp_ajax_nopriv_sb_ajax_save_password", "__ajax_unicorn_sb_ajax_save_password");

function __ajax_unicorn_sb_ajax_change_account_avatar() {

    $avatar = $_POST['avatar'];

    UserMemberShip::set_account_avatar($avatar);

    wp_die('success');

}

add_action("wp_ajax_" . _AJAX_CHANGE_ACCOUNT_AVATAR_ACTION, "__ajax_unicorn_sb_ajax_change_account_avatar");
add_action("wp_ajax_nopriv_" . _AJAX_CHANGE_ACCOUNT_AVATAR_ACTION, "__ajax_unicorn_sb_ajax_change_account_avatar");

function __ajax_unicorn_sb_ajax_get_users_list() {   

    $usersList = UserMemberShip::get_users_list();

    header('Content-Type: application/json; charset: UTF-8');

    echo json_encode($usersList);

    die();

}

add_action("wp_ajax_" . _AJAX_GET_USERS_LIST_ACTION, "__ajax_unicorn_sb_ajax_get_users_list");
add_action("wp_ajax_nopriv_" . _AJAX_GET_USERS_LIST_ACTION, "__ajax_unicorn_sb_ajax_get_users_list");