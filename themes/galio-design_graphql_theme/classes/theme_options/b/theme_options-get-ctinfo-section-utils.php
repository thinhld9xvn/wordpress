<?php

    namespace Theme_Options;

    class ThemeOptionsGetCtinfoSectionUtils {

        public static function get() {

            return array(

                'id' => CTINFO_FIELDS::CTINFO_SECTION_ID,
        
                'title'  => array(
        
                   'vi' => CTINFO_FIELDS::CTINFO_SECTION_TITLE,
        
                   'en' => CTINFO_FIELDS::CTINFO_SECTION_TITLE
        
               ),
        
                'desc'   => array(
        
                    'vi' => CTINFO_FIELDS::CTINFO_SECTION_DESCRIPTION,
        
                   'en' => CTINFO_FIELDS::CTINFO_SECTION_DESCRIPTION
        
               ),
        
                'fields' => array(
        
                    array(
        
                        'id' => CTINFO_FIELDS::CTINFO_SECTION_1_ID,
        
                        'type' => CTINFO_FIELDS::CTINFO_SECTION_1_TYPE,
        
                        'title' => array(                             
        
                            'vi' => CTINFO_FIELDS::CTINFO_SECTION_1_TITLE,
        
                            'en' => CTINFO_FIELDS::CTINFO_SECTION_1_TITLE                    
        
                        ),
        
                        'desc' => CTINFO_FIELDS::CTINFO_SECTION_1_DESCRIPTION,
        
                        'indent' => CTINFO_FIELDS::CTINFO_SECTION_1_INDENT
        
                    ),
        
                        array(
        
                            'id'    => CTINFO_FIELDS::CTINFO_SECTION_DESCRIPTION_ID,
        
                            'type'  => CTINFO_FIELDS::CTINFO_SECTION_DESCRIPTION_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_DESCRIPTION_TITLE,
        
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_DESCRIPTION_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_DESCRIPTION_DESCRIPTION,
        
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_DESCRIPTION_DESCRIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => CTINFO_FIELDS::CTINFO_SECTION_DESCRIPTION_EN_ID,
        
                            'type'  => CTINFO_FIELDS::CTINFO_SECTION_DESCRIPTION_EN_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_DESCRIPTION_EN_TITLE,
        
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_DESCRIPTION_EN_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_DESCRIPTION_EN_DESCRIPTION,
        
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_DESCRIPTION_EN_DESCRIPTION                                    
        
                            )
        
                        ),

                        array(
        
                            'id'    => CTINFO_FIELDS::CTINFO_SECTION_HOTLINE_ID,
        
                            'type'  => CTINFO_FIELDS::CTINFO_SECTION_HOTLINE_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_HOTLINE_TITLE,
        
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_HOTLINE_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_HOTLINE_DESCRIPTION,
        
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_HOTLINE_DESCRIPTION                                    
        
                            )
        
                        ),

                        array(
        
                            'id'    => CTINFO_FIELDS::CTINFO_SECTION_EMAIL_ID,
        
                            'type'  => CTINFO_FIELDS::CTINFO_SECTION_EMAIL_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_EMAIL_TITLE,
        
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_EMAIL_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_EMAIL_DESCRIPTION,
        
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_EMAIL_DESCRIPTION                                    
        
                            )
        
                        ),

                        array(
        
                            'id'    => CTINFO_FIELDS::CTINFO_SECTION_EMAIL_RECRUIT_ID,
        
                            'type'  => CTINFO_FIELDS::CTINFO_SECTION_EMAIL_RECRUIT_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_EMAIL_RECRUIT_TITLE,
        
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_EMAIL_RECRUIT_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_EMAIL_RECRUIT_DESCRIPTION,
        
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_EMAIL_RECRUIT_DESCRIPTION                                    
        
                            )
        
                        ),
        
                    array(
        
                        'id' => CTINFO_FIELDS::CTINFO_SECTION_2_ID,
        
                        'type' => CTINFO_FIELDS::CTINFO_SECTION_2_TYPE,
        
                        'indent' => CTINFO_FIELDS::CTINFO_SECTION_2_INDENT 
        
                    )
        
                )
        
            ); 

        }

    }