<?php
    namespace Theme_Options;
    class ThemeOptionsGetHomeSectionUtils {
        public static function get() {
            return array(
                'id' => HOME_FIELDS::HOME_SECTION_ID,
                'title'  => array(
                   'vi' => HOME_FIELDS::HOME_TITLE,
                   'en' => HOME_FIELDS::HOME_TITLE
               ),
                'desc'   => array(
                    'vi' => HOME_FIELDS::HOME_DESCRIPTION,
                   'en' => HOME_FIELDS::HOME_DESCRIPTION
               ),
                'fields' => array(
                )
            );
        }
    }