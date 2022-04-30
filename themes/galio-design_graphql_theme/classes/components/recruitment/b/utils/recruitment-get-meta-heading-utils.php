<?php 

    namespace Recruitment;

    class RecruitmentGetMetaHeadingUtils {

        public static function get($pid) {

            return get_post_meta($pid, RECRUITMENT_FIELDS::HEADING_FIELD, true);

        }

    }