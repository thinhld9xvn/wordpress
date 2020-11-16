<?php

/* 
	Tất cả đoạn code dưới đây có sử dụng mã nguồn của plugin WP-Mail-SMTP của tác giả CALLUM MACDONALD. 

	Nhóm phát triển module PITVIET CONTACT FORM của công ty PITVIET chúng tôi xin chân thành cảm ơn 
	tác giả CALLUM MACDONALD đã cống hiến mã nguồn cho cộng đồng mã nguồn mở nói chung và cho cộng đồng 
	phát triển Wordpress nói riêng đã góp phần tạo nên sự thành công của module PITVIET CONTACT FORM này !!!

	Chúc tác giả gia đình khỏe mạnh và có những sự cống hiến nhiều hơn nữa cho cộng đồng mã nguồn mở !!!
*/

/*
Plugin Name: WP-Mail-SMTP
Version: 0.9.5
Plugin URI: http://www.callum-macdonald.com/code/wp-mail-smtp/
Description: Reconfigures the wp_mail() function to use SMTP instead of mail() and creates an options page to manage the settings.
Author: Callum Macdonald
Author URI: http://www.callum-macdonald.com/
*/

/**
 * @author Callum Macdonald
 * @copyright Callum Macdonald, 2007-11, All Rights Reserved
 * This code is released under the GPL licence version 3 or later, available here
 * http://www.gnu.org/licenses/gpl.txt
 */

// Array of options and their default values
global $wpms_options; // This is horrible, should be cleaned up at some point
$wpms_options = array (
	'mail_from' => '',
	'mail_from_name' => '',
	'mailer' => 'smtp',
	'mail_set_return_path' => 'false',
	'smtp_host' => 'localhost',
	'smtp_port' => '25',
	'smtp_ssl' => 'none',
	'smtp_auth' => false,
	'smtp_user' => '',
	'smtp_pass' => ''
);

// đọc option này từ theme options
$pvcf_smtp_options = get_option( 'section-contact-form_option_name' );

$email_address = $pvcf_smtp_options['contactform-email-address-id'];

if ( $email_address ) :

	$email_name = $pvcf_smtp_options['contactform-email-name-id'];	
	$smtp_host = $pvcf_smtp_options['contactform-smtp-host-id'];
	$smtp_port = $pvcf_smtp_options['contactform-smtp-port-id'];
	$smtp_encryption = $pvcf_smtp_options['contactform-smtp-encryption-id'];
	$smtp_authentication_username = $pvcf_smtp_options['contactform-authentication-username-id'];
	$smtp_authentication_password = $pvcf_smtp_options['contactform-authentication-password-id'];

	define('WPMS_ON', true); // turn on using smtp

	define('WPMS_MAILER', 'smtp'); // Possible values 'smtp', 'mail', or 'sendmail'

	define('WPMS_MAIL_FROM', $email_address );
	define('WPMS_MAIL_FROM_NAME', $email_name );	

	define('WPMS_SMTP_HOST', $smtp_host); 
	define('WPMS_SMTP_PORT', $smtp_port); 

	define('WPMS_SSL', $smtp_encryption); 
	
	define('WPMS_SET_RETURN_PATH', 'false'); // Sets $phpmailer->Sender if true
	define('WPMS_SMTP_AUTH', true); // True turns on SMTP authentication, false turns it off

	define('WPMS_SMTP_USER', $smtp_authentication_username); 
	define('WPMS_SMTP_PASS', $smtp_authentication_password); 


endif;

/**
 * Activation function. This function creates the required options and defaults.
 */
if (!function_exists('wp_mail_smtp_activate')) :
function wp_mail_smtp_activate() {
	
	global $wpms_options;
	
	// Create the required options...
	foreach ($wpms_options as $name => $val) {
		add_option($name,$val);
	}
	
}
endif;

if (!function_exists('wp_mail_smtp_whitelist_options')) :
function wp_mail_smtp_whitelist_options($whitelist_options) {
	
	global $wpms_options;
	
	// Add our options to the array
	$whitelist_options['email'] = array_keys($wpms_options);
	
	return $whitelist_options;
	
}
endif;

