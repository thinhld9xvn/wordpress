<?php 

    namespace Recruitment;

    class RecruitmentGetMetaButtonUrlUtils {

        public static function get($pid) {

            $page_id = get_post_meta($pid, RECRUITMENT_FIELDS::PAGE_ID_FIELD, true);
            $page = get_post($page_id);

            return filter_permalink(get_the_permalink($page));

        }

    }