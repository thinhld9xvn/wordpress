<?php

    namespace Actions\Woocommerce;

    class ActionWoocommerceCustomizeUpdateStoreDetailsContentsUtils {

        public static function init() {
          
            $messages = \MessageNotification\MessageGetUtils::get_all();

            $options = array(
    
                \Stores\STORE_OPTIONS_FIELDS::FORM_HEADING => $messages[\Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_STORE_DETAILS_LABEL_ID],
                \Stores\STORE_OPTIONS_FIELDS::FORM_ID => \Stores\STORE_DATA::STORE_FORM_UPDATE_ID,
                \Stores\STORE_OPTIONS_FIELDS::FORM_SUBMIT => $messages[\Theme_Options\THEME_OPTIONS_FIELDS::SAVE_CHANGES_LABEL_ID],
                \Stores\STORE_OPTIONS_FIELDS::FORM_ACTION  => \Stores\STORE_DATA::STORE_UPDATE_ACTION
    
            );
    
            (new \Stores\UC_Store_Form($options))->print_form();

        }

    }


