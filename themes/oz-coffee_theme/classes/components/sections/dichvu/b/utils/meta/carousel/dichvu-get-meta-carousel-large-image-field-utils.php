<?php 

    namespace Home\Sections;

    class SVGetMetaCarouselLargeImageFieldUtils {

        public static function get($pid, $id = 0) {

            return get_post_meta($pid, 
                                 $id === 0 ? SV_FIELDS::CAROUSEL1_LARGE_IMAGE_FIELD : 
                                            SV_FIELDS::CAROUSEL2_LARGE_IMAGE_FIELD, 
                                true);

        }

    }