<?php 

    namespace Home\Sections;

    class GalleriesGetMetaAddressFieldFieldUtils {

        public static function get($pid) {

            return get_post_meta($pid, GALLERIES_FIELDS::ADDRESS_FIELD, true);

        }

    }