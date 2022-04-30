<?php 

    namespace Navigation_Sidebar;

    class NavSidebarGetFbMessengerIconUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_IMAGE_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_ID);

        }

    }