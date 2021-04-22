<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="outer-top-ts">
	<div class="container">
		<div class="row">
			<div class="col-md-12"> 
				<div class="sign-in-page">
					<div class="row">

						<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

						<div class="u-columns col2-set" id="customer_login">

							<div class="col-md-6 col-sm-6 sign-in">
							
						<?php endif; ?>

								<h4><?php esc_html_e( 'Connectez-vous', 'dealsdot' ); ?></h4>

								<form class="register-form outer-top-xs woocommerce-form woocommerce-form-login login" method="post">

									<?php do_action( 'woocommerce_login_form_start' ); ?>

									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
										<label for="username"><?php esc_html_e( 'Nom utilisateur', 'dealsdot' ); ?>&nbsp;<span class="required">*</span></label>
										<input type="text" class="form-control unicase-form-control woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
									</p>
									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
										<label for="password"><?php esc_html_e( 'Mot de Passe', 'dealsdot' ); ?>&nbsp;<span class="required">*</span></label>
										<input class="form-control unicase-form-control woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
									</p>

									<?php do_action( 'woocommerce_login_form' ); ?>

									<p class="form-row">
										<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
											<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Se souvenir de moi', 'dealsdot' ); ?></span>
										</label>
										<a class="forgot-password pull-right" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Mot de passe perdu?', 'dealsdot' ); ?></a>
									</p>

									<p class="form-row">

										<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
										<button type="submit" class="btn-upper btn btn-primary checkout-page-button  woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'dealsdot' ); ?>"><?php esc_html_e( 'Connexion', 'dealsdot' ); ?></button>
									</p>


									<?php do_action( 'woocommerce_login_form_end' ); ?>

								</form>

						<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

							</div>

							<?php //__unicorn_create_registration_form() ?>
							

						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

<?php 

	function __unicorn_create_registration_form() { ?>

		<div class="col-md-6 col-sm-6 create-new-account">

		<h4><?php esc_html_e( 'Register', 'dealsdot' ); ?></h4>

		<form method="post" class="register-form outer-top-xs woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_username"><?php esc_html_e( 'Username', 'dealsdot' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="form-control unicase-form-control woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_email"><?php esc_html_e( 'Email address', 'dealsdot' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="email" class="form-control unicase-form-control woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_password"><?php esc_html_e( 'Password', 'dealsdot' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="password" class="form-control unicase-form-control woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
				</p>

			<?php else : ?>

				<p><?php esc_html_e( 'A password will be sent to your email address.', 'dealsdot' ); ?></p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<p class="woocommerce-form-row form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="btn-upper btn btn-primary checkout-page-button woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'dealsdot' ); ?>"><?php esc_html_e( 'Register', 'dealsdot' ); ?></button>
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>


<?php }

?>
