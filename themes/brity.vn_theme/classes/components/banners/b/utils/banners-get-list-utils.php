<?php 

    namespace Banners;

    class BannersGetListUtils {

        private static function get_banner_attachment($attachment_id) {

            return [
                '370x460' => wp_get_attachment_image_url($attachment_id, 
                                                            \Attachment\ATTACHMENT_SPECIFICS::BANNER_370x460_FEATURED_IMAGE),

                '370x215' => wp_get_attachment_image_url($attachment_id, 
                                                            \Attachment\ATTACHMENT_SPECIFICS::BANNER_370x215_FEATURED_IMAGE),

                '210x378' => wp_get_attachment_image_url($attachment_id, 
                                                            \Attachment\ATTACHMENT_SPECIFICS::BANNER_210x378_FEATURED_IMAGE),
            
                '570x171' => wp_get_attachment_image_url($attachment_id, 
                                                            \Attachment\ATTACHMENT_SPECIFICS::BANNER_570x171_FEATURED_IMAGE)
            ];

        }

        public static function get() {

            $banner1 = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::BANNER_SECTION_BANNER1_ID,
                                                                \Theme_Options\THEME_OPTIONS_FIELDS::BANNER_SECTION_ID);

            $banner2 = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::BANNER_SECTION_BANNER2_ID,
                                                                \Theme_Options\THEME_OPTIONS_FIELDS::BANNER_SECTION_ID);

            $banner3 = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::BANNER_SECTION_BANNER3_ID,
                                                                \Theme_Options\THEME_OPTIONS_FIELDS::BANNER_SECTION_ID);

            $banner4 = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::BANNER_SECTION_BANNER4_ID,
                                                                \Theme_Options\THEME_OPTIONS_FIELDS::BANNER_SECTION_ID);

            $banner5 = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::BANNER_SECTION_BANNER5_ID,
                                                                \Theme_Options\THEME_OPTIONS_FIELDS::BANNER_SECTION_ID);

            $banner1_attachment_id = pn_get_attachment_id_from_url($banner1);
            $banner2_attachment_id = pn_get_attachment_id_from_url($banner2);
            $banner3_attachment_id = pn_get_attachment_id_from_url($banner3);
            $banner4_attachment_id = pn_get_attachment_id_from_url($banner4);
            $banner5_attachment_id = pn_get_attachment_id_from_url($banner5);

            $banner1_attachment = self::get_banner_attachment($banner1_attachment_id);
            $banner2_attachment = self::get_banner_attachment($banner2_attachment_id);
            $banner3_attachment = self::get_banner_attachment($banner3_attachment_id);
            $banner4_attachment = self::get_banner_attachment($banner4_attachment_id);
            $banner5_attachment = self::get_banner_attachment($banner5_attachment_id);

            return [
                $banner1_attachment,
                $banner2_attachment,
                $banner3_attachment,
                $banner4_attachment,
                $banner5_attachment
            ];

        }

    }