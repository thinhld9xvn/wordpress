<?php 

    namespace Mails;

    class MailSendByAdminActionUtils {

        public static function send($to, $data) {

            //extract($data);

            $from_name = MailGetFromNameDefUtils::get();
            
            $headers[] = "From: {$from_name} <noreply@" . $_SERVER['SERVER_NAME'] . ">";
            //$headers[] = 'Cc: website developer <thinhld9xvn@gmail.com>';
            $headers[] = 'Content-Type: text/html; charset=UTF-8';		
            //$headers = '';
            $subject = MailGetAdminActionSubjectTemplateUtils::get();	
            $body = MailGetAdminActionEmailTemplateUtils::get();		

            $logo = \Attachments\AttachmentGetLogoMailUrlUtils::get();

            if ($data[\Stores\STORE_MAIL_FIELDS::STORE_CHER] === \Stores\STORE_DATA::STORE_CHER_AUTO ) :
                
                $body = preg_replace('/' . \Stores\STORE_MAIL_PREFIX::CHER_STYLE_ONE_PREFIX . '/', "display: none", $body);
                $body = preg_replace('/' . \Stores\STORE_MAIL_PREFIX::CHER_STYLE_TWO_PREFIX . '/', "display: block", $body);
                

            else :

                $body = preg_replace('/' . \Stores\STORE_MAIL_PREFIX::CHER_STYLE_ONE_PREFIX . '/', "display: block", $body);
                $body = preg_replace('/' . \Stores\STORE_MAIL_PREFIX::CHER_STYLE_ONE_PREFIX . '/', "display: none", $body);

            endif;		
            
            $body = preg_replace('/' . \Stores\STORE_MAIL_PREFIX::LOGO_PREFIX . '/', $logo, $body);
            $body = preg_replace('/' . \Stores\STORE_MAIL_PREFIX::CIVILITE_PREFIX . '/', $data[\Stores\STORE_MAIL_FIELDS::STORE_CIVILITY], $body);
            $body = preg_replace('/' . \Stores\STORE_MAIL_PREFIX::NOM_PREFIX . '/', $data[\Stores\STORE_MAIL_FIELDS::STORE_NOM], $body);
            $body = preg_replace('/' . \Stores\STORE_MAIL_PREFIX::SELF_SITE_URL_PREFIX . '/', $data[\Stores\STORE_MAIL_FIELDS::STORE_SITE_URL], $body);
            $body = preg_replace('/' . \Stores\STORE_MAIL_PREFIX::SELF_SITE_PREFIX . '/', $data[\Stores\STORE_MAIL_FIELDS::STORE_SITE_URL], $body);
            $body = preg_replace('/' . \Stores\STORE_MAIL_PREFIX::USER_EMAIL_PREFIX . '/', $data[\Stores\STORE_MAIL_FIELDS::STORE_EMAIL], $body);
            $body = preg_replace('/' . \Stores\STORE_MAIL_PREFIX::STORE_VOTRE_MOT_DE_PASSE_PREFIX . '/', $data[\Stores\STORE_MAIL_FIELDS::STORE_VOTRE_MOT_DE_PASSE], $body);

            //$to = 'thinhld9xvn@gmail.com';		
        
            MailSendUtils::send($to, $subject, $body, $headers);

        }

    }