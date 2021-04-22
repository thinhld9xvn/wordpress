<?php 

    namespace Actions;

    class ActionProductFeedbackAbuseUtils {

        public static function perform() {

            $params = $_POST['params'];

            $params = \Strings\StringExtractParametersUtils::parse($params);	

            extract($params);

            $mail_body_template = \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_REPORT_ABUSE_FORM_ID,
                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_SECTION_TEMPLATES_ID);


            $mail_subject = \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_REPORT_ABUSE_SUBJECT_FORM_ID,
                                                                    \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_SECTION_TEMPLATES_ID);

            if ( ! empty( $report_abuse_name ) && 
                ! empty( $report_abuse_email ) && filter_var( $report_abuse_email, FILTER_VALIDATE_EMAIL ) && 
                ! empty( $report_abuse_msg ) ) :

                $to = \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_EMAIL_ADDRESS_ID,
                                                                \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SECTION_ID);


                $mail_body = sprintf($mail_body_template, 
                                    $report_abuse_product_name,
                                    $report_abuse_name,
                                    $report_abuse_email,
                                    $report_abuse_msg);

                \Mails\MailSendUtils::send($to, $mail_subject, $mail_body);

                echo 'success';
                die();

            endif;

            echo 'error';
            die();

        }
        
    }