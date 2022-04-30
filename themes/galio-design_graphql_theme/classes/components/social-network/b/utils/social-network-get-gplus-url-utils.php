<?php 

    namespace Social_Network;

use Theme_Options\SOCIAL_FIELDS;

class SocialNetworkGetGPlusUrlUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_GPLUS_URL_ID,
                                                            SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_ID);

        }

    }