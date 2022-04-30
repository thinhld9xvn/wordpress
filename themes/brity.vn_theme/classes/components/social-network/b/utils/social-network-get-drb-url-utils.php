<?php 

    namespace Social_Network;

    class SocialNetworkGetDrbUrlUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_DRB_URL_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_ID);

        }

    }