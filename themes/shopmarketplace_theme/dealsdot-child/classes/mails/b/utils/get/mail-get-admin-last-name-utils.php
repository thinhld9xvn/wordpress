<?php 

    namespace Mails;

    class MailGetAdminLastNameUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_LAST_NAME_ID,
														\Theme_options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SECTION_ID);

        }

    }