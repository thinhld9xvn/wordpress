<?php 

    namespace SP;

    class SPGetMetaDescriptionUtils {

        public static function get($pid) {

            return \get_field(SP_FIELDS::DESCRIPTION_FIELD);

        }

    }