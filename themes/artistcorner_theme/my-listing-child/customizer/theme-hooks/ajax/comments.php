<?php

function __ajax_unicorn_sb_submitting_comment() {

    //echo $_POST['params']; die();

    $params = extract_params_serialized(wp_unslash( $_POST['params'] ));

    $comment = wp_handle_comment_submission( $params );

    if ( is_wp_error( $comment ) ) :

        //$error_data = intval( $comment->get_error_data() );
        
        wp_die( 'error' );
        
    endif;  
   
    $rating = intval( $params['rating'] );    
	add_comment_meta( $comment->comment_ID, 'rating', $rating );
        
    
    echo get_comment_template_html_in_ajax($comment);
 
	die();

}

add_action("wp_ajax_sb_ajax_submitting_comment", "__ajax_unicorn_sb_submitting_comment");
add_action("wp_ajax_nopriv_sb_ajax_submitting_comment", "__ajax_unicorn_sb_submitting_comment");

function __ajax_unicorn_sb_ajax_update_comment() {

    global $current_user;

    $params = extract_params_serialized(wp_unslash( $_POST['params'] ));   

    //extract($params);

    $args = array(
        'user_id' => $current_user->ID,
        'post_id' => $params['listing_id']
    );
    $comments = get_comments($args);    

    if ( $comments ) :

        $comment = $comments[0];

        //$comment_text = mb_strtolower(wp_strip_all_tags( $params['comment'] ));
        //$_comment_text = mb_strtolower(wp_strip_all_tags( $comment->comment_content ));

        //if ( $comment_text !== $_comment_text ) :

            $data = array(

                'comment_ID' => $comment->comment_ID,
                'comment_content' => $params['comment']

            );            

            $result = wp_update_comment( $data );

            if ( is_wp_error( $result ) ) :

                //$error_data = intval( $comment->get_error_data() );
                
                wp_die( 'error' );
                
            endif;  

            $comment->comment_content = $params['comment'];

            header('Content-Type: application/json; charset: UTF-8');
            echo json_encode(array(

                'comment_id' => $comment->comment_ID,
                'render' => get_comment_template_html_in_ajax($comment)


            ));

            die();

        //endif;

    endif;

    wp_die('error');

}

add_action("wp_ajax_sb_ajax_update_comment", "__ajax_unicorn_sb_ajax_update_comment");
add_action("wp_ajax_nopriv_sb_ajax_update_comment", "__ajax_unicorn_sb_ajax_update_comment");