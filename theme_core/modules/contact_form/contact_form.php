<?php 

	define( 'PVCF_DIRECTORY_TEMPLATE', get_template_directory() . '/modules/contact_form' );

	define( 'PVCF_DIRECTORY_URI', get_template_directory_uri() . '/modules/contact_form' );

	define( 'PVCF_DIRECTORY_PACKAGES', PVCF_DIRECTORY_TEMPLATE . '/packages' );

	define( 'PVCF_DIRECTORY_HELPER', PVCF_DIRECTORY_TEMPLATE . '/helper' );

	define( 'PVCF_DIRECTORY_CSS', PVCF_DIRECTORY_URI . '/css' );

	define( 'PVCF_DIRECTORY_JS', PVCF_DIRECTORY_URI . '/js' );

	define( 'PVCF_DIRECTORY_IMG', PVCF_DIRECTORY_URI . '/images' );

	function contact_form_admin_stylesheet_scripts_loader() {

		global $combine_admin_enqueue;

		$validate = false;

		$post_type = $_GET['post_type'];

		if ( isset( $post_type ) && 'pv-contact-form' === $post_type ) :

			$validate = true;

		else :

			$post_id = $_GET['post'];

			if ( isset( $post_id ) ) :

				$post = get_post( $post_id ); 

				if ( 'pv-contact-form' === $post->post_type ) :

					$validate = true;

				endif;

			endif;

		endif;

		if ( $validate ) :

			$combine_admin_enqueue['stylesheet'][] = PVCF_DIRECTORY_CSS . '/admin-style.css';
			$combine_admin_enqueue['scripts'][] = PVCF_DIRECTORY_JS . '/pvcf_admin_manage_fields.min.js';
			$combine_admin_enqueue['scripts'][] = PVCF_DIRECTORY_JS . '/pvcf_admin_form_content.min.js';
			$combine_admin_enqueue['scripts'][] = PVCF_DIRECTORY_JS . '/pvcf_admin_event.min.js';

			/* modal dialog */
			$combine_admin_enqueue['stylesheet'][] = PVCF_DIRECTORY_URI . '/modal/jquery.modal.css';
			$combine_admin_enqueue['scripts'][] = PVCF_DIRECTORY_URI . '/modal/jquery.modal.min.js';

		endif;		

	}

	add_action( 'admin_init', 'contact_form_admin_stylesheet_scripts_loader' );	

	require_once 'inc/pvcf_post_type.php';
	
	require_once 'inc/pvcf_admin_event.php';

	require_once 'inc/pvcf_metabox.php';

	require_once 'inc/smtp/pvcf_smtp_mailer.php';

	require_once 'inc/pvcf_submit_form.php';

	require_once 'inc/pvcf_shortcodes.php'; ?>