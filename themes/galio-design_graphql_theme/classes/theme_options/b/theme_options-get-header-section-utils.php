<?php

    namespace Theme_Options;

    class ThemeOptionsGetHeaderSectionUtils {

        public static function get() {

            return array(

                'id' => HEADER_FIELDS::HEADER_SECTION_ID,
        
                'title'  => array(
        
                   'vi' => HEADER_FIELDS::HEADER_TITLE,
        
                   'en' => HEADER_FIELDS::HEADER_TITLE
        
               ),
        
                'desc'   => array(
        
                    'vi' => HEADER_FIELDS::HEADER_DESCRIPTION,
        
                   'en' => HEADER_FIELDS::HEADER_DESCRIPTION
        
               ),
        
                'fields' => array(
        
                    array(
        
                        'id' => HEADER_FIELDS::HEADER_SECTION_1_ID,
        
                        'type' => HEADER_FIELDS::HEADER_SECTION_1_TYPE,
        
                        'title' => array(                             
        
                            'vi' => HEADER_FIELDS::HEADER_SECTION_1_TITLE,
        
                            'en' => HEADER_FIELDS::HEADER_SECTION_1_TITLE                    
        
                        ),
        
                        'desc' => HEADER_FIELDS::HEADER_SECTION_1_DESC,
        
                        'indent' => HEADER_FIELDS::HEADER_SECTION_1_INDENT
        
                    ),
        
                        array(
        
                            'id'    => HEADER_FIELDS::HEADER_SECTION_LOGO_IMAGE_ID,
        
                            'type'  => HEADER_FIELDS::HEADER_SECTION_LOGO_IMAGE_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => HEADER_FIELDS::HEADER_SECTION_LOGO_IMAGE_TITLE,
        
                                'en' => HEADER_FIELDS::HEADER_SECTION_LOGO_IMAGE_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => HEADER_FIELDS::HEADER_SECTION_LOGO_IMAGE_DESCRIPTION,
        
                                'en' => HEADER_FIELDS::HEADER_SECTION_LOGO_IMAGE_DESCRIPTION                                    
        
                            )
        
                        ),   
        
        
                    array(
        
                        'id' => HEADER_FIELDS::HEADER_SECTION_2_ID,
        
                        'type' => HEADER_FIELDS::HEADER_SECTION_2_TYPE,
        
                        'indent' => HEADER_FIELDS::HEADER_SECTION_2_INDENT 
        
                    )
        
                )
        
            );

        }

    }