<?php

    namespace Theme_Options;

    class ThemeOptionsGetGlobalSectionUtils {

        public static function get() {

            return array(

                'id' => GLOBAL_FIELDS::GLOBAL_SECTION_ID,
        
                'title'  => array(
        
                    'vi' => GLOBAL_FIELDS::GLOBAL_TITLE,
        
                    'en' => GLOBAL_FIELDS::GLOBAL_TITLE
        
                ),
        
                'desc'   => array(
        
                    'vi' => GLOBAL_FIELDS::GLOBAL_DESCRIPTION,
        
                    'en' => GLOBAL_FIELDS::GLOBAL_DESCRIPTION
        
                ),
        
                'fields' => array(
        
                    array(
        
                        'id' => GLOBAL_FIELDS::GLOBAL_SECTION_1_ID,
        
                        'type' => GLOBAL_FIELDS::GLOBAL_SECTION_1_TYPE,
        
                        'title' => array(                             
        
                            'vi' => GLOBAL_FIELDS::GLOBAL_SECTION_1_TITLE,
        
                            'en' => GLOBAL_FIELDS::GLOBAL_SECTION_1_TITLE                    
        
                        ),
        
                        'desc' => GLOBAL_FIELDS::GLOBAL_SECTION_1_DESCRIPTION,
        
                        'indent' => GLOBAL_FIELDS::GLOBAL_SECTION_1_INDENT
        
                    ),
        
                    array(
        
                        'id' => GLOBAL_FIELDS::GLOBAL_SECTION_2_ID,
        
                        'type' => GLOBAL_FIELDS::GLOBAL_SECTION_2_TYPE,
        
                        'indent' => GLOBAL_FIELDS::GLOBAL_SECTION_2_INDENT 
        
                    )
        
                )
        
            ); 

        }

    }