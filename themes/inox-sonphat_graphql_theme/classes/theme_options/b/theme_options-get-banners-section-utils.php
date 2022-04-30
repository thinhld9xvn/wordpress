<?php
    namespace Theme_Options;
    class ThemeOptionsGetBannersSectionUtils {
        public static function get() {
            return array(
                'id' => BANNERS_FIELDS::BANNERS_SECTION_ID,
                'title'  => array(
                   'vi' => BANNERS_FIELDS::BANNERS_TITLE,
                   'en' => BANNERS_FIELDS::BANNERS_TITLE
               ),
                'desc'   => array(
                    'vi' => BANNERS_FIELDS::BANNERS_DESCRIPTION,
                   'en' => BANNERS_FIELDS::BANNERS_DESCRIPTION
               ),
                'fields' => array(
                    array(
                        'id' => BANNERS_FIELDS::BANNERS_SECTION_1_ID,
                        'type' => BANNERS_FIELDS::BANNERS_SECTION_1_TYPE,
                        'title' => array(                             
                            'vi' => BANNERS_FIELDS::BANNERS_SECTION_1_TITLE,
                            'en' => BANNERS_FIELDS::BANNERS_SECTION_1_TITLE                    
                        ),
                        'desc' => BANNERS_FIELDS::BANNERS_SECTION_1_DESC,
                        'indent' => BANNERS_FIELDS::BANNERS_SECTION_1_INDENT
                    ),
                        array(
                            'id'    => BANNERS_FIELDS::BANNERS_SECTION_BG_IMAGE_ID,
                            'type'  => BANNERS_FIELDS::BANNERS_SECTION_BG_IMAGE_TYPE,
                            'title' => array(                                    
                                'vi' => BANNERS_FIELDS::BANNERS_SECTION_BG_IMAGE_TITLE,
                                'en' => BANNERS_FIELDS::BANNERS_SECTION_BG_IMAGE_TITLE
                            ),
                            'desc'  => array(                                 
                                'vi' => BANNERS_FIELDS::BANNERS_SECTION_BG_IMAGE_DESCRIPTION,
                                'en' => BANNERS_FIELDS::BANNERS_SECTION_BG_IMAGE_DESCRIPTION                                    
                            )
                        ),   
                    array(
                        'id' => BANNERS_FIELDS::BANNERS_SECTION_2_ID,
                        'type' => BANNERS_FIELDS::BANNERS_SECTION_2_TYPE,
                        'indent' => BANNERS_FIELDS::BANNERS_SECTION_2_INDENT 
                    )
                )
            );
        }
    }