<?php 
    namespace Home\Clients;
    use Theme_Options\HOME_FIELDS;
    class ClientsGetPostTypeFieldUtils {
        public static function get() {
            return \Theme_Options\Theme_Options::get_field( HOME_FIELDS::HOME_SECTION_CL_POST_TYPE_ID,
                                                                HOME_FIELDS::HOME_SECTION_ID);
        }
    }
