<?php 
    namespace Home\Clients;
    use Theme_Options\HOME_FIELDS;
    class ClientsGetHeadingFieldUtils {
        public static function get() {
            return \Theme_Options\Theme_Options::get_field( HOME_FIELDS::HOME_SECTION_CL_TITLE_ID,
                                                                HOME_FIELDS::HOME_SECTION_ID);
        }
    }
