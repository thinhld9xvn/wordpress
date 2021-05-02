<?php 

    namespace Profiles;

    class ProfileUpdateMetaAttachmentFieldUtils {

        public static function update($pid, $field_name, $field_value) {

            if ( $field_value === null ) :
            
                delete_post_meta($pid, $field_name);
    
                return;
    
            endif;
    
            $field_values = $field_value;
    
            if ( is_string( $field_value ) ) :
    
                $field_values = [$field_value];
    
            endif;
    
            $field_values = array_map(function($value) {
    
                $base64src = substr($value, 4);
                return base64_decode( $base64src );
    
            }, $field_values);       
    
            update_post_meta($pid, $field_name, $field_values);


        }

    }