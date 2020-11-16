<?php  

    function qtranslate_change_query( $clauses ) {

        global $wpdb;           

        $tbl_posts = $wpdb->prefix . 'posts';

        if ( ! is_admin() ) :

            $mainsite_langcode = $_SESSION['qtranslate_mainsite_langcode'];

            $clauses["where"] .= " AND {$tbl_posts}.qtranslate_post_langcode = '$mainsite_langcode'";                       

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

            foreach ( $post_type_excludes as $exclude ) :

                if ( false !== strpos( $where, "post_type = '$exclude'" ) ) :

                    $found_exclude = true;
                    break;          

                endif;

            endforeach;

            if ( ! $found_exclude ) :

                $where .= " AND qtranslate_post_langcode = '$active_langcode' ";

            endif;                 

            $clauses['where'] = $where;

        endif;

        return $clauses;

    }   
    
    add_action( 'posts_clauses', 'admin_change_post_clauses_query' );   

    function admin_qtranslate_submit_save_post( $post_id ) {

        global $wpdb;           

        $tbl_posts = $wpdb->prefix . 'posts';

        $active_langcode = $_SESSION['qtranslate_active_lang'];
     
        $my_post = get_post( $post_id );

        $p_title = $my_post->post_title;
        $p_slug = $my_post->post_name;

        if ( $my_post->post_type !== 'nav_menu_item' ) :

            if ( 0 !== strpos($p_title, "{$active_langcode}_") ) :

                $p_title = $active_langcode . '_' . $p_title;

            endif;

            if ( 0 !== strpos($p_slug, "{$active_langcode}_") ) :

                $p_slug = $active_langcode . '_' . $p_slug;

            endif;           

        endif;   

        if ( $p_title !== $my_post->post_title || $p_slug !== $my_post->post_name ) :

            $wpdb->query(

                "
                    UPDATE {$tbl_posts}

                    SET                     
                        post_title = '{$p_title}',
                        post_name = '{$p_slug}'

                    WHERE

                        id = {$post_id}
                "

            );

        endif;

        if ( $active_langcode != $my_post->qtranslate_post_langcode ) :          

            $wpdb->query(

                "
                    UPDATE 
                        $tbl_posts
                    SET
                        qtranslate_post_langcode = '$active_langcode'                       
                    WHERE
                        id = {$post_id}
                "

            );

        endif; 
        
    }

    add_action( 'save_post', 'admin_qtranslate_submit_save_post');    

    function qTranslate_get_posts_filter( $posts ) {       

        $posts_filtered = array();

        if ( ! is_admin() ) :

            $active_langcode = $_SESSION['qtranslate_mainsite_langcode'];

        else :

            $active_langcode = $_SESSION['qtranslate_active_lang'];

        endif;

        foreach ( $posts as $post ) :

            if ( $active_langcode === $post->qtranslate_post_langcode ) :                

                $posts_filtered[] = $post;

            endif;

        endforeach;

        return $posts_filtered;

    }   

    add_filter('get_posts', 'qTranslate_get_posts_filter');
    add_filter('get_pages', 'qTranslate_get_posts_filter');

    function my_the_post_action( $post_object ) {

        if ( ! is_admin() ) :

            $active_langcode = $_SESSION['qtranslate_mainsite_langcode'];

        else :

            $active_langcode = $_SESSION['qtranslate_active_lang'];

        endif;

        if ( $active_langcode === $post_object->qtranslate_post_langcode ) :

            if ( 0 === strpos( $post_object->post_title, $active_langcode . '_' ) ) :

                $post_object->post_title = mb_substr( $post_object->post_title, strlen( $active_langcode . '_' ) );

            endif;

            if ( is_admin() ) :

                if ( 0 === strpos( $post_object->post_name, $active_langcode . '_' ) ) :

                    $post_object->post_name = mb_substr( $post_object->post_name, strlen( $active_langcode . '_' ) );

                endif;

            endif;

        endif;
        
    }

    add_action( 'the_post', 'my_the_post_action' );

    function my_posts_results_filter( $posts ) {

        if ( ! is_admin() ) :

            $filtered_posts = array();  

            $active_langcode = $_SESSION['qtranslate_mainsite_langcode'];      

            foreach ( $posts as $post ) :

                if ( $active_langcode === $post->qtranslate_post_langcode ) :

                    if ( 0 === strpos( $post->post_title, $active_langcode . '_' ) ) :

                        $post->post_title = mb_substr( $post->post_title, strlen( $active_langcode . '_' ) );

                    endif;

                    $filtered_posts[] = $post;

                endif;

            endforeach;

            return $filtered_posts;

        endif;

        return $posts;

    }
    add_filter( 'posts_results', 'my_posts_results_filter' );

    function filter_title_post( $title, $post_id ) {

        $active_langcode = $_SESSION['qtranslate_active_lang'];

        if ( 0 === strpos( $title, $active_langcode . '_' ) ) :

            return mb_substr( $title, strlen( $active_langcode . '_' ) );

        endif;      
      
        return $title;

    }
    add_filter( 'edit_post_title', 'filter_title_post', 10, 2 ); 

    function filter_name_post( $slug, $post_id ) {

        $active_langcode = $_SESSION['qtranslate_active_lang'];

        if ( 0 === strpos( $slug, $active_langcode . '_' ) ) :

            return mb_substr( $slug, strlen( $active_langcode . '_' ) );

        endif;      
      
        return $slug;

    }
    add_filter( 'edit_post_name', 'filter_name_post', 10, 2 ); 

    /*$debug_tags = array();
    add_action( 'all', function ( $tag ) {
        global $debug_tags;
        if ( in_array( $tag, $debug_tags ) ) {
            return;
        }
        echo "<pre>" . $tag . "</pre>";
        $debug_tags[] = $tag;
    } );*/

    // wp_terms_checklist_args