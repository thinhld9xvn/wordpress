<?php
    namespace Theme_Options;
    class ThemeOptionsGetCtinfoSectionUtils {
        public static function get() {
            return array(
                'id' => FOOTER_FIELDS::FOOTER_SECTION_ID,
                'title'  => array(
                   'vi' => FOOTER_FIELDS::FOOTER_SECTION_TITLE,
                   'en' => FOOTER_FIELDS::FOOTER_SECTION_TITLE
               ),
                'desc'   => array(
                    'vi' => FOOTER_FIELDS::FOOTER_SECTION_DESCRIPTION,
                   'en' => FOOTER_FIELDS::FOOTER_SECTION_DESCRIPTION
               ),
                'fields' => array(
                    array(
                        'id' => FOOTER_FIELDS::FOOTER_SECTION_1_ID,
                        'type' => FOOTER_FIELDS::FOOTER_SECTION_1_TYPE,
                        'title' => array(                             
                            'vi' => FOOTER_FIELDS::FOOTER_SECTION_1_TITLE,
                            'en' => FOOTER_FIELDS::FOOTER_SECTION_1_TITLE                    
                        ),
                        'desc' => FOOTER_FIELDS::FOOTER_SECTION_1_DESCRIPTION,
                        'indent' => FOOTER_FIELDS::FOOTER_SECTION_1_INDENT
                    ),
                        array(
                            'id' => FOOTER_FIELDS::FOOTER_SECTION_ADDRESS_ID,
                            'type' => FOOTER_FIELDS::FOOTER_SECTION_ADDRESS_TYPE,
                            'title' => array(                             
                                'vi' => FOOTER_FIELDS::FOOTER_SECTION_ADDRESS_TITLE,
                                'en' => FOOTER_FIELDS::FOOTER_SECTION_ADDRESS_TITLE                    
                            ),
                            'desc' => FOOTER_FIELDS::FOOTER_SECTION_ADDRESS_DESCIPTION
                        ),
                        array(
                            'id' => FOOTER_FIELDS::FOOTER_SECTION_INFO_ID,
                            'type' => FOOTER_FIELDS::FOOTER_SECTION_INFO_TYPE,
                            'title' => array(                             
                                'vi' => FOOTER_FIELDS::FOOTER_SECTION_INFO_TITLE,
                                'en' => FOOTER_FIELDS::FOOTER_SECTION_INFO_TITLE                    
                            ),
                            'desc' => FOOTER_FIELDS::FOOTER_SECTION_INFO_DESCIPTION
                        ),
                        array(
                            'id' => FOOTER_FIELDS::FOOTER_SECTION_SUPPORT_ID,
                            'type' => FOOTER_FIELDS::FOOTER_SECTION_SUPPORT_TYPE,
                            'title' => array(                             
                                'vi' => FOOTER_FIELDS::FOOTER_SECTION_SUPPORT_TITLE,
                                'en' => FOOTER_FIELDS::FOOTER_SECTION_SUPPORT_TITLE                    
                            ),
                            'desc' => FOOTER_FIELDS::FOOTER_SECTION_SUPPORT_DESCIPTION
                        ),
                        array(
                            'id' => FOOTER_FIELDS::FOOTER_SECTION_SOCIALS_ID,
                            'type' => FOOTER_FIELDS::FOOTER_SECTION_SOCIALS_TYPE,
                            'title' => array(                             
                                'vi' => FOOTER_FIELDS::FOOTER_SECTION_SOCIALS_TITLE,
                                'en' => FOOTER_FIELDS::FOOTER_SECTION_SOCIALS_TITLE                    
                            ),
                            'desc' => FOOTER_FIELDS::FOOTER_SECTION_SOCIALS_DESCIPTION
                        ),
                        array(
                            'id' => FOOTER_FIELDS::FOOTER_SECTION_MENU_ID,
                            'type' => FOOTER_FIELDS::FOOTER_SECTION_MENU_TYPE,
                            'title' => array(                             
                                'vi' => FOOTER_FIELDS::FOOTER_SECTION_MENU_TITLE,
                                'en' => FOOTER_FIELDS::FOOTER_SECTION_MENU_TITLE                    
                            ),
                            'desc' => FOOTER_FIELDS::FOOTER_SECTION_MENU_DESCIPTION
                        ),
                        array(
                            'id' => FOOTER_FIELDS::FOOTER_SECTION_COPYRIGHT_ID,
                            'type' => FOOTER_FIELDS::FOOTER_SECTION_COPYRIGHT_TYPE,
                            'title' => array(                             
                                'vi' => FOOTER_FIELDS::FOOTER_SECTION_COPYRIGHT_TITLE,
                                'en' => FOOTER_FIELDS::FOOTER_SECTION_COPYRIGHT_TITLE                    
                            ),
                            'desc' => FOOTER_FIELDS::FOOTER_SECTION_COPYRIGHT_DESCIPTION
                        ),
                    array(
                        'id' => FOOTER_FIELDS::FOOTER_SECTION_2_ID,
                        'type' => FOOTER_FIELDS::FOOTER_SECTION_2_TYPE,
                        'indent' => FOOTER_FIELDS::FOOTER_SECTION_2_INDENT 
                    )
                )
            ); 
        }
    }