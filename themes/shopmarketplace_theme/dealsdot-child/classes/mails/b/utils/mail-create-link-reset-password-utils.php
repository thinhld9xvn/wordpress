<?php 

    namespace Mails;

    class MailCreateLinkResetPasswordUtils {

        public static function create($uid, $token) {

            $reset_password_page_url = \Urls\UrlGetAdminResetPasswordPageUtils::get();

		    return $reset_password_page_url . '?uid=' . $uid . '&token=' . $token;

        }

    }