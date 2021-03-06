<?php 
	define( 'PVCF_DIRECTORY_TEMPLATE', get_template_directory() . '/modules/contact_form' );

	define( 'PVCF_DIRECTORY_URI', get_template_directory_uri() . '/modules/contact_form' );

	define( 'PVCF_DIRECTORY_PACKAGES', PVCF_DIRECTORY_TEMPLATE . '/packages' );

	define( 'PVCF_DIRECTORY_HELPER', PVCF_DIRECTORY_TEMPLATE . '/helper' );

	define( 'PVCF_DIRECTORY_CSS', PVCF_DIRECTORY_URI . '/css' );

	define( 'PVCF_DIRECTORY_JS', PVCF_DIRECTORY_URI . '/js' );

	define( 'PVCF_DIRECTORY_IMG', PVCF_DIRECTORY_URI . '/images' );

	function contact_form_admin_stylesheet_scripts_loader() {

		if ( 'pv-contact-form' === get_post_type() ) :		

			wp_enqueue_style( 'pvcf-admin-stylesheet', PVCF_DIRECTORY_CSS . '/admin-style.css' );				

			wp_enqueue_script( 'pvcf-jquery-admin-manage-fields', PVCF_DIRECTORY_JS . '/pvcf_admin_manage_fields.min.js', array('jquery'), '1.0.0', true );

			wp_enqueue_script( 'pvcf-jquery-admin-form-content', PVCF_DIRECTORY_JS . '/pvcf_admin_form_content.min.js', array('jquery'), '1.0.0', true );

			/* modal dialog */

			wp_enqueue_style( 'pvcf-admin-modal-stylesheet', PVCF_DIRECTORY_URI . '/modal/jquery.modal.min.css' );				

			wp_enqueue_script( 'pvcf-jquery-admin-modal', PVCF_DIRECTORY_URI . '/modal/jquery.modal.min.js', array('jquery'), '1.0.0', true );		


		endif;
	}

	add_action( 'admin_enqueue_scripts', 'contact_form_admin_stylesheet_scripts_loader' );	
	
	require_once 'inc/pvcf_post_type.php';

	require_once 'inc/pvcf_admin_event.php';
	require_once 'inc/pvcf_metabox.php';

	require_once 'inc/smtp/pvcf_smtp_mailer.php';

	require_once 'inc/pvcf_submit_form.php';

	require_once 'inc/pvcf_shortcodes.php'; ?>