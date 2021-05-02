<?php 

    namespace Users;

    class UserCheckActionPermissionUtils {

        public static function has($permission) {

            global $current_user;

            return UserMemberShip::has_action_permission_in_user($current_user->ID, $permission);

        }

        public static function has_in_uid($uid, $permission) {

            $role = UserMemberShip::get_account_role($uid);           

            switch ($permission) :

                case UserPermission::SHOW_VIEWS_IN_DASHBOARD:

                    if ( $role === _ACCOUNT_ROLE_PROVIDER ) return true;
                    if ( $role === _ACCOUNT_ROLE_CUSTOMER ) return false;

                    break;

                case UserPermission::SHOW_UNIQUE_VIEWS_IN_DASHBOARD:

                    if ( $role === _ACCOUNT_ROLE_PROVIDER ) return true;
                    if ( $role === _ACCOUNT_ROLE_CUSTOMER ) return false;

                    break;

                case UserPermission::SHOW_VISITS_IN_DASHBOARD:

                    if ( $role === _ACCOUNT_ROLE_PROVIDER ) return true;
                    if ( $role === _ACCOUNT_ROLE_CUSTOMER ) return false;

                    break;

                case UserPermission::SHOW_INBOX_IN_PROPOSAL: 

                    if ( $role === _ACCOUNT_ROLE_PROVIDER ) return true;
                    if ( $role === _ACCOUNT_ROLE_CUSTOMER ) return false;

                    break;

                case UserPermission::SHOW_EDIT_PROFILE_DETAILS:  

                    if ( $role === _ACCOUNT_ROLE_PROVIDER ) return true;
                    if ( $role === _ACCOUNT_ROLE_CUSTOMER ) return false;
                    
                    break;

            endswitch;

            return true;

        }

    }