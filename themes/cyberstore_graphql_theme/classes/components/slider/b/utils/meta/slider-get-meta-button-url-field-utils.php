<?php 

    namespace Slider;

    class SliderGetMetaButtonUrlFieldUtils {

        public static function get($pid) {

          return get_post_meta($pid, SLIDER_FIELDS::HEADING_BUTTON_URL_FIELD, true);

        }

    }