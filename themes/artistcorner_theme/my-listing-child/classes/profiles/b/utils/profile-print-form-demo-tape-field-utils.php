<?php 

    namespace Profiles;

    class ProfilePrintFormDemoTapeFieldUtils {

        public static function print($attachments) {

            foreach( $attachments as $key => $attachment ) :

                print_profile_form__field($attachment, _FIELD_JOBS_DEMO_TAPE . '[]');
    
            endforeach;


        }

    }