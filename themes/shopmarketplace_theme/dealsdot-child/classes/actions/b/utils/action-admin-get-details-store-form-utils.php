<?php 
    namespace Actions;

    class ActionAdminGetDetailsStoreFormUtils {

        public static function perform() {

            $messages = \MessageNotification\MessageGetUtils::get_all();

            $email = $_POST['email'];
            $user = get_user_by_email($email);	
            
            $options = array(
                \Stores\STORE_OPTIONS_FIELDS::FORM_SUBMIT => $messages[\Theme_Options\THEME_OPTIONS_FIELDS::SAVE_CHANGES_LABEL_ID],
                \Stores\STORE_OPTIONS_FIELDS::FORM_ACTION => \Stores\STORE_DATA::STORE_UPDATE_ACTION,
                \Stores\STORE_OPTIONS_FIELDS::FORM_METHOD => \Stores\STORE_DATA::STORE_FORM_AJAX_METHOD,
                \Stores\STORE_OPTIONS_FIELDS::USER_ID => $user->ID
            );
    
            $contents = file_get_contents((new \Stores\UC_Store_Form($options))->print_form_fields());
    
            echo $contents;
            
            die();

        }

    }