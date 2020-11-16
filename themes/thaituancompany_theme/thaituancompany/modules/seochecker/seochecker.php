<?php

	define('SEOCHECKER_DIRECTORY', get_template_directory() . '/modules/seochecker' );
	define('SEOCHECKER_DIRECTORY_URI', get_template_directory_uri() . '/modules/seochecker' );

	define('SEOCHECKER_DIRECTORY_JS', SEOCHECKER_DIRECTORY . '/js' );	
	define('SEOCHECKER_DIRECTORY_CSS', SEOCHECKER_DIRECTORY . '/css' );	

	function sb_mod_seochecker_script() {        

        global $combine_admin_enqueue;

        $combine_admin_enqueue['stylesheet'][] = SEOCHECKER_DIRECTORY_CSS . '/style.css';

        $combine_admin_enqueue['scripts'][] = SEOCHECKER_DIRECTORY_JS . '/seochecker_title_tag.min.js';
        $combine_admin_enqueue['scripts'][] = SEOCHECKER_DIRECTORY_JS . '/seochecker_description_tag.min.js';            

    }

    add_action('admin_init', 'sb_mod_seochecker_script'); 

	/*function sb_pvcf_contact_form_submit_callback() {

        $form_data = array();

        $cmd = $_POST['cmd'];

        $form_id = $_POST['form-id'];

        parse_str( $_POST['form-data'], $form_data );

        switch ($cmd) {

            case 'send_mail':

                pvcf_send_mail( $form_data, $form_id );


                break;

            default:

                break;


        }

     }  

    add_action('wp_ajax_sb_pvcf_contact_form_submit_ajax', 'sb_pvcf_contact_form_submit_callback');

    add_action('wp_ajax_nopriv_sb_pvcf_contact_form_submit_ajax', 'sb_pvcf_contact_form_submit_callback');*/

?>