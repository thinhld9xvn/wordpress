<?php 

    namespace Home\Sections;

    class SVGetMetaCarouselAboveButtonTextFieldUtils {

        public static function get($pid, $id = 0) {            

            return get_post_meta($pid, 
                                  $id === 0 ? SV_FIELDS::CAROUSEL1_ABOVE_BUTTON_TEXT_FIELD : 
                                                SV_FIELDS::CAROUSEL2_ABOVE_BUTTON_TEXT_FIELD, true);

        }

    }