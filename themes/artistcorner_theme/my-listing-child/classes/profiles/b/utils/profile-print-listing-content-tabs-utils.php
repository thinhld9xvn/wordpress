<?php 

    namespace Profiles;

    class ProfilePrintListingContentTabsUtils {

        public static function print() {

            print_single_profile_listing_detail_tab();

            if ( UserMemberShip::is_not_active_user($post->post_author) ) :

                print_single_profile_listing_proposal_tab();   
                
            endif;

        }

    }