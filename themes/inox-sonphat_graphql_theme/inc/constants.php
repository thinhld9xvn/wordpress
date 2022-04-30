<?php 

    define('THEME_VERSION', '1.0');   

    define('HOME_TEXT', 'Trang chủ');

    define('DEFAULT_LANG', 'vi');

    define('NEWS_CATEGORY_SLUG', 'tin-tuc');

    define('CATEGORY_TAXONOMY', 'category');

    define('SLIDER_POST_TYPE', 'slider');

    define('CLIENTS_POST_TYPE', 'clients');

    define('TESTIMOLATES_POST_TYPE', 'testimolates');

    define('PRODUCTS_POST_TYPE', 'product');

    define('PRODUCTS_TAXONOMY', 'product_cat');    

    /* theme url */

    define('THEME_ASSETS_DIR_URI', MY_THEME_DIR_URI . '/assets');

    define('THEME_CSS_DIR_URI', THEME_ASSETS_DIR_URI . '/css');

    define('THEME_JS_DIR_URI', THEME_ASSETS_DIR_URI . '/js');

    define('THEME_IMAGES_DIR_URI', THEME_ASSETS_DIR_URI . '/images');

    /* theme class */

    define('ACTIONS_DIR', MY_THEME_DIR . '/classes/actions');

    define('COMPONENTS_DIR', MY_THEME_DIR . '/classes/components');

    define('LANG_CLASS_DIR', COMPONENTS_DIR . '/languages');

    define('LANG_CLASS_CONSTANTS_DIR', LANG_CLASS_DIR . '/a');

    define('LANG_CLASS_UTILS_DIR', LANG_CLASS_DIR . '/b/utils');

    define('LANG_CLASS_GQL_DIR', LANG_CLASS_DIR . '/b/graphql');

    define('LOGO_CLASS_DIR', COMPONENTS_DIR . '/logo');

    define('LOGO_CLASS_CONSTANTS_DIR', LOGO_CLASS_DIR . '/a');

    define('LOGO_CLASS_UTILS_DIR', LOGO_CLASS_DIR . '/b/utils');

    define('LOGO_CLASS_GQL_DIR', LOGO_CLASS_DIR . '/b/graphql');

    define('CTINFO_CLASS_DIR', COMPONENTS_DIR . '/ctinfo');

    define('CTINFO_CLASS_CONSTANTS_DIR', CTINFO_CLASS_DIR . '/a');

    define('CTINFO_CLASS_UTILS_DIR', CTINFO_CLASS_DIR . '/b/utils');

    define('CTINFO_CLASS_GQL_DIR', CTINFO_CLASS_DIR . '/b/graphql');

    define('HOME_CLASS_DIR', COMPONENTS_DIR . '/home');

    define('PRODUCTS_CLASS_DIR', COMPONENTS_DIR . '/products');

    define('PRODUCTS_CLASS_CONSTANTS_DIR', PRODUCTS_CLASS_DIR . '/a');

    define('PRODUCTS_CLASS_UTILS_DIR', PRODUCTS_CLASS_DIR . '/b/utils');

    define('PRODUCTS_CLASS_GQL_DIR', PRODUCTS_CLASS_DIR . '/b/graphql');

    define('SLIDER_CLASS_DIR', HOME_CLASS_DIR . '/slider');

    define('SLIDER_CLASS_CONSTANTS_DIR', SLIDER_CLASS_DIR . '/a');

    define('SLIDER_CLASS_UTILS_DIR', SLIDER_CLASS_DIR . '/b/utils');

    define('SLIDER_CLASS_GQL_DIR', SLIDER_CLASS_DIR . '/b/graphql');

    define('GT_CLASS_DIR', HOME_CLASS_DIR . '/gioithieu');

    define('GT_CLASS_CONSTANTS_DIR', GT_CLASS_DIR . '/a');

    define('GT_CLASS_UTILS_DIR', GT_CLASS_DIR . '/b/utils');

    define('GT_CLASS_GQL_DIR', GT_CLASS_DIR . '/b/graphql');

    define('TESTIMOLATES_CLASS_DIR', HOME_CLASS_DIR . '/testimolates');

    define('TESTIMOLATES_CLASS_CONSTANTS_DIR', TESTIMOLATES_CLASS_DIR . '/a');

    define('TESTIMOLATES_CLASS_UTILS_DIR', TESTIMOLATES_CLASS_DIR . '/b/utils');

    define('TESTIMOLATES_CLASS_GQL_DIR', TESTIMOLATES_CLASS_DIR . '/b/graphql');

    define('BANNERS_CLASS_DIR', HOME_CLASS_DIR . '/banners');

    define('BANNERS_CLASS_CONSTANTS_DIR', BANNERS_CLASS_DIR . '/a');

    define('BANNERS_CLASS_UTILS_DIR', BANNERS_CLASS_DIR . '/b/utils');

    define('BANNERS_CLASS_GQL_DIR', BANNERS_CLASS_DIR . '/b/graphql');

    define('CLIENTS_CLASS_DIR', HOME_CLASS_DIR . '/clients');

    define('CLIENTS_CLASS_CONSTANTS_DIR', CLIENTS_CLASS_DIR . '/a');

    define('CLIENTS_CLASS_UTILS_DIR', CLIENTS_CLASS_DIR . '/b/utils');

    define('CLIENTS_CLASS_GQL_DIR', CLIENTS_CLASS_DIR . '/b/graphql');

    define('GIOITHIEU_PAGE_CLASS_DIR', COMPONENTS_DIR . '/gioithieu');

    define('GIOITHIEU_PAGE_CONSTANTS_DIR', GIOITHIEU_PAGE_CLASS_DIR . '/a');

    define('GIOITHIEU_PAGE_UTILS_DIR', GIOITHIEU_PAGE_CLASS_DIR . '/b/utils');

    define('GIOITHIEU_PAGE_GQL_DIR', GIOITHIEU_PAGE_CLASS_DIR . '/b/graphql');

    define('PAGE_CLASS_DIR', MY_THEME_DIR . '/classes/page');

    define('PAGE_CLASS_UTILS_DIR', PAGE_CLASS_DIR . '/b/utils'); 

    define('NAV_MENUS_CLASS_DIR', COMPONENTS_DIR . '/nav-menus');

    define('NAV_MENUS_CLASS_CONSTANTS_DIR', NAV_MENUS_CLASS_DIR . '/a');

    define('NAV_MENUS_CLASS_UTILS_DIR', NAV_MENUS_CLASS_DIR . '/b/utils');

    define('NAV_MENUS_CLASS_GQL_DIR', NAV_MENUS_CLASS_DIR . '/b/graphql');

    define('POSTS_CLASS_DIR', COMPONENTS_DIR . '/posts' );

    define('POSTS_CLASS_CONSTANTS_DIR', POSTS_CLASS_DIR . '/a' );

    define('POSTS_CLASS_GQL_DIR', POSTS_CLASS_DIR . '/b/graphql' );

    define('POSTS_CLASS_UTILS_DIR', POSTS_CLASS_DIR . '/b/utils' );

    define('PAGES_CLASS_DIR', COMPONENTS_DIR . '/pages' );

    define('PAGES_CLASS_UTILS_DIR', PAGES_CLASS_DIR . '/b/utils' );

    define('CATEGORIES_CLASS_DIR', COMPONENTS_DIR . '/categories');

    define('CATEGORIES_CLASS_UTILS_DIR', CATEGORIES_CLASS_DIR . '/b/utils');

    define('TAX_CLASS_DIR', COMPONENTS_DIR . '/taxonomies');

    define('TAX_CLASS_CONSTANTS_DIR', TAX_CLASS_DIR . '/a');

    define('TAX_CLASS_UTILS_DIR', TAX_CLASS_DIR . '/b/utils');

    define('TAX_CLASS_GQL_DIR', TAX_CLASS_DIR . '/b/graphql');

    define('WOO_CLASS_DIR', COMPONENTS_DIR . '/woocommerces');

    define('WOO_CLASS_CONSTANTS_DIR', WOO_CLASS_DIR . '/a');

    define('WOO_CLASS_UTILS_DIR', WOO_CLASS_DIR . '/b/utils');

    define('WOO_CLASS_GQL_DIR', WOO_CLASS_DIR . '/b/graphql');

    define('GRAPHQL_CLASS_DIR', MY_THEME_DIR . '/classes/graphql');

    define('GRAPHQL_CLASS_CONSTANTS_DIR', GRAPHQL_CLASS_DIR . '/a');

    define('GRAPHQL_CLASS_UTILS_DIR', GRAPHQL_CLASS_DIR . '/b/utils');

    define('EMPTY_PRODUCT_THUMBNAIL', get_template_directory_uri() . '/images/no-thumbnail.jpg');