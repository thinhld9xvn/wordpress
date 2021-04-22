<?php 

namespace Users;

class UserAdminExtraProfileFieldUtils {

    public static function extra($user_id) {

        if ( ! current_user_can( 'edit_user', $user_id ) ) { 
            return false; 
        }    

        update_user_meta( $user_id, 'profile_phone_number', esc_attr( $_POST['profile_phone_number'] ) );
        update_user_meta( $user_id, 'profile_avatar', esc_attr( $_POST['profile_avatar'] ) );
    

    }

}