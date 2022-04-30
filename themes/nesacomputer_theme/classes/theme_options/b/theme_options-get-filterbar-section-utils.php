<?php
    namespace Theme_Options;
    class ThemeOptionsGetFilterbarSectionUtils {
        public static function get() {
            return array(
                'id' => FILTERBAR_FIELDS::FILTERBAR_SECTION_ID,
                'title'  => array(
                   'vi' => FILTERBAR_FIELDS::FILTERBAR_TITLE,
                   'en' => FILTERBAR_FIELDS::FILTERBAR_TITLE
               ),
                'desc'   => array(
                    'vi' => FILTERBAR_FIELDS::FILTERBAR_DESCRIPTION,
                   'en' => FILTERBAR_FIELDS::FILTERBAR_DESCRIPTION
               ),
                'fields' => array(
                    array(
                        'id' => FILTERBAR_FIELDS::FILTERBAR_SECTION_1_ID,
                        'type' => FILTERBAR_FIELDS::FILTERBAR_SECTION_1_TYPE,
                        'title' => array(                             
                            'vi' => FILTERBAR_FIELDS::FILTERBAR_SECTION_1_TITLE,
                            'en' => FILTERBAR_FIELDS::FILTERBAR_SECTION_1_TITLE                  
                        ),
                        'desc' => FILTERBAR_FIELDS::FILTERBAR_SECTION_1_DESC,
                        'indent' => FILTERBAR_FIELDS::FILTERBAR_SECTION_1_INDENT
                    ),
                        array(
                            'id'    => FILTERBAR_FIELDS::FILTERBAR_SECTION_PROD_PRICE_ID,
                            'type'  => FILTERBAR_FIELDS::FILTERBAR_SECTION_PROD_PRICE_TYPE,
                            'title' => array(                                    
                                'vi' => FILTERBAR_FIELDS::FILTERBAR_SECTION_PROD_PRICE_TITLE,
                                'en' => FILTERBAR_FIELDS::FILTERBAR_SECTION_PROD_PRICE_TITLE
                            ),
                            'desc'  => array(                                 
                                'vi' => FILTERBAR_FIELDS::FILTERBAR_SECTION_PROD_PRICE_DESCRIPTION,
                                'en' => FILTERBAR_FIELDS::FILTERBAR_SECTION_PROD_PRICE_DESCRIPTION                                    
                            )
                        ),   
                    array(
                        'id' => FILTERBAR_FIELDS::FILTERBAR_SECTION_2_ID,
                        'type' => FILTERBAR_FIELDS::FILTERBAR_SECTION_2_TYPE,
                        'indent' => FILTERBAR_FIELDS::FILTERBAR_SECTION_2_INDENT 
                    )
                )
            );
        }
    }