<?php 

    namespace Projects;
    
    class ProjectsGetMetaDescriptionUtils {

        public static function get($pid) {

            return get_post_meta($pid, PROJECT_FIELDS::DESCRIPTION_FIELD, true);

        }

    }