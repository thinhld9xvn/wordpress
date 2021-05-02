<?php
    function __ajax_unicorn_sb_ajax_publish_proposal() {

        $params = extract_params_serialized($_POST['params']);  
    
        $result = Proposal::createNewProposal($params);    
        
        echo $result;
    
        die();
    
    }
    add_action("wp_ajax_sb_ajax_publish_proposal", "__ajax_unicorn_sb_ajax_publish_proposal");
    add_action("wp_ajax_nopriv_sb_ajax_publish_proposal", "__ajax_unicorn_sb_ajax_publish_proposal");

    function __ajax_unicorn_sb_ajax_set_status_proposal() {        
    
        $params = json_decode(stripslashes( $_POST['params'] ), true);
        
        extract($params);

        Proposal::set_proposal_status($pid, $status);

        header('Content-Type: application/json; charset: utf-8');

        echo json_encode(
            array(
                'status' => 'success',
                'render' => Proposal::get_proposal_status_inbox($status)
            )
        );       
    
        die();
    
    }
    add_action("wp_ajax_sb_ajax_set_status_proposal", "__ajax_unicorn_sb_ajax_set_status_proposal");
    add_action("wp_ajax_nopriv_sb_ajax_set_status_proposal", "__ajax_unicorn_sb_ajax_set_status_proposal");
    