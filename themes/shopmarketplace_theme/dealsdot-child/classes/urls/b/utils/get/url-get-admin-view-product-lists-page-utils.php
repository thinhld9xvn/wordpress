<?php 

    namespace Urls;

    class UrlGetAdminViewProductListsPageUtils {

        public static function get() {

            $page_id = (int) \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::ADMIN_STORE_VIEW_PRODUCTS_LIST_PAGE_ID,
                                                                     \Theme_Options\THEME_OPTIONS_FIELDS::PAGES_SECTION_ID);
    
            $permalink = get_the_permalink($page_id);
    
            if ( '/' !== substr($permalink, strlen($permalink) - 1) ) :
    
                return $permalink . '/';
    
            endif;
    
            return $permalink;

        }

    }