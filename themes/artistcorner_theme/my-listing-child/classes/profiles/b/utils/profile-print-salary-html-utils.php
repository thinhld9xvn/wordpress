<?php 

    namespace Profiles;

    class ProfilePrintSalaryHtmlUtils {

        public static function print($post) {
            
            $profile_salary = get_profile_salary($post); ?>

            <span class="salary-name"><?php echo '$'. $profile_salary ?></span>

        <?php }

    }