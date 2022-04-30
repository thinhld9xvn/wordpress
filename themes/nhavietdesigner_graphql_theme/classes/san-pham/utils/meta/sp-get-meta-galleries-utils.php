<?php 

    namespace SP;

    class SPGetMetaGalleriesUtils {

        public static function get($pid) {

            return \get_field(SP_FIELDS::GALLERIES_FIELD);

        }

    }