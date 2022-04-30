<?php 
    namespace Slider;

    class SliderGetPauseSettingUtils {

       public static function get() {

        return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_PAUSE_SETTING_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::SLIDER_SECTION_ID);
           
       }

    }