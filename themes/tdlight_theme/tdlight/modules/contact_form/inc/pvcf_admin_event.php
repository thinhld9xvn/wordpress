<?php 
    function pvcf_admin_export_data( $post_id ) {
        $pvcf_settings = get_post_meta( $post_id, '_pv-contact-form-settings', true );
        $pvcf_fields = get_post_meta( $post_id, '_pv-contact-form-field', true );
        $pvcf_body = get_post_meta( $post_id, '_pv-contact-form-body', true );
        $json_data = '{"pvcf_contact_form":[';
        
        $json_data .= '{"pvcf_fields":[' . json_encode( $pvcf_fields ) . ']}';
        $json_data .=',';
        $json_data .= '{"pvcf_settings":[' . json_encode( $pvcf_settings ) . ']}';
        $json_data .=',';
        $json_data .= '{"pvcf_body":[' . json_encode( $pvcf_body ) . ']}';
        $json_data .= ']}';
        $file_data_path = PVCF_DIRECTORY_TEMPLATE . '/pvcf_contact_form_data.json';
        $file_data_uri = PVCF_DIRECTORY_URI . '/pvcf_contact_form_data.json';
        file_put_contents($file_data_path, $json_data);
        echo $file_data_uri; die();
    }
    function pvcf_admin_import_data( $post_id ) {
        $target_file = $_FILES["file"]["name"];
        $tmp_file = $_FILES["file"]["tmp_name"];
        $file_slices = explode('.', $target_file);
        $ext = array_pop( $file_slices );
        if ( 'json' === $ext ) : 
            $data = file_get_contents( $tmp_file );
            $arr_pvcf_data = json_decode( $data, true );
            $pvcf_obj = $arr_pvcf_data['pvcf_contact_form'];
            $pvcf_fields = $pvcf_obj[0]['pvcf_fields'][0];
            $pvcf_settings = $pvcf_obj[1]['pvcf_settings'][0];
            $pvcf_body = $pvcf_obj[2]['pvcf_body'][0];
            update_post_meta( $post_id, '_pv-contact-form-field', $pvcf_fields );
            update_post_meta( $post_id, '_pv-contact-form-settings', $pvcf_settings );
            update_post_meta( $post_id, '_pv-contact-form-body', $pvcf_body ); 
            die();           
          
        endif;        
    }
    function sb_pvcf_admin_event_callback() {
        $cmd = $_POST['cmd'];        
        $post_id = $_POST['post_id'];
        switch ( $cmd ) :
            case 'export':                
                pvcf_admin_export_data( $post_id );                
                
                break;
            case 'import':
                pvcf_admin_import_data( $post_id );
                
                break;
            
            default:               
                break;
        endswitch;
    } 
    
    add_action('wp_ajax_sb_pvcf_admin_event_ajax', 'sb_pvcf_admin_event_callback');
    add_action('wp_ajax_nopriv_sb_pvcf_admin_event_ajax', 'sb_pvcf_admin_event_callback');
?>