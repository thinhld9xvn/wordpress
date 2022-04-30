<?php 

    namespace Home\Sections;

    class SVGetMetaCarouselBelowTitleFieldUtils {

        public static function get($pid, $id = 0) {

            return get_post_meta($pid, 
                                 $id === 0 ? SV_FIELDS::CAROUSEL1_BELOW_TITLE_FIELD : 
                                             SV_FIELDS::CAROUSEL2_BELOW_TITLE_FIELD, 
                                true);

        }

    }