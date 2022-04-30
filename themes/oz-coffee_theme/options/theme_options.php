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

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_IMAGE_MOBILE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_IMAGE_MOBILE_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_IMAGE_MOBILE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_IMAGE_MOBILE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_IMAGE_MOBILE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_IMAGE_MOBILE_DESCRIPTION                          

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

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SECTION_ID,

        'title'  => array(

           'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_TITLE,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_TITLE

       ),

        'desc'   => array(

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_DESCRIPTION,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_DESCRIPTION

       ),

        'fields' => array(

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SERVICES_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SERVICES_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SERVICES_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SERVICES_SECTION_1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SERVICES_SECTION_1_DESC,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SERVICES_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SERVICES_BACKGROUND_IMAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SERVICES_BACKGROUND_IMAGE_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SERVICES_BACKGROUND_IMAGE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SERVICES_BACKGROUND_IMAGE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SERVICES_BACKGROUND_IMAGE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SERVICES_BACKGROUND_IMAGE_DESCRIPTION                                    

                    )

                ),    

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SERVICES_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SERVICES_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SERVICES_SECTION_2_INDENT 

            ),

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_UUDAI_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_UUDAI_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_UUDAI_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_UUDAI_SECTION_1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_UUDAI_SECTION_1_DESC,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_UUDAI_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_UUDAI_BACKGROUND_IMAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_UUDAI_BACKGROUND_IMAGE_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_UUDAI_BACKGROUND_IMAGE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_UUDAI_BACKGROUND_IMAGE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_UUDAI_BACKGROUND_IMAGE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_UUDAI_BACKGROUND_IMAGE_DESCRIPTION                                    

                    )

                ),    

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_UUDAI_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_UUDAI_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_UUDAI_SECTION_2_INDENT 

            ),

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_TINTUC_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_TINTUC_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_TINTUC_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_TINTUC_SECTION_1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_TINTUC_SECTION_1_DESC,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_TINTUC_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_TINTUC_BACKGROUND_IMAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_TINTUC_BACKGROUND_IMAGE_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_TINTUC_BACKGROUND_IMAGE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_TINTUC_BACKGROUND_IMAGE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_TINTUC_BACKGROUND_IMAGE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_TINTUC_BACKGROUND_IMAGE_DESCRIPTION                                    

                    )

                ),    

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_TINTUC_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_TINTUC_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_TINTUC_SECTION_2_INDENT 

            ),

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_SECTION_1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_SECTION_1_DESC,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_BACKGROUND_IMAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_BACKGROUND_IMAGE_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_BACKGROUND_IMAGE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_BACKGROUND_IMAGE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_BACKGROUND_IMAGE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_BACKGROUND_IMAGE_DESCRIPTION                                    

                    )

                ),    

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_DESCRIPTION_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_DESCRIPTION_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_DESCRIPTION_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_DESCRIPTION_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_DESCRIPTION_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_DESCRIPTION_DESCRIPTION                                    

                    )

                ),    

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_SECTION_2_INDENT 

            )

        )

    ); 

    /*$end_section = end( $this->sections ); 
    
    $this->sections[ sizeof( $this->sections ) - 1 ] = $end_section;  */
    
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

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_ZALO_URL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_ZALO_URL_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_ZALO_URL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_ZALO_URL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_ZALO_URL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_ZALO_URL_DESCRIPTION                                    

                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_FANPAGE_URL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_FANPAGE_URL_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_FANPAGE_URL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_FANPAGE_URL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_FANPAGE_URL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_FANPAGE_URL_DESCRIPTION                                    

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

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_ID,

        'title'  => array(

           'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_TITLE,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_TITLE

       ),

        'desc'   => array(

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_DESCRIPTION,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_DESCRIPTION

       ),

        'fields' => array(

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_1_DESC,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_ORDER_PARTY_ICON_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_ORDER_PARTY_ICON_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_ORDER_PARTY_ICON_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_ORDER_PARTY_ICON_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_ORDER_PARTY_ICON_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_ORDER_PARTY_ICON_DESCRIPTION                                    

                    )

                ),             

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_IMAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_IMAGE_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_IMAGE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_IMAGE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_IMAGE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_IMAGE_DESCRIPTION                                    

                    )

                ),             

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_URL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_URL_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_URL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_URL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_URL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_URL_DESCRIPTION                                    

                    )

                ),             

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_IMAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_IMAGE_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_IMAGE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_IMAGE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_IMAGE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_IMAGE_DESCRIPTION                                    

                    )

                ),             

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_URL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_URL_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_URL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_URL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_URL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_URL_DESCRIPTION                                    

                    )

                ),             

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::SHORTCUT_SIDEBAR_SECTION_2_INDENT 

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

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_ID,

        'title'  => array(

           'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_TITLE,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_TITLE

       ),

        'desc'   => array(

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_DESCRIPTION,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_DESCRIPTION

       ),

        'fields' => array(

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_1_DESC,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_POST_TYPE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_POST_TYPE_TYPE,
                    
                    'data'  => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_POST_TYPE_DATA,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_POST_TYPE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_POST_TYPE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_POST_TYPE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_POST_TYPE_DESCRIPTION                                    

                    )

                ),  

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::TESTIMOLATES_SECTION_2_INDENT 

            )

        )

    ); 

    $this->sections[] = array(

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SECTION_ID,

        'title'  => array(

           'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SECTION_TITLE,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SECTION_TITLE

       ),

        'desc'   => array(

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SECTION_DESCRIPTION,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SECTION_DESCRIPTION

       ),

        'fields' => array(

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_1_DESCRIPTION,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_TITLE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_TITLE_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_TITLE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_TITLE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_TITLE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_TITLE_DESCRIPTION                                    

                    )

                ),         
                
                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_DESCRIPTION_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_DESCRIPTION_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_DESCRIPTION_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_DESCRIPTION_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_DESCRIPTION_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_DESCRIPTION_DESCRIPTION                                    

                    )

                ),         

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY1_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY1_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY1_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY1_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY1_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY1_DESCRIPTION                                    

                    )

                ),         

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY2_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY2_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY2_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY2_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY2_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY2_DESCRIPTION                                    

                    )

                ),         

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY3_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY3_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY3_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY3_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY3_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY3_DESCRIPTION                                    

                    )

                ),         

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY4_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY4_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY4_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY4_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY4_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY4_DESCRIPTION                                    

                    )

                ),         

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_2_INDENT 

            ),

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_1_DESCRIPTION,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_TITLE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_TITLE_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_TITLE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_TITLE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_TITLE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_TITLE_DESCRIPTION                                    

                    )

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_DESCRIPTION_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_DESCRIPTION_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_DESCRIPTION_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_DESCRIPTION_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_DESCRIPTION_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_DESCRIPTION_DESCRIPTION                                    

                    )

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_BANNER_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_BANNER_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_BANNER_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_BANNER_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_BANNER_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_BANNER_DESCRIPTION                                    

                    )

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_POST_TYPE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_POST_TYPE_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_POST_TYPE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_POST_TYPE_TITLE

                    ),

                    'data' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_POST_TYPE_DATA,

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_POST_TYPE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_POST_TYPE_DESCRIPTION                                    

                    )

                ),

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_2_INDENT

            ),

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_1_TITLE

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_1_DESCRIPTION,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_TITLE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_TITLE_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_TITLE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_TITLE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_TITLE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_TITLE_DESCRIPTION                                    

                    )

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_POST_TYPE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_POST_TYPE_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_POST_TYPE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_POST_TYPE_TITLE

                    ),

                    'data'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_POST_TYPE_DATA,   

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_POST_TYPE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_POST_TYPE_DESCRIPTION                                    

                    )

                ),


            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_NEWS_SECTION_2_INDENT

            ),

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_1_TITLE

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_1_DESCRIPTION,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_TITLE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_TITLE_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_TITLE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_TITLE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_TITLE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_TITLE_DESCRIPTION                                    

                    )

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_POST_TYPE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_POST_TYPE_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_POST_TYPE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_POST_TYPE_TITLE

                    ),

                    'data'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_POST_TYPE_DATA, 

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_POST_TYPE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_POST_TYPE_DESCRIPTION                                    

                    )

                ),


            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_2_INDENT

            ),

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_1_TITLE

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_1_DESCRIPTION,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_TITLE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_TITLE_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_TITLE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_TITLE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_TITLE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_TITLE_DESCRIPTION                                    

                    )

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_POST_TYPE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_POST_TYPE_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_POST_TYPE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_POST_TYPE_TITLE

                    ),

                    'data'  => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_POST_TYPE_DATA,

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_POST_TYPE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_POST_TYPE_DESCRIPTION                                    

                    )

                ),

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_2_INDENT

            ),


        )

    ); 

    $this->sections[] = array(

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_ID,

        'title'  => array(

           'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_TITLE,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_TITLE

       ),

        'desc'   => array(

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_DESCRIPTION,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_DESCRIPTION

       ),

        'fields' => array(

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_1_DESCRIPTION,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_1_INDENT

            ),

                 array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_LOGO_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_LOGO_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_LOGO_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_LOGO_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_LOGO_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_LOGO_DESCRIPTION                                    

                    )

                ),         

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_BACKGROUND_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_BACKGROUND_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_BACKGROUND_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_BACKGROUND_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_BACKGROUND_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_BACKGROUND_DESCRIPTION                                    

                    )

                ),    
                
                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_TITLE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_TITLE_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_TITLE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_TITLE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_TITLE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_TITLE_DESCRIPTION                                    

                    )

                ),    

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_ADDRESS_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_ADDRESS_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_ADDRESS_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_ADDRESS_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_ADDRESS_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_ADDRESS_DESCRIPTION                                    

                    )

                ),    

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_PHONE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_PHONE_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_PHONE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_PHONE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_PHONE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_PHONE_DESCRIPTION                                    

                    )

                ),    

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_EMAIL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_EMAIL_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_EMAIL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_EMAIL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_EMAIL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_EMAIL_DESCRIPTION                                    

                    )

                ),    

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_FANPAGE_TITLE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_FANPAGE_TITLE_TYPE,                 

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_FANPAGE_TITLE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_FANPAGE_TITLE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_FANPAGE_TITLE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_FANPAGE_TITLE_DESCRIPTION                                    

                    )

                ),    

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_2_INDENT

            ),
          

        )

    ); 

    $this->sections[] = array(

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SECTION_ID,

        'title'  => array(
                     
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SECTION_TITLE,                     
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SECTION_TITLE
                     
                   ),

        'desc'   => array(
                     
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SECTION_DESCRIPTION,                     
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SECTION_DESCRIPTION
                     
                   ),

        'fields' => array(            

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SECTION_1_TYPE,

                'title' => array(
                                
                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SECTION_1_TITLE,
                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SECTION_1_TITLE
                    
                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SECTION_1_DESCRIPTION,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_EMAIL_ADDRESS_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_EMAIL_ADDRESS_TYPE,

                    'title' => array(
                            
                            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_EMAIL_ADDRESS_TITLE,
                            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_EMAIL_ADDRESS_TITLE
                            
                        ),

                    'desc'  => array(
                            
                            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_EMAIL_ADDRESS_DESCRIPTION,
                            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_EMAIL_ADDRESS_DESCRIPTION
                            
                        ),

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_EMAIL_NAME_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_EMAIL_NAME_TYPE,

                    'title' => array(
                        
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_EMAIL_NAME_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_EMAIL_NAME_TITLE                                  
                    ),

                    'desc'  => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_EMAIL_NAME_DESCRIPTION

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_LAST_NAME_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_LAST_NAME_TYPE,

                    'title' => array(
                                 
                                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_LAST_NAME_TITLE,
                                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_LAST_NAME_TITLE                                   
                               ),

                    'desc'  => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_LAST_NAME_DESCRIPTION

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_CIVILITY_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_CIVILITY_TYPE,

                    'title' => array(
                                 
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_CIVILITY_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_CIVILITY_TITLE                                 
                    ),

                    'desc'  => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_CIVILITY_DESCRIPTION

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_HOST_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_HOST_TYPE,

                    'title' => array(
                                 
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_HOST_TITLE,                                 
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_HOST_TITLE
                        
                    ),

                    'desc'  => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_HOST_DESCRIPTION

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_PORT_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_PORT_TYPE,

                    'title' => array(
                                 
                                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_PORT_TITLE,
                                   'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_PORT_TITLE
                                 
                               ),

                    'desc'  => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_PORT_DESCRIPTION 

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_ENCRYPTION_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_ENCRYPTION_TYPE,

                    'title' => array(
                                 
                                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_ENCRYPTION_TITLE,                                
                                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_ENCRYPTION_TITLE
                                 
                               ),

                    'desc'  => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_ENCRYPTION_DESCRIPTION,

                    'data' => array(

                        \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_ENCRYPTION_NO_ENCRYPTION_VALUE  => array(
                                     
                            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_ENCRYPTION_NO_ENCRYPTION_LABEL,                                     
                            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_ENCRYPTION_NO_ENCRYPTION_LABEL
                            
                        ),

                        \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_ENCRYPTION_SSL_VALUE => array(
                                    
                            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_ENCRYPTION_SSL_LABEL,
                            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_ENCRYPTION_SSL_LABEL
                            
                        ),

                        \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_ENCRYPTION_TLS_VALUE => array(
                            
                            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_ENCRYPTION_TLS_LABEL,
                            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SMTP_ENCRYPTION_TLS_LABEL
                            
                        ),

                    )

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_AUTHENTICATION_USERNAME_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_AUTHENTICATION_USERNAME_TYPE,

                    'title' => array(
                                     
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_AUTHENTICATION_USERNAME_TITLE,                                     
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_AUTHENTICATION_USERNAME_TITLE
                        
                    ),

                    'desc'  => array(
                                     
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_AUTHENTICATION_USERNAME_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_AUTHENTICATION_USERNAME_DESCRIPTION
                        
                    ),

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_AUTHENTICATION_PASSWORD_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_AUTHENTICATION_PASSWORD_TYPE,

                    'title' => array(
                                    
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_AUTHENTICATION_PASSWORD_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_AUTHENTICATION_PASSWORD_TITLE
                        
                    ),

                    'desc'  => array(
                                    
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_AUTHENTICATION_PASSWORD_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_AUTHENTICATION_PASSWORD_DESCRIPTION
                        
                    ),

                ),                

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::CONTACT_FORM_SECTION_2_INDENT

            ),

        )

    );  