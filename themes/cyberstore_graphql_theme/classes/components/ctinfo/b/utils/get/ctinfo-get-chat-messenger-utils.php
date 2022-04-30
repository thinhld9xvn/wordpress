<?php 

    namespace CTInfo;

    class CTInfoGetChatMessengerUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_FB_CHAT_MESSENGER_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_ID);

        }

    }