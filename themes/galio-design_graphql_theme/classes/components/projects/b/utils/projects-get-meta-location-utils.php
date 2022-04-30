<?php 

    namespace Projects;
    
    class ProjectsGetMetaLocationUtils {

        public static function get($pid) {

            return get_post_meta($pid, PROJECT_FIELDS::LOCATION_FIELD, true);

        }

    }