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

                /*array(

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

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_FOOTER_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_FOOTER_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_FOOTER_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_FOOTER_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_FOOTER_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_FOOTER_DESCRIPTION                          

                    )

                ), */

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

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_ID,

        'title'  => array(

           'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_TITLE,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_TITLE

       ),

        'desc'   => array(

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_DESCRIPTION,

            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_DESCRIPTION

       ),

        'fields' => array(

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_1_DESC,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BANNER_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BANNER_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BANNER_TITLTE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BANNER_TITLTE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BANNER_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BANNER_DESCRIPTION                                    

                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_HEADING_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_HEADING_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_HEADING_TITLTE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_HEADING_TITLTE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_HEADING_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_HEADING_DESCRIPTION                                    

                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_SUBHEADING_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_SUBHEADING_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_SUBHEADING_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_SUBHEADING_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_SUBHEADING_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_SUBHEADING_DESCRIPTION                                    

                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BUTTON_TEXT_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BUTTON_TEXT_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BUTTON_TEXT_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BUTTON_TEXT_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BUTTON_TEXT_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BUTTON_TEXT_DESCRIPTION                                    

                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BUTTON_URL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BUTTON_URL_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BUTTON_URL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BUTTON_URL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BUTTON_URL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BUTTON_URL_DESCRIPTION                                    

                    )

                ), 
             

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_2_INDENT 

            )

        )

    );

    $this->sections[] = array(

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_ID,

        'title'  => array(

           'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_TITLE,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_TITLE

       ),

        'desc'   => array(

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_DESCRIPTION,

            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_DESCRIPTION

       ),

        'fields' => array(

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_1_DESC,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_HTML_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_HTML_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_HTML_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_HTML_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_HTML_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_HTML_DESCRIPTION                                    

                    )

                ), 
             

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_2_INDENT 

            )

        )

    );

    $this->sections[] = array(

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_SECTION_ID,

        'title'  => array(

           'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_SECTION_TITLE,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_SECTION_TITLE

       ),

        'desc'   => array(

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_SECTION_DESCRIPTION,

            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_SECTION_DESCRIPTION

       ),

        'fields' => array(

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_SECTION_1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_SECTION_1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_SECTION_1_DESC,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_VISA_IMAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_VISA_IMAGE_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_VISA_IMAGE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_VISA_IMAGE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_VISA_IMAGE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_VISA_IMAGE_DESCRIPTION                                    

                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_MASTERCARD_IMAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_MASTERCARD_IMAGE_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_MASTERCARD_IMAGE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_MASTERCARD_IMAGE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_MASTERCARD_IMAGE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_MASTERCARD_IMAGE_DESCRIPTION                                    

                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_PAYPAL_IMAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_PAYPAL_IMAGE_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_PAYPAL_IMAGE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_PAYPAL_IMAGE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_PAYPAL_IMAGE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_PAYPAL_IMAGE_DESCRIPTION                                    

                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_WESTERN_UNION_IMAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_WESTERN_UNION_IMAGE_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_WESTERN_UNION_IMAGE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_WESTERN_UNION_IMAGE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_WESTERN_UNION_IMAGE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_WESTERN_UNION_IMAGE_DESCRIPTION                                    

                    )

                ), 
             

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_SECTION_2_INDENT 

            )

        )

    );

    $this->sections[] = array(

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_ID,

        'title'  => array(

           'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_TITLE,

           'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_TITLE

       ),

        'desc'   => array(

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_DESCRIPTION,

            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_DESCRIPTION

       ),

        'fields' => array(

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_DESC,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_IMAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_IMAGE_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_IMAGE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_IMAGE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_IMAGE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_IMAGE_DESCRIPTION                                    

                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HEADING_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HEADING_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HEADING_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HEADING_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HEADING_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HEADING_DESCRIPTION                                    

                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HOTLINE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HOTLINE_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HOTLINE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HOTLINE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HOTLINE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HOTLINE_DESCRIPTION                                    

                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HOTLINE_URL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HOTLINE_URL_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HOTLINE_URL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HOTLINE_URL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HOTLINE_URL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HOTLINE_URL_DESCRIPTION                                    

                    )

                ), 
             

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_END_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_END_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_END_INDENT 

            ),

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_DESC,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_IMAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_IMAGE_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_IMAGE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_IMAGE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_IMAGE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_IMAGE_DESCRIPTION                                    

                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_HEADING_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_HEADING_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_HEADING_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_HEADING_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_HEADING_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_HEADING_DESCRIPTION                                    

                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_SUBHEADING_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_SUBHEADING_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_SUBHEADING_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_SUBHEADING_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_SUBHEADING_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_SUBHEADING_DESCRIPTION                                    

                    )

                ), 
             

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_END_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_END_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_END_INDENT 

            ),

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_TYPE,

                'title' => array(                             

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_TITLE                    

                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_DESC,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_IMAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_IMAGE_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_IMAGE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_IMAGE_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_IMAGE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_IMAGE_DESCRIPTION                                    

                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_HEADING_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_HEADING_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_HEADING_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_HEADING_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_HEADING_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_HEADING_DESCRIPTION                                    

                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_SUBHEADING_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_SUBHEADING_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_SUBHEADING_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_SUBHEADING_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_SUBHEADING_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_SUBHEADING_DESCRIPTION                                    

                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_SUBHEADING_URL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_SUBHEADING_URL_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_SUBHEADING_URL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_SUBHEADING_URL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_SUBHEADING_URL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_SUBHEADING_URL_DESCRIPTION                                    

                    )

                ), 
             

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_END_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_END_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_END_INDENT 

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

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_LINKEDIN_URL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_LINKEDIN_URL_TYPE,
                

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_LINKEDIN_URL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_LINKEDIN_URL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_LINKEDIN_URL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_LINKEDIN_URL_DESCRIPTION                                    

                    )

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_PINTEREST_URL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_PINTEREST_URL_TYPE,
                

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_PINTEREST_URL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_PINTEREST_URL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_PINTEREST_URL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SOCIAL_NETWORK_SECTION_PINTEREST_URL_DESCRIPTION                                    

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