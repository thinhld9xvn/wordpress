<?php 

    namespace Slider;

    class SliderGetButtonTextUtils {

       public static function get($pid) {

         return get_post_meta($pid, SLIDER_FIELDS::BUTTON_TEXT_FIELD, true);
           
       }

    }