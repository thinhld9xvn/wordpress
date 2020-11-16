<?php 
	define( 'PVCF_DIRECTORY_TEMPLATE', '/modules/contact_form' );

	define( 'PVCF_DIRECTORY', get_template_directory_uri() . '/modules/contact_form' );

	define( 'PVCF_DIRECTORY_CSS', PVCF_DIRECTORY . '/css' );

	define( 'PVCF_DIRECTORY_JS', PVCF_DIRECTORY . '/js' );

	define( 'PVCF_DIRECTORY_IMG', PVCF_DIRECTORY . '/images' );

	function contact_form_admin_stylesheet_scripts_loader() {

		if ( 'pv-contact-form' === get_post_type() ) :		

			wp_enqueue_style( 'pvcf-admin-stylesheet', PVCF_DIRECTORY_CSS . '/admin-style.min.css' );				

			wp_enqueue_script( 'pvcf-jquery-admin-add-fields', PVCF_DIRECTORY_JS . '/pvcf_admin_add_fields.min.js', array('jquery'), '1.0.0', true );

			wp_enqueue_script( 'pvcf-jquery-admin-form-content', PVCF_DIRECTORY_JS . '/pvcf_admin_form_content.min.js', array('jquery'), '1.0.0', true );

			/* modal dialog */

			wp_enqueue_style( 'pvcf-admin-modal-stylesheet', PVCF_DIRECTORY . '/modal/jquery.modal.min.css' );				

			wp_enqueue_script( 'pvcf-jquery-admin-modal', PVCF_DIRECTORY . '/modal/jquery.modal.min.js', array('jquery'), '1.0.0', true );

			wp_enqueue_script( 'pvcf-jquery-admin-settings', PVCF_DIRECTORY_JS . '/pvcf_admin_settings.min.js', array('jquery'), '1.0.0', true );


		endif;
	}

	add_action( 'admin_enqueue_scripts', 'contact_form_admin_stylesheet_scripts_loader' );


	require_once 'inc/pvcf_post_type.php';

	require_once 'inc/pvcf_metabox.php';

	require_once 'inc/smtp/pvcf_smtp_mailer.php';

	require_once 'inc/pvcf_submit_form.php';

	require_once 'inc/pvcf_shortcodes.php';

?>