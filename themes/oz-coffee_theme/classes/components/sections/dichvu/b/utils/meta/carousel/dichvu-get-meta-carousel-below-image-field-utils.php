<?php 

    namespace Home\Sections;

    class SVGetMetaCarouselBelowImageFieldUtils {

        public static function get($pid, $id = 0) {

            return get_post_meta($pid, 
                                 $id === 0 ? SV_FIELDS::CAROUSEL1_BELOW_IMAGE_FIELD : 
                                            SV_FIELDS::CAROUSEL2_BELOW_IMAGE_FIELD, 
                                true);

        }

    }