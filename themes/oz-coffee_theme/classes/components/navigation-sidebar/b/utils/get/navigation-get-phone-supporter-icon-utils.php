<?php 

    namespace Navigation_Sidebar;

    class NavSidebarGetPhoneSupporterIconUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_IMAGE_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_ID);

        }

    }