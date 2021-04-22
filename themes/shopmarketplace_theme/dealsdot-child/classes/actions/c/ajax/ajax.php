<?php 

    add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_UPDATE_PROFILE_INFORMATION_ACTION, 
                            array('\Actions\ActionUpdateInformationUtils', 'perform')); 

    add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_UPDATE_PROFILE_INFORMATION_ACTION, 
                    array('\Actions\ActionUpdateInformationUtils', 'perform'));

    add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_CHECK_USER_EMAIL_EXIST_ACTION, 
                    array('\Actions\ActionCheckUserEmailExistUtils', 'perform'));

    add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_CHECK_USER_EMAIL_EXIST_ACTION, 
                    array('\Actions\ActionCheckUserEmailExistUtils', 'perform'));

    add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_UPDATE_PRODUCT_ACTION, 
                    array('\Actions\ActionUpdateProductUtils', 'perform'));

    add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_UPDATE_PRODUCT_ACTION, 
                    array('\Actions\ActionUpdateProductUtils', 'perform'));	

    add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_SHOP_FEEDBACK_ABUSE_PRODUCT_ACTION,
                    array('\Actions\ActionProductFeedbackAbuseUtils', 'perform'));

    add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_SHOP_FEEDBACK_ABUSE_PRODUCT_ACTION, 
                    array('\Actions\ActionProductFeedbackAbuseUtils', 'perform'));

    add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_GET_PRODUCT_SLIDER_ACTION, 
                    array('\Actions\ActionGetProductSliderUtils', 'perform'));

    add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_GET_PRODUCT_SLIDER_ACTION, 
                    array('\Actions\ActionGetProductSliderUtils', 'perform'));

    add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_GET_SEARCHED_PRODUCTS_ACTION, 
                    array('\Actions\ActionGetSearchedProductsUtils', 'perform'));

    add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_GET_SEARCHED_PRODUCTS_ACTION,             
                    array('\Actions\ActionGetSearchedProductsUtils', 'perform'));

    add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_ADMIN_UPDATE_STORE_ACTION, 
                    array('\Actions\ActionAdminUpdateStoreUtils', 'perform'));

    add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_ADMIN_UPDATE_STORE_ACTION, 
                    array('\Actions\ActionAdminUpdateStoreUtils', 'perform'));

    add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_ADMIN_GET_DETAILS_FORM_STORE_ACTION, 
                    array('\Actions\ActionAdminGetDetailsStoreFormUtils', 'perform'));

    add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_ADMIN_GET_DETAILS_FORM_STORE_ACTION, 
                    array('\Actions\ActionAdminGetDetailsStoreFormUtils', 'perform')); 