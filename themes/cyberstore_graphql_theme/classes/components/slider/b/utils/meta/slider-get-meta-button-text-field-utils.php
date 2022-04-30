<?php 

    namespace Slider;

    class SliderGetMetaButtonTextFieldUtils {

        public static function get($pid) {

          return get_post_meta($pid, SLIDER_FIELDS::HEADING_BUTTON_TEXT_FIELD, true);

        }

    }