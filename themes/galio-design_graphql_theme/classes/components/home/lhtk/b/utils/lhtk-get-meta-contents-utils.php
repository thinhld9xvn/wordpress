<?php

    namespace Home\LHTK;
    use \Theme_Options\HOME_FIELDS;
    use \Theme_Options\Theme_Options;

    class LHTKGetMetaContentsUtils {

        public static function get($lang = DEFAULT_LANG) {

            $field = $lang === DEFAULT_LANG ? HOME_FIELDS::HOME_SECTION_LHTK_CONTENTS_ID : 
                                                    HOME_FIELDS::HOME_SECTION_LHTK_CONTENTS_EN_ID;

            return Theme_Options::get_field( $field,
                                             HOME_FIELDS::HOME_SECTION_ID);

        }

    }