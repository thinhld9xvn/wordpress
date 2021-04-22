<?php

    namespace Actions\Woocommerce;

    class ActionWooCommerceCustomizeAdminNewStoreContentsUtils {

        public static function init() {

            $messages = \MessageNotification\MessageGetUtils::get_all();

            //extract($messages);

            $options = array(
                \Stores\STORE_OPTIONS_FIELDS::FORM_HEADING => $messages[\Theme_Options\THEME_OPTIONS_FIELDS::CREATE_THE_NEW_STORE_LABEL_ID],
                \Stores\STORE_OPTIONS_FIELDS::FORM_ID => \Stores\STORE_DATA::STORE_FORM_NEW_ID,
                \Stores\STORE_OPTIONS_FIELDS::FORM_SUBMIT => $messages[\Theme_Options\THEME_OPTIONS_FIELDS::SUBMIT_LABEL_ID],
                \Stores\STORE_OPTIONS_FIELDS::FORM_ACTION => \Stores\STORE_DATA::STORE_NEW_ACTION
            );

            (new \Stores\UC_Store_Form($options))->print_form();


        }

    }


