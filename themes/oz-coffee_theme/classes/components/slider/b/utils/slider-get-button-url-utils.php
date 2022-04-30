<?php 

    namespace Slider;

    class SliderGetButtonUrlUtils {

       public static function get($pid) {

         return get_post_meta($pid, SLIDER_FIELDS::BUTTON_URL_FIELD, true);
           
       }

    }