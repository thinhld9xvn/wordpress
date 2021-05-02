<?php

    namespace MessageNotification;
    
    class MessageGetUtils {

        public static function get_all() {

            $max_upload_sizes = \Attachments\AttachmentGetMaxUploadSizeUtils::get();
            
            //$options = \Theme_Options\Theme_Options::get_section(\Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID);

            $media_max_upload_size_label = \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_MAX_UPLOAD_SIZE_LABEL_ID,
                                                                                    \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID);

            $media_max_upload_size_label = str_replace("{max_upload_size}", $max_upload_sizes, $media_max_upload_size_label);

            return array(

                \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_MAX_UPLOAD_SIZE_LABEL_ID => $max_upload_sizes,

                \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_ONE_LEAST_PRODUCT_PICTURE_REQUIRED_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_ONE_LEAST_PRODUCT_PICTURE_REQUIRED_MSG_ID,
                                                                                                                                                \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_REQUIRED_FIELDS_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::ENTER_REQUIRED_FIELDS_MSG_ID,
                                                                                                                                                \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_SHOP_NAME_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_SHOP_NAME_MSG_ID,
                                                                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_SHOP_NAME_IN_THE_LIST_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_SHOP_NAME_IN_THE_LIST_MSG_ID,
                                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_CATEGORY_NAME_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_CATEGORY_NAME_MSG_ID,
                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_A_PRODUCT_CATEGORY_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_A_PRODUCT_CATEGORY_MSG_ID,
                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_UPDATE_PRODUCT_SUCCESS_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_UPDATE_PRODUCT_SUCCESS_MSG_ID,
                                                                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_SUCCESS_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_SUCCESS_MSG_ID,
                                                                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_ERROR_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::AJAX_DEFAULT_ERROR_MSG_ID,
                                                                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::INCCORECT_SAME_PASSWORD_ERROR_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::INCCORECT_SAME_PASSWORD_ERROR_MSG_ID,
                                                                                                                                         \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::THANKS_FOR_PUBLISH_PRODUCT_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::THANKS_FOR_PUBLISH_PRODUCT_MSG_ID,
                                                                                                                                 \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISHING_PRODUCT_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::PUBLISHING_PRODUCT_MSG_ID,
                                                                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_LIBRARIES_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_LIBRARIES_LABEL_ID,
                                                                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_UPLOAD_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_UPLOAD_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_ATTACHMENT_FILTER_HEADING_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_ATTACHMENT_FILTER_HEADING_LABEL_ID,
                                                                                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_ATTACHMENT_DATE_FILTER_HEADING_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_ATTACHMENT_DATE_FILTER_HEADING_LABEL_ID,
                                                                                                                                    \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                 \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_SEARCH_INPUT_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_SEARCH_INPUT_LABEL_ID,
                                                                                                                                \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                 \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_UPLOAD_INSTRUCTION_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_UPLOAD_INSTRUCTION_LABEL_ID,
                                                                                                                                    \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                 \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_BUTTON_HERO_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_BUTTON_HERO_LABEL_ID,
                                                                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::MEDIA_MAX_UPLOAD_SIZE_LABEL_ID => $media_max_upload_size_label,

                \Theme_Options\THEME_OPTIONS_FIELDS::MY_PRODUCT_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::MY_PRODUCT_LABEL_ID,
                                                                                                                    \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::MY_PRODUCTS_LIST_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::MY_PRODUCTS_LIST_LABEL_ID,
                                                                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::ADD_PRODUCT_LIST_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::ADD_PRODUCT_LIST_LABEL_ID,
                                                                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_NAME_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_NAME_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::PRICE_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::PRICE_LABEL_ID,
                                                                                                                \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

               \Theme_Options\THEME_OPTIONS_FIELDS::STORE_DETAILS_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::STORE_DETAILS_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_LABEL_ID,
                                                                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::LOGOUT_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::LOGOUT_LABEL_ID,
                                                                                                                    \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::NEW_PASSWORD_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::NEW_PASSWORD_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::CURRENT_PASSWORD_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CURRENT_PASSWORD_LABEL_ID,
                                                                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::CONFIRM_PASSWORD_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CONFIRM_PASSWORD_LABEL_ID,
                                                                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_INFORMATION_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_INFORMATION_LABEL_ID,
                                                                                                                                \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::SAVE_CHANGES_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SAVE_CHANGES_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::ACCOUNT_INFORMATION_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::ACCOUNT_INFORMATION_LABEL_ID,
                                                                                                                                \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::EDIT_MY_ACCOUNT_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::EDIT_MY_ACCOUNT_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::CIVILITY_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CIVILITY_LABEL_ID,
                                                                                                                    \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_LAST_NAME_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_LAST_NAME_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_FIRST_NAME_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_FIRST_NAME_LABEL_ID,
                                                                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_EMAIL_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_EMAIL_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_PHONE_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_PHONE_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::SELECT_YOUR_STORE_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SELECT_YOUR_STORE_LABEL_ID,
                                                                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),
                
                \Theme_Options\THEME_OPTIONS_FIELDS::MAIN_CATEGORY_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::MAIN_CATEGORY_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_SCHEDULE_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::WINTER_SCHEDULE_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),   

                \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_OPENING_DAY_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::WINTER_OPENING_DAY_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::WINTER_CLOSING_DAY_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::WINTER_CLOSING_DAY_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_SCHEDULE_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_SCHEDULE_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_OPENING_DAY_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_OPENING_DAY_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_CLOSING_DAY_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_CLOSING_DAY_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_SCHEDULE_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_SCHEDULE_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::CLICK_AND_COLLECT_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CLICK_AND_COLLECT_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

               \Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_DELIVERY_INFO_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_DELIVERY_INFO_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::PICTURES_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::PICTURES_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

               \Theme_Options\THEME_OPTIONS_FIELDS::GEOLOCATION_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::GEOLOCATION_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::STORE_ADDRESS_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::STORE_ADDRESS_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::POSTAL_CODE_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::POSTAL_CODE_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::CITY_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CITY_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::STORE_EMAIL_ADDRESS_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::STORE_EMAIL_ADDRESS_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::STORE_PHONE_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::STORE_PHONE_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::SITE_WEB_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SITE_WEB_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::SAVE_YOUR_ACCOUNT_AND_STORE_DETAILS_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SAVE_YOUR_ACCOUNT_AND_STORE_DETAILS_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_NAME_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SHOP_NAME_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_CHOOSE_SHOP_NAME_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_CHOOSE_SHOP_NAME_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORIES_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CATEGORIES_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORY_NAME_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CATEGORY_NAME_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::CATEGORY_NOT_IN_LIST_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CATEGORY_NOT_IN_LIST_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_CATEGORY_NAME_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_CATEGORY_NAME_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_PRODUCT_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_PRODUCT_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::PUBLISH_PRODUCT_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::PUBLISH_PRODUCT_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::RESET_FORM_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::RESET_FORM_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::EMPTY_PRODUCTS_LIST_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::EMPTY_PRODUCTS_LIST_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_SUCCESS_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_SUCCESS_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::ADD_TO_WISHLIST_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::ADD_TO_WISHLIST_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),


                \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_OFFERED_BY_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_OFFERED_BY_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_ANY_PRODUCT_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_ANY_PRODUCT_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_DEFAULT_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_DEFAULT_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_PRICE_UP_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_PRICE_UP_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_PRICE_DOWN_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_PRICE_DOWN_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                 \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_NAME_AZ_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_NAME_AZ_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_NAME_ZA_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_NAME_ZA_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::WELCOME_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::WELCOME_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_ADD_PRODUCT_NOW_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_ADD_PRODUCT_NOW_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::YOU_MUST_BE_LOGIN_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::YOU_MUST_BE_LOGIN_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::CREATE_THE_NEW_STORE_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CREATE_THE_NEW_STORE_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::SUBMIT_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SUBMIT_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_PRODUCT_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_PRODUCT_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_STORE_DETAILS_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_STORE_DETAILS_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::FROM_PRICE_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::FROM_PRICE_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::ADD_YOUR_PRODUCT_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::ADD_YOUR_PRODUCT_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::FILL_OUT_ADD_PRODUCT_FORM_DESCRIPTION_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::FILL_OUT_ADD_PRODUCT_FORM_DESCRIPTION_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_STORE_INFORMATION_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_STORE_INFORMATION_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::IMPORT_PRODUCT_CATEGORY_FILE_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::IMPORT_PRODUCT_CATEGORY_FILE_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::LAST_UPDATE_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::LAST_UPDATE_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::STORE_BRAND_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::STORE_BRAND_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::NO_ADDRESS_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::NO_ADDRESS_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_ADDRESS_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SHOP_ADDRESS_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::PORTABLE_RESPONSABLE_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::PORTABLE_RESPONSABLE_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_RESPONSABLE_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_RESPONSABLE_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::SITE_INTERNET_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SITE_INTERNET_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::PAGE_FACEBOOK_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::PAGE_FACEBOOK_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::ANNUAIRE_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::ANNUAIRE_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::MASQUES_RESCUS_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::MASQUES_RESCUS_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::BAIL_SAISONNIER_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::BAIL_SAISONNIER_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

               \Theme_Options\THEME_OPTIONS_FIELDS::ENTER_A_NEW_PASSWORD_BELOW_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::ENTER_A_NEW_PASSWORD_BELOW_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_AND_REDIRECT_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_AND_REDIRECT_MSG_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::LOADING_DATA_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::LOADING_DATA_MSG_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::COMMERCANTS_MANAGEMENTS_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::COMMERCANTS_MANAGEMENTS_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                 \Theme_Options\THEME_OPTIONS_FIELDS::ADD_THE_NEW_STORE_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::ADD_THE_NEW_STORE_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                 \Theme_Options\THEME_OPTIONS_FIELDS::IMPORT_NEW_MERCHANT_FILE_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::IMPORT_NEW_MERCHANT_FILE_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::PREVIOUS_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::PREVIOUS_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::NEXT_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::NEXT_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::SHOWING_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SHOWING_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

               \Theme_Options\THEME_OPTIONS_FIELDS::TO_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::TO_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

               \Theme_Options\THEME_OPTIONS_FIELDS::OF_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::OF_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::ENTRIES_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::ENTRIES_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::EMPTY_DT_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::EMPTY_DT_MSG_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_CATEGORIES_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_CATEGORIES_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::SHOP_LISTS_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SHOP_LISTS_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::PASSWORD_RESET_MAIL_NOTICE_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::PASSWORD_RESET_MAIL_NOTICE_MSG_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::PASSWORD_RESET_MAIL_CONFIRM_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::PASSWORD_RESET_MAIL_CONFIRM_MSG_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::LOST_YOUR_PASSWORD_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::LOST_YOUR_PASSWORD_MSG_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::USER_NAME_OR_EMAIL_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::USER_NAME_OR_EMAIL_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

               \Theme_Options\THEME_OPTIONS_FIELDS::RESET_PASSWORD_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::RESET_PASSWORD_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::STORE_NOT_IN_LIST_MSG_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::STORE_NOT_IN_LIST_MSG_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID),

                \Theme_Options\THEME_OPTIONS_FIELDS::STORE_CUSTOM_NAME_LABEL_ID => \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::STORE_CUSTOM_NAME_LABEL_ID,
                                                                                                                        \Theme_Options\THEME_OPTIONS_FIELDS::MESSAGE_NOTIFICATION_SECTION_ID)                                                                                                        

                

            );

        }

    }