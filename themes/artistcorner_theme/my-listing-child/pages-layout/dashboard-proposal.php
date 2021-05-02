<?php
/* Template Name: Dashboard Proposal */

get_header(); ?>

<div class="woocommerce-account">

    <div class="woocommerce">

        <div class="mlduo-account-menu">

<?php

            /* Menu navigation */

            do_action( 'woocommerce_before_account_navigation' );

                print_admin_menu_navigation();

            do_action( 'woocommerce_after_account_navigation' );

            /* #Menu navigation */ ?>

        </div>

        <?php Proposal::print_dashboard_proposal(); ?>

    </div>

</div>

<?php

    get_footer();