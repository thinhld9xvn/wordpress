<?php 

    namespace Mails;

    class MailGetAdminActionEmailTemplateUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_ADMIN_ACTION_ID,
														\Theme_options\THEME_OPTIONS_FIELDS::EMAIL_SECTION_TEMPLATES_ID);

        }

    }