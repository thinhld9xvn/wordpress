<?php
    namespace Theme_Options;
    class ThemeOptionsGetTaxSectionUtils {
        public static function get() {
            return array(
                'id' => TAX_FIELDS::TAX_SECTION_ID,
                'title'  => array(
                   'vi' => TAX_FIELDS::TAX_TITLE,
                   'en' => TAX_FIELDS::TAX_TITLE
               ),
                'desc'   => array(
                    'vi' => TAX_FIELDS::TAX_DESCRIPTION,
                   'en' => TAX_FIELDS::TAX_DESCRIPTION
               ),
                'fields' => array(
                    array(
                        'id' => TAX_FIELDS::TAX_SECTION_1_ID,
                        'type' => TAX_FIELDS::TAX_SECTION_1_TYPE,
                        'title' => array(                             
                            'vi' => TAX_FIELDS::TAX_SECTION_1_TITLE,
                            'en' => TAX_FIELDS::TAX_SECTION_1_TITLE                    
                        ),
                        'desc' => TAX_FIELDS::TAX_SECTION_1_DESC,
                        'indent' => TAX_FIELDS::TAX_SECTION_1_INDENT
                    ),
                        array(
                            'id'    => TAX_FIELDS::TAX_SECTION_ICON_DEF_ID,
                            'type'  => TAX_FIELDS::TAX_SECTION_ICON_DEF_TYPE,
                            'title' => array(                                    
                                'vi' => TAX_FIELDS::TAX_SECTION_ICON_DEF_TITLE,
                                'en' => TAX_FIELDS::TAX_SECTION_ICON_DEF_TITLE
                            ),
                            'desc'  => array(                                 
                                'vi' => TAX_FIELDS::TAX_SECTION_ICON_DEF_DESCRIPTION,
                                'en' => TAX_FIELDS::TAX_SECTION_ICON_DEF_DESCRIPTION                                    
                            )
                        ),   
                    array(
                        'id' => TAX_FIELDS::TAX_SECTION_2_ID,
                        'type' => TAX_FIELDS::TAX_SECTION_2_TYPE,
                        'indent' => TAX_FIELDS::TAX_SECTION_2_INDENT 
                    )
                )
            );
        }
    }