<?php 

    namespace Projects;
    
    class ProjectsGetMetaHeadingUtils {

        public static function get($pid) {

            return get_post_meta($pid, PROJECT_FIELDS::HEADING_FIELD, true);

        }

    }