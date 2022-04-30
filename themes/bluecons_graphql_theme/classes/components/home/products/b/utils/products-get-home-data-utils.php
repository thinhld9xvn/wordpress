<?php 
    namespace Home\Products;
    class PDGetHomeDataUtils {
        public static function get() {
            $post_type = PDGetPostTypeFieldUtils::get();
            $posts_per_page = PDGetPostsPerPageFieldUtils::get();
            return [
                PRODUCTS_FIELDS::HEADING_GQL_FIELD => PDGetHeadingFieldUtils::get(),
                PRODUCTS_FIELDS::DATA_GQL_FIELD => PDGetSpecialsItemsUtils::get($post_type, $posts_per_page),
                PRODUCTS_FIELDS::BUTTON_TEXT_GQL_FIELD => PDGetButtonTextFieldUtils::get(),
                PRODUCTS_FIELDS::BUTTON_URL_GQL_FIELD => PDGetButtonUrlFieldUtils::get()
            ];
        }
    }
