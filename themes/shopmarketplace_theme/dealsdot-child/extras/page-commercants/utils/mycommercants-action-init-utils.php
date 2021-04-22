<?php 

    namespace MyCommercantsPage;

    class MyCommercantsActionInitUtils {

        public static function init() {          

            add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_UPDATE_COORDIATES_DATA_ACTION, 
                        array('\MyCommercantsPage\MyCommercantsUpdateCoordsDataUtils', 'update'));

            add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_UPDATE_COORDIATES_DATA_ACTION, 
                        array('\MyCommercantsPage\MyCommercantsUpdateCoordsDataUtils', 'update'));

            add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_UPDATE_MERCHANT_DATA_ACTION, 
                        array('\MyCommercantsPage\MyCommercantsUpdateMercantDataUtils', 'update'));

            add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_UPDATE_MERCHANT_DATA_ACTION, 
                        array('\MyCommercantsPage\MyCommercantsUpdateMercantDataUtils', 'update'));

            add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_IMPORT_MERCHANT_DATA_ACTION, 
                        array('\MyCommercantsPage\MyCommercantsImportMercantDataUtils', 'import'));

            add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_IMPORT_MERCHANT_DATA_ACTION, 
                        array('\MyCommercantsPage\MyCommercantsImportMercantDataUtils', 'import'));

            add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_IMPORT_CATEGORIES_DATA_ACTION, 
                        array('\MyCommercantsPage\MyCommercantsImportMercantDataUtils', 'import'));

            add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_IMPORT_CATEGORIES_DATA_ACTION, 
                        array('\MyCommercantsPage\MyCommercantsImportMercantDataUtils', 'import'));

            add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_UPDATE_CATEGORIES_DATA_ACTION, 
                        array('\MyCommercantsPage\MyCommercantsUpdateCategoriesDataUtils', 'update'));

            add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_UPDATE_CATEGORIES_DATA_ACTION, 
                        array('\MyCommercantsPage\MyCommercantsUpdateCategoriesDataUtils', 'update'));

            add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_CREATE_NEW_STORE_ACCOUNT_ACTION, 
                        array('\MyCommercantsPage\MyCommercantsCreateNewStoreAccountUtils', 'create'));

            add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_CREATE_NEW_STORE_ACCOUNT_ACTION, 
                        array('\MyCommercantsPage\MyCommercantsCreateNewStoreAccountUtils', 'create'));

            add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_REMOVE_STORES_ACCOUNT_ACTION, 
                        array('\MyCommercantsPage\MyCommercantsAdminRemoveStoresAccountUtils', 'remove'));

            add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_REMOVE_STORES_ACCOUNT_ACTION, 
                    array('\MyCommercantsPage\MyCommercantsAdminRemoveStoresAccountUtils', 'remove')); 

        }

    }