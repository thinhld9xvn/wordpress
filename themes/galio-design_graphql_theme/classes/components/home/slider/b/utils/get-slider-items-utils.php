<?php 
    namespace Home\Slider;
    class getSliderItemsUtils {
        public static function get($lang = DEFAULT_LANG) {
            $results = [];
            $args = array(
                'post_type' => SLIDER_POST_TYPE,
                'posts_per_page' => -1,
                'orderby' => 'id',
                'order' => 'asc',
                'no_paging' => true,
                'lang' => $lang
            );
            query_posts($args);
            while ( have_posts() ) : the_post();
                $pid = get_the_id();
                $video = SliderGetMetaVideoUtils::get($pid);
                $url = SliderGetMetaUrlUtils::get($pid);
                $thumbnail = get_the_post_thumbnail_url($pid, 'feature_image_slider');
                $results[] = [
                    SLIDER_FIELDS::SLIDER_GQL_ID => $pid,
                    SLIDER_FIELDS::SLIDER_GQL_TITLE => get_the_title(),
                    SLIDER_FIELDS::SLIDER_GQL_HEADING => SliderGetMetaHeadingUtils::get($pid),
                    SLIDER_FIELDS::SLIDER_GQL_BUTTON_TEXT => SliderGetMetaDetailsLabelUtils::get($pid),
                    SLIDER_FIELDS::SLIDER_GQL_THUMBNAIL => !empty($thumbnail) ? $thumbnail : '',
                    SLIDER_FIELDS::SLIDER_GQL_VIDEO => !empty($video) ? $video['thumbnail'] : '',
                    SLIDER_FIELDS::SLIDER_GQL_URL => !empty($url) ? $url : '#',
                ];
            endwhile;
            wp_reset_query();
            usort($results, function($i1, $i2) {
                return ! empty($i1['video']) ? -1 : 1;
            });
            return $results;
        }
    }
