<?php 

    namespace Theme_Options;

    class THEME_OPTIONS_FIELDS {

        // header section
        const HEADER_SECTION_ID = 'section-header';
        const HEADER_TITLE = 'Header';
        const HEADER_DESCRIPTION = 'All header settings';

        const HEADER_SECTION_1_ID = 'header-section-1';
        const HEADER_SECTION_1_TYPE = 'section';
        const HEADER_SECTION_1_TITLE = 'Logo and background Settings';
        const HEADER_SECTION_1_DESC = '';
        const HEADER_SECTION_1_INDENT = true; 

        const HEADER_SECTION_LOGO_IMAGE_ID = 'logo-image';
        const HEADER_SECTION_LOGO_IMAGE_TYPE = 'media';
        const HEADER_SECTION_LOGO_IMAGE_TITLE = 'Logo website';
        const HEADER_SECTION_LOGO_IMAGE_DESCRIPTION = 'Please choose logo website image';

        const HEADER_SECTION_LOGO_IMAGE_MOBILE_ID = 'logo-image-mobile';
        const HEADER_SECTION_LOGO_IMAGE_MOBILE_TYPE = 'media';
        const HEADER_SECTION_LOGO_IMAGE_MOBILE_TITLE = 'Logo Mobile website';
        const HEADER_SECTION_LOGO_IMAGE_MOBILE_DESCRIPTION = 'Please choose logo mobile website image';

        const HEADER_SECTION_LOGO_MAIL_ID = 'logo-mail';
        const HEADER_SECTION_LOGO_MAIL_TYPE = 'media';
        const HEADER_SECTION_LOGO_MAIL_TITLE = 'Logo Attachment';
        const HEADER_SECTION_LOGO_MAIL_DESCRIPTION = 'Please choose logo attachment';

        const HEADER_SECTION_2_ID = 'header-section-2';
        const HEADER_SECTION_2_TYPE = 'section'; 
        const HEADER_SECTION_2_INDENT = false; 

        // message notifications section
        const MESSAGE_NOTIFICATION_SECTION_ID = 'section-message-notifications';
        const MESSAGE_NOTIFICATION_SECTION_TITLE = 'Custom message notifications settings';
        const MESSAGE_NOTIFICATION_SECTION_DESCRIPTION = 'All message notifications settings';

        const MESSAGE_NOTIFICATION_SECTION_1_ID = 'custom-message-notifications-section-1';
        const MESSAGE_NOTIFICATION_SECTION_1_TYPE = 'section';
        const MESSAGE_NOTIFICATION_SECTION_1_TITLE = 'Message notifications settings';
        const MESSAGE_NOTIFICATION_SECTION_1_DESCRIPTION = '';
        const MESSAGE_NOTIFICATION_SECTION_1_INDENT = true;

        const CHOOSE_ONE_LEAST_PRODUCT_PICTURE_REQUIRED_MSG_ID = 'choose-one-least-product-picture-required-msg';
        const CHOOSE_ONE_LEAST_PRODUCT_PICTURE_REQUIRED_MSG_TYPE = 'text';
        const CHOOSE_ONE_LEAST_PRODUCT_PICTURE_REQUIRED_MSG_TITLE = '"Choose one least product picture" required message';
        const CHOOSE_ONE_LEAST_PRODUCT_PICTURE_REQUIRED_MSG_DESCRIPTION = 'Enter a message';

        const ENTER_REQUIRED_FIELDS_MSG_ID = 'enter-required-fields-msg';
        const ENTER_REQUIRED_FIELDS_MSG_TYPE = 'text';
        const ENTER_REQUIRED_FIELDS_MSG_TITLE = '"Enter/Input required fields" required message';
        const ENTER_REQUIRED_FIELDS_MSG_DESCRIPTION = 'Enter a message';

        const ENTER_MY_SHOP_NAME_MSG_ID = 'enter-my-shop-name-msg';
        const ENTER_MY_SHOP_NAME_MSG_TYPE = 'text';
        const ENTER_MY_SHOP_NAME_MSG_TITLE = '"Enter my shop name field" required message';
        const ENTER_MY_SHOP_NAME_MSG_DESCRIPTION = 'Enter a message';

        const CHOOSE_SHOP_NAME_IN_THE_LIST_MSG_ID = 'choose-shop-name-in-the-list-msg';
        const CHOOSE_SHOP_NAME_IN_THE_LIST_MSG_TYPE = 'text';
        const CHOOSE_SHOP_NAME_IN_THE_LIST_MSG_TITLE = '"Choose shop name in the list" required message';
        const CHOOSE_SHOP_NAME_IN_THE_LIST_MSG_DESCRIPTION = 'Enter a message';

        const ENTER_MY_CATEGORY_NAME_MSG_ID = 'enter-my-category-name-msg';
        const ENTER_MY_CATEGORY_NAME_MSG_TYPE = 'text';
        const ENTER_MY_CATEGORY_NAME_MSG_TITLE = '"Enter my category name" required message';
        const ENTER_MY_CATEGORY_NAME_MSG_DESCRIPTION = 'Enter a message';

        const CHOOSE_A_PRODUCT_CATEGORY_MSG_ID = 'choose-a-product-category-msg';
        const CHOOSE_A_PRODUCT_CATEGORY_MSG_TYPE = 'text';
        const CHOOSE_A_PRODUCT_CATEGORY_MSG_TITLE = '"Choose a product category in the list" required message';
        const CHOOSE_A_PRODUCT_CATEGORY_MSG_DESCRIPTION = 'Enter a message';

        const AJAX_DEFAULT_SUCCESS_MSG_ID = 'ajax-default-success-msg';
        const AJAX_DEFAULT_SUCCESS_MSG_TYPE = 'text';
        const AJAX_DEFAULT_SUCCESS_MSG_TITLE = '"Javascript ajax success" message';
        const AJAX_DEFAULT_SUCCESS_MSG_DESCRIPTION = 'Enter a message';

        const AJAX_DEFAULT_ERROR_MSG_ID = 'ajax-default-error-msg';
        const AJAX_DEFAULT_ERROR_MSG_TYPE = 'text';
        const AJAX_DEFAULT_ERROR_MSG_TITLE = '"Javascript ajax error" message';
        const AJAX_DEFAULT_ERROR_MSG_DESCRIPTION = 'Enter a message';

        const INCCORECT_SAME_PASSWORD_ERROR_MSG_ID = 'inccorect-same-password-error-msg';
        const INCCORECT_SAME_PASSWORD_ERROR_MSG_TYPE = 'text';
        const INCCORECT_SAME_PASSWORD_ERROR_MSG_TITLE = '"Incorrect same password" message';
        const INCCORECT_SAME_PASSWORD_ERROR_MSG_DESCRIPTION = 'Enter a message';

        const THANKS_FOR_PUBLISH_PRODUCT_MSG_ID = 'thanks-for-publish-product-msg';
        const THANKS_FOR_PUBLISH_PRODUCT_MSG_TYPE = 'text';
        const THANKS_FOR_PUBLISH_PRODUCT_MSG_TITLE = '"Thanks for publish product success" message';
        const THANKS_FOR_PUBLISH_PRODUCT_MSG_DESCRIPTION = 'Enter a message';

        const PUBLISHING_PRODUCT_MSG_ID = 'publishing-product-msg';
        const PUBLISHING_PRODUCT_MSG_TYPE = 'text';
        const PUBLISHING_PRODUCT_MSG_TITLE = '"Publishing product success" message';
        const PUBLISHING_PRODUCT_MSG_DESCRIPTION = 'Enter a message';

        const MEDIA_LIBRARIES_LABEL_ID = 'media-libraries-label';
        const MEDIA_LIBRARIES_LABEL_TYPE = 'text';
        const MEDIA_LIBRARIES_LABEL_TITLE = '"Media libraries" label';
        const MEDIA_LIBRARIES_LABEL_DESCRIPTION = 'Enter a label';

        const MEDIA_UPLOAD_LABEL_ID = 'media-upload-label';
        const MEDIA_UPLOAD_LABEL_TYPE = 'text';
        const MEDIA_UPLOAD_LABEL_TITLE = '"Media upload" label';
        const MEDIA_UPLOAD_LABEL_DESCRIPTION = 'Enter a label';

        const MEDIA_ATTACHMENT_FILTER_HEADING_LABEL_ID = 'media-attachment-filter-heading-label'; 
        const MEDIA_ATTACHMENT_FILTER_HEADING_LABEL_TYPE = 'text'; 
        const MEDIA_ATTACHMENT_FILTER_HEADING_LABEL_TITLE = '"Media attachment filter heading" label'; 
        const MEDIA_ATTACHMENT_FILTER_HEADING_LABEL_DESCRIPTION = 'Enter a label';  
        
        const MEDIA_ATTACHMENT_DATE_FILTER_HEADING_LABEL_ID = 'media-attachment-date-filter-heading-label'; 
        const MEDIA_ATTACHMENT_DATE_FILTER_HEADING_LABEL_TYPE = 'text'; 
        const MEDIA_ATTACHMENT_DATE_FILTER_HEADING_LABEL_TITLE = '"Media attachment date filter heading" label'; 
        const MEDIA_ATTACHMENT_DATE_FILTER_HEADING_LABEL_DESCRIPTION = 'Enter a label';  

        const MEDIA_SEARCH_INPUT_LABEL_ID = 'media-search-input-label';
        const MEDIA_SEARCH_INPUT_LABEL_TYPE = 'text';
        const MEDIA_SEARCH_INPUT_LABEL_TITLE = '"Media search input" label';
        const MEDIA_SEARCH_INPUT_LABEL_DESCRIPTION = 'Enter a label';

        const MEDIA_UPLOAD_INSTRUCTION_LABEL_ID = 'media-upload-instruction-label';
        const MEDIA_UPLOAD_INSTRUCTION_LABEL_TYPE = 'text';
        const MEDIA_UPLOAD_INSTRUCTION_LABEL_TITLE = '"Media upload instruction" label';
        const MEDIA_UPLOAD_INSTRUCTION_LABEL_DESCRIPTION = 'Enter a label';

        const MEDIA_BUTTON_HERO_LABEL_ID = 'media-button-hero-label';
        const MEDIA_BUTTON_HERO_LABEL_TYPE = 'text';
        const MEDIA_BUTTON_HERO_LABEL_TITLE = '"Media button hero" label';
        const MEDIA_BUTTON_HERO_LABEL_DESCRIPTION = 'Enter a label';

        const MEDIA_MAX_UPLOAD_SIZE_LABEL_ID = 'media-max-upload-size-label';
        const MEDIA_MAX_UPLOAD_SIZE_LABEL_TYPE = 'text';
        const MEDIA_MAX_UPLOAD_SIZE_LABEL_TITLE = '"Media max upload size" label';
        const MEDIA_MAX_UPLOAD_SIZE_LABEL_DESCRIPTION = 'Enter a label';

        const MY_PRODUCT_LABEL_ID = 'my-product-label';
        const MY_PRODUCT_LABEL_TYPE = 'text';
        const MY_PRODUCT_LABEL_TITLE = '"My product" label';
        const MY_PRODUCT_LABEL_DESCRIPTION = 'Enter a label';

        const MY_PRODUCTS_LIST_LABEL_ID = 'my-products-list-label';
        const MY_PRODUCTS_LIST_LABEL_TYPE = 'text';
        const MY_PRODUCTS_LIST_LABEL_TITLE = '"My products list" label';
        const MY_PRODUCTS_LIST_LABEL_DESCRIPTION = 'Enter a label';

        const ADD_PRODUCT_LIST_LABEL_ID = 'add-product-list-label';
        const ADD_PRODUCT_LIST_LABEL_TYPE = 'text';
        const ADD_PRODUCT_LIST_LABEL_TITLE = '"Add product" label';
        const ADD_PRODUCT_LIST_LABEL_DESCRIPTION = 'Enter a label';

        const PRODUCT_NAME_LABEL_ID = 'product-name-label';
        const PRODUCT_NAME_LABEL_TYPE = 'text';
        const PRODUCT_NAME_LABEL_TITLE = '"Product name" label';
        const PRODUCT_NAME_LABEL_DESCRIPTION = 'Enter a label';

        const PRICE_LABEL_ID = 'price-label';
        const PRICE_LABEL_TYPE  = 'text';
        const PRICE_LABEL_TITLE = '"Price" label';
        const PRICE_LABEL_DESCRIPTION = 'Enter a label';

        const STORE_DETAILS_LABEL_ID = 'store-details-label';
        const STORE_DETAILS_LABEL_TYPE = 'text';
        const STORE_DETAILS_LABEL_TITLE = '"Store details" label';
        const STORE_DETAILS_LABEL_DESCRIPTION = 'Enter a label';

        const CHANGE_PASSWORD_LABEL_ID = 'change-password-label';
        const CHANGE_PASSWORD_LABEL_TYPE = 'text';
        const CHANGE_PASSWORD_LABEL_TITLE = '"Change password" label';
        const CHANGE_PASSWORD_LABEL_DESCRIPTION = 'Enter a label';

        const LOGOUT_LABEL_ID = 'logout-label';
        const LOGOUT_LABEL_TYPE = 'text';
        const LOGOUT_LABEL_TITLE = '"Logout" label';
        const LOGOUT_LABEL_DESCRIPTION = 'Enter a label';

        const NEW_PASSWORD_LABEL_ID = 'new-password-label';
        const NEW_PASSWORD_LABEL_TYPE = 'text';
        const NEW_PASSWORD_LABEL_TITLE = '"New password" label';
        const NEW_PASSWORD_LABEL_DESCRIPTION = 'Enter a label';

        const CURRENT_PASSWORD_LABEL_ID = 'current-password-label';
        const CURRENT_PASSWORD_LABEL_TYPE = 'text';
        const CURRENT_PASSWORD_LABEL_TITLE = '"Current password" label';
        const CURRENT_PASSWORD_LABEL_DESCRIPTION = 'Enter a label';

        const CONFIRM_PASSWORD_LABEL_ID = 'confirm-password-label';
        const CONFIRM_PASSWORD_LABEL_TYPE = 'text';
        const CONFIRM_PASSWORD_LABEL_TITLE = '"Confirm password" label';
        const CONFIRM_PASSWORD_LABEL_DESCRIPTION = 'Enter a label';

        const UPDATE_INFORMATION_LABEL_ID = 'update-information-label';
        const UPDATE_INFORMATION_LABEL_TYPE = 'text';
        const UPDATE_INFORMATION_LABEL_TITLE = '"Update information" label';
        const UPDATE_INFORMATION_LABEL_DESCRIPTION = 'Enter a label';

        const SAVE_CHANGES_LABEL_ID = 'save-changes-label';
        const SAVE_CHANGES_LABEL_TYPE = 'text';
        const SAVE_CHANGES_LABEL_TITLE = '"Save changes" label';
        const SAVE_CHANGES_LABEL_DESCRIPTION = 'Enter a label'; 

        const ACCOUNT_INFORMATION_LABEL_ID = 'account-information-label';
        const ACCOUNT_INFORMATION_LABEL_TYPE = 'text';
        const ACCOUNT_INFORMATION_LABEL_TITLE = '"Save changes" label';
        const ACCOUNT_INFORMATION_LABEL_DESCRIPTION = 'Enter a label';

        const EDIT_MY_ACCOUNT_LABEL_ID = 'edit-my-account-label';
        const EDIT_MY_ACCOUNT_LABEL_TYPE = 'text';
        const EDIT_MY_ACCOUNT_LABEL_TITLE = '"Save changes" label';
        const EDIT_MY_ACCOUNT_LABEL_DESCRIPTION = 'Enter a label';

        const CIVILITY_LABEL_ID = 'civility-label';
        const CIVILITY_LABEL_TYPE = 'text';
        const CIVILITY_LABEL_TITLE = '"Save changes" label';
        const CIVILITY_LABEL_DESCRIPTION = 'Enter a label';

        const MANAGER_LAST_NAME_LABEL_ID = 'manager-last-name-label';
        const MANAGER_LAST_NAME_LABEL_TYPE = 'text';
        const MANAGER_LAST_NAME_LABEL_TITLE = '"Save changes" label';
        const MANAGER_LAST_NAME_LABEL_DESCRIPTION = 'Enter a label';

        const MANAGER_FIRST_NAME_LABEL_ID = 'manager-first-name-label';
        const MANAGER_FIRST_NAME_LABEL_TYPE = 'text';
        const MANAGER_FIRST_NAME_LABEL_TITLE = '"Save changes" label';
        const MANAGER_FIRST_NAME_LABEL_DESCRIPTION = 'Enter a label'; 

        const MANAGER_EMAIL_LABEL_ID = 'manager-email-label';
        const MANAGER_EMAIL_LABEL_TYPE = 'text';
        const MANAGER_EMAIL_LABEL_TITLE = '"Save changes" label';
        const MANAGER_EMAIL_LABEL_DESCRIPTION = 'Enter a label';

        const MANAGER_PHONE_LABEL_ID = 'manager-phone-label';
        const MANAGER_PHONE_LABEL_TYPE = 'text';
        const MANAGER_PHONE_LABEL_TITLE = '"Manager phone" label';
        const MANAGER_PHONE_LABEL_DESCRIPTION = 'Enter a label';

        const SELECT_YOUR_STORE_LABEL_ID = 'select-your-store-label';
        const SELECT_YOUR_STORE_LABEL_TYPE = 'text';
        const SELECT_YOUR_STORE_LABEL_TITLE = '"Select your store" label';
        const SELECT_YOUR_STORE_LABEL_DESCRIPTION = 'Enter a label';

        const MAIN_CATEGORY_LABEL_ID = 'main-category-label';
        const MAIN_CATEGORY_LABEL_TYPE = 'text';
        const MAIN_CATEGORY_LABEL_TITLE = '"Main category" label';
        const MAIN_CATEGORY_LABEL_DESCRIPTION = 'Enter a label';

        const DESCRIPTION_LABEL_ID = 'description-label';
        const DESCRIPTION_LABEL_TYPE = 'text';
        const DESCRIPTION_LABEL_TITLE = '"Description" label';
        const DESCRIPTION_LABEL_DESCRIPTION = 'Enter a label';

        const WINTER_SCHEDULE_LABEL_ID = 'winter-schedule-label';
        const WINTER_SCHEDULE_LABEL_TYPE = 'text';
        const WINTER_SCHEDULE_LABEL_TITLE = '"Winter schedule" label';
        const WINTER_SCHEDULE_LABEL_DESCRIPTION = 'Enter a label';

        const WINTER_OPENING_DAY_LABEL_ID = 'winter-opening-day-label';
        const WINTER_OPENING_DAY_LABEL_TYPE = 'text';
        const WINTER_OPENING_DAY_LABEL_TITLE = '"Winter opening days" label';
        const WINTER_OPENING_DAY_LABEL_DESCRIPTION = 'Enter a label';

        const WINTER_CLOSING_DAY_LABEL_ID = 'winter-closing-day-label';
        const WINTER_CLOSING_DAY_LABEL_TYPE = 'text';
        const WINTER_CLOSING_DAY_LABEL_TITLE = '"Winter closing days" label';
        const WINTER_CLOSING_DAY_LABEL_DESCRIPTION = 'Enter a label';

        const SUMMER_SCHEDULE_LABEL_ID = 'summer-schedule-label';
        const SUMMER_SCHEDULE_LABEL_TYPE = 'text';
        const SUMMER_SCHEDULE_LABEL_TITLE = '"Summer schedules" label';
        const SUMMER_SCHEDULE_LABEL_DESCRIPTION = 'Enter a label';

        const SUMMER_OPENING_DAY_LABEL_ID = 'summer-opening-day-label';
        const SUMMER_OPENING_DAY_LABEL_TYPE = 'text';
        const SUMMER_OPENING_DAY_LABEL_TITLE = '"Summer opening day" label';
        const SUMMER_OPENING_DAY_LABEL_DESCRIPTION = 'Enter a label';

        const SUMMER_CLOSING_DAY_LABEL_ID = 'summer-closing-day-label';
        const SUMMER_CLOSING_DAY_LABEL_TYPE = 'text';
        const SUMMER_CLOSING_DAY_LABEL_TITLE = '"Summer closing day" label';
        const SUMMER_CLOSING_DAY_LABEL_DESCRIPTION = 'Enter a label';

        const SPECIAL_SCHEDULE_LABEL_ID = 'special-schedule-label';
        const SPECIAL_SCHEDULE_LABEL_TYPE = 'text';
        const SPECIAL_SCHEDULE_LABEL_TITLE = '"Special schedule" label';
        const SPECIAL_SCHEDULE_LABEL_DESCRIPTION = 'Enter a label';

        const CLICK_AND_COLLECT_LABEL_ID = 'click-and-collect-label';
        const CLICK_AND_COLLECT_LABEL_TYPE = 'text';
        const CLICK_AND_COLLECT_LABEL_TITLE = '"Click & Collect" label';
        const CLICK_AND_COLLECT_LABEL_DESCRIPTION = 'Enter a label';

        const DELIVERY_LABEL_ID = 'delivery-label';
        const DELIVERY_LABEL_TYPE = 'text';
        const DELIVERY_LABEL_TITLE = '"Delivery" label';
        const DELIVERY_LABEL_DESCRIPTION = 'Enter a label';

        const SPECIAL_DELIVERY_INFO_LABEL_ID = 'special-delivery-info-label';
        const SPECIAL_DELIVERY_INFO_LABEL_TYPE = 'text';
        const SPECIAL_DELIVERY_INFO_LABEL_TITLE = '"Special delivery info" label';
        const SPECIAL_DELIVERY_INFO_LABEL_DESCRIPTION = 'Enter a label';

        const PICTURES_LABEL_ID = 'pictures-label';
        const PICTURES_LABEL_TYPE = 'text';
        const PICTURES_LABEL_TITLE = '"Pictures" label';
        const PICTURES_LABEL_DESCRIPTION = 'Enter a label';

        const GEOLOCATION_LABEL_ID = 'geolocation-label';
        const GEOLOCATION_LABEL_TYPE = 'text';
        const GEOLOCATION_LABEL_TITLE = '"Geolocation" label';
        const GEOLOCATION_LABEL_DESCRIPTION = 'Enter a label';

        const STORE_ADDRESS_LABEL_ID = 'store-address-label';
        const STORE_ADDRESS_LABEL_TYPE = 'text';
        const STORE_ADDRESS_LABEL_TITLE = '"Store address" label';
        const STORE_ADDRESS_LABEL_DESCRIPTION = 'Enter a label';

        const POSTAL_CODE_LABEL_ID = 'postal-code-label';
        const POSTAL_CODE_LABEL_TYPE = 'text';
        const POSTAL_CODE_LABEL_TITLE = '"Postal code" label';
        const POSTAL_CODE_LABEL_DESCRIPTION = 'Enter a label';

        const CITY_LABEL_ID = 'city-label';
        const CITY_LABEL_TYPE = 'text';
        const CITY_LABEL_TITLE = '"City" label';
        const CITY_LABEL_DESCRIPTION = 'Enter a label';

        const STORE_EMAIL_ADDRESS_LABEL_ID = 'store-email-address-label';
        const STORE_EMAIL_ADDRESS_LABEL_TYPE = 'text';
        const STORE_EMAIL_ADDRESS_LABEL_TITLE = '"Store email address" label';
        const STORE_EMAIL_ADDRESS_LABEL_DESCRIPTION = 'Enter a label';

        const STORE_PHONE_LABEL_ID = 'store-phone-label';
        const STORE_PHONE_LABEL_TYPE = 'text';
        const STORE_PHONE_LABEL_TITLE = '"Store phone" label';
        const STORE_PHONE_LABEL_DESCRIPTION = 'Enter a label';    
        
        const SITE_WEB_LABEL_ID = 'site-web-label';
        const SITE_WEB_LABEL_TYPE = 'text';
        const SITE_WEB_LABEL_TITLE = '"Site web" label';
        const SITE_WEB_LABEL_DESCRIPTION = 'Enter a label';  
        
        const SAVE_YOUR_ACCOUNT_AND_STORE_DETAILS_LABEL_ID = 'save-your-account-and-store-details-label';
        const SAVE_YOUR_ACCOUNT_AND_STORE_DETAILS_LABEL_TYPE = 'text';
        const SAVE_YOUR_ACCOUNT_AND_STORE_DETAILS_LABEL_TITLE = '"Save your account and store details" label';
        const SAVE_YOUR_ACCOUNT_AND_STORE_DETAILS_LABEL_DESCRIPTION = 'Enter a label'; 
        
        const SHOP_NAME_LABEL_ID = 'shop-name-label';
        const SHOP_NAME_LABEL_TYPE = 'text';
        const SHOP_NAME_LABEL_TITLE = '"Shop name" label';
        const SHOP_NAME_LABEL_DESCRIPTION = 'Enter a label';  

        const PLEASE_CHOOSE_SHOP_NAME_LABEL_ID = 'please-choose-shop-name-label';
        const PLEASE_CHOOSE_SHOP_NAME_LABEL_TYPE = 'text';
        const PLEASE_CHOOSE_SHOP_NAME_LABEL_TITLE= '"Please choose shop name" label';
        const PLEASE_CHOOSE_SHOP_NAME_LABEL_DESCRIPTION = 'Enter a label'; 
        
        const CATEGORIES_LABEL_ID = 'shop-name-label';
        const CATEGORIES_LABEL_TYPE = 'text';
        const CATEGORIES_LABEL_TITLE = '"Categories" label';
        const CATEGORIES_LABEL_DESCRIPTION = 'Enter a label';
        
        const CATEGORY_NAME_LABEL_ID = 'category-name-label';
        const CATEGORY_NAME_LABEL_TYPE = 'text';
        const CATEGORY_NAME_LABEL_TITLE = '"Category name" label';
        const CATEGORY_NAME_LABEL_DESCRIPTION = 'Enter a label';

        const CATEGORY_NOT_IN_LIST_LABEL_ID = 'category-not-in-list-label';
        const CATEGORY_NOT_IN_LIST_LABEL_TYPE = 'text';
        const CATEGORY_NOT_IN_LIST_LABEL_TITLE = '"Category not in list" label';
        const CATEGORY_NOT_IN_LIST_LABEL_DESCRIPTION = 'Enter a label';

        const ENTER_MY_CATEGORY_NAME_LABEL_ID = 'enter-my-category-name-label';
        const ENTER_MY_CATEGORY_NAME_LABEL_TYPE = 'text';
        const ENTER_MY_CATEGORY_NAME_LABEL_TITLE = '"Enter my category name" label';
        const ENTER_MY_CATEGORY_NAME_LABEL_DESCRIPTION = 'Enter a label';

        const DESCRIPTION_PRODUCT_LABEL_ID = 'description-product-label';
        const DESCRIPTION_PRODUCT_LABEL_TYPE = 'text';
        const DESCRIPTION_PRODUCT_LABEL_TITLE = '"Description product" label';
        const DESCRIPTION_PRODUCT_LABEL_DESCRIPTION = 'Enter a label';

        const PUBLISH_PRODUCT_LABEL_ID = 'publish-product-label';
        const PUBLISH_PRODUCT_LABEL_TYPE = 'text';
        const PUBLISH_PRODUCT_LABEL_TITLE = '"Publish product" label';
        const PUBLISH_PRODUCT_LABEL_DESCRIPTION = 'Enter a label';

        const RESET_FORM_LABEL_ID = 'reset-form-label';
        const RESET_FORM_LABEL_TYPE = 'text';
        const RESET_FORM_LABEL_TITLE = '"Reset form" label';
        const RESET_FORM_LABEL_DESCRIPTION = 'Enter a label';

        const EMPTY_PRODUCTS_LIST_LABEL_ID = 'empty-products-list-label';
        const EMPTY_PRODUCTS_LIST_LABEL_TYPE = 'text';
        const EMPTY_PRODUCTS_LIST_LABEL_TITLE = '"Empty products list" label';
        const EMPTY_PRODUCTS_LIST_LABEL_DESCRIPTION = 'Enter a label';

        const CHANGE_PASSWORD_SUCCESS_LABEL_ID = 'change-password-success-label';
        const CHANGE_PASSWORD_SUCCESS_LABEL_TYPE = 'text';
        const CHANGE_PASSWORD_SUCCESS_LABEL_TITLE = '"Change password success" label';
        const CHANGE_PASSWORD_SUCCESS_LABEL_DESCRIPTION = 'Enter a label';

        const ADD_TO_WISHLIST_LABEL_ID = 'add-to-wishlist-label';
        const ADD_TO_WISHLIST_LABEL_TYPE = 'text';
        const ADD_TO_WISHLIST_LABEL_TITLE = '"Add to wishlist" label';
        const ADD_TO_WISHLIST_LABEL_DESCRIPTION = 'Enter a label';

        const PRODUCT_OFFERED_BY_LABEL_ID = 'product-offered-by-label';
        const PRODUCT_OFFERED_BY_LABEL_TYPE = 'text';
        const PRODUCT_OFFERED_BY_LABEL_TITLE = '"Product offered by" label';
        const PRODUCT_OFFERED_BY_LABEL_DESCRIPTION = 'Enter a label';

        const NOT_FOUND_ANY_PRODUCT_LABEL_ID = 'not-found-any-product-label';
        const NOT_FOUND_ANY_PRODUCT_LABEL_TYPE = 'text';
        const NOT_FOUND_ANY_PRODUCT_LABEL_TITLE = '"Not found any product" label';
        const NOT_FOUND_ANY_PRODUCT_LABEL_DESCRIPTION = 'Enter a label';

        const ORDER_PRODUCT_DEFAULT_LABEL_ID = 'order-product-default-label';
        const ORDER_PRODUCT_DEFAULT_LABEL_TYPE = 'text';
        const ORDER_PRODUCT_DEFAULT_LABEL_TITLE = '"Order product default" label';
        const ORDER_PRODUCT_DEFAULT_LABEL_DESCRIPTION = 'Enter a label';

        const ORDER_PRODUCT_PRICE_UP_LABEL_ID = 'order-product-price-up-label';
        const ORDER_PRODUCT_PRICE_UP_LABEL_TYPE = 'text';
        const ORDER_PRODUCT_PRICE_UP_LABEL_TITLE = '"Order product price up" label';
        const ORDER_PRODUCT_PRICE_UP_LABEL_DESCRIPTION = 'Enter a label';

        const ORDER_PRODUCT_PRICE_DOWN_LABEL_ID = 'order-product-price-down-label';
        const ORDER_PRODUCT_PRICE_DOWN_LABEL_TYPE = 'text';
        const ORDER_PRODUCT_PRICE_DOWN_LABEL_TITLE = '"Order product price down" label';
        const ORDER_PRODUCT_PRICE_DOWN_LABEL_DESCRIPTION = 'Enter a label';

        const ORDER_PRODUCT_NAME_AZ_LABEL_ID = 'order-product-name-az-label-label';
        const ORDER_PRODUCT_NAME_AZ_LABEL_TYPE = 'text';
        const ORDER_PRODUCT_NAME_AZ_LABEL_TITLE = '"Order product name A-Z" label';
        const ORDER_PRODUCT_NAME_AZ_LABEL_DESCRIPTION = 'Enter a label';

        const ORDER_PRODUCT_NAME_ZA_LABEL_ID = 'order-product-name-za-label-label';
        const ORDER_PRODUCT_NAME_ZA_LABEL_TYPE = 'text';
        const ORDER_PRODUCT_NAME_ZA_LABEL_TITLE = '"Order product name Z-A" label';
        const ORDER_PRODUCT_NAME_ZA_LABEL_DESCRIPTION = 'Enter a label';

        const WELCOME_LABEL_ID = 'welcome-label';
        const WELCOME_LABEL_TYPE = 'text';
        const WELCOME_LABEL_TITLE = '"Welcome" label';
        const WELCOME_LABEL_DESCRIPTION = 'Enter a label';

        const PLEASE_ADD_PRODUCT_NOW_LABEL_ID = 'please-add-product-now-label';
        const PLEASE_ADD_PRODUCT_NOW_LABEL_TYPE = 'text';
        const PLEASE_ADD_PRODUCT_NOW_LABEL_TITLE = '"Please add product now" label';
        const PLEASE_ADD_PRODUCT_NOW_LABEL_DESCRIPTION = 'Enter a label';

        const YOU_MUST_BE_LOGIN_LABEL_ID = 'you-must-be-login-label';
        const YOU_MUST_BE_LOGIN_LABEL_TYPE = 'text';
        const YOU_MUST_BE_LOGIN_LABEL_TITLE = '"You must be login" label';
        const YOU_MUST_BE_LOGIN_LABEL_DESCRIPTION = 'Enter a label';

        const CREATE_THE_NEW_STORE_LABEL_ID = 'create-the-new-store-label';
        const CREATE_THE_NEW_STORE_LABEL_TYPE = 'text';
        const CREATE_THE_NEW_STORE_LABEL_TITLE = '"Create the new store" label';
        const CREATE_THE_NEW_STORE_LABEL_DESCRIPTION = 'Enter a label';

        const SUBMIT_LABEL_ID = 'submit-label';
        const SUBMIT_LABEL_TYPE = 'text';
        const SUBMIT_LABEL_TITLE = '"Submit" label';
        const SUBMIT_LABEL_DESCRIPTION = 'Enter a label';

        const UPDATE_PRODUCT_LABEL_ID = 'update-product-label';
        const UPDATE_PRODUCT_LABEL_TYPE = 'text';
        const UPDATE_PRODUCT_LABEL_TITLE = '"Update product" label';
        const UPDATE_PRODUCT_LABEL_DESCRIPTION = 'Enter a label';

        const UPDATE_STORE_DETAILS_LABEL_ID = 'update-store-details-label';
        const UPDATE_STORE_DETAILS_LABEL_TYPE = 'text';
        const UPDATE_STORE_DETAILS_LABEL_TITLE = '"Update store details" label';
        const UPDATE_STORE_DETAILS_LABEL_DESCRIPTION = 'Enter a label';

        const FROM_PRICE_LABEL_ID = 'from-price-label';
        const FROM_PRICE_LABEL_TYPE = 'text';
        const FROM_PRICE_LABEL_TITLE = '"From price" label';
        const FROM_PRICE_LABEL_DESCRIPTION = 'Enter a label';

        const ADD_YOUR_PRODUCT_LABEL_ID = 'add-your-product-label';
        const ADD_YOUR_PRODUCT_LABEL_TYPE = 'text';
        const ADD_YOUR_PRODUCT_LABEL_TITLE = '"Add your product" label';
        const ADD_YOUR_PRODUCT_LABEL_DESCRIPTION = 'Enter a label';

        const FILL_OUT_ADD_PRODUCT_FORM_DESCRIPTION_LABEL_ID = 'fill-out-add-product-form-description-label';
        const FILL_OUT_ADD_PRODUCT_FORM_DESCRIPTION_LABEL_TYPE = 'text';
        const FILL_OUT_ADD_PRODUCT_FORM_DESCRIPTION_LABEL_TITLE = '"Fill out add product form description" message';
        const FILL_OUT_ADD_PRODUCT_FORM_DESCRIPTION_LABEL_DESCRIPTION = 'Enter a label';

        const NOT_FOUND_STORE_INFORMATION_LABEL_ID = 'not-found-store-information-label';
        const NOT_FOUND_STORE_INFORMATION_LABEL_TYPE = 'text';
        const NOT_FOUND_STORE_INFORMATION_LABEL_TITLE = '"Not found store information" message';
        const NOT_FOUND_STORE_INFORMATION_LABEL_DESCRIPTION = 'Enter a label';

        const IMPORT_PRODUCT_CATEGORY_FILE_LABEL_ID = 'import-product-category-file-label';
        const IMPORT_PRODUCT_CATEGORY_FILE_LABEL_TYPE = 'text';
        const IMPORT_PRODUCT_CATEGORY_FILE_LABEL_TITLE = '"Import product category file" label';
        const IMPORT_PRODUCT_CATEGORY_FILE_LABEL_DESCRIPTION = 'Enter a label';

        const UPDATE_LABEL_ID = 'update-label';
        const UPDATE_LABEL_TYPE = 'text';
        const UPDATE_LABEL_TITLE = '"Update" label';
        const UPDATE_LABEL_DESCRIPTION = 'Enter a label';

        const LAST_UPDATE_LABEL_ID = 'last-update-label';
        const LAST_UPDATE_LABEL_TYPE = 'text';
        const LAST_UPDATE_LABEL_TITLE = '"Last update" label';
        const LAST_UPDATE_LABEL_DESCRIPTION = 'Enter a label';

        const STORE_BRAND_LABEL_ID = 'store-brand-label';
        const STORE_BRAND_LABEL_TYPE = 'text';
        const STORE_BRAND_LABEL_TITLE = '"Store brand" label';
        const STORE_BRAND_LABEL_DESCRIPTION = 'Enter a label';

        const NO_ADDRESS_LABEL_ID = 'no-address-label';
        const NO_ADDRESS_LABEL_TYPE = 'text';
        const NO_ADDRESS_LABEL_TITLE = '"No address" label';
        const NO_ADDRESS_LABEL_DESCRIPTION = 'Enter a label';

        const SHOP_ADDRESS_LABEL_ID = 'shop-address-label';
        const SHOP_ADDRESS_LABEL_TYPE = 'text';
        const SHOP_ADDRESS_LABEL_TITLE = '"Shop address" label';
        const SHOP_ADDRESS_LABEL_DESCRIPTION = 'Enter a label';

        const PORTABLE_RESPONSABLE_LABEL_ID = 'portable-responsable-label';
        const PORTABLE_RESPONSABLE_LABEL_TYPE = 'text';
        const PORTABLE_RESPONSABLE_LABEL_TITLE = '"Portable responsable" label';
        const PORTABLE_RESPONSABLE_LABEL_DESCRIPTION = 'Enter a label';

        const EMAIL_RESPONSABLE_LABEL_ID = 'email-responsable-label';
        const EMAIL_RESPONSABLE_LABEL_TYPE = 'text';
        const EMAIL_RESPONSABLE_LABEL_TITLE = '"Email responsable" label';
        const EMAIL_RESPONSABLE_LABEL_DESCRIPTION = 'Enter a label';

        const SITE_INTERNET_LABEL_ID = 'site-internet-label';
        const SITE_INTERNET_LABEL_TYPE = 'text';
        const SITE_INTERNET_LABEL_TITLE = '"Site internet" label';
        const SITE_INTERNET_LABEL_DESCRIPTION = 'Enter a label';

        const PAGE_FACEBOOK_LABEL_ID = 'page-facebook-label';
        const PAGE_FACEBOOK_LABEL_TYPE = 'text';
        const PAGE_FACEBOOK_LABEL_TITLE = '"Page facebook" label';
        const PAGE_FACEBOOK_LABEL_DESCRIPTION = 'Enter a label';

        const ANNUAIRE_LABEL_ID = 'annuaire-label';
        const ANNUAIRE_LABEL_TYPE = 'text';
        const ANNUAIRE_LABEL_TITLE = '"Annuaire" label';
        const ANNUAIRE_LABEL_DESCRIPTION = 'Enter a label';

        const MASQUES_RESCUS_LABEL_ID = 'masques-rescus-label';
        const MASQUES_RESCUS_LABEL_TYPE = 'text';
        const MASQUES_RESCUS_LABEL_TITLE = '"Masques rescus" label';
        const MASQUES_RESCUS_LABEL_DESCRIPTION = 'Enter a label';

        const BAIL_SAISONNIER_LABEL_ID = 'bail-saisonnier-label';
        const BAIL_SAISONNIER_LABEL_TYPE = 'text';
        const BAIL_SAISONNIER_LABEL_TITLE = '"Bail Saisonnier" label';
        const BAIL_SAISONNIER_LABEL_DESCRIPTION = 'Enter a label';

        const ENTER_A_NEW_PASSWORD_BELOW_LABEL_ID = 'enter-a-new-password-below-label';
        const ENTER_A_NEW_PASSWORD_BELOW_LABEL_TYPE = 'text';
        const ENTER_A_NEW_PASSWORD_BELOW_LABEL_TITLE = '"Enter a new password below" label';
        const ENTER_A_NEW_PASSWORD_BELOW_LABEL_DESCRIPTION = 'Enter a label';

        const CHANGE_PASSWORD_AND_REDIRECT_MSG_ID = 'change-password-and-redirect-msg';
        const CHANGE_PASSWORD_AND_REDIRECT_MSG_TYPE = 'text';
        const CHANGE_PASSWORD_AND_REDIRECT_MSG_TITLE = '"Change password success and redirect" message';
        const CHANGE_PASSWORD_AND_REDIRECT_MSG_DESCRIPTION = 'Enter a message';

        const LOADING_DATA_MSG_ID = 'loading-data-msg';
        const LOADING_DATA_MSG_TYPE = 'text';
        const LOADING_DATA_MSG_TITLE = '"Loading data" message';
        const LOADING_DATA_MSG_DESCRIPTION = 'Enter a message';

        const COMMERCANTS_MANAGEMENTS_LABEL_ID = 'commercants-managements-label';
        const COMMERCANTS_MANAGEMENTS_LABEL_TYPE = 'text';
        const COMMERCANTS_MANAGEMENTS_LABEL_TITLE = '"Commercants Managements" label';
        const COMMERCANTS_MANAGEMENTS_LABEL_DESCRIPTION = 'Enter a label';

        const ADD_THE_NEW_STORE_LABEL_ID = 'add-the-new-store-label';
        const ADD_THE_NEW_STORE_LABEL_TYPE = 'text';
        const ADD_THE_NEW_STORE_LABEL_TITLE = '"Add the new store" label';
        const ADD_THE_NEW_STORE_LABEL_DESCRIPTION = 'Enter a label';

        const IMPORT_NEW_MERCHANT_FILE_LABEL_ID = 'import-new-merchant-file-label';
        const IMPORT_NEW_MERCHANT_FILE_LABEL_TYPE = 'text';
        const IMPORT_NEW_MERCHANT_FILE_LABEL_TITLE = '"Import new merchant file" label';
        const IMPORT_NEW_MERCHANT_FILE_LABEL_DESCRIPTION = 'Enter a label';

        const SEARCH_LABEL_ID = 'search-label';
        const SEARCH_LABEL_TYPE = 'text';
        const SEARCH_LABEL_TITLE = '"Search" label';
        const SEARCH_LABEL_DESCRIPTION = 'Enter a label';

        const PREVIOUS_LABEL_ID = 'previous-label';
        const PREVIOUS_LABEL_TYPE = 'text';
        const PREVIOUS_LABEL_TITLE = '"Previous" label';
        const PREVIOUS_LABEL_DESCRIPTION = 'Enter a label';

        const NEXT_LABEL_ID = 'next-label';
        const NEXT_LABEL_TYPE = 'text';
        const NEXT_LABEL_TITLE = '"Next" label';
        const NEXT_LABEL_DESCRIPTION = 'Enter a label';

        const SHOWING_LABEL_ID = 'showing-label';
        const  SHOWING_LABEL_TYPE = 'text';
        const  SHOWING_LABEL_TITLE = '"Showing" label';
        const  SHOWING_LABEL_DESCRIPTION = 'Enter a label';

        const TO_LABEL_ID = 'to-label';
        const  TO_LABEL_TYPE = 'text';
        const  TO_LABEL_TITLE = '"to" label';
        const  TO_LABEL_DESCRIPTION = 'Enter a label';

        const OF_LABEL_ID = 'of-label';
        const  OF_LABEL_TYPE = 'text';
        const  OF_LABEL_TITLE = '"of" label';
        const  OF_LABEL_DESCRIPTION = 'Enter a label';

        const ENTRIES_LABEL_ID = 'entries-label';
        const  ENTRIES_LABEL_TYPE = 'text';
        const  ENTRIES_LABEL_TITLE = '"entries" label';
        const  ENTRIES_LABEL_DESCRIPTION = 'Enter a label';

        const EMPTY_DT_MSG_ID = 'empty-dt-msg';
        const  EMPTY_DT_MSG_TYPE = 'text';
        const  EMPTY_DT_MSG_TITLE = '"Empty datatable" label';
        const  EMPTY_DT_MSG_DESCRIPTION = 'Enter a label';

        const PRODUCT_CATEGORIES_LABEL_ID = 'product-categories-label';
        const  PRODUCT_CATEGORIES_LABEL_TYPE = 'text';
        const  PRODUCT_CATEGORIES_LABEL_TITLE = '"Product categories" label';
        const  PRODUCT_CATEGORIES_LABEL_DESCRIPTION = 'Enter a label';

        const SHOP_LISTS_LABEL_ID = 'shop-lists-label';
        const  SHOP_LISTS_LABEL_TYPE = 'text';
        const  SHOP_LISTS_LABEL_TITLE = '"Shop lists" label';
        const  SHOP_LISTS_LABEL_DESCRIPTION = 'Enter a label';

        const PASSWORD_RESET_MAIL_NOTICE_MSG_ID = 'password-reset-mail-notice-msg';
        const  PASSWORD_RESET_MAIL_NOTICE_MSG_TYPE = 'text';
        const  PASSWORD_RESET_MAIL_NOTICE_MSG_TITLE = '"Password reset email notice" message';
        const  PASSWORD_RESET_MAIL_NOTICE_MSG_DESCRIPTION = 'Enter a message';

        const PASSWORD_RESET_MAIL_CONFIRM_MSG_ID = 'password-reset-mail-confirm-msg';
        const  PASSWORD_RESET_MAIL_CONFIRM_MSG_TYPE = 'text';
        const  PASSWORD_RESET_MAIL_CONFIRM_MSG_TITLE = '"Password reset mail confirmation" message';
        const  PASSWORD_RESET_MAIL_CONFIRM_MSG_DESCRIPTION = 'Enter a message';

        const LOST_YOUR_PASSWORD_MSG_ID = 'lost-your-password-msg';
        const  LOST_YOUR_PASSWORD_MSG_TYPE = 'text';
        const  LOST_YOUR_PASSWORD_MSG_TITLE = '"Lost your password" message';
        const  LOST_YOUR_PASSWORD_MSG_DESCRIPTION = 'Enter a message';

        const USER_NAME_OR_EMAIL_LABEL_ID = 'user-name-or-email-label';
        const USER_NAME_OR_EMAIL_LABEL_TYPE = 'text';
        const USER_NAME_OR_EMAIL_LABEL_TITLE = '"User name or email" label';
        const USER_NAME_OR_EMAIL_LABEL_DESCRIPTION = 'Enter a message';

        const RESET_PASSWORD_LABEL_ID = 'reset-password-label';
        const RESET_PASSWORD_LABEL_TYPE = 'text';
        const RESET_PASSWORD_LABEL_TITLE = '"Reset password" label';
        const RESET_PASSWORD_LABEL_DESCRIPTION = 'Enter a message';

        const STORE_NOT_IN_LIST_MSG_ID = 'not-in-list-store-msg';
        const STORE_NOT_IN_LIST_MSG_TYPE = 'text';
        const STORE_NOT_IN_LIST_MSG_TITLE = '"Store Not In List" label';
        const STORE_NOT_IN_LIST_MSG_DESCRIPTION = 'Enter a message';

        const STORE_CUSTOM_NAME_LABEL_ID = 'custom-store-name-label';
        const STORE_CUSTOM_NAME_LABEL_TYPE = 'text';
        const STORE_CUSTOM_NAME_LABEL_TITLE = '"Store Custom Name" label';
        const STORE_CUSTOM_NAME_LABEL_DESCRIPTION = 'Enter a label';

        const MESSAGE_NOTIFICATION_SECTION_2_ID = 'custom-message-notifications-section-2';
        const MESSAGE_NOTIFICATION_SECTION_2_TYPE = 'section';     
        const MESSAGE_NOTIFICATION_SECTION_2_INDENT = false;

        const PAGES_SECTION_ID = 'section-pages';
        const PAGES_SECTION_TITLE = 'Custom pages settings';
        const PAGES_SECTION_DESCRIPTION = 'All custom pages settings'; 
        
        const CUSTOM_PAGES_SECTION_1_ID = 'custom-pages-section-1';
        const CUSTOM_PAGES_SECTION_1_TYPE = 'custom-pages-section-1';
        const CUSTOM_PAGES_SECTION_1_TITLE = 'Custom pages settings';
        const CUSTOM_PAGES_SECTION_1_DESCRIPTION = ''; 
        const CUSTOM_PAGES_SECTION_1_INDENT = true;

        const PUBLISH_PRODUCTS_PAGE_ID = 'publish-products-page-id';
        const PUBLISH_PRODUCTS_PAGE_TYPE = 'text';
        const PUBLISH_PRODUCTS_PAGE_TITLE = '"Publish products" page id';
        const PUBLISH_PRODUCTS_PAGE_DESCRIPTION = 'Enter a page id'; 

        const PRODUCT_LISTS_PAGE_ID = 'product-lists-page-id';
        const PRODUCT_LISTS_PAGE_TYPE = 'text';
        const PRODUCT_LISTS_PAGE_TITLE = '"Product Lists" page id';
        const PRODUCT_LISTS_PAGE_DESCRIPTION = 'Enter a page id'; 

        const STORE_DETAILS_PAGE_ID = 'store-details-page-id';
        const STORE_DETAILS_PAGE_TYPE = 'text';
        const STORE_DETAILS_PAGE_TITLE = '"Store details" page id';
        const STORE_DETAILS_PAGE_DESCRIPTION = 'Enter a page id'; 

        const COMMERCANTS_PAGE_ID = 'commercants-page-id';
        const COMMERCANTS_PAGE_TYPE = 'text';
        const COMMERCANTS_PAGE_TITLE = '"Commercants" page id';
        const COMMERCANTS_PAGE_DESCRIPTION = 'Enter a page id'; 

        const ADMIN_DASHBOARD_NEW_STORE_PAGE_ID = 'admin-dashboard-new-store-page-id';
        const ADMIN_DASHBOARD_NEW_STORE_PAGE_TYPE = 'text';
        const ADMIN_DASHBOARD_NEW_STORE_PAGE_TITLE = '"Admin dashboard new store" page id';
        const ADMIN_DASHBOARD_NEW_STORE_PAGE_DESCRIPTION = 'Enter a page id'; 

        const ADMIN_DASHBOARD_UPDATE_STORE_PAGE_ID = 'admin-dashboard-update-store-page-id';
        const ADMIN_DASHBOARD_UPDATE_STORE_PAGE_TYPE = 'text';
        const ADMIN_DASHBOARD_UPDATE_STORE_PAGE_TITLE = '"Admin dashboard update store" page id';
        const ADMIN_DASHBOARD_UPDATE_STORE_PAGE_DESCRIPTION = 'Enter a page id'; 

        const ADMIN_EDIT_ACCOUNT_PAGE_ID = 'admin-edit-account-page-id';
        const ADMIN_EDIT_ACCOUNT_PAGE_TYPE = 'text';
        const ADMIN_EDIT_ACCOUNT_PAGE_TITLE = '"Admin edit account page id" page id';
        const ADMIN_EDIT_ACCOUNT_PAGE_DESCRIPTION = 'Enter a page id'; 

        const ADMIN_STORE_VIEW_PRODUCTS_LIST_PAGE_ID = 'admin-store-view-products-list-page-id';
        const ADMIN_STORE_VIEW_PRODUCTS_LIST_PAGE_TYPE = 'text';
        const ADMIN_STORE_VIEW_PRODUCTS_LIST_PAGE_TITLE = '"Admin store view products list" page id';
        const ADMIN_STORE_VIEW_PRODUCTS_LIST_PAGE_DESCRIPTION = 'Enter a page id'; 

        const ADMIN_STORE_UPDATE_PRODUCTS_PAGE_ID = 'admin-store-update-products-page-id';
        const ADMIN_STORE_UPDATE_PRODUCTS_PAGE_TYPE = 'text';
        const ADMIN_STORE_UPDATE_PRODUCTS_PAGE_TITLE = '"Admin store update product" page id';
        const ADMIN_STORE_UPDATE_PRODUCTS_PAGE_DESCRIPTION = 'Enter a page id'; 

        const ADMIN_STORE_RESET_PASSWORD_PAGE_ID = 'admin-store-reset-password-page-id';
        const ADMIN_STORE_RESET_PASSWORD_PAGE_TYPE = 'text';
        const ADMIN_STORE_RESET_PASSWORD_PAGE_TITLE = '"Admin store reset password" page id';
        const ADMIN_STORE_RESET_PASSWORD_PAGE_DESCRIPTION = 'Enter a page id'; 

        const CUSTOM_PAGES_SECTION_2_ID = 'custom-pages-section-2';
        const CUSTOM_PAGES_SECTION_2_TYPE = 'section';     
        const CUSTOM_PAGES_SECTION_2_INDENT = false; 
        
        const SIDEBAR_LEFT_SECTION_ID = 'section-sidebar-left';
        const SIDEBAR_LEFT_SECTION_TITLE = 'Sidebar Left';
        const SIDEBAR_LEFT_SECTION_DESCRIPTION = 'All header settings';

        const SIDEBAR_FILTER_PRICE_SECTION_1_ID = 'sidebar-filter-price-section-1';
        const SIDEBAR_FILTER_PRICE_SECTION_1_TYPE = 'section';
        const SIDEBAR_FILTER_PRICE_SECTION_1_TITLE = 'Filter price settings Box';
        const SIDEBAR_FILTER_PRICE_SECTION_1_DESCRIPTION = '';
        const SIDEBAR_FILTER_PRICE_SECTION_1_INDENT = true;

        const SIDEBAR_FILTER_PRICE_MIN_VALUE_ID = 'sidebar-filter-price-min-value';
        const SIDEBAR_FILTER_PRICE_MIN_VALUE_TYPE = 'text';
        const SIDEBAR_FILTER_PRICE_MIN_VALUE_TITLE = 'Min value';
        const SIDEBAR_FILTER_PRICE_MIN_VALUE_DESCRIPTION = 'Minimum value price to filter'; 

        const SIDEBAR_FILTER_PRICE_MAX_VALUE_ID = 'sidebar-filter-price-max-value';
        const SIDEBAR_FILTER_PRICE_MAX_VALUE_TYPE = 'text';
        const SIDEBAR_FILTER_PRICE_MAX_VALUE_TITLE = 'Max value';
        const SIDEBAR_FILTER_PRICE_MAX_VALUE_DESCRIPTION = 'Maximum value price to filter';
        
        const SIDEBAR_FILTER_PRICE_SECTION_2_ID = 'sidebar-filter-price-section-2';  
        const SIDEBAR_FILTER_PRICE_SECTION_2_TYPE = 'section';
        const SIDEBAR_FILTER_PRICE_SECTION_2_INDENT = false;

        const SIDEBAR_FILTER_DISTANCE_SECTION_1_ID = 'sidebar-filter-distance-section-1';
        const SIDEBAR_FILTER_DISTANCE_SECTION_1_TYPE = 'section';
        const SIDEBAR_FILTER_DISTANCE_SECTION_1_TITLE = 'Filter distance settings Box';
        const SIDEBAR_FILTER_DISTANCE_SECTION_1_DESCRIPTION = '';
        const SIDEBAR_FILTER_DISTANCE_SECTION_1_INDENT = true;

        const SIDEBAR_FILTER_DISTANCE_MIN_VALUE_ID = 'sidebar-filter-distance-min-value';
        const SIDEBAR_FILTER_DISTANCE_MIN_VALUE_TYPE = 'text';
        const SIDEBAR_FILTER_DISTANCE_MIN_VALUE_TITLE = 'Min value';
        const SIDEBAR_FILTER_DISTANCE_MIN_VALUE_DESCRIPTION = 'Minimum value distance to filter';

        const SIDEBAR_FILTER_DISTANCE_MAX_VALUE_ID = 'sidebar-filter-distance-max-value';
        const SIDEBAR_FILTER_DISTANCE_MAX_VALUE_TYPE = 'text';
        const SIDEBAR_FILTER_DISTANCE_MAX_VALUE_TITLE = 'Max value';
        const SIDEBAR_FILTER_DISTANCE_MAX_VALUE_DESCRIPTION = 'Maximum value distance to filter';

        const SIDEBAR_FILTER_DISTANCE_SECTION_2_ID = 'sidebar-filter-distance-section-2';      
        const SIDEBAR_FILTER_DISTANCE_SECTION_2_TYPE = 'section';    
        const SIDEBAR_FILTER_DISTANCE_SECTION_2_INDENT = false;

        const SIDEBAR_CAROUSEL_TESTIMOLATES_SECTION_1_ID = 'sidebar-carousel-testimolates-section-1';
        const SIDEBAR_CAROUSEL_TESTIMOLATES_SECTION_1_TYPE = 'section';
        const SIDEBAR_CAROUSEL_TESTIMOLATES_SECTION_1_TITLE = 'Sidebar carousel testimolates';
        const SIDEBAR_CAROUSEL_TESTIMOLATES_SECTION_1_DESCRIPTION = '';
        const SIDEBAR_CAROUSEL_TESTIMOLATES_SECTION_1_INDENT = true;
        
        const SIDEBAR_CAROUSEL_TESTIMOLATES_POST_TYPE_ID = 'sidebar-carousel-testimolates-post-type';
        const SIDEBAR_CAROUSEL_TESTIMOLATES_POST_TYPE_TYPE = 'select';
        const SIDEBAR_CAROUSEL_TESTIMOLATES_POST_TYPE_TITLE = 'Please choose a post type';
        const SIDEBAR_CAROUSEL_TESTIMOLATES_POST_TYPE_DESCRIPTION = 'A post type to show testimolates';
        const SIDEBAR_CAROUSEL_TESTIMOLATES_POST_TYPE_DATA = 'post_type';

        const SIDEBAR_CAROUSEL_TESTIMOLATES_NUM_ITEMS_ID = 'sidebar-carousel-testimolates-num-items';
        const SIDEBAR_CAROUSEL_TESTIMOLATES_NUM_ITEMS_TYPE = 'range';
        const SIDEBAR_CAROUSEL_TESTIMOLATES_NUM_ITEMS_TITLE = 'Number items of testimolates to show';
        const SIDEBAR_CAROUSEL_TESTIMOLATES_NUM_ITEMS_DESCRIPTION = '';
        const SIDEBAR_CAROUSEL_TESTIMOLATES_NUM_ITEMS_MIN = 1;
        const SIDEBAR_CAROUSEL_TESTIMOLATES_NUM_ITEMS_MAX = 20;
        const SIDEBAR_CAROUSEL_TESTIMOLATES_NUM_ITEMS_STEP = 1;
        const SIDEBAR_CAROUSEL_TESTIMOLATES_NUM_ITEMS_VALUE = 5;

        const SIDEBAR_CAROUSEL_TESTIMOLATES_SECTION_2_ID = 'sidebar-carousel-testimolates-section-2';      
        const SIDEBAR_CAROUSEL_TESTIMOLATES_SECTION_2_TYPE = 'section';    
        const SIDEBAR_CAROUSEL_TESTIMOLATES_SECTION_2_INDENT = false;

        const SEARCH_PAGE_SECTION_ID = 'section-search-page';      
        const SEARCH_PAGE_SECTION_TITLE = 'Search page settings';
        const SEARCH_PAGE_SECTION_DESCRIPTION = 'All search page settings';  
        
        const SEARCH_PAGE_BANNER_SECTION_1_ID = 'search-page-banner-section-1';
        const SEARCH_PAGE_BANNER_SECTION_1_TYPE = 'section';
        const SEARCH_PAGE_BANNER_SECTION_1_TITLE = 'Banner';
        const SEARCH_PAGE_BANNER_SECTION_1_DESCRIPTION = '';
        const SEARCH_PAGE_BANNER_SECTION_1_INDENT = true;

        const SEARCH_PAGE_BANNER_IMAGE_ID = 'search-page-banner-image';
        const SEARCH_PAGE_BANNER_IMAGE_TYPE = 'media';
        const SEARCH_PAGE_BANNER_IMAGE_TITLE = 'Please choose a background image';
        const SEARCH_PAGE_BANNER_IMAGE_DESCRIPTION = '';

        const SEARCH_PAGE_HEADING_TEXT_ID = 'search-page-heading-text';
        const SEARCH_PAGE_HEADING_TEXT_TYPE = 'text';
        const SEARCH_PAGE_HEADING_TEXT_TITLE = 'Heading text';
        const SEARCH_PAGE_HEADING_TEXT_DESCRIPTION = '';

        const SEARCH_PAGE_MEDIUM_TEXT_ID = 'search-page-medium-text';
        const SEARCH_PAGE_MEDIUM_TEXT_TYPE = 'text';
        const SEARCH_PAGE_MEDIUM_TEXT_TITLE = 'Medium text';
        const SEARCH_PAGE_MEDIUM_TEXT_DESCRIPTION = '';

        const SEARCH_PAGE_SMALL_TEXT_ID = 'search-page-small-text';
        const SEARCH_PAGE_SMALL_TEXT_TYPE = 'text';
        const SEARCH_PAGE_SMALL_TEXT_TITLE = 'Small text';
        const SEARCH_PAGE_SMALL_TEXT_DESCRIPTION = '';

        const SEARCH_PAGE_BANNER_BUTTON_TEXT_ID = 'search-page-banner-button-text';
        const SEARCH_PAGE_BANNER_BUTTON_TEXT_TYPE = 'text';
        const SEARCH_PAGE_BANNER_BUTTON_TEXT_TITLE = 'Button text';
        const SEARCH_PAGE_BANNER_BUTTON_TEXT_DESCRIPTION = '';

        const SEARCH_PAGE_BANNER_BUTTON_URL_ID = 'search-page-banner-button-url';
        const SEARCH_PAGE_BANNER_BUTTON_URL_TYPE = 'text';
        const SEARCH_PAGE_BANNER_BUTTON_URL_TITLE = 'Button url';
        const SEARCH_PAGE_BANNER_BUTTON_URL_DESCRIPTION = 'Button Url';

        const SEARCH_PAGE_BANNER_SECTION_2_ID = 'search-page-banner-section-2';      
        const SEARCH_PAGE_BANNER_SECTION_2_TYPE = 'section';    
        const SEARCH_PAGE_BANNER_SECTION_2_INDENT = false;

        const EMAIL_SECTION_TEMPLATES_ID = 'section-email-templates';       
        const EMAIL_SECTION_TEMPLATES_TITLE = 'Email templates';
        const EMAIL_SECTION_TEMPLATES_DESCRIPTION = 'All email templates settings';
        
        const EMAIL_TEMPLATE_SECTION_1_ID = 'emailtemplate-section-1';
        const EMAIL_TEMPLATE_SECTION_1_TYPE = 'section';
        const EMAIL_TEMPLATE_SECTION_1_TITLE = 'Email templates settings';
        const EMAIL_TEMPLATE_SECTION_1_DESCRIPTION = '';
        const EMAIL_TEMPLATE_SECTION_1_INDENT = true;

        const EMAIL_TEMPLATE_ADMIN_ACTION_SUBJECT_ID = 'emailtemplate-admin-action-subject';
        const EMAIL_TEMPLATE_ADMIN_ACTION_SUBJECT_TYPE = 'text';
        const EMAIL_TEMPLATE_ADMIN_ACTION_SUBJECT_TITLE = '"Admin action" email subject';
        const EMAIL_TEMPLATE_ADMIN_ACTION_SUBJECT_DESCRIPTION = 'Enter a subject';

        const EMAIL_TEMPLATE_ADMIN_ACTION_ID = 'emailtemplate-admin-action';
        const EMAIL_TEMPLATE_ADMIN_ACTION_TYPE = 'textarea';
        const EMAIL_TEMPLATE_ADMIN_ACTION_TITLE = '"Admin action" email template';
        const EMAIL_TEMPLATE_ADMIN_ACTION_DESCRIPTION = 'Enter a template';

        const EMAIL_TEMPLATE_STORE_ACTION_SUBJECT_ID = 'emailtemplate-store-action-subject';
        const EMAIL_TEMPLATE_STORE_ACTION_SUBJECT_TYPE = 'text';
        const EMAIL_TEMPLATE_STORE_ACTION_SUBJECT_TITLE = '"Store action" email subject';
        const EMAIL_TEMPLATE_STORE_ACTION_SUBJECT_DESCRIPTION = 'Enter a subject';

        const EMAIL_TEMPLATE_STORE_ACTION_ID = 'emailtemplate-store-action';
        const EMAIL_TEMPLATE_STORE_ACTION_TYPE = 'textarea';
        const EMAIL_TEMPLATE_STORE_ACTION_TITLE = '"Store action" email template';
        const EMAIL_TEMPLATE_STORE_ACTION_DESCRIPTION = 'Enter email template';

        const EMAIL_TEMPLATE_REPORT_ABUSE_FORM_ID = 'emailtemplate-report-abuse-form';
        const EMAIL_TEMPLATE_REPORT_ABUSE_FORM_TYPE = 'textarea';
        const EMAIL_TEMPLATE_REPORT_ABUSE_FORM_TITLE = '"Report Abuse Form" email template';
        const EMAIL_TEMPLATE_REPORT_ABUSE_FORM_DESCRIPTION = 'Enter email template';

        const EMAIL_TEMPLATE_REPORT_ABUSE_SUBJECT_FORM_ID = 'emailtemplate-report-abuse-subject-form';
        const EMAIL_TEMPLATE_REPORT_ABUSE_SUBJECT_FORM_TYPE = 'text';
        const EMAIL_TEMPLATE_REPORT_ABUSE_SUBJECT_FORM_TITLE = '"Report Abuse Form" Subject';
        const EMAIL_TEMPLATE_REPORT_ABUSE_SUBJECT_FORM_DESCRIPTION = 'Enter email template';

        const EMAIL_TEMPLATE_RETRIEVE_PASSWORD_SUBJECT_ID = 'emailtemplate-retrieve-password-subject';
        const EMAIL_TEMPLATE_RETRIEVE_PASSWORD_SUBJECT_TYPE = 'text';
        const EMAIL_TEMPLATE_RETRIEVE_PASSWORD_SUBJECT_TITLE = '"Retrieve password" email subject';
        const EMAIL_TEMPLATE_RETRIEVE_PASSWORD_SUBJECT_DESCRIPTION = 'Enter a subject';

        const EMAIL_TEMPLATE_RETRIEVE_PASSWORD_BODY_ID = 'emailtemplate-retrieve-password-body';
        const EMAIL_TEMPLATE_RETRIEVE_PASSWORD_BODY_TYPE = 'textarea';
        const EMAIL_TEMPLATE_RETRIEVE_PASSWORD_BODY_TITLE = '"Retrieve password" email body';
        const EMAIL_TEMPLATE_RETRIEVE_PASSWORD_BODY_DESCRIPTION = 'Enter a body';

        const EMAIL_TEMPLATE_LINK_EXPIRE_TIMEOUT_ID = 'emailtemplate-link-expire-timeout';
        const EMAIL_TEMPLATE_LINK_EXPIRE_TIMEOUT_TYPE = 'text';
        const EMAIL_TEMPLATE_LINK_EXPIRE_TIMEOUT_TITLE = 'Duration of link for the user to reset the password';
        const EMAIL_TEMPLATE_LINK_EXPIRE_TIMEOUT_DESCRIPTION = 'Enter a timeout (s)';

        const EMAIL_TEMPLATE_SECTION_2_ID = 'emailtemplate-section-2';      
        const EMAIL_TEMPLATE_SECTION_2_TYPE = 'section';    
        const EMAIL_TEMPLATE_SECTION_2_INDENT = false;
        
        const CONTACT_FORM_SECTION_ID = 'section-contact-form';      
        const CONTACT_FORM_SECTION_TITLE = 'Contact Form';
        const CONTACT_FORM_SECTION_DESCRIPTION = 'All contact form settings';
        
        const CONTACT_FORM_SECTION_1_ID = 'contactform-section-1';
        const CONTACT_FORM_SECTION_1_TYPE = 'section';
        const CONTACT_FORM_SECTION_1_TITLE = 'Contact form settings';
        const CONTACT_FORM_SECTION_1_DESCRIPTION = '';
        const CONTACT_FORM_SECTION_1_INDENT = true;

        const CONTACT_FORM_EMAIL_ADDRESS_ID = 'contactform-email-address';
        const CONTACT_FORM_EMAIL_ADDRESS_TYPE = 'text';
        const CONTACT_FORM_EMAIL_ADDRESS_TITLE = 'Email ( customer information to send this )';
        const CONTACT_FORM_EMAIL_ADDRESS_DESCRIPTION = 'Please fill out validate email address';

        const CONTACT_FORM_EMAIL_NAME_ID = 'contactform-email-name';
        const CONTACT_FORM_EMAIL_NAME_TYPE = 'text';
        const CONTACT_FORM_EMAIL_NAME_TITLE = 'Default email name';
        const CONTACT_FORM_EMAIL_NAME_DESCRIPTION = '';

        const CONTACT_FORM_LAST_NAME_ID = 'contactform-last-name';
        const CONTACT_FORM_LAST_NAME_TYPE = 'text';
        const CONTACT_FORM_LAST_NAME_TITLE = 'Admin last name';
        const CONTACT_FORM_LAST_NAME_DESCRIPTION = '';

        const CONTACT_FORM_CIVILITY_ID = 'contactform-civility';
        const CONTACT_FORM_CIVILITY_TYPE = 'text';
        const CONTACT_FORM_CIVILITY_TITLE = 'Admin civility';
        const CONTACT_FORM_CIVILITY_DESCRIPTION = '';

        const CONTACT_FORM_SMTP_HOST_ID = 'contactform-smtp-host';
        const CONTACT_FORM_SMTP_HOST_TYPE = 'text';
        const CONTACT_FORM_SMTP_HOST_TITLE = 'SMTP address';
        const CONTACT_FORM_SMTP_HOST_DESCRIPTION = '';

        const CONTACT_FORM_SMTP_PORT_ID = 'contactform-smtp-port';
        const CONTACT_FORM_SMTP_PORT_TYPE = 'text';
        const CONTACT_FORM_SMTP_PORT_TITLE = 'SMTP port';
        const CONTACT_FORM_SMTP_PORT_DESCRIPTION = '';

        const CONTACT_FORM_SMTP_ENCRYPTION_ID = 'contactform-smtp-encryption';
        const CONTACT_FORM_SMTP_ENCRYPTION_TYPE = 'select';
        const CONTACT_FORM_SMTP_ENCRYPTION_TITLE = 'SMTP encryption';
        const CONTACT_FORM_SMTP_ENCRYPTION_DESCRIPTION = '';

        const CONTACT_FORM_SMTP_ENCRYPTION_NO_ENCRYPTION_VALUE = 'none';
        const CONTACT_FORM_SMTP_ENCRYPTION_NO_ENCRYPTION_LABEL = 'No encryption';

        const CONTACT_FORM_SMTP_ENCRYPTION_SSL_VALUE = 'ssl';
        const CONTACT_FORM_SMTP_ENCRYPTION_SSL_LABEL = 'SSL';

        const CONTACT_FORM_SMTP_ENCRYPTION_TLS_VALUE = 'tls';
        const CONTACT_FORM_SMTP_ENCRYPTION_TLS_LABEL = 'TLS';

        const CONTACT_FORM_AUTHENTICATION_USERNAME_ID = 'contactform-authentication-username';
        const CONTACT_FORM_AUTHENTICATION_USERNAME_TYPE = 'text';
        const CONTACT_FORM_AUTHENTICATION_USERNAME_TITLE = 'Username';
        const CONTACT_FORM_AUTHENTICATION_USERNAME_DESCRIPTION = 'SMTP username';

        const CONTACT_FORM_AUTHENTICATION_PASSWORD_ID = 'contactform-authentication-password';
        const CONTACT_FORM_AUTHENTICATION_PASSWORD_TYPE = 'text';
        const CONTACT_FORM_AUTHENTICATION_PASSWORD_TITLE = 'Password';
        const CONTACT_FORM_AUTHENTICATION_PASSWORD_DESCRIPTION = 'SMTP password';

        const CONTACT_FORM_SECTION_2_ID = 'contactform-section-2';      
        const CONTACT_FORM_SECTION_2_TYPE = 'section';    
        const CONTACT_FORM_SECTION_2_INDENT = false;

    }