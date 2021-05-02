<?php

    namespace Users;

    class UserPrintHeaderNotLoggedInUtils {

        public static function print() { ?>

            <div class="user-area signin-area">
                <i class="mi person user-area-icon"></i> 
                <a href="<?php print_my_account_link()  ?>"> Sign in </a> 
                <span>or</span> 
                <a href="<?php print_account_register_link() ?>"> Register </a>
            </div>

            <div class="mob-sign-in">
                <a href="<?php print_my_account_link()  ?>"><i class="mi person"></i></a>
            </div>

            <a class="view-cart-contents" href="#" type="button" id="user-cart-menu" data-toggle="modal" data-target="#wc-cart-modal" title="View your shopping cart">
                <span class="mi shopping_basket"></span> <i class="header-cart-counter counter-hidden"></i>
            </a>

        <?php }

    }