<?php 
    namespace Home\Clients;
    class ClientsGetHomeDataUtils {
        public static function get() {
            $post_type = ClientsGetPostTypeFieldUtils::get();
            $posts_per_page = ClientsGetPostsPerPageFieldUtils::get();
            return [
                CLIENTS_FIELDS::HEADING_GQL_FIELD => ClientsGetHeadingFieldUtils::get(),
                CLIENTS_FIELDS::DATA_GQL_FIELD => ClientsGetAllItemsUtils::get($post_type, $posts_per_page),
            ];
        }
    }
