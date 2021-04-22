<?php 
    require_once USER_UTILS_ADMIN_DIR . '/user-admin-extra-profile-priority-field-utils.php';

    require_once USER_UTILS_ADMIN_DIR . '/user-admin-extra-profile-field-utils.php';
    
	add_action( \Actions\ACTIONS::UNICORN_SHOW_USER_PROFILE_ACTION, 
                    array('\Users\UserAdminExtraProfilePriorityFieldUtils', 'extra'), 
                    1 );

    add_action( \Actions\ACTIONS::UNICORN_SHOW_USER_PROFILE_ACTION, 
                    array('\Users\UserAdminExtraProfilePriorityFieldUtils', 'extra'), 
                    1 );    

    add_action( \Actions\ACTIONS::UNICORN_PERSONAL_OPTIONS_UPDATE_ACTION, 
                    array('\Users\UserAdminExtraProfileFieldUtils', 'extra') );

    add_action( \Actions\ACTIONS::UNICORN_EDIT_USER_PROFILE_UPDATE_ACTION, 
                     array('\Users\UserAdminExtraProfileFieldUtils', 'extra') );