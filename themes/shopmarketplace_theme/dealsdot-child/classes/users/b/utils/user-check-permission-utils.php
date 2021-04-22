<?php 

    namespace Users;

    class UserCheckPermissionUtils {

        public static function has($action) {

            switch ($action) :

                case \Users\USER_ROLES::CREATE_NEW_STORE_PERMISSION :

                    return current_user_can(\Users\USER_ROLES::ADMINISTRATOR_ROLE);

                    break;

                case \Users\USER_ROLES::UPDATE_STORE_DETAILS_PERMISSION :
                case \Users\USER_ROLES::VIEW_STORE_PRODUCT_LISTS_PERMISSION:
                case \Users\USER_ROLES::PUBLISH_PRODUCT_PERMISSION:

                    return ! current_user_can(\Users\USER_ROLES::ADMINISTRATOR_ROLE);

                    break;

                default:
                
                    break;

            endswitch;

            return false;

        }

    }