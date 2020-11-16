<?php 	
	/* Template Name: test */
	
	// Load the options
	global $phpmailer;

	// Make sure the PHPMailer class has been instantiated 
	// (copied verbatim from wp-includes/pluggable.php)
	// (Re)create it, if it's gone missing
	if ( !is_object( $phpmailer ) || !is_a( $phpmailer, 'PHPMailer' ) ) {
		require_once ABSPATH . WPINC . '/class-phpmailer.php';
		require_once ABSPATH . WPINC . '/class-smtp.php';
		$phpmailer = new PHPMailer( true );
	}	
    
    $to = 'thinhld9xvn@gmail.com';   
    $subject = 'test';
    $message = 'test';
    
    // Set SMTPDebug to true
	$phpmailer->SMTPDebug = true;

	// Start output buffering to grab smtp debugging output
	ob_start();

	// Send the test mail
	$result = wp_mail( $to, $subject, $message );

	// Strip out the language strings which confuse users
	//unset($phpmailer->language);
	// This property became protected in WP 3.2
	// Grab the smtp debugging output
	$smtp_debug = ob_get_clean(); ?>

		<div id="message" class="updated fade"><p><strong><?php _e( 'Test Message Sent', 'wp-email-smtp' ); ?></strong></p>
			<p><?php _e( 'The result was:', 'wp-email-smtp' ); ?></p>
			<pre><?php var_dump( $result ); ?></pre>
			<p><?php _e( 'The full debugging output is shown below:', 'wp-email-smtp' ); ?></p>
			<pre><?php var_dump( $phpmailer ); ?></pre>
			<p><?php _e( 'The SMTP debugging output is shown below:', 'wp-email-smtp' ); ?></p>
			<pre><?php echo $smtp_debug ?></pre>
		</div>

	<?php
		// Destroy $phpmailer so it doesn't cause issues later
		unset( $phpmailer ); ?>