<?php 

    namespace Home\Sections;

    class ReviewsSectionGetMetaJobTitleFieldUtils {

        public static function get($pid) {

            return get_post_meta($pid, REVIEWS_FIELDS::JOBTITLE_FIELD, true);

        }

    }