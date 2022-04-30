<?php 

    namespace Recruitment;

    class RecruitmentGetMetaButtonTextUtils {

        public static function get($pid) {

            return get_post_meta($pid, RECRUITMENT_FIELDS::BUTTON_TEXT_FIELD, true);

        }

    }