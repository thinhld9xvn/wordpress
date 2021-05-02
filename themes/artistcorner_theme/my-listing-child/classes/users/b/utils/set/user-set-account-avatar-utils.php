<?php 

    namespace Users;

    class UserSetAccountAvatarUtils {

        public static function set($avatar_profile) {          

            set_profile_avatar(null, $avatar_profile);

        }

    }