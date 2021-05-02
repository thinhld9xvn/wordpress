<?php 
    /* Template Name: View profile */

    get_header();

        global $post;

        $post = UserMemberShip::get_current_user_profile();

        include CHILD_THEME_DIR . '/templates/listing.php';

    get_footer();