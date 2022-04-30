<?php

    namespace Theme_Options;

    class ThemeOptionsGetSliderSectionUtils {

        public static function get() {

            return array(

                'id' => SLIDER_FIELDS::SLIDER_SECTION_ID,
        
                'title'  => array(
        
                   'vi' => SLIDER_FIELDS::SLIDER_SECTION_TITLE,
        
                   'en' => SLIDER_FIELDS::SLIDER_SECTION_TITLE
        
               ),
        
                'desc'   => array(
        
                    'vi' => SLIDER_FIELDS::SLIDER_SECTION_DESCRIPTION,
        
                   'en' => SLIDER_FIELDS::SLIDER_SECTION_DESCRIPTION
        
               ),
        
                'fields' => array(
        
                    array(
        
                        'id' => SLIDER_FIELDS::SLIDER_SECTION_1_ID,
        
                        'type' => SLIDER_FIELDS::SLIDER_SECTION_1_TYPE,
        
                        'title' => array(                             
        
                            'vi' => SLIDER_FIELDS::SLIDER_SECTION_1_TITLE,
        
                            'en' => SLIDER_FIELDS::SLIDER_SECTION_1_TITLE                    
        
                        ),
        
                        'desc' => SLIDER_FIELDS::SLIDER_SECTION_1_DESC,
        
                        'indent' => SLIDER_FIELDS::SLIDER_SECTION_1_INDENT
        
                    ),
        
                        array(
        
                            'id'    => SLIDER_FIELDS::SLIDER_SECTION_POST_TYPE_ID,
        
                            'type'  => SLIDER_FIELDS::SLIDER_SECTION_POST_TYPE_TYPE,
        
                            'data'  => SLIDER_FIELDS::SLIDER_SECTION_POST_TYPE_DATA,
        
                            'title' => array(                                    
        
                                'vi' => SLIDER_FIELDS::SLIDER_SECTION_POST_TYPE_TITLE,
        
                                'en' => SLIDER_FIELDS::SLIDER_SECTION_POST_TYPE_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => SLIDER_FIELDS::SLIDER_SECTION_POST_TYPE_DESCRIPTION,
        
                                'en' => SLIDER_FIELDS::SLIDER_SECTION_POST_TYPE_DESCRIPTION                                    
        
                            )
        
                        ),  
        
                        array(
        
                            'id'    => SLIDER_FIELDS::SLIDER_SECTION_PAUSE_SETTING_ID,
        
                            'type'  => SLIDER_FIELDS::SLIDER_SECTION_PAUSE_SETTING_TYPE,                 
        
                            'title' => array(                                    
        
                                'vi' => SLIDER_FIELDS::SLIDER_SECTION_PAUSE_SETTING_TITLE,
        
                                'en' => SLIDER_FIELDS::SLIDER_SECTION_PAUSE_SETTING_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => SLIDER_FIELDS::SLIDER_SECTION_PAUSE_SETTING_DESCRIPTION,
        
                                'en' => SLIDER_FIELDS::SLIDER_SECTION_PAUSE_SETTING_DESCRIPTION                                    
        
                            ),
        
                            'min' => SLIDER_FIELDS::SLIDER_SECTION_PAUSE_SETTING_MIN,
        
                            'max' => SLIDER_FIELDS::SLIDER_SECTION_PAUSE_SETTING_MAX,
        
                            'step' => SLIDER_FIELDS::SLIDER_SECTION_PAUSE_SETTING_STEP,
        
                            'value' => SLIDER_FIELDS::SLIDER_SECTION_PAUSE_SETTING_VALUE,
        
                        ),  
        
                    array(
        
                        'id' => SLIDER_FIELDS::SLIDER_SECTION_2_ID,
        
                        'type' => SLIDER_FIELDS::SLIDER_SECTION_2_TYPE,
        
                        'indent' => SLIDER_FIELDS::SLIDER_SECTION_2_INDENT 
        
                    )
        
                )
        
            );  

        }

    }