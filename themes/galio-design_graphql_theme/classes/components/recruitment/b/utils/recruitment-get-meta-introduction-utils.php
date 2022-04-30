<?php 

    namespace Recruitment;

    class RecruitmentGetMetaIntroductionUtils {

        public static function get($pid) {

            return get_post_meta($pid, RECRUITMENT_FIELDS::INTRODUCTION_FIELD, true);

        }

    }