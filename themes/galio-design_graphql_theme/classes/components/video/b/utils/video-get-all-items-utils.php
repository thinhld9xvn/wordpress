<?php 

    namespace Video;

    use \Taxonomies\TaxGetMetaTermsUtils;

    class VideoGetAllItemsUtils {

        public static function get($lang = DEFAULT_LANG) {

            $results = [];

            $args = array(
                'post_type' => VIDEO_POST_TYPE,
                'posts_per_page' => -1,
                'no_paging' => true,
                'orderby' => 'title',
                'order' => 'asc',
                'lang' => $lang
            );
 
            query_posts($args);
            
            while ( have_posts() ) : the_post();

                $pid = get_the_id();

                $title = get_the_title($pid);
                $thumbnail = get_the_post_thumbnail_url($pid, 'full');
                $vid = VideoGetMetaYtIdUtils::get($pid);

                $results[] = [
                    VIDEO_FIELDS::ID_GQL_FIELD => $pid,
                    VIDEO_FIELDS::TITLE_GQL_FIELD => $title,
                    VIDEO_FIELDS::THUMBNAIL_GQL_FIELD => $thumbnail,
                    VIDEO_FIELDS::VIDEO_YT_ID_GQL_FIELD => $vid,
                    VIDEO_FIELDS::CATEGORIES_GQL_FIELD => TaxGetMetaTermsUtils::get($pid, VIDEO_TAXONOMY)
                ];

            endwhile;

            wp_reset_query();

            return $results;

        }

    }