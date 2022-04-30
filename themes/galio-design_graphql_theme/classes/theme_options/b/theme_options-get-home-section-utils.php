<?php

    namespace Theme_Options;

    class ThemeOptionsGetHomeSectionUtils {

        public static function get() {

            return array(

                'id' => HOME_FIELDS::HOME_SECTION_ID,
        
                'title'  => array(
        
                   'vi' => HOME_FIELDS::HOME_TITLE,
        
                   'en' => HOME_FIELDS::HOME_TITLE
        
               ),
        
                'desc'   => array(
        
                    'vi' => HOME_FIELDS::HOME_DESCRIPTION,
        
                   'en' => HOME_FIELDS::HOME_DESCRIPTION
        
               ),
        
                'fields' => array(
        
                    array(
        
                        'id' => HOME_FIELDS::HOME_SECTION_GT_1_ID,
        
                        'type' => HOME_FIELDS::HOME_SECTION_GT_1_TYPE,
        
                        'title' => array(                             
        
                            'vi' => HOME_FIELDS::HOME_SECTION_GT_1_TITLE,
        
                            'en' => HOME_FIELDS::HOME_SECTION_GT_1_TITLE                    
        
                        ),
        
                        'desc' => HOME_FIELDS::HOME_SECTION_GT_1_DESCRIPTION,
        
                        'indent' => HOME_FIELDS::HOME_SECTION_GT_1_INDENT
        
                    ),
        
                        array(
        
                            'id'    => HOME_FIELDS::HOME_SECTION_GT_HEADING_ID,
        
                            'type'  => HOME_FIELDS::HOME_SECTION_GT_HEADING_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_HEADING_TITLE,
        
                                'en' => HOME_FIELDS::HOME_SECTION_GT_HEADING_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_HEADING_DESCIPTION,
        
                                'en' => HOME_FIELDS::HOME_SECTION_GT_HEADING_DESCIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => HOME_FIELDS::HOME_SECTION_GT_HEADING_EN_ID,
        
                            'type'  => HOME_FIELDS::HOME_SECTION_GT_HEADING_EN_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_HEADING_EN_TITLE,
        
                                'en' => HOME_FIELDS::HOME_SECTION_GT_HEADING_EN_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_HEADING_EN_DESCIPTION,
        
                                'en' => HOME_FIELDS::HOME_SECTION_GT_HEADING_EN_DESCIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => HOME_FIELDS::HOME_SECTION_GT_CONTENTS_ID,
        
                            'type'  => HOME_FIELDS::HOME_SECTION_GT_CONTENTS_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_CONTENTS_TITLE,
        
                                'en' => HOME_FIELDS::HOME_SECTION_GT_CONTENTS_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_CONTENTS_DESCIPTION,
        
                                'en' => HOME_FIELDS::HOME_SECTION_GT_CONTENTS_DESCIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => HOME_FIELDS::HOME_SECTION_GT_CONTENTS_EN_ID,
        
                            'type'  => HOME_FIELDS::HOME_SECTION_GT_CONTENTS_EN_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_CONTENTS_EN_TITLE,
        
                                'en' => HOME_FIELDS::HOME_SECTION_GT_CONTENTS_EN_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_CONTENTS_EN_DESCIPTION,
        
                                'en' => HOME_FIELDS::HOME_SECTION_GT_CONTENTS_EN_DESCIPTION                                    
        
                            )
        
                        ),
                        
                        array(
        
                            'id'    => HOME_FIELDS::HOME_SECTION_GT_SLIDER_ID,
        
                            'type'  => HOME_FIELDS::HOME_SECTION_GT_SLIDER_TYPE,
        
                            'data'  => HOME_FIELDS::HOME_SECTION_GT_SLIDER_TYPE_DATA,
        
                            'title' => array(                                    
        
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_SLIDER_TITLE,
        
                                'en' => HOME_FIELDS::HOME_SECTION_GT_SLIDER_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_SLIDER_DESCIPTION,
        
                                'en' => HOME_FIELDS::HOME_SECTION_GT_SLIDER_DESCIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => HOME_FIELDS::HOME_SECTION_GT_BUTTON_TEXT_ID,
        
                            'type'  => HOME_FIELDS::HOME_SECTION_GT_BUTTON_TEXT_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_BUTTON_TEXT_TITLE,
        
                                'en' => HOME_FIELDS::HOME_SECTION_GT_BUTTON_TEXT_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_BUTTON_TEXT_DESCIPTION,
        
                                'en' => HOME_FIELDS::HOME_SECTION_GT_BUTTON_TEXT_DESCIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => HOME_FIELDS::HOME_SECTION_GT_BUTTON_TEXT_EN_ID,
        
                            'type'  => HOME_FIELDS::HOME_SECTION_GT_BUTTON_TEXT_EN_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_BUTTON_TEXT_EN_TITLE,
        
                                'en' => HOME_FIELDS::HOME_SECTION_GT_BUTTON_TEXT_EN_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_BUTTON_TEXT_EN_DESCIPTION,
        
                                'en' => HOME_FIELDS::HOME_SECTION_GT_BUTTON_TEXT_EN_DESCIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => HOME_FIELDS::HOME_SECTION_GT_BUTTON_PAGE_ID,
        
                            'type'  => HOME_FIELDS::HOME_SECTION_GT_BUTTON_PAGE_TYPE,
        
                            'data'  => HOME_FIELDS::HOME_SECTION_GT_BUTTON_PAGE_DATA,
        
                            'title' => array(
        
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_BUTTON_PAGE_TITLE,
        
                                'en' => HOME_FIELDS::HOME_SECTION_GT_BUTTON_PAGE_TITLE
        
                            ),
        
                            'desc'  => array(
        
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_BUTTON_PAGE_DESCIPTION,
        
                                'en' => HOME_FIELDS::HOME_SECTION_GT_BUTTON_PAGE_DESCIPTION                                    
        
                            )
        
                        ),
        
                    array(
        
                        'id' => HOME_FIELDS::HOME_SECTION_GT_2_ID,
        
                        'type' => HOME_FIELDS::HOME_SECTION_GT_2_TYPE,
        
                        'indent' => HOME_FIELDS::HOME_SECTION_GT_2_INDENT 
        
                    ),
        
                    array(
        
                        'id' => HOME_FIELDS::HOME_SECTION_LHTK_1_ID,
        
                        'type' => HOME_FIELDS::HOME_SECTION_LHTK_1_TYPE,
        
                        'title' => array(                             
        
                            'vi' => HOME_FIELDS::HOME_SECTION_LHTK_1_TITLE,
        
                            'en' => HOME_FIELDS::HOME_SECTION_LHTK_1_TITLE                    
        
                        ),
        
                        'desc' => HOME_FIELDS::HOME_SECTION_LHTK_1_DESCRIPTION,
        
                        'indent' => HOME_FIELDS::HOME_SECTION_LHTK_1_INDENT
        
                    ),
        
                        array(
        
                            'id'    => HOME_FIELDS::HOME_SECTION_LHTK_HEADING_ID,
        
                            'type'  => HOME_FIELDS::HOME_SECTION_LHTK_HEADING_TYPE,
        
                            'title' => array(
        
                                'vi' => HOME_FIELDS::HOME_SECTION_LHTK_HEADING_TITLE,
        
                                'en' => HOME_FIELDS::HOME_SECTION_LHTK_HEADING_TITLE
        
                            ),
        
                            'desc'  => array(
        
                                'vi' => HOME_FIELDS::HOME_SECTION_LHTK_HEADING_DESCRIPTION,
        
                                'en' => HOME_FIELDS::HOME_SECTION_LHTK_HEADING_DESCRIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => HOME_FIELDS::HOME_SECTION_LHTK_HEADING_EN_ID,
        
                            'type'  => HOME_FIELDS::HOME_SECTION_LHTK_HEADING_EN_TYPE,
        
                            'title' => array(
        
                                'vi' => HOME_FIELDS::HOME_SECTION_LHTK_HEADING_EN_TITLE,
        
                                'en' => HOME_FIELDS::HOME_SECTION_LHTK_HEADING_EN_TITLE
        
                            ),
        
                            'desc'  => array(
        
                                'vi' => HOME_FIELDS::HOME_SECTION_LHTK_HEADING_EN_DESCRIPTION,
        
                                'en' => HOME_FIELDS::HOME_SECTION_LHTK_HEADING_EN_DESCRIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => HOME_FIELDS::HOME_SECTION_LHTK_CONTENTS_ID,
        
                            'type'  => HOME_FIELDS::HOME_SECTION_LHTK_CONTENTS_TYPE,
        
                            'title' => array(
        
                                'vi' => HOME_FIELDS::HOME_SECTION_LHTK_CONTENTS_TITLE,
        
                                'en' => HOME_FIELDS::HOME_SECTION_LHTK_CONTENTS_TITLE
        
                            ),
        
                            'desc'  => array(
        
                                'vi' => HOME_FIELDS::HOME_SECTION_LHTK_CONTENTS_DESCRIPTION,
        
                                'en' => HOME_FIELDS::HOME_SECTION_LHTK_CONTENTS_DESCRIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => HOME_FIELDS::HOME_SECTION_LHTK_CONTENTS_EN_ID,
        
                            'type'  => HOME_FIELDS::HOME_SECTION_LHTK_CONTENTS_EN_TYPE,
        
                            'title' => array(
        
                                'vi' => HOME_FIELDS::HOME_SECTION_LHTK_CONTENTS_EN_TITLE,
        
                                'en' => HOME_FIELDS::HOME_SECTION_LHTK_CONTENTS_EN_TITLE
        
                            ),
        
                            'desc'  => array(
        
                                'vi' => HOME_FIELDS::HOME_SECTION_LHTK_CONTENTS_EN_DESCRIPTION,
        
                                'en' => HOME_FIELDS::HOME_SECTION_LHTK_CONTENTS_EN_DESCRIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_TEXT_ID,
        
                            'type'  => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_TEXT_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_TEXT_TITLE,
        
                                'en' => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_TEXT_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_TEXT_DESCRIPTION,
        
                                'en' => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_TEXT_DESCRIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_TEXT_EN_ID,
        
                            'type'  => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_TEXT_EN_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_TEXT_EN_TITLE,
        
                                'en' => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_TEXT_EN_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_TEXT_EN_DESCRIPTION,
        
                                'en' => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_TEXT_EN_DESCRIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_PAGE_ID,
        
                            'type'  => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_PAGE_TYPE,
        
                            'data'  => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_PAGE_DATA,
        
                            'title' => array(                                    
        
                                'vi' => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_PAGE_TITLE,
        
                                'en' => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_PAGE_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_PAGE_DESCRIPTION,
        
                                'en' => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_PAGE_DESCRIPTION                                    
        
                            )
        
                        ),

                        array(
        
                            'id'    => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_PAGE_ID,
        
                            'type'  => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_PAGE_TYPE,
        
                            'data'  => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_PAGE_DATA,
        
                            'title' => array(                                    
        
                                'vi' => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_PAGE_TITLE,
        
                                'en' => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_PAGE_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_PAGE_DESCRIPTION,
        
                                'en' => HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_PAGE_DESCRIPTION                                    
        
                            )
        
                        ),

                        array(
        
                            'id'    => HOME_FIELDS::HOME_SECTION_LHTK_BACKGROUND_ID,
        
                            'type'  => HOME_FIELDS::HOME_SECTION_LHTK_BACKGROUND_TYPE,
        
                            'title' => array(                                    
        
                                'vi' => HOME_FIELDS::HOME_SECTION_LHTK_BACKGROUND_TITLE,
        
                                'en' => HOME_FIELDS::HOME_SECTION_LHTK_BACKGROUND_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => HOME_FIELDS::HOME_SECTION_LHTK_BACKGROUND_DESCRIPTION,
        
                                'en' => HOME_FIELDS::HOME_SECTION_LHTK_BACKGROUND_DESCRIPTION                                    
        
                            )
        
                        ),
        
                     array(
        
                        'id' => HOME_FIELDS::HOME_SECTION_LHTK_2_ID,
        
                        'type' => HOME_FIELDS::HOME_SECTION_LHTK_2_TYPE,
        
                        'indent' => HOME_FIELDS::HOME_SECTION_LHTK_2_INDENT
        
                    )
        
                )
        
            );

        }

    }