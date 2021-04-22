<?php 

    namespace Mails;

    class MailSendResetPasswordUtils {

        public static function send($user_login) {

            $user = get_user_by(\Users\USER_DATA_FIELDS::LOGIN, $user_login);

            $user_id = $user->ID;            

            $civility = \Stores\StoreGetMetaCivilityUtils::get($user_id);
            $name = $user->last_name;
            
            $civility = $civility ? $civility : 'M.';
            
            $body = \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_RETRIEVE_PASSWORD_BODY_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_SECTION_TEMPLATES_ID);
            
            /*$url = esc_url( add_query_arg( array( 'key' => $reset_key, 'id' => $user_id ), 
                            wc_get_endpoint_url( 'lost-password', '', 
                            wc_get_page_permalink( 'myaccount' ) ) ) );*/

            $token = base64_encode(time());

            $reset_password_url = \Mails\MailCreateLinkResetPasswordUtils::create($user_id, $token);

            \Stores\StoreUpdateMetaTokenUtils::update($user_id, $token);
            
            $body = preg_replace("/" . \Stores\STORE_MAIL_PREFIX::CIVILITY_PREFIX . "/", $civility, $body);
            $body = preg_replace("/" . \Stores\STORE_MAIL_PREFIX::NAME_PREFIX . "/", $name, $body);
            $body = preg_replace("/" . \Stores\STORE_MAIL_PREFIX::ID_PREFIX . "/", $user_login, $body);
            $body = preg_replace("/" . \Stores\STORE_MAIL_PREFIX::URL_PREFIX . "/", $reset_password_url, $body);    
            
            echo $body;           
           

        }

    }