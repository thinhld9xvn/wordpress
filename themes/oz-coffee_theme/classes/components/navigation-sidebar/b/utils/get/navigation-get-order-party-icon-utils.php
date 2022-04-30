<?php 

    namespace Navigation_Sidebar;

    class NavSidebarGetOrderPartyIconUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_ORDER_PARTY_ICON_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_ID);

        }

    }