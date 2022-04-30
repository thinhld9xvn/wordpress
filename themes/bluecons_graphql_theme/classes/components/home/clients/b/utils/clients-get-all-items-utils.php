<?php 
    namespace Home\Clients;
    class ClientsGetAllItemsUtils {
        public static function get($post_type, $posts_per_page = -1) {
            $results = [];
            $args = array(
                'post_type' => $post_type,
                'posts_per_page' => $posts_per_page,
                'meta_key' => 'priority',
                'orderby' => 'meta_value_num',
                'meta_type' => 'NUMERIC',
                'order' => 'ASC',
                'no_paging' => true
            );
            query_posts($args);
            while ( have_posts() ) : the_post();
                $pid = get_the_id();
                $thumbnail = ClientsGetBackgroundUtils::get($pid);
                $results[] = [
                    CLIENTS_FIELDS::ID_GQL_FIELD => $pid,
                    CLIENTS_FIELDS::TITLE_GQL_FIELD => get_the_title(),
                    CLIENTS_FIELDS::THUMBNAIL_GQL_FIELD => !empty($thumbnail) ? $thumbnail : '',
                ];
            endwhile;
            wp_reset_query();
            return $results;
        }
    }
