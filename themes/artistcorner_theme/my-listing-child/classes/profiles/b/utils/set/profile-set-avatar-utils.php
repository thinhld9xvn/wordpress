<?php 

    namespace Profiles;

    class ProfileSetAvatarUtils {

        /// $avatar_profile : base64
        public static function set($pid, $avatar_profile) {

            global $current_user;

            if ( $avatar_profile ) :
            
                if ( is_array( $avatar_profile ) ) :
        
                    $avatar_profile = $avatar_profile[0];
        
                endif;
        
                $avatar_profile = substr($avatar_profile, 4);
        
                $avatar_profile = base64_decode($avatar_profile);
        
                $attachment_id = pn_get_attachment_id_from_url($avatar_profile);
        
                if ( $pid ) :
    
                    set_post_thumbnail( $pid, $attachment_id );
    
                endif;
    
                update_user_meta($current_user->ID, _FIELD_USER_PROFILE_PHOTO_ID, $attachment_id);
                update_user_meta($current_user->ID, _FIELD_USER_PROFILE_PHOTO_URL, $avatar_profile);
        
            endif;


        }

    }