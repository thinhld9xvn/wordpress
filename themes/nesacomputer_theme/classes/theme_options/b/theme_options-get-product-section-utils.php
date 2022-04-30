<?php
    namespace Theme_Options;
    class ThemeOptionsGetProductSectionUtils {
        public static function get() {
            return array(
                'id' => PRODUCT_FIELDS::PRODUCT_SECTION_ID,
                'title'  => array(
                   'vi' => PRODUCT_FIELDS::PRODUCT_TITLE,
                   'en' => PRODUCT_FIELDS::PRODUCT_TITLE
               ),
                'desc'   => array(
                    'vi' => PRODUCT_FIELDS::PRODUCT_DESCRIPTION,
                   'en' => PRODUCT_FIELDS::PRODUCT_DESCRIPTION
               ),
                'fields' => array(
                    array(
                        'id' => PRODUCT_FIELDS::PRODUCT_SECTION_1_ID,
                        'type' => PRODUCT_FIELDS::PRODUCT_SECTION_1_TYPE,
                        'title' => array(                             
                            'vi' => PRODUCT_FIELDS::PRODUCT_SECTION_1_TITLE,
                            'en' => PRODUCT_FIELDS::PRODUCT_SECTION_1_TITLE                    
                        ),
                        'desc' => PRODUCT_FIELDS::PRODUCT_SECTION_1_DESC,
                        'indent' => PRODUCT_FIELDS::PRODUCT_SECTION_1_INDENT
                    ),
                        array(
                            'id'    => PRODUCT_FIELDS::PRODUCT_KHAUHIEUCT_ID,
                            'type'  => PRODUCT_FIELDS::PRODUCT_KHAUHIEUCT_TYPE,
                            'title' => array(                                    
                                'vi' => PRODUCT_FIELDS::PRODUCT_KHAUHIEUCT_TITLE,
                                'en' => PRODUCT_FIELDS::PRODUCT_KHAUHIEUCT_TITLE
                            ),
                            'desc'  => array(                                 
                                'vi' => PRODUCT_FIELDS::PRODUCT_KHAUHIEUCT_DESCRIPTION,
                                'en' => PRODUCT_FIELDS::PRODUCT_KHAUHIEUCT_DESCRIPTION                                    
                            )
                        ),   
                        array(
                            'id'    => PRODUCT_FIELDS::PRODUCT_HOTLINE_ID,
                            'type'  => PRODUCT_FIELDS::PRODUCT_HOTLINE_TYPE,
                            'title' => array(                                    
                                'vi' => PRODUCT_FIELDS::PRODUCT_HOTLINE_TITLE,
                                'en' => PRODUCT_FIELDS::PRODUCT_HOTLINE_TITLE
                            ),
                            'desc'  => array(                                 
                                'vi' => PRODUCT_FIELDS::PRODUCT_HOTLINE_DESCRIPTION,
                                'en' => PRODUCT_FIELDS::PRODUCT_HOTLINE_DESCRIPTION                                    
                            )
                        ),   
                    array(
                        'id' => PRODUCT_FIELDS::PRODUCT_SECTION_2_ID,
                        'type' => PRODUCT_FIELDS::PRODUCT_SECTION_2_TYPE,
                        'indent' => PRODUCT_FIELDS::PRODUCT_SECTION_2_INDENT 
                    )
                )
            );
        }
    }