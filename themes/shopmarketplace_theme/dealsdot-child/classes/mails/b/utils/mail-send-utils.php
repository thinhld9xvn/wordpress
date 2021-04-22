<?php 

    namespace Mails;

    class MailSendUtils {

        public static function send($to, $subject, $body, $headers = array('Content-Type: text/html; charset=UTF-8'), $attachments = array()) {

            $result = wp_mail( $to, $subject, $body, $headers, $attachments );      

        }

    }