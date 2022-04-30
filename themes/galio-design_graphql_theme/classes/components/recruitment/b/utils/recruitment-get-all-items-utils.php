<?php 

    namespace Recruitment;

    class RecruitmentGetAllItemsUtils {

        public static function get($lang = DEFAULT_LANG) {

            $results = [];

            $args = array(
                'post_type' => RECRUITMENT_POST_TYPE,
                'posts_per_page' => -1,
                'no_paging' => true,
                'orderby' => 'title',
                'order' => 'asc',
                'lang' => $lang
            );
 
            query_posts($args);
            
            while ( have_posts() ) : the_post();

                $pid = get_the_id();
                $location = RecruitmentGetMetaLocationUtils::get($pid);
                $thumbnail = get_the_post_thumbnail_url($pid, 'full');

                $results[] = [
                    RECRUITMENT_FIELDS::ID_GQL_FIELD => $pid,
                    RECRUITMENT_FIELDS::TITLE_GQL_FIELD => get_the_title($pid),
                    RECRUITMENT_FIELDS::CONTENTS_GQL_FIELD => get_the_content($pid),
                    RECRUITMENT_FIELDS::LOCATION_GQL_FIELD => $location,
                    RECRUITMENT_FIELDS::THUMBNAIL_GQL_FIELD => !empty($thumbnail) ? $thumbnail : ''
                ];  

            endwhile;   

            wp_reset_query();

            return $results;

        }

    }