<?php 

    namespace Actions\Enqueues;

    class EnqueueStoreDetailsPageUtils {

        public static function render() {
            
            if ( is_page_template(\Page_Templates\PAGE_TEMPLATES::PAGE_STORE_DETAILS_TEMPLATE) ) :
                
                wp_enqueue_script('pagination-jquery', get_stylesheet_directory_uri() . '/assets/js/pagination.min.js');
                wp_enqueue_script('search-pagination-js', get_stylesheet_directory_uri() . '/assets/js/search-pagination/search-pagination.js');         
                wp_enqueue_script('product-gmap-jquery', get_stylesheet_directory_uri() . '/assets/js/product-gmap.js');
    
            endif;           

        }

    }