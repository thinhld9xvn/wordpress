<?php 

    namespace Home\Sections;

    class ReviewsSectionGetMetaAvatarFieldUtils {

        public static function get($pid) {

            return get_post_meta($pid, REVIEWS_FIELDS::AVATAR_FIELD, true);

        }

    }