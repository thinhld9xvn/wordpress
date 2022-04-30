<?php 

    namespace Home\Slider;

    class SliderGetMetaVideoUtils {

        public static function get($pid) {

            return get_post_meta($pid, SLIDER_FIELDS::VIDEO_FIELD, true);
        }

    }