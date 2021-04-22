<?php 

    namespace Actions\Enqueues;

    class EnqueueLocalizeCustomPageUrlsUtils {

        public static function render() {

            wp_localize_script('jquery', 'CUSTOM_PAGE_URLS', array(

                'publish_products' => \Urls\UrlGetAdminPublishProductPageUtils::get(),
                'products_list' => \Urls\UrlGetProductsListPageUtils::get(),
                'store_details' => \Urls\UrlGetStoreDetailsPageUtils::get(),
                'commercants' => \Urls\UrlGetCommercantsPageUtils::get()

            ));   

        }

    }