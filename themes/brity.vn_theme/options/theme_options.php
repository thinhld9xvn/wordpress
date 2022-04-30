<?php

    $this->sections[] = array(

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::GLOBAL_SECTION_ID,

        'title'  => array(

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::GLOBAL_TITLE,

            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::GLOBAL_TITLE

        ),

        'desc'   => array(

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::GLOBAL_DESCRIPTION,

            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::GLOBAL_DESCRIPTION

        ),

        'fields' => array(

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::GLOBAL_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::GLOBAL_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::GLOBAL_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::GLOBAL_SECTION_1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::GLOBAL_SECTION_1_DESCRIPTION,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::GLOBAL_SECTION_1_INDENT

            ),

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::GLOBAL_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::GLOBAL_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::GLOBAL_SECTION_2_INDENT 

            )

        )

    ); 

    $end_section = end( $this->sections );       

    foreach( $GLOBALS['_custom_post_types_registered'] as $post_type ) :        

        $section_field = array(

                    "id"    => "global-pagenumber-post-type-{$post_type['slug']}",
                    "type"  => "text",
                    "title" => array(
                                    "vi" => "Post Type {$post_type['label']}",
                                    "en" => "Post Type {$post_type['label']}"
                                ),
                    "desc"  => ""

                );
       
        array_splice( $end_section['fields'], 
                      sizeof( $end_section['fields'] ) - 1,
                      0,
                      array( $section_field ) );       

    endforeach;

    $args = array(

        'hide_empty' => false

    );

    $categories = get_categories( $args );

    foreach ( $categories as $category ) :

        $section_field = array(

                    "id"    => "global-pagenumber-category-{$category->slug}",
                    "type"  => "text",
                    "title" => array(
                                  "vi" => "Danh mục {$category->name}",
                                  "en" => "Category {$category->name}"
                               ),
                    "desc"  => ""

                );
       
        array_splice( $end_section['fields'], 
                      sizeof( $end_section['fields'] ) - 1,
                      0,
                      array( $section_field ) );      

    endforeach;

    $this->sections[ sizeof( $this->sections ) - 1 ] = $end_section;   

    $this->sections[] = array(

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_ID,

        'title'  => array(

           'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_TITLE,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_TITLE

       ),

        'desc'   => array(

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_DESCRIPTION,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_DESCRIPTION

       ),

        'fields' => array(

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_1_DESC,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_IMAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_IMAGE_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_IMAGE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_IMAGE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_IMAGE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_IMAGE_DESCRIPTION                                    

                    )

                ),   


            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_2_INDENT 

            )

        )

    );

    $this->sections[] = array(

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_ID,

        'title'  => array(

           'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_TITLE,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_TITLE

       ),

        'desc'   => array(

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_DESCRIPTION,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_DESCRIPTION

       ),

        'fields' => array(

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_1_DESC,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_POST_TYPE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_POST_TYPE_TYPE,

                    'data'  => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_POST_TYPE_DATA,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_POST_TYPE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_POST_TYPE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_POST_TYPE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_POST_TYPE_DESCRIPTION                                    

                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_PAUSE_SETTING_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_PAUSE_SETTING_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_PAUSE_SETTING_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_PAUSE_SETTING_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_PAUSE_SETTING_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_PAUSE_SETTING_DESCRIPTION                                    

                    ),

                    'min' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_PAUSE_SETTING_MIN,

                    'max' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_PAUSE_SETTING_MAX,

                    'step' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_PAUSE_SETTING_STEP,

                    'value' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_PAUSE_SETTING_VALUE,

                ),  

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_2_INDENT 

            )

        )

    );  
    
    $this->sections[] = array(

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_SECTION_ID,

        'title'  => array(

           'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_SECTION_TITLE,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_SECTION_TITLE

       ),

        'desc'   => array(

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_SECTION_DESCRIPTION,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_SECTION_DESCRIPTION

       ),

        'fields' => array(

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_SECTION_1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_SECTION_1_DESCRIPTION,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_LABEL_TYPE,
                

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_LABEL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_LABEL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_LABEL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_LABEL_DESCRIPTION                                    

                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_HEADING_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_HEADING_TYPE,
                

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_HEADING_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_HEADING_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_HEADING_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_HEADING_DESCRIPTION                                    

                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_DESCRIPTION_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_DESCRIPTION_TYPE,
                

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_DESCRIPTION_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_DESCRIPTION_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_DESCRIPTION_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_DESCRIPTION_DESCRIPTION                                    

                    )

                ),  


            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_SECTION_2_INDENT 

            )

        )

    );
    
    $this->sections[] = array(

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_ID,

        'title'  => array(

           'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_TITLE,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_TITLE

       ),

        'desc'   => array(

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_DESCRIPTION,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_DESCRIPTION

       ),

        'fields' => array(

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_1_DESC,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_FACEBOOK_URL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_FACEBOOK_URL_TYPE,
                

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_FACEBOOK_URL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_FACEBOOK_URL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_FACEBOOK_URL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_FACEBOOK_URL_DESCRIPTION                                    

                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_TWITTER_URL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_TWITTER_URL_TYPE,
                

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_TWITTER_URL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_TWITTER_URL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_TWITTER_URL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_TWITTER_URL_DESCRIPTION                                    

                    )

                ), 
                
                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_TYPE,
                

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_DESCRIPTION                                    

                    )

                ),
                
                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_YOUTUBE_URL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_YOUTUBE_URL_TYPE,
                

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_YOUTUBE_URL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_YOUTUBE_URL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_YOUTUBE_URL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_YOUTUBE_URL_DESCRIPTION                                    

                    )

                ),
              
                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_DRB_URL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_DRB_URL_TYPE,
                

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_DRB_URL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_DRB_URL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_DRB_URL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_DRB_URL_DESCRIPTION                                    

                    )

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_BEHANCE_URL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_BEHANCE_URL_TYPE,
                

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_BEHANCE_URL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_BEHANCE_URL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_BEHANCE_URL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_BEHANCE_URL_DESCRIPTION                                    

                    )

                ),


            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_2_INDENT 

            )

        )

    ); 

    $this->sections[] = array(

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_ID,

        'title'  => array(

           'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_TITLE,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_TITLE

       ),

        'desc'   => array(

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_DESCRIPTION,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_DESCRIPTION

       ),

        'fields' => array(

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_1_DESCRIPTION,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_DESCRIPTION_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_DESCRIPTION_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_DESCRIPTION_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_DESCRIPTION_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_DESCRIPTION_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_DESCRIPTION_DESCRIPTION                                    

                    )

                ),
                
                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_PHONE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_PHONE_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_PHONE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_PHONE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_PHONE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_PHONE_DESCRIPTION                                    

                    )

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_PHONE_URL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_PHONE_URL_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_PHONE_URL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_PHONE_URL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_PHONE_URL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_PHONE_URL_DESCRIPTION                                    

                    )

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_EMAIL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_EMAIL_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_EMAIL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_EMAIL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_EMAIL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_EMAIL_DESCRIPTION                                    

                    )

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_ADDRESS_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_ADDRESS_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_ADDRESS_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_ADDRESS_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_ADDRESS_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_ADDRESS_DESCRIPTION                                    

                    )

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_GMAP_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_GMAP_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_GMAP_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_GMAP_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_GMAP_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_GMAP_DESCRIPTION                                    

                    )

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_COPYRIGHT_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_COPYRIGHT_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_COPYRIGHT_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_COPYRIGHT_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_COPYRIGHT_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_COPYRIGHT_DESCRIPTION                                    

                    )

                ),

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_2_INDENT 

            )

        )

    ); 