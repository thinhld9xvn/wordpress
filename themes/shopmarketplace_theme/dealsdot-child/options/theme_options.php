<?php

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

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_MAIL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_MAIL_TYPE,

                    'title' => array(                                    

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_MAIL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_MAIL_TITLE

                    ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_MAIL_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_MAIL_DESCRIPTION                               

                    )

                ),           
               

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_2_INDENT 

            )

        )

    );     

    $end_section = end( $this->sections ); 
    
    $this->sections[ sizeof( $this->sections ) - 1 ] = $end_section;   

    $this->sections[] = array(

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID,

        'title'  => array(                     

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_TITLE,                     

            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_TITLE                    

        ),

        'desc'   => array(                     

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_DESCRIPTION,                     

            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_DESCRIPTION                   

        ),

        'fields' => array(            

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_1_ID,

                'type' =>\Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_1_TYPE,

                'title' => array(                                

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_1_TITLE                          

               ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_1_DESCRIPTION,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_ONE_LEAST_PRODUCT_PICTURE_REQUIRED_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_ONE_LEAST_PRODUCT_PICTURE_REQUIRED_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_ONE_LEAST_PRODUCT_PICTURE_REQUIRED_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_ONE_LEAST_PRODUCT_PICTURE_REQUIRED_MSG_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_ONE_LEAST_PRODUCT_PICTURE_REQUIRED_MSG_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_ONE_LEAST_PRODUCT_PICTURE_REQUIRED_MSG_DESCRIPTION
                    )

                ),                 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_REQUIRED_FIELDS_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_REQUIRED_FIELDS_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_REQUIRED_FIELDS_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_REQUIRED_FIELDS_MSG_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_REQUIRED_FIELDS_MSG_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_REQUIRED_FIELDS_MSG_DESCRIPTION
                    )

                ),                 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_SHOP_NAME_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_SHOP_NAME_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_SHOP_NAME_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_SHOP_NAME_MSG_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_SHOP_NAME_MSG_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_SHOP_NAME_MSG_DESCRIPTION
                    )

                ),                 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_SHOP_NAME_IN_THE_LIST_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_SHOP_NAME_IN_THE_LIST_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_SHOP_NAME_IN_THE_LIST_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_SHOP_NAME_IN_THE_LIST_MSG_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_SHOP_NAME_IN_THE_LIST_MSG_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_SHOP_NAME_IN_THE_LIST_MSG_DESCRIPTION
                    )

                ),     
                
                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_CATEGORY_NAME_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_CATEGORY_NAME_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_CATEGORY_NAME_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_CATEGORY_NAME_MSG_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_CATEGORY_NAME_MSG_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_CATEGORY_NAME_MSG_DESCRIPTION
                    )

                ),
                
                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_A_PRODUCT_CATEGORY_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_A_PRODUCT_CATEGORY_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_A_PRODUCT_CATEGORY_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_A_PRODUCT_CATEGORY_MSG_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_A_PRODUCT_CATEGORY_MSG_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_A_PRODUCT_CATEGORY_MSG_DESCRIPTION
                    )

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_UPDATE_PRODUCT_SUCCESS_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_UPDATE_PRODUCT_SUCCESS_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_UPDATE_PRODUCT_SUCCESS_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_UPDATE_PRODUCT_SUCCESS_MSG_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_UPDATE_PRODUCT_SUCCESS_MSG_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_UPDATE_PRODUCT_SUCCESS_MSG_DESCRIPTION
                    )

                ),          
                
                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_SUCCESS_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_SUCCESS_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_SUCCESS_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_SUCCESS_MSG_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_SUCCESS_MSG_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_SUCCESS_MSG_DESCRIPTION
                    )

                ),                 
                
                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_ERROR_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_ERROR_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_ERROR_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_ERROR_MSG_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_ERROR_MSG_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_ERROR_MSG_DESCRIPTION
                    )

                ),  
                
                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::INCCORECT_SAME_PASSWORD_ERROR_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::INCCORECT_SAME_PASSWORD_ERROR_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::INCCORECT_SAME_PASSWORD_ERROR_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::INCCORECT_SAME_PASSWORD_ERROR_MSG_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::INCCORECT_SAME_PASSWORD_ERROR_MSG_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::INCCORECT_SAME_PASSWORD_ERROR_MSG_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::THANKS_FOR_PUBLISH_PRODUCT_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::THANKS_FOR_PUBLISH_PRODUCT_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::THANKS_FOR_PUBLISH_PRODUCT_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::THANKS_FOR_PUBLISH_PRODUCT_MSG_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::THANKS_FOR_PUBLISH_PRODUCT_MSG_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::THANKS_FOR_PUBLISH_PRODUCT_MSG_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISHING_PRODUCT_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISHING_PRODUCT_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISHING_PRODUCT_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISHING_PRODUCT_MSG_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISHING_PRODUCT_MSG_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISHING_PRODUCT_MSG_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_LIBRARIES_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_LIBRARIES_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_LIBRARIES_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_LIBRARIES_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_LIBRARIES_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_LIBRARIES_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_UPLOAD_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_UPLOAD_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_UPLOAD_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_UPLOAD_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_UPLOAD_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_UPLOAD_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_ATTACHMENT_FILTER_HEADING_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_ATTACHMENT_FILTER_HEADING_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_ATTACHMENT_FILTER_HEADING_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_ATTACHMENT_FILTER_HEADING_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_ATTACHMENT_FILTER_HEADING_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_ATTACHMENT_FILTER_HEADING_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_ATTACHMENT_DATE_FILTER_HEADING_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_ATTACHMENT_DATE_FILTER_HEADING_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_ATTACHMENT_DATE_FILTER_HEADING_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_ATTACHMENT_DATE_FILTER_HEADING_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_ATTACHMENT_DATE_FILTER_HEADING_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_ATTACHMENT_DATE_FILTER_HEADING_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_SEARCH_INPUT_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_SEARCH_INPUT_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_SEARCH_INPUT_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_SEARCH_INPUT_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_SEARCH_INPUT_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_SEARCH_INPUT_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_UPLOAD_INSTRUCTION_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_UPLOAD_INSTRUCTION_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_UPLOAD_INSTRUCTION_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_UPLOAD_INSTRUCTION_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_UPLOAD_INSTRUCTION_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_UPLOAD_INSTRUCTION_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_BUTTON_HERO_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_BUTTON_HERO_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_BUTTON_HERO_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_BUTTON_HERO_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_BUTTON_HERO_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_BUTTON_HERO_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_MAX_UPLOAD_SIZE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_MAX_UPLOAD_SIZE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_MAX_UPLOAD_SIZE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_MAX_UPLOAD_SIZE_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_MAX_UPLOAD_SIZE_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_MAX_UPLOAD_SIZE_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::MY_PRODUCT_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::MY_PRODUCT_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MY_PRODUCT_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MY_PRODUCT_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MY_PRODUCT_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MY_PRODUCT_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::MY_PRODUCTS_LIST_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::MY_PRODUCTS_LIST_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MY_PRODUCTS_LIST_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MY_PRODUCTS_LIST_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MY_PRODUCTS_LIST_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MY_PRODUCTS_LIST_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_PRODUCT_LIST_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_PRODUCT_LIST_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_PRODUCT_LIST_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_PRODUCT_LIST_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_PRODUCT_LIST_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_PRODUCT_LIST_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_NAME_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_NAME_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_NAME_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_NAME_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_NAME_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_NAME_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PRICE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PRICE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PRICE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PRICE_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PRICE_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PRICE_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_DETAILS_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_DETAILS_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_DETAILS_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_DETAILS_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_DETAILS_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_DETAILS_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::LOGOUT_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::LOGOUT_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::LOGOUT_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::LOGOUT_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::LOGOUT_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::LOGOUT_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::NEW_PASSWORD_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::NEW_PASSWORD_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::NEW_PASSWORD_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::NEW_PASSWORD_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::NEW_PASSWORD_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::NEW_PASSWORD_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CURRENT_PASSWORD_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CURRENT_PASSWORD_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CURRENT_PASSWORD_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CURRENT_PASSWORD_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CURRENT_PASSWORD_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CURRENT_PASSWORD_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CONFIRM_PASSWORD_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CONFIRM_PASSWORD_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONFIRM_PASSWORD_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONFIRM_PASSWORD_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CONFIRM_PASSWORD_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CONFIRM_PASSWORD_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_INFORMATION_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_INFORMATION_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_INFORMATION_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_INFORMATION_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_INFORMATION_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_INFORMATION_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SAVE_CHANGES_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SAVE_CHANGES_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SAVE_CHANGES_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SAVE_CHANGES_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SAVE_CHANGES_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SAVE_CHANGES_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ACCOUNT_INFORMATION_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ACCOUNT_INFORMATION_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ACCOUNT_INFORMATION_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ACCOUNT_INFORMATION_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ACCOUNT_INFORMATION_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ACCOUNT_INFORMATION_LABEL_DESCRIPTION
                    )

                ),  

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::EDIT_MY_ACCOUNT_LABEL_ID ,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::EDIT_MY_ACCOUNT_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EDIT_MY_ACCOUNT_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EDIT_MY_ACCOUNT_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EDIT_MY_ACCOUNT_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EDIT_MY_ACCOUNT_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CIVILITY_LABEL_ID ,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CIVILITY_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CIVILITY_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CIVILITY_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CIVILITY_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CIVILITY_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_LAST_NAME_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_LAST_NAME_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_LAST_NAME_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_LAST_NAME_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_LAST_NAME_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_LAST_NAME_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_FIRST_NAME_LABEL_ID ,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_FIRST_NAME_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_FIRST_NAME_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_FIRST_NAME_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_FIRST_NAME_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_FIRST_NAME_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_EMAIL_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_EMAIL_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_EMAIL_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_EMAIL_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_EMAIL_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_EMAIL_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_PHONE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_PHONE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_PHONE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_PHONE_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_PHONE_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_PHONE_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    =>  \Theme_Options\THEME_OPTIONS_FIELDS::SELECT_YOUR_STORE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SELECT_YOUR_STORE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SELECT_YOUR_STORE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SELECT_YOUR_STORE_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SELECT_YOUR_STORE_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SELECT_YOUR_STORE_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::MAIN_CATEGORY_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::MAIN_CATEGORY_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MAIN_CATEGORY_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MAIN_CATEGORY_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MAIN_CATEGORY_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MAIN_CATEGORY_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_SCHEDULE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_SCHEDULE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_SCHEDULE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_SCHEDULE_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_SCHEDULE_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_SCHEDULE_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_OPENING_DAY_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_OPENING_DAY_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_OPENING_DAY_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_OPENING_DAY_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_OPENING_DAY_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_OPENING_DAY_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_CLOSING_DAY_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_CLOSING_DAY_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_CLOSING_DAY_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_CLOSING_DAY_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_CLOSING_DAY_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_CLOSING_DAY_LABEL_DESCRIPTION
                    )

                ), 


                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_SCHEDULE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_SCHEDULE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_SCHEDULE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_SCHEDULE_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_SCHEDULE_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_SCHEDULE_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_OPENING_DAY_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_OPENING_DAY_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_OPENING_DAY_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_OPENING_DAY_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_OPENING_DAY_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_OPENING_DAY_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_CLOSING_DAY_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_CLOSING_DAY_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_CLOSING_DAY_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_CLOSING_DAY_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_CLOSING_DAY_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_CLOSING_DAY_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_SCHEDULE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_SCHEDULE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_SCHEDULE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_SCHEDULE_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_SCHEDULE_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_SCHEDULE_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CLICK_AND_COLLECT_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CLICK_AND_COLLECT_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CLICK_AND_COLLECT_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CLICK_AND_COLLECT_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CLICK_AND_COLLECT_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CLICK_AND_COLLECT_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_DELIVERY_INFO_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_DELIVERY_INFO_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_DELIVERY_INFO_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_DELIVERY_INFO_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_DELIVERY_INFO_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_DELIVERY_INFO_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    =>  \Theme_Options\THEME_OPTIONS_FIELDS::PICTURES_LABEL_ID,

                    'type'  =>  \Theme_Options\THEME_OPTIONS_FIELDS::PICTURES_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PICTURES_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PICTURES_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PICTURES_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PICTURES_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::GEOLOCATION_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::GEOLOCATION_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::GEOLOCATION_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::GEOLOCATION_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::GEOLOCATION_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::GEOLOCATION_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_ADDRESS_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_ADDRESS_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_ADDRESS_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_ADDRESS_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_ADDRESS_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_ADDRESS_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::POSTAL_CODE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::POSTAL_CODE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::POSTAL_CODE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::POSTAL_CODE_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::POSTAL_CODE_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::POSTAL_CODE_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CITY_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CITY_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CITY_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CITY_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CITY_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CITY_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_EMAIL_ADDRESS_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_EMAIL_ADDRESS_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_EMAIL_ADDRESS_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_EMAIL_ADDRESS_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_EMAIL_ADDRESS_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_EMAIL_ADDRESS_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_PHONE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_PHONE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_PHONE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_PHONE_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_PHONE_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_PHONE_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SITE_WEB_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SITE_WEB_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SITE_WEB_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SITE_WEB_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SITE_WEB_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SITE_WEB_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SAVE_YOUR_ACCOUNT_AND_STORE_DETAILS_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SAVE_YOUR_ACCOUNT_AND_STORE_DETAILS_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SAVE_YOUR_ACCOUNT_AND_STORE_DETAILS_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SAVE_YOUR_ACCOUNT_AND_STORE_DETAILS_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SAVE_YOUR_ACCOUNT_AND_STORE_DETAILS_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SAVE_YOUR_ACCOUNT_AND_STORE_DETAILS_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_NAME_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_NAME_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_NAME_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_NAME_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_NAME_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_NAME_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_CHOOSE_SHOP_NAME_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_CHOOSE_SHOP_NAME_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_CHOOSE_SHOP_NAME_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_CHOOSE_SHOP_NAME_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_CHOOSE_SHOP_NAME_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_CHOOSE_SHOP_NAME_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORIES_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORIES_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORIES_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORIES_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORIES_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORIES_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORY_NAME_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORY_NAME_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORY_NAME_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORY_NAME_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORY_NAME_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORY_NAME_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORY_NOT_IN_LIST_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORY_NOT_IN_LIST_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORY_NOT_IN_LIST_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORY_NOT_IN_LIST_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORY_NOT_IN_LIST_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORY_NOT_IN_LIST_LABEL_DESCRIPTION
                    )

                ),                

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_CATEGORY_NAME_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_CATEGORY_NAME_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_CATEGORY_NAME_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_CATEGORY_NAME_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_CATEGORY_NAME_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_CATEGORY_NAME_LABEL_DESCRIPTION
                    )

                ), 
                
                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_PRODUCT_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_PRODUCT_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_PRODUCT_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_PRODUCT_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_PRODUCT_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_PRODUCT_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISH_PRODUCT_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISH_PRODUCT_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISH_PRODUCT_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISH_PRODUCT_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISH_PRODUCT_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISH_PRODUCT_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::RESET_FORM_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::RESET_FORM_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::RESET_FORM_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::RESET_FORM_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::RESET_FORM_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::RESET_FORM_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::EMPTY_PRODUCTS_LIST_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::EMPTY_PRODUCTS_LIST_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMPTY_PRODUCTS_LIST_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMPTY_PRODUCTS_LIST_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMPTY_PRODUCTS_LIST_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMPTY_PRODUCTS_LIST_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_SUCCESS_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_SUCCESS_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_SUCCESS_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_SUCCESS_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_SUCCESS_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_SUCCESS_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_TO_WISHLIST_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_TO_WISHLIST_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_TO_WISHLIST_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_TO_WISHLIST_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_TO_WISHLIST_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_TO_WISHLIST_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_OFFERED_BY_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_OFFERED_BY_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_OFFERED_BY_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_OFFERED_BY_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_OFFERED_BY_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_OFFERED_BY_LABEL_DESCRIPTION
                    )

                ),               

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_ANY_PRODUCT_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_ANY_PRODUCT_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_ANY_PRODUCT_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_ANY_PRODUCT_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_ANY_PRODUCT_LABEL_TITLE,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_ANY_PRODUCT_LABEL_TITLE
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_DEFAULT_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_DEFAULT_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_DEFAULT_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_DEFAULT_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_DEFAULT_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_DEFAULT_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_PRICE_UP_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_PRICE_UP_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_PRICE_UP_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_PRICE_UP_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_PRICE_UP_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_PRICE_UP_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_PRICE_DOWN_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_PRICE_DOWN_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_PRICE_DOWN_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_PRICE_DOWN_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_PRICE_DOWN_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_PRICE_DOWN_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_NAME_AZ_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_NAME_AZ_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_NAME_AZ_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_NAME_AZ_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_NAME_AZ_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_NAME_AZ_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_NAME_ZA_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_NAME_ZA_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_NAME_ZA_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_NAME_ZA_LABEL_TITLE
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_NAME_ZA_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_NAME_ZA_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::WELCOME_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::WELCOME_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::WELCOME_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::WELCOME_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::WELCOME_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::WELCOME_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_ADD_PRODUCT_NOW_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_ADD_PRODUCT_NOW_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_ADD_PRODUCT_NOW_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_ADD_PRODUCT_NOW_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_ADD_PRODUCT_NOW_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_ADD_PRODUCT_NOW_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::YOU_MUST_BE_LOGIN_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::YOU_MUST_BE_LOGIN_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::YOU_MUST_BE_LOGIN_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::YOU_MUST_BE_LOGIN_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::YOU_MUST_BE_LOGIN_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::YOU_MUST_BE_LOGIN_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CREATE_THE_NEW_STORE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CREATE_THE_NEW_STORE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CREATE_THE_NEW_STORE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CREATE_THE_NEW_STORE_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CREATE_THE_NEW_STORE_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CREATE_THE_NEW_STORE_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SUBMIT_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SUBMIT_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SUBMIT_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SUBMIT_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SUBMIT_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SUBMIT_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_PRODUCT_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_PRODUCT_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_PRODUCT_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_PRODUCT_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_PRODUCT_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_PRODUCT_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_STORE_DETAILS_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_STORE_DETAILS_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_STORE_DETAILS_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_STORE_DETAILS_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_STORE_DETAILS_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_STORE_DETAILS_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::FROM_PRICE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::FROM_PRICE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FROM_PRICE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FROM_PRICE_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FROM_PRICE_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FROM_PRICE_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_YOUR_PRODUCT_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_YOUR_PRODUCT_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_YOUR_PRODUCT_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_YOUR_PRODUCT_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_YOUR_PRODUCT_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_YOUR_PRODUCT_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::FILL_OUT_ADD_PRODUCT_FORM_DESCRIPTION_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::FILL_OUT_ADD_PRODUCT_FORM_DESCRIPTION_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FILL_OUT_ADD_PRODUCT_FORM_DESCRIPTION_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FILL_OUT_ADD_PRODUCT_FORM_DESCRIPTION_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::FILL_OUT_ADD_PRODUCT_FORM_DESCRIPTION_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::FILL_OUT_ADD_PRODUCT_FORM_DESCRIPTION_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_STORE_INFORMATION_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_STORE_INFORMATION_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_STORE_INFORMATION_LABEL_TYPE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_STORE_INFORMATION_LABEL_TYPE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_STORE_INFORMATION_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_STORE_INFORMATION_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::IMPORT_PRODUCT_CATEGORY_FILE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::IMPORT_PRODUCT_CATEGORY_FILE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::IMPORT_PRODUCT_CATEGORY_FILE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::IMPORT_PRODUCT_CATEGORY_FILE_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::IMPORT_PRODUCT_CATEGORY_FILE_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::IMPORT_PRODUCT_CATEGORY_FILE_LABEL_DESCRIPTION
                    )

                ), 
                
                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::LAST_UPDATE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::LAST_UPDATE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::LAST_UPDATE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::LAST_UPDATE_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::LAST_UPDATE_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::LAST_UPDATE_LABEL_DESCRIPTION
                    )

                ),               

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_BRAND_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_BRAND_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_BRAND_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_BRAND_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_BRAND_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_BRAND_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::NO_ADDRESS_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::NO_ADDRESS_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::NO_ADDRESS_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::NO_ADDRESS_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::NO_ADDRESS_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::NO_ADDRESS_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_ADDRESS_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_ADDRESS_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_ADDRESS_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_ADDRESS_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_ADDRESS_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_ADDRESS_LABEL_DESCRIPTION
                    )

                ),                 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PORTABLE_RESPONSABLE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PORTABLE_RESPONSABLE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PORTABLE_RESPONSABLE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PORTABLE_RESPONSABLE_LABEL_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PORTABLE_RESPONSABLE_LABEL_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PORTABLE_RESPONSABLE_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_RESPONSABLE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_RESPONSABLE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_RESPONSABLE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_RESPONSABLE_LABEL_TITLE
                    
                    ),

                    'desc'  => array(
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_RESPONSABLE_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_RESPONSABLE_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SITE_INTERNET_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SITE_INTERNET_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SITE_INTERNET_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SITE_INTERNET_LABEL_TITLE
                    
                    ),

                    'desc'  => array(
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SITE_INTERNET_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SITE_INTERNET_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PAGE_FACEBOOK_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PAGE_FACEBOOK_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PAGE_FACEBOOK_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PAGE_FACEBOOK_LABEL_TITLE
                    
                    ),

                    'desc'  => array(
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PAGE_FACEBOOK_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PAGE_FACEBOOK_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ANNUAIRE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ANNUAIRE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ANNUAIRE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ANNUAIRE_LABEL_TITLE
                    
                    ),

                    'desc'  => array(
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ANNUAIRE_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ANNUAIRE_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::MASQUES_RESCUS_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::MASQUES_RESCUS_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MASQUES_RESCUS_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MASQUES_RESCUS_LABEL_TITLE
                    
                    ),

                    'desc'  => array(
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::MASQUES_RESCUS_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::MASQUES_RESCUS_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::BAIL_SAISONNIER_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::BAIL_SAISONNIER_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::BAIL_SAISONNIER_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::BAIL_SAISONNIER_LABEL_TITLE
                    
                    ),

                    'desc'  => array(
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::BAIL_SAISONNIER_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::BAIL_SAISONNIER_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_A_NEW_PASSWORD_BELOW_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_A_NEW_PASSWORD_BELOW_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_A_NEW_PASSWORD_BELOW_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_A_NEW_PASSWORD_BELOW_LABEL_TITLE
                    
                    ),

                    'desc'  => array(
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_A_NEW_PASSWORD_BELOW_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_A_NEW_PASSWORD_BELOW_LABEL_DESCRIPTION
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_AND_REDIRECT_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_AND_REDIRECT_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_AND_REDIRECT_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_AND_REDIRECT_MSG_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_AND_REDIRECT_MSG_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_AND_REDIRECT_MSG_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::LOADING_DATA_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::LOADING_DATA_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::LOADING_DATA_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::LOADING_DATA_MSG_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::LOADING_DATA_MSG_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::LOADING_DATA_MSG_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::COMMERCANTS_MANAGEMENTS_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::COMMERCANTS_MANAGEMENTS_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::COMMERCANTS_MANAGEMENTS_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::COMMERCANTS_MANAGEMENTS_LABEL_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::COMMERCANTS_MANAGEMENTS_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::COMMERCANTS_MANAGEMENTS_LABEL_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_THE_NEW_STORE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_THE_NEW_STORE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_THE_NEW_STORE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_THE_NEW_STORE_LABEL_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_THE_NEW_STORE_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADD_THE_NEW_STORE_LABEL_DESCRIPTION
                        
                    )

                ), 
            
                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::IMPORT_NEW_MERCHANT_FILE_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::IMPORT_NEW_MERCHANT_FILE_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::IMPORT_NEW_MERCHANT_FILE_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::IMPORT_NEW_MERCHANT_FILE_LABEL_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::IMPORT_NEW_MERCHANT_FILE_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::IMPORT_NEW_MERCHANT_FILE_LABEL_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_LABEL_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_LABEL_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PREVIOUS_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PREVIOUS_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PREVIOUS_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PREVIOUS_LABEL_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PREVIOUS_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PREVIOUS_LABEL_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::NEXT_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::NEXT_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::NEXT_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::NEXT_LABEL_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::NEXT_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::NEXT_LABEL_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SHOWING_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SHOWING_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHOWING_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHOWING_LABEL_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHOWING_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHOWING_LABEL_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::TO_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::TO_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::TO_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::TO_LABEL_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::TO_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::TO_LABEL_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::OF_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::OF_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::OF_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::OF_LABEL_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::OF_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::OF_LABEL_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ENTRIES_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ENTRIES_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTRIES_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTRIES_LABEL_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTRIES_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTRIES_LABEL_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::EMPTY_DT_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::EMPTY_DT_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMPTY_DT_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMPTY_DT_MSG_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMPTY_DT_MSG_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMPTY_DT_MSG_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_CATEGORIES_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_CATEGORIES_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_CATEGORIES_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_CATEGORIES_LABEL_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_CATEGORIES_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_CATEGORIES_LABEL_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_LISTS_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_LISTS_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_LISTS_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_LISTS_LABEL_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_LISTS_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_LISTS_LABEL_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PASSWORD_RESET_MAIL_NOTICE_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PASSWORD_RESET_MAIL_NOTICE_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PASSWORD_RESET_MAIL_NOTICE_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PASSWORD_RESET_MAIL_NOTICE_MSG_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PASSWORD_RESET_MAIL_NOTICE_MSG_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PASSWORD_RESET_MAIL_NOTICE_MSG_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PASSWORD_RESET_MAIL_CONFIRM_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PASSWORD_RESET_MAIL_CONFIRM_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PASSWORD_RESET_MAIL_CONFIRM_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PASSWORD_RESET_MAIL_CONFIRM_MSG_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PASSWORD_RESET_MAIL_CONFIRM_MSG_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PASSWORD_RESET_MAIL_CONFIRM_MSG_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::LOST_YOUR_PASSWORD_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::LOST_YOUR_PASSWORD_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::LOST_YOUR_PASSWORD_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::LOST_YOUR_PASSWORD_MSG_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::LOST_YOUR_PASSWORD_MSG_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::LOST_YOUR_PASSWORD_MSG_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::USER_NAME_OR_EMAIL_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::USER_NAME_OR_EMAIL_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::USER_NAME_OR_EMAIL_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::USER_NAME_OR_EMAIL_LABEL_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::USER_NAME_OR_EMAIL_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::USER_NAME_OR_EMAIL_LABEL_DESCRIPTION
                        
                    )

                ),             

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::RESET_PASSWORD_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::RESET_PASSWORD_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::RESET_PASSWORD_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::RESET_PASSWORD_LABEL_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::RESET_PASSWORD_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::RESET_PASSWORD_LABEL_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_NOT_IN_LIST_MSG_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_NOT_IN_LIST_MSG_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_NOT_IN_LIST_MSG_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_NOT_IN_LIST_MSG_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_NOT_IN_LIST_MSG_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_NOT_IN_LIST_MSG_DESCRIPTION
                        
                    )

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_CUSTOM_NAME_LABEL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_CUSTOM_NAME_LABEL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_CUSTOM_NAME_LABEL_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_CUSTOM_NAME_LABEL_TITLE
                    
                    ),

                    'desc'  => array(

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_CUSTOM_NAME_LABEL_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_CUSTOM_NAME_LABEL_DESCRIPTION
                        
                    )

                ), 
            
            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_2_INDENT 

            ),

        )

    );   

    $this->sections[] = array(

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::PAGES_SECTION_ID,

        'title'  => array(                     

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PAGES_SECTION_TITLE,                     

            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PAGES_SECTION_TITLE                   

        ),

        'desc'   => array(                     

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PAGES_SECTION_DESCRIPTION,                     

            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PAGES_SECTION_DESCRIPTION                  

        ),

        'fields' => array(            

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PAGES_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PAGES_SECTION_1_TYPE,

                'title' => array(                                

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PAGES_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PAGES_SECTION_1_TITLE                          

               ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PAGES_SECTION_1_DESCRIPTION,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PAGES_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISH_PRODUCTS_PAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISH_PRODUCTS_PAGE_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISH_PRODUCTS_PAGE_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISH_PRODUCTS_PAGE_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISH_PRODUCTS_PAGE_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISH_PRODUCTS_PAGE_DESCRIPTION
                    )

                ),                

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_LISTS_PAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_LISTS_PAGE_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_LISTS_PAGE_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_LISTS_PAGE_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_LISTS_PAGE_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_LISTS_PAGE_DESCRIPTION
                    )

                ),                

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_DETAILS_PAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_DETAILS_PAGE_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_DETAILS_PAGE_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_DETAILS_PAGE_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_DETAILS_PAGE_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::STORE_DETAILS_PAGE_DESCRIPTION
                    )

                ),  
                
                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::COMMERCANTS_PAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::COMMERCANTS_PAGE_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::COMMERCANTS_PAGE_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::COMMERCANTS_PAGE_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::COMMERCANTS_PAGE_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::COMMERCANTS_PAGE_DESCRIPTION
                    )

                ),   

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_DASHBOARD_NEW_STORE_PAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_DASHBOARD_NEW_STORE_PAGE_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_DASHBOARD_NEW_STORE_PAGE_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_DASHBOARD_NEW_STORE_PAGE_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_DASHBOARD_NEW_STORE_PAGE_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_DASHBOARD_NEW_STORE_PAGE_DESCRIPTION
                    )

                ),   

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_DASHBOARD_UPDATE_STORE_PAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_DASHBOARD_UPDATE_STORE_PAGE_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_DASHBOARD_UPDATE_STORE_PAGE_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_DASHBOARD_UPDATE_STORE_PAGE_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_DASHBOARD_UPDATE_STORE_PAGE_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_DASHBOARD_UPDATE_STORE_PAGE_DESCRIPTION
                    )

                ),   

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_EDIT_ACCOUNT_PAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_EDIT_ACCOUNT_PAGE_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_EDIT_ACCOUNT_PAGE_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_EDIT_ACCOUNT_PAGE_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_EDIT_ACCOUNT_PAGE_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_EDIT_ACCOUNT_PAGE_DESCRIPTION
                    )

                ),   

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_VIEW_PRODUCTS_LIST_PAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_VIEW_PRODUCTS_LIST_PAGE_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_VIEW_PRODUCTS_LIST_PAGE_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_VIEW_PRODUCTS_LIST_PAGE_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_VIEW_PRODUCTS_LIST_PAGE_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_VIEW_PRODUCTS_LIST_PAGE_DESCRIPTION
                    )

                ),   

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_UPDATE_PRODUCTS_PAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_UPDATE_PRODUCTS_PAGE_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_UPDATE_PRODUCTS_PAGE_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_UPDATE_PRODUCTS_PAGE_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_UPDATE_PRODUCTS_PAGE_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_UPDATE_PRODUCTS_PAGE_DESCRIPTION
                    )

                ),   

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_RESET_PASSWORD_PAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_RESET_PASSWORD_PAGE_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_RESET_PASSWORD_PAGE_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_RESET_PASSWORD_PAGE_TITLE
                   
                    ),

                    'desc'  => array(
                       'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_RESET_PASSWORD_PAGE_DESCRIPTION,
                       'en' => \Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_RESET_PASSWORD_PAGE_DESCRIPTION
                    )

                ),   
                
            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PAGES_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PAGES_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PAGES_SECTION_2_INDENT 

            ),

        )

    ); 

    $this->sections[] = array(

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_LEFT_SECTION_ID,

        'title'  => array(                     

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_LEFT_SECTION_TITLE,                     

            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_LEFT_SECTION_TITLE                    

        ),

        'desc'   => array(                     

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_LEFT_SECTION_DESCRIPTION,                     

            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_LEFT_SECTION_DESCRIPTION                  

        ),

        'fields' => array(

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_SECTION_1_TYPE,

                'title' => array(                                

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_SECTION_1_TITLE                           

               ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_SECTION_1_DESCRIPTION,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_SECTION_1_INDENT

            ),

                array(

                    'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_MIN_VALUE_ID,

                    'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_MIN_VALUE_TYPE,

                    'title' => array(                                

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_MIN_VALUE_TITLE,
 
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_MIN_VALUE_TITLE             

                   ),

                    'desc'  => array(                                

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_MIN_VALUE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_MIN_VALUE_DESCRIPTION                                    

                    )

                ),              

                array(

                    'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_MAX_VALUE_ID,

                    'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_MAX_VALUE_TYPE,

                    'title' => array(                                

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_MAX_VALUE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_MAX_VALUE_TITLE                 

                   ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_MAX_VALUE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_MAX_VALUE_DESCRIPTION                                    

                    )

                ), 

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_PRICE_SECTION_2_INDENT

            ),

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_SECTION_1_TYPE,

                'title' => array(                                

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_SECTION_1_TITLE                       

               ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_SECTION_1_DESCRIPTION,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_SECTION_1_INDENT

            ),

                array(

                    'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_MIN_VALUE_ID,

                    'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_MIN_VALUE_TYPE,

                    'title' => array(                                

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_MIN_VALUE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_MIN_VALUE_TITLE                        

                   ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_MIN_VALUE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_MIN_VALUE_DESCRIPTION                                  

                    )

                ),              

                array(

                    'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_MAX_VALUE_ID,

                    'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_MAX_VALUE_TYPE,

                    'title' => array(                                

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_MAX_VALUE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_MAX_VALUE_TITLE                       

                   ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_MAX_VALUE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_MAX_VALUE_DESCRIPTION                                    

                    )

                ), 

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_FILTER_DISTANCE_SECTION_2_INDENT 

            ),

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_SECTION_1_TYPE,

                'title' => array(                                

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_SECTION_1_TITLE                            

               ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_SECTION_1_DESCRIPTION,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_SECTION_1_INDENT

            ),

            array(

                    'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_POST_TYPE_ID,

                    'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_POST_TYPE_TYPE,

                    'title' => array(                                

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_POST_TYPE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_POST_TYPE_TITLE                           

                   ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_POST_TYPE_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_POST_TYPE_DESCRIPTION                                   

                    ),

                    'data' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_POST_TYPE_DATA

                ),              

                array(

                    'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_NUM_ITEMS_ID,

                    'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_NUM_ITEMS_TYPE,

                    'title' => array(                                

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_NUM_ITEMS_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_NUM_ITEMS_TITLE                        

                   ),

                    'desc'  => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_NUM_ITEMS_DESCRIPTION,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_NUM_ITEMS_DESCRIPTION                                 

                    ),
                     'min' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_NUM_ITEMS_MIN,

                    'max' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_NUM_ITEMS_MAX,

                    'step' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_NUM_ITEMS_STEP,

                    'value' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_NUM_ITEMS_STEP

                ), 

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::SIDEBAR_CAROUSEL_TESTIMOLATES_SECTION_2_INDENT 

            ),

        )

    );    

    $this->sections[] = array(

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_SECTION_ID,

        'title'  => array(                     

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_SECTION_TITLE,                     

            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_SECTION_TITLE                    

        ),

        'desc'   => array(                     

            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_SECTION_DESCRIPTION,                     

            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_SECTION_DESCRIPTION                    

        ),

        'fields' => array(            

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_SECTION_1_TYPE,

                'title' => array(                                

                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_SECTION_1_TITLE,

                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_SECTION_1_TITLE                            

               ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_SECTION_1_DESCRIPTION,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_SECTION_1_INDENT

            ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_IMAGE_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_IMAGE_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_IMAGE_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_IMAGE_TITLE
                   
                    ),

                    'desc'  => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_IMAGE_DESCRIPTION,

                ),             

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_HEADING_TEXT_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_HEADING_TEXT_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_HEADING_TEXT_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_HEADING_TEXT_TITLE
                   
                    ),

                    'desc'  => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_HEADING_TEXT_DESCRIPTION,

                ),             

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_MEDIUM_TEXT_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_MEDIUM_TEXT_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_MEDIUM_TEXT_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_MEDIUM_TEXT_TITLE
                   
                    ),

                    'desc'  => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_MEDIUM_TEXT_DESCRIPTION,

                ),               

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_SMALL_TEXT_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_SMALL_TEXT_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_SMALL_TEXT_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_SMALL_TEXT_TITLE
                   
                    ),

                    'desc'  => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_SMALL_TEXT_DESCRIPTION,

                ), 

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_BUTTON_TEXT_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_BUTTON_TEXT_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_BUTTON_TEXT_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_BUTTON_TEXT_TITLE
                   
                    ),

                    'desc'  => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_BUTTON_TEXT_DESCRIPTION,

                ),                       

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_BUTTON_URL_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_BUTTON_URL_TYPE,

                    'title' => array(                                 

                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_BUTTON_URL_TITLE,

                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_BUTTON_URL_TITLE
                   
                    ),

                    'desc'  => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_BUTTON_URL_DESCRIPTION,

                ),                
                
                

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_SECTION_2_INDENT 

            ),

        )

    ); 

    $this->sections[] = array(

        'id' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_SECTION_TEMPLATES_ID,

        'title'  => array(
            
            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_SECTION_TEMPLATES_TITLE,                     
            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_SECTION_TEMPLATES_TITLE
            
        ),

        'desc'   => array(
            
            'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_SECTION_TEMPLATES_DESCRIPTION,                     
            'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_SECTION_TEMPLATES_DESCRIPTION
            
        ),

        'fields' => array(            

            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_SECTION_1_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_SECTION_1_TYPE,

                'title' => array(
                    
                    'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_SECTION_1_TITLE,
                    'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_SECTION_1_TITLE
                    
                ),

                'desc' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_SECTION_1_DESCRIPTION,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_SECTION_1_INDENT

            ),
            
                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_ADMIN_ACTION_SUBJECT_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_ADMIN_ACTION_SUBJECT_TYPE,

                    'title' => array(
                                
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_ADMIN_ACTION_SUBJECT_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_ADMIN_ACTION_SUBJECT_TITLE
                        
                    ),

                    'desc'  => array(
                        
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_ADMIN_ACTION_SUBJECT_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_ADMIN_ACTION_SUBJECT_DESCRIPTION
                        
                    ),

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_ADMIN_ACTION_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_ADMIN_ACTION_TYPE,

                    'title' => array(
                                 
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_ADMIN_ACTION_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_ADMIN_ACTION_TITLE
                        
                    ),

                    'desc'  => array(
                        
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_ADMIN_ACTION_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_ADMIN_ACTION_DESCRIPTION
                        
                    ),

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_STORE_ACTION_SUBJECT_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_STORE_ACTION_SUBJECT_TYPE,

                    'title' => array(
                                
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_STORE_ACTION_SUBJECT_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_STORE_ACTION_SUBJECT_TITLE
                        
                    ),

                    'desc'  => array(
                        
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_STORE_ACTION_SUBJECT_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_STORE_ACTION_SUBJECT_DESCRIPTION
                        
                    ),

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_STORE_ACTION_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_STORE_ACTION_TYPE,

                    'title' => array(
                                 
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_STORE_ACTION_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_STORE_ACTION_TITLE
                        
                    ),

                    'desc'  => array(
                        
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_STORE_ACTION_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_STORE_ACTION_DESCRIPTION
                        
                    ),

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_REPORT_ABUSE_FORM_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_REPORT_ABUSE_FORM_TYPE,

                    'title' => array(
                                 
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_REPORT_ABUSE_FORM_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_REPORT_ABUSE_FORM_TITLE
                        
                    ),

                    'desc'  => array(
                        
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_REPORT_ABUSE_FORM_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_REPORT_ABUSE_FORM_DESCRIPTION
                        
                    ),

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_REPORT_ABUSE_SUBJECT_FORM_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_REPORT_ABUSE_SUBJECT_FORM_TYPE,

                    'title' => array(
                                 
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_REPORT_ABUSE_SUBJECT_FORM_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_REPORT_ABUSE_SUBJECT_FORM_TITLE
                        
                    ),

                    'desc'  => array(
                        
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_REPORT_ABUSE_SUBJECT_FORM_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_REPORT_ABUSE_SUBJECT_FORM_DESCRIPTION
                        
                    ),

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_RETRIEVE_PASSWORD_SUBJECT_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_RETRIEVE_PASSWORD_SUBJECT_TYPE,

                    'title' => array(
                                
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_RETRIEVE_PASSWORD_SUBJECT_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_RETRIEVE_PASSWORD_SUBJECT_TITLE
                        
                    ),

                    'desc'  => array(
                        
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_RETRIEVE_PASSWORD_SUBJECT_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_RETRIEVE_PASSWORD_SUBJECT_DESCRIPTION
                        
                    ),

                ),

                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_RETRIEVE_PASSWORD_BODY_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_RETRIEVE_PASSWORD_BODY_TYPE,

                    'title' => array(
                                
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_RETRIEVE_PASSWORD_BODY_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_RETRIEVE_PASSWORD_BODY_TITLE
                        
                    ),

                    'desc'  => array(
                        
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_RETRIEVE_PASSWORD_BODY_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_RETRIEVE_PASSWORD_BODY_DESCRIPTION
                        
                    ),

                ),


                array(

                    'id'    => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_LINK_EXPIRE_TIMEOUT_ID,

                    'type'  => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_LINK_EXPIRE_TIMEOUT_TYPE,

                    'title' => array(
                                 
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_LINK_EXPIRE_TIMEOUT_TITLE,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_LINK_EXPIRE_TIMEOUT_TITLE
                        
                    ),

                    'desc'  => array(
                        
                        'vi' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_LINK_EXPIRE_TIMEOUT_DESCRIPTION,
                        'en' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_LINK_EXPIRE_TIMEOUT_DESCRIPTION
                        
                    ),

                ),


            array(

                'id' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_SECTION_2_ID,

                'type' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_SECTION_2_TYPE,

                'indent' => \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_TEMPLATE_SECTION_2_INDENT 

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