<?php 

    namespace Users;

    class UserUpdateOnlineListsUtils {

        public static function update() {

             // get logged-in users
             $logged_in_users = get_transient('online_status');

             // get current user ID
             $user = wp_get_current_user();
 
             // check if the current user needs to update his online status;
             // status no need to update if user exist in the list
             // and if his "last activity" was less than let's say ...15 minutes ago  
             $no_need_to_update = isset($logged_in_users[$user->ID]) 
                 && $logged_in_users[$user->ID] >  (time() - (15 * 60));
 
             // update the list if needed
             if (!$no_need_to_update) {
                 $logged_in_users[$user->ID] = time();
                 set_transient('online_status', $logged_in_users, $expire_in = (30*60)); // 30 mins 
             }

        }

    }