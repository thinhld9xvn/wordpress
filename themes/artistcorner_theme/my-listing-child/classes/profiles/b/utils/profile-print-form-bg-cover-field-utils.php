<?php 

    namespace Profiles;

    class ProfilePrintFormBgCoverFieldUtils {

        public static function print($bg_cover_profiles) {

            $bg_cover_profile = $bg_cover_profiles[0];       

            print_profile_form__field($bg_cover_profile, _FIELD_JOBS_BG_COVER);


        }

    }