<?php 

    namespace Recruitment;

    class RecruitmentGetMetaLocationUtils {

        public static function get($pid) {

            return get_post_meta($pid, RECRUITMENT_FIELDS::LOCATION_FIELD, true);

        }

    }