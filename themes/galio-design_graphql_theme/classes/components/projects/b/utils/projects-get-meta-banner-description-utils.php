<?php 

    namespace Projects;
    
    class ProjectsGetMetaBannerDescriptionUtils {

        public static function get($pid) {

            return get_post_meta($pid, PROJECT_FIELDS::BANNER_DESCRIPTION_FIELD, true);

        }

    }