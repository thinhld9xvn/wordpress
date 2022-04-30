<?php 

    namespace Slider;

    class SliderGetMetaVideoFieldUtils {

        public static function get($pid) {

          $meta = get_post_meta($pid, SLIDER_FIELDS::VIDEO_FIELD, true);

          return $meta['thumbnail'];

        }

    }