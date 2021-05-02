<?php 

    namespace Profiles;

    class ProfileUpdateFieldUtils {

        public static function update($pid, $field_name, $field_value) {

            if ( $field_value === null ) :
            
                delete_post_meta($pid, $field_name);
    
                return;
    
            endif;
    
            update_post_meta($pid, $field_name, $field_value);


        }

    }