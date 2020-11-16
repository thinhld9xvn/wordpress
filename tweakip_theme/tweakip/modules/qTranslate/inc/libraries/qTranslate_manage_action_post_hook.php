<?php  

    function qtranslate_change_query( $clauses ) {

        if ( ! is_admin() ) :

            $mainsite_langcode = $_SESSION['qtranslate_mainsite_langcode'];

            $clauses["where"] .= " AND qtranslate_post_langcode = '$mainsite_langcode'";            

        endif;  

        return $clauses;

    }
    add_action( 'posts_clauses', 'qtranslate_change_query' );

    function admin_change_post_clauses_query( $clauses ) {

        $post_type_excludes = array('attachment');
        $found_exclude = false;

        if ( is_admin() ) :         

            $where = $clauses['where'];
 
            $active_langcode = $_SESSION['qtranslate_active_lang'];

            if ( 'all' != $active_langcode ) :

                foreach ( $post_type_excludes as $exclude ) :

                    if ( false !== strpos( $where, "post_type = '$exclude'" ) ) :

                        $found_exclude = true;
                        break;          

                    endif;

                endforeach;

                if ( ! $found_exclude ) :

                    $where .= " AND qtranslate_post_langcode = '$active_langcode' ";

                endif;

            endif;                  

            $clauses['where'] = $where;

        endif;

        return $clauses;

    }   
    
    add_action( 'posts_clauses', 'admin_change_post_clauses_query' );   

    function admin_qtranslate_submit_save_post( $post_id ) {

        $active_langcode = $_SESSION['qtranslate_active_lang'];
     
        $my_post = get_post( $post_id );        

        if ( $active_langcode != $my_post->qtranslate_post_langcode ) :

            global $wpdb;           

            $tbl_posts = $wpdb->prefix . 'posts';

            $wpdb->query(

                "
                    UPDATE 
                        $tbl_posts
                    SET
                        qtranslate_post_langcode = '$active_langcode'                       
                    WHERE
                        id = $post_id
                "

            );

        endif; 
        
    }

    add_action( 'save_post', 'admin_qtranslate_submit_save_post'); ?>