// To avoid any (very unlikely) clashes, check if the function alredy exists
if (!function_exists('phpmailer_init_smtp')) :
// This code is copied, from wp-includes/pluggable.php as at version 2.2.2
function phpmailer_init_smtp($phpmailer) {
	
	// If constants are defined, apply those options
	if (defined('WPMS_ON') && WPMS_ON) {
		
		$phpmailer->Mailer = WPMS_MAILER;
		
		if (WPMS_SET_RETURN_PATH)
			$phpmailer->Sender = $phpmailer->From;
		
		if (WPMS_MAILER == 'smtp') {
			$phpmailer->SMTPSecure = WPMS_SSL;
			$phpmailer->Host = WPMS_SMTP_HOST;
			$phpmailer->Port = WPMS_SMTP_PORT;
			if (WPMS_SMTP_AUTH) {
				$phpmailer->SMTPAuth = true;
				$phpmailer->Username = WPMS_SMTP_USER;
				$phpmailer->Password = WPMS_SMTP_PASS;
			}
		}
		
		// If you're using contstants, set any custom options here
		$phpmailer = apply_filters('wp_mail_smtp_custom_options', $phpmailer);
		
	}
	else {
		
		// Check that mailer is not blank, and if mailer=smtp, host is not blank
		if ( ! get_option('mailer') || ( get_option('mailer') == 'smtp' && ! get_option('smtp_host') ) ) {
			return;
		}
		
		// Set the mailer type as per config above, this overrides the already called isMail method
		$phpmailer->Mailer = get_option('mailer');
		
		// Set the Sender (return-path) if required
		if (get_option('mail_set_return_path'))
			$phpmailer->Sender = $phpmailer->From;
		
		// Set the SMTPSecure value, if set to none, leave this blank
		$phpmailer->SMTPSecure = get_option('smtp_ssl') == 'none' ? '' : get_option('smtp_ssl');
		
		// If we're sending via SMTP, set the host
		if (get_option('mailer') == "smtp") {
			
			// Set the SMTPSecure value, if set to none, leave this blank
			$phpmailer->SMTPSecure = get_option('smtp_ssl') == 'none' ? '' : get_option('smtp_ssl');
			
			// Set the other options
			$phpmailer->Host = get_option('smtp_host');
			$phpmailer->Port = get_option('smtp_port');
			
			// If we're using smtp auth, set the username & password
			if (get_option('smtp_auth') == "true") {
				$phpmailer->SMTPAuth = TRUE;
				$phpmailer->Username = get_option('smtp_user');
				$phpmailer->Password = get_option('smtp_pass');
			}
		}
		
		// You can add your own options here, see the phpmailer documentation for more info:
		// http://phpmailer.sourceforge.net/docs/
		$phpmailer = apply_filters('wp_mail_smtp_custom_options', $phpmailer);
		
		
		// STOP adding options here.
		
	}
	
} // End of phpmailer_init_smtp() function definition
endif;


/**
 * This function sets the from email value
 */
if (!function_exists('wp_mail_smtp_mail_from')) :
function wp_mail_smtp_mail_from ($orig) {
	
	// This is copied from pluggable.php lines 348-354 as at revision 10150
	// http://trac.wordpress.org/browser/branches/2.7/wp-includes/pluggable.php#L348
	
	// Get the site domain and get rid of www.
	$sitename = strtolower( $_SERVER['SERVER_NAME'] );
	if ( substr( $sitename, 0, 4 ) == 'www.' ) {
		$sitename = substr( $sitename, 4 );
	}

	$default_from = 'wordpress@' . $sitename;
	// End of copied code
	
	// If the from email is not the default, return it unchanged
	if ( $orig != $default_from ) {
		return $orig;
	}
	
	if (defined('WPMS_ON') && WPMS_ON) {
		if (defined('WPMS_MAIL_FROM') && WPMS_MAIL_FROM != false)
			return WPMS_MAIL_FROM;
	}
	elseif (is_email(get_option('mail_from'), false))
		return get_option('mail_from');
	
	// If in doubt, return the original value
	return $orig;
	
} // End of wp_mail_smtp_mail_from() function definition
endif;


/**
 * This function sets the from name value
 */
if (!function_exists('wp_mail_smtp_mail_from_name')) :
function wp_mail_smtp_mail_from_name ($orig) {
	
	// Only filter if the from name is the default
	if ($orig == 'WordPress') {
		if (defined('WPMS_ON') && WPMS_ON) {
			if (defined('WPMS_MAIL_FROM_NAME') && WPMS_MAIL_FROM_NAME != false)
				return WPMS_MAIL_FROM_NAME;
		}
		elseif ( get_option('mail_from_name') != "" && is_string(get_option('mail_from_name')) )
			return get_option('mail_from_name');
	}
	
	// If in doubt, return the original value
	return $orig;
	
} // End of wp_mail_smtp_mail_from_name() function definition
endif;

// Add an action on phpmailer_init
add_action('phpmailer_init','phpmailer_init_smtp');

if ( ! defined('WPMS_ON') || ! WPMS_ON ) {

	// Whitelist our options
	add_filter('whitelist_options', 'wp_mail_smtp_whitelist_options');

	// Add an activation hook for this plugin
	register_activation_hook(__FILE__,'wp_mail_smtp_activate');
	
}

// Add filters to replace the mail from name and emailaddress
add_filter('wp_mail_from','wp_mail_smtp_mail_from');
add_filter('wp_mail_from_name','wp_mail_smtp_mail_from_name');

?>
