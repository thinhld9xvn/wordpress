<?php 

    namespace Navigation_Sidebar;

    class NavSidebarGetFbMessengerUrlUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_URL_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_ID);

        }

    }