<?php 

    namespace Actions\Redirect;

    class ActionRedirectThemeTemplateUtils{

        public static function init() {

            if ( is_page_template(\Page_Templates\PAGE_TEMPLATES::PAGE_DASHBOARD_NEW_STORE_TEMPLATE) && 
                    ! \Users\UserCheckPermissionUtils::has(\Users\USER_ROLES::CREATE_NEW_STORE_PERMISSION) ) :

                wp_redirect(home_url());

                die();

            endif;

            if ( is_page_template(\Page_Templates\PAGE_TEMPLATES::PAGE_STORE_RESET_PASSWORD_TEMPLATE) ) :

                $token = $_GET['token'];

                $uid = (int) $_GET['uid'];

                $timeout_expired = \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_LINK_EXPIRE_TIMEOUT_ID,
                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_SECTION_TEMPLATES_ID);
                
                $now = time();

                if ( $uid ) :
                    
                else :

                    wp_die('Invalid user id, please try again.');

                endif;

                if ( $token ) :     
                    
                    $_token = \Stores\StoreGetMetaTokenUtils::get($uid);    
                    
                    //echo $_token;

                    if ( $_token === $token ) :

                        $time_created = (int) base64_decode($token);

                        $timespan = $now - $time_created;  

                        if ( $timespan >= $timeout_expired ) :

                            wp_die('Token expired, please contact system admin.');

                        endif;

                    else :

                        wp_die('Invalid token, please try again.');

                    endif;

                    else :

                    wp_die('Invalid token, please try again.');

                endif;

            endif;

        }
    }