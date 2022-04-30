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
                            'id'    => CTINFO_FIELDS::CTINFO_SECTION_INTRO_BG_ID,
                            'type'  => CTINFO_FIELDS::CTINFO_SECTION_INTRO_BG_TYPE,
                            'title' => array(                                    
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_INTRO_BG_TITLE,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_INTRO_BG_TITLE
                            ),
                            'desc'  => array(                                 
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_INTRO_BG_DESCRIPTION,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_INTRO_BG_DESCRIPTION          
                            )
                        ),
                        array(
                            'id'    => CTINFO_FIELDS::CTINFO_SECTION_INTRO_ID,
                            'type'  => CTINFO_FIELDS::CTINFO_SECTION_INTRO_TYPE,
                            'title' => array(                                    
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_INTRO_TITLE,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_INTRO_TITLE
                            ),
                            'desc'  => array(                                 
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_INTRO_DESCRIPTION,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_INTRO_DESCRIPTION          
                            )
                        ),
                        array(
                            'id'    => CTINFO_FIELDS::CTINFO_SECTION_INTRO_EN_ID,
                            'type'  => CTINFO_FIELDS::CTINFO_SECTION_INTRO_EN_TYPE,
                            'title' => array(                                    
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_INTRO_EN_TITLE,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_INTRO_EN_TITLE
                            ),
                            'desc'  => array(                                 
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_INTRO_EN_DESCRIPTION,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_INTRO_EN_DESCRIPTION          
                            )
                        ),
                        array(
                            'id'    => CTINFO_FIELDS::CTINFO_SECTION_ADDRESS_ID,
                            'type'  => CTINFO_FIELDS::CTINFO_SECTION_ADDRESS_TYPE,
                            'title' => array(                                    
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_ADDRESS_TITLE,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_ADDRESS_TITLE
                            ),
                            'desc'  => array(                                 
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_ADDRESS_DESCRIPTION,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_ADDRESS_DESCRIPTION          
                            )
                        ),
                        array(
                            'id'    => CTINFO_FIELDS::CTINFO_SECTION_ADDRESS_EN_ID,
                            'type'  => CTINFO_FIELDS::CTINFO_SECTION_ADDRESS_EN_TYPE,
                            'title' => array(                                    
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_ADDRESS_EN_TITLE,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_ADDRESS_EN_TITLE
                            ),
                            'desc'  => array(                                 
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_ADDRESS_EN_DESCRIPTION,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_ADDRESS_EN_DESCRIPTION          
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
                            'id'    => CTINFO_FIELDS::CTINFO_SECTION_WEBSITE_ID,
                            'type'  => CTINFO_FIELDS::CTINFO_SECTION_WEBSITE_TYPE,
                            'title' => array(                                    
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_WEBSITE_TITLE,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_WEBSITE_TITLE
                            ),
                            'desc'  => array(
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_WEBSITE_DESCRIPTION,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_WEBSITE_DESCRIPTION                                    
                            )
                        ),
                        array(
                            'id'    => CTINFO_FIELDS::CTINFO_SECTION_SUPPORTER_ID,
                            'type'  => CTINFO_FIELDS::CTINFO_SECTION_SUPPORTER_TYPE,
                            'title' => array(                                    
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_SUPPORTER_TITLE,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_SUPPORTER_TITLE
                            ),
                            'desc'  => array(                                 
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_SUPPORTER_DESCRIPTION,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_SUPPORTER_DESCRIPTION                                    
                            )
                        ),
                        array(
                            'id'    => CTINFO_FIELDS::CTINFO_SECTION_COPYRIGHT_ID,
                            'type'  => CTINFO_FIELDS::CTINFO_SECTION_COPYRIGHT_TYPE,
                            'title' => array(                                    
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_COPYRIGHT_TITLE,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_COPYRIGHT_TITLE
                            ),
                            'desc'  => array(                                 
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_COPYRIGHT_DESCRIPTION,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_COPYRIGHT_DESCRIPTION                                    
                            )
                        ),
                        array(
                            'id'    => CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_FB_ID,
                            'type'  => CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_FB_TYPE,
                            'title' => array(                                    
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_FB_TITLE,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_FB_TITLE
                            ),
                            'desc'  => array(                                 
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_FB_DESCRIPTION,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_FB_DESCRIPTION                                    
                            )
                        ),
                        array(
                            'id'    => CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_TWITTER_ID,
                            'type'  => CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_TWITTER_TYPE,
                            'title' => array(                                    
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_TWITTER_TITLE,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_TWITTER_TITLE
                            ),
                            'desc'  => array(                                 
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_TWITTER_DESCRIPTION,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_TWITTER_DESCRIPTION                                    
                            )
                        ),
                        array(
                            'id'    => CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_YOUTUBE_ID,
                            'type'  => CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_YOUTUBE_TYPE,
                            'title' => array(                                    
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_YOUTUBE_TITLE,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_YOUTUBE_TITLE
                            ),
                            'desc'  => array(                                 
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_YOUTUBE_DESCRIPTION,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_YOUTUBE_DESCRIPTION                                    
                            )
                        ),
                        array(
                            'id'    => CTINFO_FIELDS::CTINFO_SECTION_GPLUS_ID,
                            'type'  => CTINFO_FIELDS::CTINFO_SECTION_GPLUS_TYPE,
                            'title' => array(                                    
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_GPLUS_TITLE,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_GPLUS_TITLE
                            ),
                            'desc'  => array(                                 
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_GPLUS_DESCRIPTION,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_GPLUS_DESCRIPTION                                    
                            )
                        ),
                        array(
                            'id'    => CTINFO_FIELDS::CTINFO_SECTION_LINKEDIN_ID,
                            'type'  => CTINFO_FIELDS::CTINFO_SECTION_LINKEDIN_TYPE,
                            'title' => array(                                    
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_LINKEDIN_TITLE,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_LINKEDIN_TITLE
                            ),
                            'desc'  => array(                                 
                                'vi' => CTINFO_FIELDS::CTINFO_SECTION_LINKEDIN_DESCRIPTION,
                                'en' => CTINFO_FIELDS::CTINFO_SECTION_LINKEDIN_DESCRIPTION                                    
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