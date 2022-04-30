<?php 
    namespace Home\Clients;
    class ClientsGetAllItemsUtils {
        public static function get($lang = DEFAULT_LANG) {
            $results = [];
            $args = array(
                'post_type' => CLIENTS_POST_TYPE,
                'posts_per_page' => -1,
                'orderby' => 'id',
                'order' => 'asc',
                'no_paging' => true,
                'lang' => $lang
            );
            query_posts($args);
            while ( have_posts() ) : the_post();
                $pid = get_the_id();
                $thumbnail = ClientsGetBackgroundUtils::get($pid);
                $results[] = [
                    CLIENTS_FIELDS::ID_FIELD => $pid,
                    CLIENTS_FIELDS::TITLE_FIELD => get_the_title(),
                    CLIENTS_FIELDS::THUMBNAIL_FIELD => !empty($thumbnail) ? $thumbnail : '',
                ];
            endwhile;
            wp_reset_query();
            return $results;
        }
    }
