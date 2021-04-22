<?php 

    require_once ACTIONS_WOOCOMMERCE_UTILS_DIR . '/action-woocommerce-customize-product-tabs-utils.php';

    require_once ACTIONS_WOOCOMMERCE_UTILS_DIR . '/action-woocommerce-commercant-tab-callback-utils.php';

    require_once ACTIONS_WOOCOMMERCE_UTILS_DIR . '/action-woocommerce-customize-products-related-tab-utils.php';

    require_once ACTIONS_WOOCOMMERCE_UTILS_DIR . '/action-woocommerce-customize-single-product-summary-utils.php';

    require_once ACTIONS_WOOCOMMERCE_UTILS_DIR . '/action-woocommerce-customize-account-publish-products-contents-utils.php';

    require_once ACTIONS_WOOCOMMERCE_UTILS_DIR . '/action-woocommerce-get-price-html-utils.php';

    require_once ACTIONS_WOOCOMMERCE_UTILS_DIR . '/action-woocommerce-customize-edit-account-contents-utils.php';

    require_once ACTIONS_WOOCOMMERCE_UTILS_DIR . '/action-woocommerce-customize-update-store-details-contents-utils.php';

    require_once ACTIONS_WOOCOMMERCE_UTILS_DIR . '/action-woocommerce-customize-admin-store-view-products-list-contents-utils.php';

    require_once ACTIONS_WOOCOMMERCE_UTILS_DIR . '/action-woocommerce-customize-update-product-contents-utils.php';

    require_once ACTIONS_WOOCOMMERCE_UTILS_DIR . '/action-woocommerce-customize-admin-new-store-contents-utils.php';

    require_once ACTIONS_WOOCOMMERCE_UTILS_DIR . '/action-woocommerce-customize-account-reset-password-contents-utils.php';

    require_once ACTIONS_WOOCOMMERCE_UTILS_DIR . '/action-woocommerce-customize-account-navigation-utils.php';

    require_once ACTIONS_WOOCOMMERCE_UTILS_DIR . '/action-woocommerce-customize-account-publish-products-contents-utils.php';

    require_once ACTIONS_WOOCOMMERCE_UTILS_DIR . '/action-woocommerce-customize-account-contents-utils.php';

    remove_all_actions( \Actions\ACTIONS::UNICORN_WOOCOMMERCE_ACCOUNT_NAVIGATION_ACTION );
    remove_all_actions( \Actions\ACTIONS::UNICORN_WOOCOMMERCE_ACCOUNT_CONTENT_ACTION );

    add_filter( \Actions\ACTIONS::UNICORN_WOOCOMMERCE_PRODUCT_TABS_ACTION, 
                    array('\Actions\Woocommerce\ActionWoocommerceCustomizeProductTabsUtils', 'init'), 
                    999 );

    add_action( \Actions\ACTIONS::UNICORN_WOOCOMMERCE_SINGLE_PRODUCT_SHOP_SUMMARY_ACTION, 
                    array('\Actions\Woocommerce\ActionWooCommerceCustomizeSingleProductSummaryUtils', 'init') );

    add_action( \Actions\ACTIONS::UNICORN_WOOCOMMERCE_ACCOUNT_PUBLISH_PRODUCTS_CONTENTS_ACTION, 
                    array('\Actions\Woocommerce\ActionWoocommerceCustomizeAccountPublishProductsContentsUtils', 'init') );

    add_filter( \Actions\ACTIONS::UNICORN_WOOCOMMERCE_GET_PRICE_HTML_ACTION, 
                    array('\Actions\Woocommerce\ActionWoocommerceGetPriceHtmlUtils', 'init'), 100, 2 );   

    add_action( \Actions\ACTIONS::UNICORN_WOOCOMMERCE_CUSTOMIZE_EDIT_ACCOUNT_CONTENTS_ACTION, 
                    array('\Actions\Woocommerce\ActionWoocommerceCustomizeEditAccountContentsUtils', 'init') );
                    
    add_action( \Actions\ACTIONS::UNICORN_WOOCOMMERCE_ACCOUNT_ADMIN_UPDATE_STORE_DETAILS_CONTENTS_ACTION, 
                    array('\Actions\Woocommerce\ActionWoocommerceCustomizeUpdateStoreDetailsContentsUtils', 'init') );

    add_action( \Actions\ACTIONS::UNICORN_WOOCOMMERCE_ACCOUNT_ADMIN_STORE_VIEW_PRODUCTS_LIST_CONTENTS_ACTION, 
                    array('\Actions\Woocommerce\ActionWooCommerceCustomizeAdminStoreViewProductsListContentsUtils', 'init') );

    add_action( \Actions\ACTIONS::UNICORN_WOOCOMMERCE_ACCOUNT_UPDATE_PRODUCT_CONTENTS_ACTION, 
                    array('\Actions\Woocommerce\ActionWooCommerceCustomizeUpdateProductContentsUtils', 'init') );

    add_action( \Actions\ACTIONS::UNICORN_WOOCOMMERCE_ACCOUNT_ADMIN_NEW_STORE_CONTENTS_ACTION, 
                    array('\Actions\Woocommerce\ActionWooCommerceCustomizeAdminNewStoreContentsUtils', 'init') );

    add_action( \Actions\ACTIONS::UNICORN_WOOCOMMERCE_ACCOUNT_RESET_PASSWORD_CONTENTS_ACTION, 
                    array('\Actions\Woocommerce\ActionWooCommerceCustomizeAccountResetPasswordContentsUtils', 'init') );

    add_action( \Actions\ACTIONS::UNICORN_WOOCOMMERCE_ACCOUNT_NAVIGATION_ACTION, 
                    array('\Actions\Woocommerce\ActionWooCommerceCustomizeAccountNavigationUtils', 'init') );

    add_action( \Actions\ACTIONS::UNICORN_WOOCOMMERCE_ACCOUNT_PUBLISH_PRODUCTS_MUST_BE_LOG_IN_CONTENTS_ACTION, 
                    array('\Actions\Woocommerce\ActionWooCommerceCustomizeAccountPublishProductsMustBeLoginContentsUtils', 'init') );

    add_action( \Actions\ACTIONS::UNICORN_WOOCOMMERCE_ACCOUNT_CONTENT_ACTION, 
                    array('\Actions\Woocommerce\ActionWooCommerceCustomizeAccountContentsUtils', 'init') );
   