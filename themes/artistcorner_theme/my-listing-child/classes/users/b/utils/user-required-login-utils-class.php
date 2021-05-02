<?php

    namespace Users;

    class UserRequiredLoginUtils {

        public static function required() {

            if ( is_in_user_dashboard() ) :

                if ( ! is_user_logged_in() ) : 

                    get_header(); ?>

                    <div class="woocommerce">

                        <?php require_once CHILD_THEME_DIR . '/templates/dashboard/form-login.php'; ?>

                    </div>

                <?php get_footer();

                    die();

                endif;

            endif;

        }

    }