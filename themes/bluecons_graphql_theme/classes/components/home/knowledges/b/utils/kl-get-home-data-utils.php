<?php 
    namespace Home\Knowledges;

    use Home\Products\KLGetPostsPerPageFieldUtils;
    class KLGetHomeDataUtils {
        public static function get() {
            $post_type = 'post';
            $posts_per_page = KLGetPostsPerPageFieldUtils::get();
            return [
                KL_FIELDS::HEADING_GQL_FIELD => KLGetHeadingFieldUtils::get(),
                KL_FIELDS::DATA_GQL_FIELD => KLGetSpecialsItemsUtils::get($post_type, $posts_per_page),
                KL_FIELDS::BUTTON_TEXT_GQL_FIELD => KLGetButtonTextFieldUtils::get(),
                KL_FIELDS::BUTTON_URL_GQL_FIELD => KLGetButtonUrlFieldUtils::get()
            ];
        }
    }
