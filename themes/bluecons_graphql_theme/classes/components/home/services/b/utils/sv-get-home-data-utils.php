<?php 
    namespace Home\Services;
    class SVGetHomeDataUtils {
        public static function get() {
            $post_type = SVGetPostTypeFieldUtils::get();
            $posts_per_page = SVGetPostsPerPageFieldUtils::get();
            return [
                SERVICES_FIELDS::HEADING_GQL_FIELD => SVGetHeadingFieldUtils::get(),
                SERVICES_FIELDS::HEADING_SMALL_GQL_FIELD => SVGetHeadingSmFieldUtils::get(),
                SERVICES_FIELDS::DATA_GQL_FIELD => SVGetSpecialsItemsUtils::get($post_type, $posts_per_page),
                SERVICES_FIELDS::BUTTON_TEXT_GQL_FIELD => SVGetButtonTextFieldUtils::get(),
                SERVICES_FIELDS::BUTTON_URL_GQL_FIELD => SVGetButtonUrlFieldUtils::get()
            ];
        }
    }
