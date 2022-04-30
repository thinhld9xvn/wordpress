<?php

    namespace Theme_Options;

    class ThemeOptionsGetSocialNetworkSectionUtils {

        public static function get() {

            return array(

                'id' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_ID,
        
                'title'  => array(
        
                   'vi' => SOCIAL_FIELDS::SOCIAL_NETWORK_TITLE,
        
                   'en' => SOCIAL_FIELDS::SOCIAL_NETWORK_TITLE
        
               ),
        
                'desc'   => array(
        
                    'vi' => SOCIAL_FIELDS::SOCIAL_NETWORK_DESCRIPTION,
        
                   'en' => SOCIAL_FIELDS::SOCIAL_NETWORK_DESCRIPTION
        
               ),
        
                'fields' => array(
        
                    array(
        
                        'id' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_1_ID,
        
                        'type' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_1_TYPE,
        
                        'title' => array(                             
        
                            'vi' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_1_TITLE,
        
                            'en' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_1_TITLE                    
        
                        ),
        
                        'desc' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_1_DESC,
        
                        'indent' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_1_INDENT
        
                    ),
        
                        array(
        
                            'id'    => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_FACEBOOK_URL_ID,
        
                            'type'  => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_FACEBOOK_URL_TYPE,
                        
        
                            'title' => array(                                    
        
                                'vi' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_FACEBOOK_URL_TITLE,
        
                                'en' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_FACEBOOK_URL_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_FACEBOOK_URL_DESCRIPTION,
        
                                'en' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_FACEBOOK_URL_DESCRIPTION                                    
        
                            )
        
                        ),  
        
                        array(
        
                            'id'    => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_TWITTER_URL_ID,
        
                            'type'  => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_TWITTER_URL_TYPE,
                        
        
                            'title' => array(                                    
        
                                'vi' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_TWITTER_URL_TITLE,
        
                                'en' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_TWITTER_URL_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_TWITTER_URL_DESCRIPTION,
        
                                'en' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_TWITTER_URL_DESCRIPTION                                    
        
                            )
        
                        ), 
                        
                        array(
        
                            'id'    => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_ID,
        
                            'type'  => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_TYPE,
                        
        
                            'title' => array(                                    
        
                                'vi' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_TITLE,
        
                                'en' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_DESCRIPTION,
        
                                'en' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_DESCRIPTION                                    
        
                            )
        
                        ),
                        
                        array(
        
                            'id'    => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_YOUTUBE_URL_ID,
        
                            'type'  => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_YOUTUBE_URL_TYPE,
                        
        
                            'title' => array(                                    
        
                                'vi' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_YOUTUBE_URL_TITLE,
        
                                'en' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_YOUTUBE_URL_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_YOUTUBE_URL_DESCRIPTION,
        
                                'en' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_YOUTUBE_URL_DESCRIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_VIMEO_URL_ID,
        
                            'type'  => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_VIMEO_URL_TYPE,
                        
        
                            'title' => array(                                    
        
                                'vi' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_VIMEO_URL_TITLE,
        
                                'en' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_VIMEO_URL_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_VIMEO_URL_DESCRIPTION,
        
                                'en' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_VIMEO_URL_DESCRIPTION                                    
        
                            )
        
                        ),
        
                        array(
        
                            'id'    => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_PINTEREST_URL_ID,
        
                            'type'  => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_PINTEREST_URL_TYPE,
                        
        
                            'title' => array(                                    
        
                                'vi' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_PINTEREST_URL_TITLE,
        
                                'en' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_PINTEREST_URL_TITLE
        
                            ),
        
                            'desc'  => array(                                 
        
                                'vi' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_PINTEREST_URL_DESCRIPTION,
        
                                'en' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_PINTEREST_URL_DESCRIPTION                                    
        
                            )
        
                        ),
        
        
                    array(
        
                        'id' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_2_ID,
        
                        'type' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_2_TYPE,
        
                        'indent' => SOCIAL_FIELDS::SOCIAL_NETWORK_SECTION_2_INDENT 
        
                    )
        
                )
        
            ); 

        }

    }