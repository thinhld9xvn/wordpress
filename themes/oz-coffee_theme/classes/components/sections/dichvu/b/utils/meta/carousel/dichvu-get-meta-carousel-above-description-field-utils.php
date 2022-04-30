<?php 

    namespace Home\Sections;

    class SVGetMetaCarouselAboveDescriptionFieldUtils {

        public static function get($pid, $id = 0) {

            return get_post_meta($pid, 
                                 $id === 0 ? SV_FIELDS::CAROUSEL1_ABOVE_DESCRIPTION_FIELD : 
                                             SV_FIELDS::CAROUSEL2_ABOVE_DESCRIPTION_FIELD, 
                                true);

        }

    }