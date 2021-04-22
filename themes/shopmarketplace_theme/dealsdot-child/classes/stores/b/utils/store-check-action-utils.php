<?php 

    namespace Stores;

    class StoreCheckActionUtils {

        public static function has($action_name, $options) {          

            return $options[\Stores\STORE_OPTIONS_FIELDS::FORM_ACTION] === $action_name;

            
         }

    }