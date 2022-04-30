<?php 

    namespace Slider;

    class SliderGetMetaSubTextFieldUtils {

        public static function get($pid) {

          return get_post_meta($pid, SLIDER_FIELDS::SUB_TEXT_FIELD, true);

        }

    }