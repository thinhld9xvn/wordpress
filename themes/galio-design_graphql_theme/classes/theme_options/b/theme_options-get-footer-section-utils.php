<?php

    namespace Theme_Options;

    class ThemeOptionsGetFooterSectionUtils {

        public static function get() {

            return array(

                'id' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_ID,
        
                'title'  => array(
        
                   'vi' => FOOTER_FIELDS::FOOTER_PAGE_TITLE,
        
                   'en' => FOOTER_FIELDS::FOOTER_PAGE_TITLE
        
               ),
        
                'desc'   => array(
        
                    'vi' => FOOTER_FIELDS::FOOTER_PAGE_DESCRIPTION,
        
                   'en' => FOOTER_FIELDS::FOOTER_PAGE_DESCRIPTION
        
               ),
        
                'fields' => array(
        
                    array(
        
                        'id' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_1_ID,
        
                        'type' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_1_TYPE,
        
                        'title' => array(                             
        
                            'vi' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_1_TITLE,
        
                            'en' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_1_TITLE                    
        
                        ),
        
                        'desc' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_1_DESCRIPTION,
        
                        'indent' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_1_INDENT
        
                    ),
        
                        array(
        
                            'id'    => FOOTER_FIELDS::FOOTER_PAGE_SECTION_HEADING_CT_ID,
        
                            'type'  => FOOTER_FIELDS::FOOTER_PAGE_SECTION_HEADING_CT_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_HEADING_CT_TITLE,
        
                                'en' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_HEADING_CT_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_HEADING_CT_DESCRIPTION,
        
                                'en' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_HEADING_CT_DESCRIPTION                                    
        
                            )
        
                        ),
                        
                        array(
        
                            'id'    => FOOTER_FIELDS::FOOTER_PAGE_SECTION_HEADING_CT_EN_ID,
        
                            'type'  => FOOTER_FIELDS::FOOTER_PAGE_SECTION_HEADING_CT_EN_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_HEADING_CT_EN_TITLE,
        
                                'en' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_HEADING_CT_EN_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_HEADING_CT_EN_DESCRIPTION,
        
                                'en' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_HEADING_CT_EN_DESCRIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => FOOTER_FIELDS::FOOTER_PAGE_SECTION_CONTENTS_CT_ID,
        
                            'type'  => FOOTER_FIELDS::FOOTER_PAGE_SECTION_CONTENTS_CT_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_CONTENTS_CT_TITLE,
        
                                'en' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_CONTENTS_CT_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_CONTENTS_CT_DESCRIPTION,
        
                                'en' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_CONTENTS_CT_DESCRIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => FOOTER_FIELDS::FOOTER_PAGE_SECTION_CONTENTS_CT_EN_ID,
        
                            'type'  => FOOTER_FIELDS::FOOTER_PAGE_SECTION_CONTENTS_CT_EN_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_CONTENTS_CT_EN_TITLE,
        
                                'en' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_CONTENTS_CT_EN_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_CONTENTS_CT_EN_DESCRIPTION,
        
                                'en' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_CONTENTS_CT_EN_DESCRIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_TEXT_ID,
        
                            'type'  => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_TEXT_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_TEXT_TITLE,
        
                                'en' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_TEXT_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_TEXT_DESCRIPTION,
        
                                'en' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_TEXT_DESCRIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_TEXT_EN_ID,
        
                            'type'  => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_TEXT_EN_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_TEXT_EN_TITLE,
        
                                'en' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_TEXT_EN_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_TEXT_EN_DESCRIPTION,
        
                                'en' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_TEXT_EN_DESCRIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_PAGE_ID_ID,
        
                            'type'  => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_PAGE_ID_TYPE,
        
                            'data'  => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_PAGE_ID_DATA,
        
                            'title' => array(                                    
        
                                'vi' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_PAGE_ID_TITLE,
        
                                'en' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_PAGE_ID_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_PAGE_ID_DESCRIPTION,
        
                                'en' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_PAGE_ID_DESCRIPTION                                    
        
                            )
        
                        ),
        
                    array(
        
                        'id' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_2_ID,
        
                        'type' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_2_TYPE,
        
                        'indent' => FOOTER_FIELDS::FOOTER_PAGE_SECTION_2_INDENT 
        
                    ),
        
                )
        
            );

        }

    }