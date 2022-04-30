<?php 

    define('THEME_VERSION', '1.0');   

    define('HOME_TEXT', 'Trang chủ');

    define('PARTNERS_POST_TYPE', 'partners');
    define('PRODUCTS_POST_TYPE', 'product');
    define('PRODUCTS_TAXONOMY', 'product_cat');
    define('SLIDERS_POST_TYPE', 'slider');
    define('PORTFOLIO_POST_TYPE', 'portfolio');

    define('NEWS_CATEGORY_SLUG', 'tin-tuc');

    //define('PA_KICHTHUOC_TAXONOMY', 'pa_kich-thuoc');
    define('PA_MAUSAC_TAXONOMY', 'pa_colors');
    //define('PA_THUONGHIEU_TAXONOMY', 'pa_thuong-hieu');

    /* theme url */

        define('THEME_ASSETS_DIR_URI', MY_THEME_DIR_URI . '/assets');
        define('THEME_CSS_DIR_URI', THEME_ASSETS_DIR_URI . '/css');
        define('THEME_JS_DIR_URI', THEME_ASSETS_DIR_URI . '/js');
        define('THEME_IMAGES_DIR_URI', THEME_ASSETS_DIR_URI . '/images');

    /* theme class */

        define('ACTIONS_DIR', MY_THEME_DIR . '/classes/actions');
        define('ACTIONS_AJAX_DIR', ACTIONS_DIR . '/b/ajax');
        define('ACTIONS_ENQUEUES_DIR', ACTIONS_DIR . '/c/enqueues');
        define('ACTIONS_ENQUEUES_UTILS_DIR', ACTIONS_ENQUEUES_DIR . '/b/utils');

        define('COMPONENTS_DIR', MY_THEME_DIR . '/classes/components');
        define('ARCHIVE_DIR', MY_THEME_DIR . '/classes/archive');        
        define('SECTIONS_DIR', COMPONENTS_DIR . '/sections');

        define('LOGO_CLASS_DIR', COMPONENTS_DIR . '/logo');
        define('LOGO_CLASS_UTILS_DIR', LOGO_CLASS_DIR . '/b/utils');

        define('CTINFO_CLASS_DIR', COMPONENTS_DIR . '/ctinfo');
        define('CTINFO_CLASS_UTILS_DIR', CTINFO_CLASS_DIR . '/b/utils');

        define('PAGE_CLASS_DIR', MY_THEME_DIR . '/classes/page');
        define('PAGE_CLASS_UTILS_DIR', PAGE_CLASS_DIR . '/b/utils'); 

        define('ATTACHMENTS_CLASS_DIR', MY_THEME_DIR . '/classes/attachments');
        //define('ATTACHMENTS_CLASS_UTILS_DIR', ATTACHMENTS_CLASS_DIR . '/b/utils');

        define('SOCIAL_NETWORK_CLASS_DIR', COMPONENTS_DIR . '/social-network');
        define('SOCIAL_NETWORK_CLASS_UTILS_DIR', SOCIAL_NETWORK_CLASS_DIR . '/b/utils');

        define('NAV_MENUS_CLASS_DIR', COMPONENTS_DIR . '/nav-menus');
        define('NAV_MENUS_CLASS_UTILS_DIR', NAV_MENUS_CLASS_DIR . '/b/utils'); 

        define('PARTNERS_CLASS_DIR', COMPONENTS_DIR . '/partners');
        define('PARTNERS_CLASS_UTILS_DIR', PARTNERS_CLASS_DIR . '/b/utils');

        define('BANNERS_CLASS_DIR', COMPONENTS_DIR . '/banners');
        define('BANNERS_CLASS_UTILS_DIR', BANNERS_CLASS_DIR . '/b/utils');

        define('PRODUCTS_CLASS_DIR', MY_THEME_DIR . '/classes/products');
        define('PRODUCTS_CLASS_UTILS_DIR', PRODUCTS_CLASS_DIR . '/b/utils');

        define('SLIDER_CLASS_DIR', COMPONENTS_DIR . '/slider');
        define('SLIDER_CLASS_UTILS_DIR', SLIDER_CLASS_DIR . '/b/utils');

        define('POSTS_CLASS_DIR', COMPONENTS_DIR . '/posts' );
        define('POSTS_CLASS_UTILS_DIR', POSTS_CLASS_DIR . '/b/utils' );

        define('PAGES_CLASS_DIR', COMPONENTS_DIR . '/pages' );
        define('PAGES_CLASS_UTILS_DIR', PAGES_CLASS_DIR . '/b/utils' );
        
        define('PORTFOLIO_CLASS_DIR', COMPONENTS_DIR . '/portfolio');
        define('PORTFOLIO_CLASS_UTILS_DIR', PORTFOLIO_CLASS_DIR . '/b/utils');

        define('SALESOFF_CLASS_DIR', COMPONENTS_DIR . '/sales-off-section');
        define('SALESOFF_CLASS_UTILS_DIR', SALESOFF_CLASS_DIR . '/b/utils');

        define('PROMOTIONS_CLASS_DIR', COMPONENTS_DIR . '/promotions-section');
        define('PROMOTIONS_UTILS_CLASS_DIR', PROMOTIONS_CLASS_DIR . '/b/utils');   
        
        define('PAYMENTS_CLASS_DIR', COMPONENTS_DIR . '/payments');
        define('PAYMENTS_UTILS_CLASS_DIR', PAYMENTS_CLASS_DIR . '/b/utils');   

        define('DELIVERY_SECTION_CLASS_DIR', COMPONENTS_DIR . '/delivery-section');
        define('DELIVERY_SECTION_CLASS_UTILS_DIR', DELIVERY_SECTION_CLASS_DIR . '/b/utils');   
        
        define('NAV_CATEGORIES_CLASS_DIR', COMPONENTS_DIR . '/nav-categories' );
        define('NAV_CATEGORIES_CLASS_UTILS_DIR', NAV_CATEGORIES_CLASS_DIR . '/b/utils');

        define('WIDGETS_EXTRAS_DIR', MY_THEME_DIR . '/extras/widgets');

        define('GRAPHQL_CLASS_DIR', MY_THEME_DIR . '/classes/graphql');
        define('GRAPHQL_CLASS_UTILS_DIR', GRAPHQL_CLASS_DIR . '/b/utils');
       