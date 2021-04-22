<?php 

    namespace Mails;

    class MailSendByStoreActionUtils {

        public static function send($to, $data) {

            //extract($data);

            $from_name = MailGetFromNameDefUtils::get();
            
            $headers[] = "From: {$from_name} <noreply@" . $_SERVER['SERVER_NAME'] . ">";
            $headers[] = 'Content-Type: text/html; charset=UTF-8';		
            //$headers = '';
            $subject = \Mails\MailGetStoreActionSubjectTemplateUtils::get();	
            $body = \Mails\MailGetStoreActionEmailTemplateUtils::get();	

            $subject = str_replace(\Stores\STORE_MAIL_PREFIX::STORE_NAME_PREFIX, 
                                    $data[\Stores\STORE_MAIL_FIELDS::STORE_NAME], 
                                    $subject);

            $logo = \Attachments\AttachmentGetLogoMailUrlUtils::get();

            $body = preg_replace('/' . \Stores\STORE_MAIL_PREFIX::LOGO_PREFIX . '/', $logo, $body);
            $body = preg_replace('/' . \Stores\STORE_MAIL_PREFIX::ADMIN_CIVILITY_PREFIX . '/', $data[\Stores\STORE_MAIL_FIELDS::ADMIN_CIVILITY], $body);
            $body = preg_replace('/' . \Stores\STORE_MAIL_PREFIX::ADMIN_LAST_NAME_PREFIX . '/', $data[\Stores\STORE_MAIL_FIELDS::ADMIN_LAST_NAME], $body);
            $body = preg_replace('/' . \Stores\STORE_MAIL_PREFIX::USER_CIVILITY_PREFIX . '/', $data[\Stores\STORE_MAIL_FIELDS::USER_CIVILITY], $body);
            $body = preg_replace('/' . \Stores\STORE_MAIL_PREFIX::LINK_TO_STORE_PREFIX . '/', $data[\Stores\STORE_MAIL_FIELDS::LINK_TO_STORE], $body);
            $body = preg_replace('/' . \Stores\STORE_MAIL_PREFIX::USER_LAST_NAME_PREFIX . '/', $data[\Stores\STORE_MAIL_FIELDS::USER_LAST_NAME], $body);
            $body = preg_replace('/' . \Stores\STORE_MAIL_PREFIX::LINK_TOWARD_PREFIX . '/', $data[\Stores\STORE_MAIL_FIELDS::LINK_TOWARD], $body);

            MailSendUtils::send($to, $subject, $body, $headers);

        }

    }