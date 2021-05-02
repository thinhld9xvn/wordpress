<?php 

    namespace Profiles;

    class ProfileGetSalaryUtils {

        public static function get_html($salary) {

            $html = '<span class="salary-name">$' . $salary . '</span>';      

            return $html;


        }

    }