<?php
/**
 * Lost password confirmation text.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/lost-password-confirmation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.9.0
 */

defined( 'ABSPATH' ) || exit;

$messages = \MessageNotification\MessageGetUtils::get_all();

//extract($messages);

?>
<div class="outer-top-ts">
	<div class="container">
		<div class="row">
			<div class="col-md-12"> 
				<div class="sign-in-page password-confirmation">
					<?php
						wc_print_notice( esc_html__( $messages[\Theme_Options\THEME_OPTIONS_FIELDS::PASSWORD_RESET_MAIL_NOTICE_MSG_ID], 'dealsdot' ) );
					?>

					<?php do_action( 'woocommerce_before_lost_password_confirmation_message' ); ?>


					<p><?php echo esc_html( apply_filters( 'woocommerce_lost_password_confirmation_message', esc_html__( $messages[\Theme_Options\THEME_OPTIONS_FIELDS::PASSWORD_RESET_MAIL_CONFIRM_MSG_ID], 'dealsdot' ) ) ); ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php do_action( 'woocommerce_after_lost_password_confirmation_message' ); ?>
