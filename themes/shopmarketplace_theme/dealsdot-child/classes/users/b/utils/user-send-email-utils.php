<?php 

    namespace Users;

    class UserSendEmailUtils {

        public static function send($data) {

            extract( $data );

            /*echo "<pre>";
            print_r($data); die();*/

            if ( $action === \Stores\STORE_MAIL_FIELDS::STORE_ADMIN_ACTION ) :

                $to = $store_email;	
                //$to = 'thinhld9xvn@gmail.com';

                //echo $to; die();

                $token = base64_encode(time());

                $reset_password_url = \Mails\MailCreateLinkResetPasswordUtils::create($user_id, $token);

                \Stores\StoreUpdateMetaTokenUtils::update($user_id, $token);

                $mydata = array(

                    \Stores\STORE_MAIL_FIELDS::STORE_CIVILITY => $data[\Stores\STORE_DATA_FIELDS::STORE_CIVILITY],
                    \Stores\STORE_MAIL_FIELDS::STORE_NOM =>  $data[\Stores\STORE_DATA_FIELDS::STORE_LAST_NAME],
                    \Stores\STORE_MAIL_FIELDS::STORE_SITE_URL => $data[\Stores\STORE_DATA_FIELDS::STORE_WEBSITE],
                    \Stores\STORE_MAIL_FIELDS::STORE_EMAIL => $data[\Stores\STORE_DATA_FIELDS::STORE_EMAIL],
                    \Stores\STORE_MAIL_FIELDS::STORE_VOTRE_MOT_DE_PASSE => $reset_password_url,
                    \Stores\STORE_MAIL_FIELDS::STORE_CHER => $data[\Stores\STORE_DATA_FIELDS::STORE_CHER]

                );

                \Mails\MailSendByAdminActionUtils::send($to, $mydata);

            else :

                $to = \Mails\MailGetAdminEmailAddressUtils::get();
                //$to = 'thinhld9xvn@gmail.com';

                $url = \Urls\UrlGetStoreDetailsPageUtils::get() . urlencode($store_shop_name);

                if ( $type === 'product' ) :

                    $url = $product_url;

                endif;

                $mydata = array(

                    \Stores\STORE_MAIL_FIELDS::ADMIN_CIVILITY => \Mails\MailGetAdminCivilityUtils::get(),
                    \Stores\STORE_MAIL_FIELDS::ADMIN_LAST_NAME => \Mails\MailGetAdminLastNameUtils::get(),
                    \Stores\STORE_MAIL_FIELDS::USER_CIVILITY => $data[\Stores\STORE_DATA_FIELDS::STORE_CIVILITY],
                    \Stores\STORE_MAIL_FIELDS::LINK_TO_STORE  => $url,
                    \Stores\STORE_MAIL_FIELDS::USER_LAST_NAME => $data[\Stores\STORE_DATA_FIELDS::STORE_LAST_NAME],
                    \Stores\STORE_MAIL_FIELDS::LINK_TOWARD => $data[\Stores\STORE_DATA_FIELDS::STORE_WEBSITE],
                    \Stores\STORE_MAIL_FIELDS::STORE_NAME => $data[\Stores\STORE_DATA_FIELDS::STORE_SHOP_NAME]

                );     
                
                /*echo "<pre>";
                print_r($mydata); die();*/

                \Mails\MailSendByStoreActionUtils::send($to, $mydata);

            endif;
           

        }

    }