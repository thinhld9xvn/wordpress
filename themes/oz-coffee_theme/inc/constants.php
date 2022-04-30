<?php 

    define('THEME_VERSION', '1.0');   

    define('HOME_TEXT', 'Trang chủ');

    define('PAGE_CONTACT_ID', 21);
    

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

        define('SOCIAL_NETWORK_CLASS_DIR', COMPONENTS_DIR . '/social-network');
        define('SOCIAL_NETWORK_CLASS_UTILS_DIR', SOCIAL_NETWORK_CLASS_DIR . '/b/utils');

        define('SLIDER_CLASS_DIR', COMPONENTS_DIR . '/slider');
        define('SLIDER_CLASS_CONSTANTS_DIR', SLIDER_CLASS_DIR . '/a');
        define('SLIDER_CLASS_UTILS_DIR', SLIDER_CLASS_DIR . '/b/utils');

        define('GT_SECTION_CLASS_DIR', SECTIONS_DIR . '/gioithieu');
        define('GT_SECTION_CLASS_UTILS_DIR', GT_SECTION_CLASS_DIR . '/b/utils');

        define('SERVICE_SECTION_CLASS_DIR', SECTIONS_DIR . '/dichvu');
        define('SERVICE_SECTION_CLASS_UTILS_DIR', SERVICE_SECTION_CLASS_DIR . '/b/utils');

        define('NEWS_SECTION_CLASS_DIR', SECTIONS_DIR . '/tintuc');
        define('NEWS_SECTION_CLASS_UTILS_DIR', NEWS_SECTION_CLASS_DIR . '/b/utils');

        define('GALLERIES_SECTION_CLASS_DIR', SECTIONS_DIR . '/thuvienanh');
        define('GALLERIES_SECTION_CLASS_UTILS_DIR', GALLERIES_SECTION_CLASS_DIR . '/b/utils');

        define('REVIEWS_SECTION_CLASS_DIR', SECTIONS_DIR . '/danhgia');
        define('REVIEWS_SECTION_CLASS_UTILS_DIR', REVIEWS_SECTION_CLASS_DIR . '/b/utils');     

        define('FOOTER_CLASS_DIR', COMPONENTS_DIR . '/footer');
        define('FOOTER_CLASS_UTILS_DIR', FOOTER_CLASS_DIR . '/b/utils');
        
        define('NAVIGATION_SIDEBAR_CLASS_DIR', COMPONENTS_DIR . '/navigation-sidebar');
        define('NAVIGATION_SIDEBAR_CLASS_UTILS_DIR', NAVIGATION_SIDEBAR_CLASS_DIR . '/b/utils');

        define('ARCHIVE_SERVICE_CLASS_DIR', ARCHIVE_DIR . '/dichvu');
        define('ARCHIVE_SERVICE_CLASS_UTILS_DIR', ARCHIVE_SERVICE_CLASS_DIR . '/b/utils'); 
        
        define('ARCHIVE_UUDAI_CLASS_DIR', ARCHIVE_DIR . '/uudai');
        define('ARCHIVE_UUDAI_CLASS_UTILS_DIR', ARCHIVE_UUDAI_CLASS_DIR . '/b/utils'); 

        define('ARCHIVE_TINTUC_CLASS_DIR', ARCHIVE_DIR . '/tintuc');
        define('ARCHIVE_TINTUC_CLASS_UTILS_DIR', ARCHIVE_TINTUC_CLASS_DIR . '/b/utils'); 

        define('ARCHIVE_GALLERIES_CLASS_DIR', ARCHIVE_DIR . '/galleries');
        define('ARCHIVE_GALLERIES_CLASS_UTILS_DIR', ARCHIVE_GALLERIES_CLASS_DIR . '/b/utils'); 

        define('PAGE_CLASS_DIR', MY_THEME_DIR . '/classes/page');
        define('PAGE_CLASS_UTILS_DIR', PAGE_CLASS_DIR . '/b/utils'); 

        define('SEARCH_CLASS_DIR', MY_THEME_DIR . '/classes/search');
        define('SEARCH_CLASS_UTILS_DIR', SEARCH_CLASS_DIR . '/b/utils'); 

        define('WIDGETS_EXTRAS_DIR', MY_THEME_DIR . '/extras/widgets');
        define('WIDGET_SLIDER_DIR', WIDGETS_EXTRAS_DIR . '/slider');
        define('WIDGET_GIOITHIEU_DIR', WIDGETS_EXTRAS_DIR . '/gioithieu');
        define('WIDGET_DICHVU_DIR', WIDGETS_EXTRAS_DIR . '/dichvu');
        define('WIDGET_TINTUC_DIR', WIDGETS_EXTRAS_DIR . '/tintuc');
        define('WIDGET_THUVIENANH_DIR', WIDGETS_EXTRAS_DIR . '/thuvienanh');
        define('WIDGET_DANHGIA_DIR', WIDGETS_EXTRAS_DIR . '/danhgia');
        define('WIDGET_FOOTER_DIR', WIDGETS_EXTRAS_DIR . '/footer');

    /* */
        define('PAGE_GALLERY_URL', '/view-gallery');