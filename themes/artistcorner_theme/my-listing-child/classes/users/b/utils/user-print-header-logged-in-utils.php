<?php

    namespace Users;

    class UserPrintHeaderLoggedInUtils {

        public static function print() {

            global $current_user; ?>

            <div class="user-area">
                <div class="user-profile-dropdown dropdown">
                    <a class="user-profile-name" 
                        href="#" type="button" 
                        id="user-dropdown-menu" 
                        data-toggle="dropdown" 
                        aria-haspopup="true" 
                        aria-expanded="true">

                        <div class="avatar">
                            <?php echo get_avatar( $current_user->ID, 96 ); ?>
                        </div>

                        <?php echo $current_user->display_name; ?>

                        <div class="submenu-toggle"><i class="material-icons">arrow_drop_down</i></div>
                    </a>

                    <?php wp_nav_menu(
                            array(
                                'theme_location' => 'mylisting-user-menu',
                                'menu_class' => 'i-dropdown dropdown-menu'
                            )
                        ); ?>                
                </div>

                <a class="view-cart-contents" 
                    href="<?php print_account_bookmark_link(); ?>" 
                    type="button" 
                    id="user-bookmarks">

                    <span class="mi bookmark_border"></span>

                </a>
                <div class="messaging-center inbox-header-icon">
                    <a href="#" id="messages-modal-toggle" class="icon-btn" data-toggle="modal" data-target="#ml-messages-modal">
                        <i class="mi forum"></i>
                        <div class="chat-counter-container" id="ml-chat-activities"></div>
                    </a>
                </div>
            </div>	

            <div class="header-button">
                <a href="<?php print_edit_profile_link() ?>" class="buttons button-1"> 
                <i class="icon-location-pin-check-2"></i>Edit my profile</a>
            </div>       

          
        <?php }

    }