<?php 

    namespace Social_Network;

    use Theme_Options\SOCIAL_FIELDS;

class SocialNetworkGetPinterestUrlUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_PINTEREST_URL_ID,
                                                            SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_ID);

        }

    }