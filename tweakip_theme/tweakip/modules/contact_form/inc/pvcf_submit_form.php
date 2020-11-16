<?php 
    function sb_pvcf_contact_form_submit_script() {
        wp_enqueue_style( 'pvcf-ajax-submit-form-stylesheet', PVCF_DIRECTORY_CSS . '/style.min.css' );

        wp_enqueue_script('pvcf-ajax-validate-submit-form', PVCF_DIRECTORY_JS . '/pvcf_validate.min.js', array('jquery'), 'v1.0.0' , true);

        wp_enqueue_script('pvcf-ajax-submit-form', PVCF_DIRECTORY_JS . '/pvcf_submit_form.min.js', array('jquery'), 'v1.0.0' , true);        

        wp_localize_script('pvcf-ajax-submit-form', 'sb_admin_ajax', array('url' => admin_url('admin-ajax.php') ) );

      }
     add_action('wp_enqueue_scripts', 'sb_pvcf_contact_form_submit_script');

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

        $pos = strpos( '{%site_address}', $subject );



        if ( false !== $pos ) :

            $subject = preg_replace( '/\{%site_address\}/i', $domain, $subject);

        endif;     



        $pos = strpos( '{%site_address}', $message ); 



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