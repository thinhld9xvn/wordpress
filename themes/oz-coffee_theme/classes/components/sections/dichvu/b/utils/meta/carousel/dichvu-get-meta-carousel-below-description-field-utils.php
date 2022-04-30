<?php 

    namespace Home\Sections;

    class SVGetMetaCarouselBelowDescriptionFieldUtils {

        public static function get($pid, $id = 0) {

            return get_post_meta($pid, 
                                 $id === 0 ? SV_FIELDS::CAROUSEL1_BELOW_DESCRIPTION_FIELD : 
                                            SV_FIELDS::CAROUSEL2_BELOW_DESCRIPTION_FIELD, 
                                true);

        }

    }