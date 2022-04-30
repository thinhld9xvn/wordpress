<?php 
    namespace Slider;

    class SliderGetDescriptionUtils {

       public static function get($pid) {

         return get_post_meta($pid, SLIDER_FIELDS::DESCRIPTION_FIELD, true);
           
       }

    }