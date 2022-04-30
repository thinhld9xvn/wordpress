<?php

    namespace Home\LHTK;
    use \Theme_Options\HOME_FIELDS;
    use \Theme_Options\Theme_Options;

    class LHTKGetMetaBackgroundUtils {

        public static function get() {

            return Theme_Options::get_field( HOME_FIELDS::HOME_SECTION_LHTK_BACKGROUND_ID,
                                            HOME_FIELDS::HOME_SECTION_ID);

        }

    }