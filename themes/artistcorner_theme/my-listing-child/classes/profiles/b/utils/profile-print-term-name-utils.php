<?php 

    namespace Profiles;

    class ProfilePrintTermNameUtils {

        public static function print($term, $args) {

            echo get_profile_term_name($term, $args);

        }

    }