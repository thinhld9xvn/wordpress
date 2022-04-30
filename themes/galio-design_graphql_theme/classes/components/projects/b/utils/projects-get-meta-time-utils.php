<?php 

    namespace Projects;
    
    class ProjectsGetMetaTimeUtils {

        public static function get($pid) {

            return get_post_meta($pid, PROJECT_FIELDS::TIME_FIELD, true);

        }

    }