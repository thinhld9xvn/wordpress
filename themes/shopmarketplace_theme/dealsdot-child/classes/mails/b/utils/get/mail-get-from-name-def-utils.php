<?php 

    namespace Mails;

    class MailGetFromNameDefUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_EMAIL_NAME_ID,
														\Theme_options\THEME_OPTIONS_FIELDS::EMAIL_SECTION_TEMPLATES_ID);

        }

    }