<?php 

    namespace Slider;

    class SliderGetBreadcrumbsLabelUtils {

        public static function get($pid) {

           return get_post_meta($pid, SLIDER_FIELDS::BREADCRUMB_LABEL_FIELD, true);

        }

    }