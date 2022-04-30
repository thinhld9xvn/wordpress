<?php 

    namespace Logo;

use Theme_Options\HEADER_FIELDS;

class LogoGetPrimaryUrlUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( HEADER_FIELDS::HEADER_SECTION_LOGO_IMAGE_ID,
                                                                HEADER_FIELDS::HEADER_SECTION_ID);

        }

    }