<?php 

    define('THEME_VERSION', '1.0');   

    define('HOME_TEXT', 'Trang chủ');

    define('DEFAULT_LANG', 'vi');
    define('NEWS_CATEGORY_SLUG', 'tin-tuc');
    define('PROJECTS_POST_TYPE', 'projects');
    define('CATEGORY_TAXONOMY', 'category');
    define('PROJECTS_TAXONOMY', 'projects-category');
    define('MEDIA_TAXONOMY', 'galio-media-category');
    define('VIDEO_TAXONOMY', 'video-category');
    define('SLIDER_POST_TYPE', 'slider');
    define('CLIENTS_POST_TYPE', 'clients');
    define('MEDIA_POST_TYPE', 'galio-media');
    define('VIDEO_POST_TYPE', 'video');
    define('RECRUITMENT_POST_TYPE', 'recruit');
    define('GT_PAGE_ID', 19);
    define('GT_PAGE_EN_ID', 175);
    define('RECRUITMENT_PAGE_ID', 25);
    define('RECRUITMENT_PAGE_EN_ID', 105);
    define('CONTACT_FORM_VI_ID', 284);
    define('CONTACT_FORM_EN_ID', 291);
    define('CONTACT_FORM_TITLE_VI_ID', "Form liên hệ");
    define('CONTACT_FORM_TITLE_EN_ID', "Form liên hệ - Tiếng anh");
    define('GIFTS_FORM_VI_ID', 695);
    define('GIFTS_FORM_EN_ID', 696);
    define('GIFTS_FORM_TITLE_VI_ID', "Form quà tặng");
    define('GIFTS_FORM_TITLE_EN_ID', "Form quà tặng - Tiếng anh");

    const USER_LISTS_TYPES = [
        'Co-founders',
        'Architects',
        'Designers',
        'Interior finishing managers',
        'Finance manager',
        'HR Department'
    ];

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

    define('SLIDER_CLASS_DIR', HOME_CLASS_DIR . '/slider');
    define('SLIDER_CLASS_CONSTANTS_DIR', SLIDER_CLASS_DIR . '/a');
    define('SLIDER_CLASS_UTILS_DIR', SLIDER_CLASS_DIR . '/b/utils');
    define('SLIDER_CLASS_GQL_DIR', SLIDER_CLASS_DIR . '/b/graphql');

    define('GT_CLASS_DIR', HOME_CLASS_DIR . '/gioithieu');
    define('GT_CLASS_CONSTANTS_DIR', GT_CLASS_DIR . '/a');
    define('GT_CLASS_UTILS_DIR', GT_CLASS_DIR . '/b/utils');
    define('GT_CLASS_GQL_DIR', GT_CLASS_DIR . '/b/graphql');

    define('LHTK_CLASS_DIR', HOME_CLASS_DIR . '/lhtk');
    define('LHTK_CLASS_CONSTANTS_DIR', LHTK_CLASS_DIR . '/a');
    define('LHTK_CLASS_UTILS_DIR', LHTK_CLASS_DIR . '/b/utils');
    define('LHTK_CLASS_GQL_DIR', LHTK_CLASS_DIR . '/b/graphql');

    define('CLIENTS_CLASS_DIR', HOME_CLASS_DIR . '/clients');
    define('CLIENTS_CLASS_CONSTANTS_DIR', CLIENTS_CLASS_DIR . '/a');
    define('CLIENTS_CLASS_UTILS_DIR', CLIENTS_CLASS_DIR . '/b/utils');
    define('CLIENTS_CLASS_GQL_DIR', CLIENTS_CLASS_DIR . '/b/graphql');

    define('GIOITHIEU_PAGE_CLASS_DIR', COMPONENTS_DIR . '/gioithieu');
    define('GIOITHIEU_PAGE_CONSTANTS_DIR', GIOITHIEU_PAGE_CLASS_DIR . '/a');
    define('GIOITHIEU_PAGE_UTILS_DIR', GIOITHIEU_PAGE_CLASS_DIR . '/b/utils');
    define('GIOITHIEU_PAGE_GQL_DIR', GIOITHIEU_PAGE_CLASS_DIR . '/b/graphql');

    define('FOOTER_PAGE_CLASS_DIR', COMPONENTS_DIR . '/footer-page');
    define('FOOTER_PAGE_CONSTANTS_DIR', FOOTER_PAGE_CLASS_DIR . '/a');
    define('FOOTER_PAGE_UTILS_DIR', FOOTER_PAGE_CLASS_DIR . '/b/utils');
    define('FOOTER_PAGE_GQL_DIR', FOOTER_PAGE_CLASS_DIR . '/b/graphql');

    define('PAGE_CLASS_DIR', MY_THEME_DIR . '/classes/page');
    define('PAGE_CLASS_UTILS_DIR', PAGE_CLASS_DIR . '/b/utils'); 

    define('SOCIAL_NETWORK_CLASS_DIR', COMPONENTS_DIR . '/social-network');
    define('SOCIAL_NETWORK_CLASS_CONSTANTS_DIR', SOCIAL_NETWORK_CLASS_DIR . '/a');
    define('SOCIAL_NETWORK_CLASS_UTILS_DIR', SOCIAL_NETWORK_CLASS_DIR . '/b/utils');
    define('SOCIAL_NETWORK_CLASS_GQL_DIR', SOCIAL_NETWORK_CLASS_DIR . '/b/graphql');

    define('PROJECTS_CLASS_DIR', COMPONENTS_DIR . '/projects');
    define('PROJECTS_CLASS_CONSTANTS_DIR', PROJECTS_CLASS_DIR . '/a');
    define('PROJECTS_CLASS_UTILS_DIR', PROJECTS_CLASS_DIR . '/b/utils');
    define('PROJECTS_CLASS_GQL_DIR', PROJECTS_CLASS_DIR . '/b/graphql');

    define('MEDIA_CLASS_DIR', COMPONENTS_DIR . '/media');
    define('MEDIA_CLASS_CONSTANTS_DIR', MEDIA_CLASS_DIR . '/a');
    define('MEDIA_CLASS_UTILS_DIR', MEDIA_CLASS_DIR . '/b/utils');
    define('MEDIA_CLASS_GQL_DIR', MEDIA_CLASS_DIR . '/b/graphql');

    define('VIDEO_CLASS_DIR', COMPONENTS_DIR . '/video');
    define('VIDEO_CLASS_CONSTANTS_DIR', VIDEO_CLASS_DIR . '/a');
    define('VIDEO_CLASS_UTILS_DIR', VIDEO_CLASS_DIR . '/b/utils');
    define('VIDEO_CLASS_GQL_DIR', VIDEO_CLASS_DIR . '/b/graphql');

    define('RECRUITMENT_CLASS_DIR', COMPONENTS_DIR . '/recruitment');
    define('RECRUITMENT_CLASS_CONSTANTS_DIR', RECRUITMENT_CLASS_DIR . '/a');
    define('RECRUITMENT_CLASS_UTILS_DIR', RECRUITMENT_CLASS_DIR . '/b/utils');
    define('RECRUITMENT_CLASS_GQL_DIR', RECRUITMENT_CLASS_DIR . '/b/graphql');

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

    define('GRAPHQL_CLASS_DIR', MY_THEME_DIR . '/classes/graphql');
    define('GRAPHQL_CLASS_CONSTANTS_DIR', GRAPHQL_CLASS_DIR . '/a');
    define('GRAPHQL_CLASS_UTILS_DIR', GRAPHQL_CLASS_DIR . '/b/utils');