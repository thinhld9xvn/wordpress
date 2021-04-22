<?php

    namespace Actions\Init;

    class ActionInitRewriteRulesUtils {

        public static function init($flash = false) {
           
            $store_details_pid = (int) \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::STORE_DETAILS_PAGE_ID,
                                                                                \Theme_Options\THEME_OPTIONS_FIELDS::PAGES_SECTION_ID);

            $store_details_url = \Urls\UrlGetStoreDetailsPageUtils::get();

            $store_details_page = get_post($store_details_pid);

            add_rewrite_rule('^' . $store_details_page->post_name . '/([^/]*)/?','index.php?page_id=' . $store_details_pid . '&shop_id=$matches[1]','top');

            if ($flash == true)
                flush_rewrite_rules(false);
            

        }

    }


