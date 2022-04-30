<?php 

    namespace Projects;
    
    class ProjectsGetMetaTeamUtils {

        public static function get($pid) {

            return get_post_meta($pid, PROJECT_FIELDS::TEAM_FIELD, true);

        }

    }