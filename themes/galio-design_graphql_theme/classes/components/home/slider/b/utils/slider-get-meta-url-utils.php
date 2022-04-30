<?php 
    namespace Home\Slider;
    class SliderGetMetaUrlUtils {
        public static function get($pid) {
            return get_post_meta($pid, SLIDER_FIELDS::URL_FIELD, true);
        }
    }