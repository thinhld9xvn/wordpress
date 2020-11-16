<?php 

    function sb_pvcf_contact_form_submit_script() {

        if ( ! is_admin() ) :

            global $combine_admin_enqueue;

            $combine_admin_enqueue['stylesheet'][] = PVCF_DIRECTORY_CSS . '/style.css';

            $combine_admin_enqueue['scripts'][] = PVCF_DIRECTORY_JS . '/pvcf_validate.min.js';
            $combine_admin_enqueue['scripts'][] = PVCF_DIRECTORY_JS . '/pvcf_submit_form.min.js';

            wp_localize_script('pvcf-ajax-submit-form', 'sb_admin_ajax', array('url' => admin_url('admin-ajax.php') ) );

        endif;

      }

     add_action('init', 'sb_pvcf_contact_form_submit_script');

     function pvcf_send_mail( $form_data, $form_id ) {

        $pvcf_email_options = get_option( 'section-contact-form_option_name' );

        $pvcf_form_body = get_post_meta( $form_id, '_pv-contact-form-body', true ); 

        $pvcf_fields = get_post_meta( $form_id, '_pv-contact-form-field', true ); 

        $email_name = $pvcf_email_options['contactform-email-name-id'];

        $domain = $_SERVER['HTTP_HOST'];

        $to = $pvcf_email_options['contactform-email-address-id'];

        $subject = $pvcf_form_body['pvcf-title'];

        $headers[] = "From: $email_name <no-reply@$domain> "; 

        $message = $pvcf_form_body['pvcf-content'];

        // thay định dạng {%site_address} thành địa chỉ domain

        $pos = strpos( $subject, '{%site_address}' );

        if ( false !== $pos ) :

            $subject = preg_replace( '/\{%site_address\}/i', $domain, $subject);

        endif;  

        $pos = strpos( $message, '{%site_address}' );

        if ( false !== $pos ) :

            $message = preg_replace( '/\{%site_address\}/i', $domain, $message);

        endif;       

        // thay toàn bộ định dạng tên field [%name] trong nội dung thư bằng giá trị thực        

        foreach ( $pvcf_fields as $field ) :

            $field_name = $field['pvcf-field-name'];  

            $pos = strpos( $message, "[$field_name]" );

            if ( false !== $pos ) :

                $field_value = $form_data[ $field_name ];

                $message = preg_replace( sprintf( '/\[%s\]/i', $field_name ), $field_value, $message );


            endif;

        endforeach; 

        $result = wp_mail( $to, $subject, $message, $headers );         

       if ( $result ) {

            echo 'success';

        }

        else {

            echo 'fail';
        }

        die();

     }

     function sb_pvcf_contact_form_submit_callback() {

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

    add_action('wp_ajax_nopriv_sb_pvcf_contact_form_submit_ajax', 'sb_pvcf_contact_form_submit_callback');

?>