<?php  


    function admin_change_post_clauses_query( $clauses ) {

        $post_type_excludes = array('attachment');
        $found_exclude = false;

        if ( is_admin() ) :         

            $where = $clauses['where'];
 
            $active_langcode = $_SESSION['qtranslate_active_lang'];

            //echo $active_langcode; die();

            if ( $active_langcode === 'all' ) return $clauses;

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

        else :            

            $active_langcode = $_SESSION['qtranslate_mainsite_langcode'];

            if ( $active_langcode === 'all' ) return $clauses;

            $uri = $_SERVER['REQUEST_URI'];

            if ( 0 === strpos( '/?lang', $uri ) && $active_langcode !== 'en' ) :

                $clauses['where'] .= " AND qtranslate_post_langcode = '$active_langcode' ";            

            endif;

        endif;

        return $clauses;

    }   
    
   add_action( 'posts_clauses', 'admin_change_post_clauses_query' );

    function admin_qtranslate_non_ajax_submit_save_post( $my_post ) {

        global $wpdb; 

        $tbl_posts = $wpdb->prefix . 'posts';

        $active_langcode = qt_get_current_lang();

        $primary_pid = isset( $_POST['qtranslate_post_id'] ) ? (int) $_POST['qtranslate_post_id'] : null;

        $q_pid = isset( $_POST['post_ID'] ) ? (int) $_POST['post_ID'] : null;
        $q_lang = $_POST['qtranslate_lang'];

        //echo $my_post->qtranslate_post_langcode . '-' . $active_langcode; die();

        if ( $my_post->qtranslate_post_langcode !== $active_langcode ) :

            $wpdb->query(

                "
                    UPDATE 

                        {$tbl_posts}

                    SET
                        qtranslate_post_langcode = '{$active_langcode}'

                    WHERE

                        id = {$my_post->ID}
                "

            );

        endif;       

        if ( isset( $primary_pid ) && $primary_pid !== $my_post->qtranslate_post_id_primary ) :

            $wpdb->query(

                "
                    UPDATE 

                        {$tbl_posts}

                    SET
                        qtranslate_post_id_primary = '{$primary_pid}'

                    WHERE

                        id = {$my_post->ID}
                "

            );

        endif;

        if ( isset( $q_lang) ) :

            //echo admin_url( "post.php?post={$q_pid}&action=edit&qtranslate_lang={$q_lang}" ); die();

            wp_redirect( admin_url( "post.php?post={$q_pid}&action=edit&qtranslate_lang={$q_lang}" ) );

            die();

        endif;

    }

    function admin_qtranslate_ajax_submit_save_post( $my_post ) {

        global $wpdb, $q_db;

        $tbl_posts = $wpdb->prefix . 'posts';        

        $active_langcode = qt_get_current_lang();

        $langcode = $_POST['qtranslate_langcode'];

        $post_type = $_POST['post_type'];

        $q_mapping_pid = (int) $_POST['qtranslate_mapping_item'];

        if ( $langcode !== $active_langcode ) :

            $sql = "
                    UPDATE 

                        {$tbl_posts}

                    SET
                        qtranslate_post_langcode = '{$langcode}'


                    WHERE

                        id = {$my_post->ID}
                ";

            $wpdb->query( $sql );

        endif;

        if ( $q_mapping_pid !== -1 ) :

            if ( $langcode !== 'vi' ) :

                $sql = "
                    UPDATE 

                        {$tbl_posts}

                    SET
                        qtranslate_post_id_primary= {$q_mapping_pid}


                    WHERE

                        id = {$my_post->ID}
                ";

                $wpdb->query( $sql );


            else :

                // unlink old post foreign
                $q_db->unlink_post_foreign( $my_post->ID, 'en', $post_type );

                // update new post foreign
                $sql = "
                    UPDATE 

                        {$tbl_posts}

                    SET
                        qtranslate_post_id_primary = {$my_post->ID}


                    WHERE

                        id = {$q_mapping_pid}
                ";

                $wpdb->query( $sql );

            endif;

        else :

            if ( $langcode !== 'vi' ) :

               
                $sql = "
                    UPDATE 

                        {$tbl_posts}

                    SET
                        qtranslate_post_id_primary = 0


                    WHERE

                        id = {$my_post->ID}
                ";

                $wpdb->query( $sql );

            else :           

                // unlink post foreign
                $q_db->unlink_post_foreign( $my_post->ID, 'en', $post_type ); 

            endif;

        endif;
 
    }

    function admin_qtranslate_submit_save_post( $post_id ) {        

        $my_post = get_post( $post_id );

        // HERE, FURTHER FILTERING CAN BE DONE, RESTRICT USERS, POST_TYPES, ETC
        if ( 
            ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            || ! current_user_can( 'edit_post', $post_id )
            || wp_is_post_revision( $my_post )
            // ADD OTHER FILTERS, LIKE post_type
        )
        { // Noting to do.
            return;
        } 

        if (defined('DOING_AJAX') && DOING_AJAX) :

            admin_qtranslate_ajax_submit_save_post( $my_post );

        else :
            
            admin_qtranslate_non_ajax_submit_save_post( $my_post );

        endif;
        
    }

    add_action( 'save_post', 'admin_qtranslate_submit_save_post', 1000); 

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

        /*echo "<pre>";
        print_r( $posts_filtered );
        echo "</pre>";

        die();*/

        return $posts_filtered;

    }   

    add_filter('get_posts', 'qTranslate_get_posts_filter');
    add_filter('get_pages', 'qTranslate_get_posts_filter');   
    

    // action before post into trash
    function my_wp_trash_post( $post_id ) {

        global $wpdb, $q_db;  

        if ( is_admin() ) :    

            $active_langcode = qt_get_current_lang();          

            if ( $active_langcode === 'vi' ) : 

                $q_db->unlink_post_foreign( $post_id, 'en' );

            endif;

            $wpdb->update( 

                $wpdb->prefix . 'posts', 

                array( 
                    'post_status' => 'trash'
                ), 

                array( 'ID' => $post_id )
                
            );

        endif;
        
    }
    add_action( 'wp_trash_post', 'my_wp_trash_post', 1000 );

    function my_wp_delete_post ( $post_id ) {        
    }

    add_action( 'before_delete_post', 'my_wp_delete_post', 1000 );

    function qTranslate_add_hidden_field() {         

        $q_postid = $_GET['qtranslate_post_id']; 
        $q_lang = $_GET['qtranslate_lang'];  ?> 

        <script type="text/javascript">

            jQuery(function($) {

                var $form = $('form[name="post"]');

                <?php if ( isset( $q_postid ) ) : ?>

                    $form.append("<input type='hidden' name='qtranslate_post_id' value='<?php echo $q_postid ?>'>");

                <?php endif; ?>

                <?php if ( isset( $q_lang ) ) : ?>

                    $form.append("<input type='hidden' name='qtranslate_lang' value='<?php echo $q_lang ?>'>");

                <?php endif; ?>

            });
            
        </script>
    
    <?php }

    add_action('in_admin_footer', 'qTranslate_add_hidden_field');    

    
function modify_list_row_actions( $actions, $post ) {

    $post_status = $_GET['post_status'];

    if ( $post_status !== 'trash' ) :

        $url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        $url = add_query_arg( 
                              array('qtrans_duplicate' => 'true', 'post' => $post->ID ),                         
                              $url 
                            );

        $actions['qtrans_duplicate'] = "<a href='{$url}'>Nhân bản nội dung</a>";

    endif;

    return $actions;
}

add_filter( 'page_row_actions', 'modify_list_row_actions', 10, 2 );
add_filter( 'post_row_actions', 'modify_list_row_actions', 10, 2 );

function qTranslate_modify_front_page() { 

    if ( is_front_page() ) :

        global $post, $q_db;       

        $active_langcode = qt_get_current_lang();

        //echo $active_langcode . '-' . $post->qtranslate_post_langcode; die();

        if ( $active_langcode !== $post->qtranslate_post_langcode ) :       

            $post = $q_db->get_post_foreign( $post->ID, $active_langcode, 'page' );

        endif;

    endif;     

}

//add_action('wp_loaded', 'qTranslate_modify_front_page', 5);


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