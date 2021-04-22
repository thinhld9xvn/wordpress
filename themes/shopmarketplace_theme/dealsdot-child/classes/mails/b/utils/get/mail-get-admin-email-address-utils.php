<?php 

    namespace Mails;

    class MailGetAdminEmailAddressUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_EMAIL_ADDRESS_ID,
														\Theme_options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SECTION_ID);

        }

    }