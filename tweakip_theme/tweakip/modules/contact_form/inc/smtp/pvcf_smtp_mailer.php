<?php

/*
  Plugin Name: WP Email SMTP
  Description: WP Email SMTP plugin allows you to connect any SMTP for sending emails from your WordPress site.
  Version: 1.0.0
  Author: FormGet
  Author URI: https://www.formet.com/
  License: GPLv2
 */

/*
  Copyright (C) 2016 InkThemes

  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */


class PVCF_Smtp_Mailer {

	/**
	 * Holds the values to be used in the fields callbacks
	 */
	private $options;

	/**
	 * Start up
	 */
	public function __construct() {

		$this->init_phpmailer_settings();		
			
		//Add an action on phpmailer_init
		add_action( 'phpmailer_init', array( $this, 'phpmailer_init_smtp' ) );
		//Add filters to replace the mail from name and emailaddress
		add_filter( 'wp_mail_from', array( $this, 'mail_smtp_mail_from' ) );
		add_filter( 'wp_mail_from_name', array( $this, 'mail_smtp_mail_from_name' ) );
	}	

	function init_phpmailer_settings() {

		// đọc option này từ theme options
		$pvcf_smtp_options = get_option( 'section-contact-form_option_name' );

		if ( $pvcf_smtp_options ) :

			$email_name = $pvcf_smtp_options['contactform-email-name-id'];	
			$smtp_host = $pvcf_smtp_options['contactform-smtp-host-id'];
			$smtp_port = $pvcf_smtp_options['contactform-smtp-port-id'];
			$smtp_encryption = $pvcf_smtp_options['contactform-smtp-encryption-id'];

			$smtp_authentication_username = $pvcf_smtp_options['contactform-authentication-username-id'];
			$smtp_authentication_password = $pvcf_smtp_options['contactform-authentication-password-id'];

			$this->options['mailer'] = 'smtp';

			$this->options['from_email'] = $smtp_authentication_username;
			$this->options['from_name'] = $email_name;

			$this->options['mail_set_return_path'] = true;
			$this->options['smtp_encryption'] = $smtp_encryption;

			$this->options['smtp_host'] = $smtp_host;
			$this->options['smtp_port'] = $smtp_port;

			$this->options['smtp_authentication'] = 'true';			

			$this->options['smtp_username'] = $smtp_authentication_username;
			$this->options['smtp_password'] = $smtp_authentication_password;

		endif;

	}

	function mail_smtp_mail_from( $orig ) {

		// Get the site domain and get rid of www.
		$sitename = strtolower( $_SERVER['SERVER_NAME'] );
		if ( substr( $sitename, 0, 4 ) == 'www.' ) {
			$sitename = substr( $sitename, 4 );
		}

		$default_from = 'wordpress@' . $sitename;

		// If the from email is not the default, return it unchanged
		if ( $orig != $default_from ) {
			return $orig;
		}
		if ( isset( $this->options['from_email'] ) && is_email( $this->options['from_email'], false ) ) {
			return $this->options['from_email'];
		}

		// If in doubt, return the original value
		return $orig;
	}

	function mail_smtp_mail_from_name( $orig ) {

		// Only filter if the from name is the default
		if ( $orig == 'WordPress' ) {
			if ( isset( $this->options['from_name'] ) && $this->options['from_name'] != "" && is_string( $this->options['from_name'] ) ) {
				return $this->options['from_name'];
			}
		}

		// If in doubt, return the original value
		return $orig;
	}	

	public function phpmailer_init_smtp( $phpmailer ) {

		// Check that mailer is not blank, and if mailer=smtp, host is not blank
		if ( !$this->options['mailer'] || ( $this->options['mailer'] == 'smtp' && !$this->options['smtp_host']) ) {
			return;
		}

		// Set the mailer type as per config above, this overrides the already called isMail method
		$phpmailer->Mailer = $this->options['mailer'];

		// Set the Sender (return-path) if required
		if ( $this->options['mail_set_return_path'] )
			$phpmailer->Sender = $phpmailer->From;

		// Set the SMTPSecure value, if set to none, leave this blank
		$phpmailer->SMTPSecure = $this->options['smtp_encryption'] == 'none' ? '' : $this->options['smtp_encryption'];

		// If we're sending via SMTP, set the host
		if ( $this->options['mailer'] == "smtp" ) {

			// Set the SMTPSecure value, if set to none, leave this blank
			$phpmailer->SMTPSecure = $this->options['smtp_encryption'] == 'none' ? '' : $this->options['smtp_encryption'];

			// Set the other options
			$phpmailer->Host = $this->options['smtp_host'];
			$phpmailer->Port = $this->options['smtp_port'];

			// If we're using smtp auth, set the username & password
			if ( $this->options['smtp_authentication'] == "true" ) {
				$phpmailer->SMTPAuth = true;
				$phpmailer->Username = $this->options['smtp_username'];
				$phpmailer->Password = $this->options['smtp_password'];
			}
		}
		$phpmailer = apply_filters( 'wp_email_smtp_custom_options', $phpmailer );
	}	

}

$PVCF_Smtp_Mailer = new PVCF_Smtp_Mailer(); ?>