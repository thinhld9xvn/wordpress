<?php
/**
 * Account details form template.
 *
 * @since 2.4.4
 */

//use \MyListing\Src\User_Roles;

if ( ! defined('ABSPATH') ) {
	exit;
}

do_action( 'woocommerce_before_edit_account_form' ); ?>

<?php print_edit_account_template(); ?>

<?php do_action( 'woocommerce_after_edit_account_form' ) ?>
