<?php 
    namespace Home\Testimolates;
    class GetTestimolatesItemsUtils {
        public static function get($lang = DEFAULT_LANG) {
            $results = [];
            $args = array(
                'post_type' => TESTIMOLATES_POST_TYPE,
                'posts_per_page' => -1,
                'orderby' => 'id',
                'order' => 'asc',
                'no_paging' => true,
                'lang' => $lang
            );
            query_posts($args);
            while ( have_posts() ) : the_post();
                $pid = get_the_id();
                $thumbnail = get_the_post_thumbnail_url($pid, 'large');
                $results[] = [
                    TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_ID => $pid,
                    TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_TITLE => get_the_title(),
                    TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_THUMBNAIL => !empty($thumbnail) ? $thumbnail : '',
                ];
            endwhile;
            wp_reset_query();
            return $results;
        }
    }
