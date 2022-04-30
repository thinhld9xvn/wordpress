<?php 

    namespace Projects;
    
    class ProjectsGetMetaDentisionUtils {

        public static function get($pid) {

            return get_post_meta($pid, PROJECT_FIELDS::DENTISION_FIELD, true);

        }

    }