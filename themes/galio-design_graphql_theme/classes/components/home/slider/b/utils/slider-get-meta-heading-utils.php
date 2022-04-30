<?php 

    namespace Home\Slider;

    class SliderGetMetaHeadingUtils {

        public static function get($pid) {

            return get_post_meta($pid, SLIDER_FIELDS::HEADING_LABEL_FIELD, true);
        }

    }