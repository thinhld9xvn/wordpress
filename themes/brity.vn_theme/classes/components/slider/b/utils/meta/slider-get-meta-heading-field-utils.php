<?php 

    namespace Slider;

    class SliderGetMetaHeadingFieldUtils {

        public static function get($pid) {

          return get_post_meta($pid, SLIDER_FIELDS::HEADING_FIELD, true);

        }

    }