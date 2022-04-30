<?php 

    namespace Media;

    use \Taxonomies\TaxGetMetaTermsUtils;

    class MediaGetAllItemsUtils {

        public static function get($lang = DEFAULT_LANG) {

            $results = [];

            $args = array(
                'post_type' => MEDIA_POST_TYPE,
                'posts_per_page' => -1,
                'no_paging' => true,
                'lang' => $lang
            );
 
            query_posts($args);
            
            while ( have_posts() ) : the_post();

                $pid = get_the_id();

                $title = get_the_title($pid);
                $thumbnail = get_the_post_thumbnail_url($pid, 'full');

                $results[] = [
                    MEDIA_FIELDS::ID_GQL_FIELD => $pid,
                    MEDIA_FIELDS::TITLE_GQL_FIELD => $title,
                    MEDIA_FIELDS::THUMBNAIL_GQL_FIELD => $thumbnail,
                    MEDIA_FIELDS::CATEGORIES_GQL_FIELD => TaxGetMetaTermsUtils::get($pid, MEDIA_TAXONOMY)
                ];

            endwhile;

            wp_reset_query();

            return $results;

        }

    }