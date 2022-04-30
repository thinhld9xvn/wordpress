<?php 
    namespace Home\Slider;
    class getSliderItemsUtils {
        public static function get() {
            $results = [];
            $args = array(
                'post_type' => SLIDER_POST_TYPE,
                'posts_per_page' => -1,
                'orderby' => 'id',
                'order' => 'asc',
                'no_paging' => true
            );
            query_posts($args);
            while ( have_posts() ) : the_post();
                $pid = get_the_id();
                $thumbnail = get_the_post_thumbnail_url($pid, 'full');
                $results[] = [
                    SLIDER_FIELDS::SLIDER_GQL_ID => $pid,
                    SLIDER_FIELDS::SLIDER_GQL_TITLE => get_the_title(),
                    SLIDER_FIELDS::SLIDER_GQL_LARGE_TITLE => get_field(SLIDER_FIELDS::SLIDER_AFC_LARGE_TITLE_FIELD, $pid),
                    SLIDER_FIELDS::SLIDER_GQL_SMALL_TITLE => get_field(SLIDER_FIELDS::SLIDER_AFC_SMALL_TITLE_FIELD, $pid),
                    SLIDER_FIELDS::SLIDER_GQL_THUMBNAIL => !empty($thumbnail) ? $thumbnail : '',
                ];
            endwhile;
            wp_reset_query();
            return $results;
        }
    }
