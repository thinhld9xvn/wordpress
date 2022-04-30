<?php 

    namespace Home\Slider;

    class SliderGetMetaDetailsLabelUtils {

        public static function get($pid) {

            return get_post_meta($pid, SLIDER_FIELDS::DETAILS_LABEL_FIELD, true);
        }

    }