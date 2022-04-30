<?php 

    namespace Slider;

    class SliderGetMetaSubHeadingFieldUtils {

        public static function get($pid) {

          return get_post_meta($pid, SLIDER_FIELDS::SUBHEADING_FIELD, true);

        }

    }