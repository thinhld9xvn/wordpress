<?php 
	
	function remove_admin_login_header() {
	   remove_action('wp_head', '_admin_bar_bump_cb');
	}

    // show all categories, terms in page, category, post   
    function checklist_args( $args, $taxonomies ) {

        $menu_taxonomies = array('page', 'category','post');

        if( in_array($taxonomies[0], $menu_taxonomies) ) :

          $args['number'] = 1000;

        endif;

        return $args;
    }

    function build_taxonomies() {
    
      register_taxonomy( 'category', 'post', array(
            'hierarchical' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => 'category_name',
            'rewrite' => did_action( 'init' ) ? array(
                        'hierarchical' => false,
                        'slug' => get_option('category_base') ? get_option('category_base') : 'category',
                        'with_front' => false) : false,
            'public' => true,
            'show_ui' => true,
            '_builtin' => true,
        ) );
    
    }    

    // tự động cập nhật term slug dựa trên tiêu đề
    function update_slug_terms( $term_id, $taxonomy ) {

        $term_name = trim( $_POST['name'] );
        $term_slug = trim( $_POST['slug'] );

        $new_term_url = sanitize_title( $term_name );

        $exist_term = get_term_by( 'slug', $new_term_url, $taxonomy );

        // kiểm tra term đã tồn tại hay chưa ( loại trừ term hiện tại đang xét )
        // bằng cách đối chiếu id
        if ( $exist_term && $term_id !== $exist_term->term_id ) :

            $splices_url = explode( '-', $new_term_url );

            $ubound = sizeof( $splices_url ) - 1;
            $str_endpart_url = $splices_url[ $ubound ];

            // Phần cuối slug có số thì tăng số đó lên 1 đơn vị
            if ( is_numeric ( $str_endpart_url ) ) :

                $splices_url[ $ubound ] = parseInt( $str_endpart_url ) + 1;

            // Phần cuối slug không có số thì gán vào cuối cho nó = 1
            else :

                $splices_url[] = '1';

            endif;

            // nối từng phân đoạn url đã tách lại thành một url hoàn chỉnh rồi tiến hành update
            $new_term_url = implode( '-', $splices_url );

        endif;    

        // xóa hook tránh lặp vô hạn
        remove_action( 'edited_terms', 'update_slug_terms', 10, 2 );

        wp_update_term( $term_id, $taxonomy, array(
                'name' => $term_name,               
                'slug' => $new_term_url
            )
        );
        
        // thực hiện hook lại
        add_action( 'edited_terms', 'update_slug_terms', 10, 2 );           

    }

    function override_mce_options($initArray) {

        $opts = '*[*]';
        $initArray['valid_elements'] = $opts;
        $initArray['extended_valid_elements'] = $opts;

        return $initArray;

    }
    
    /**
     * Disable the emoji's
     */
    function disable_emojis() {
            remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
            remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
            remove_action( 'wp_print_styles', 'print_emoji_styles' );
            remove_action( 'admin_print_styles', 'print_emoji_styles' );    
            remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
            remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );      
            remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
            add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    }    
     
    /**
     * Filter function used to remove the tinymce emoji plugin.
     * 
     * @param    array  $plugins  
     * @return   array             Difference betwen the two arrays
     */
    function disable_emojis_tinymce( $plugins ) {
        if ( is_array( $plugins ) ) {
                return array_diff( $plugins, array( 'wpemoji' ) );
        } else {
                return array();
        }
    }
    
    function vc_remove_wp_ver_css_js( $src ) {
        if ( strpos( $src, 'ver=' ) )
            $src = remove_query_arg( 'ver', $src );
        return $src;
    }    

    function my_login_logo() { 

        $head_options = get_option( 'section-header_option_name' ); ?>

        <style type="text/css">

            #login h1 a, .login h1 a {

                background-image: url('<?php echo $head_options['logo-image-id'] ?>');
                background-size: 100%;
                width: 253px;
                height: 44px;

            }

        </style>

<?php }

    add_filter( 'show_admin_bar', '__return_false' );

    //add_filter( 'get_terms_args', 'checklist_args', 10, 2 );

    add_filter('tiny_mce_before_init', 'override_mce_options');

    add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
    add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

    add_action('get_header', 'remove_admin_login_header');

    add_action( 'init', 'build_taxonomies', 0 );
    add_action( 'init', 'disable_emojis' );

    add_action( 'edited_terms', 'update_slug_terms', 10, 2 );

    add_action( 'login_enqueue_scripts', 'my_login_logo' );

    function disable_autosave() {
        wp_deregister_script('autosave');
    }
    add_action('wp_print_scripts','disable_autosave');

    remove_action( 'wp_head', 'wp_resource_hints', 2 ); 

    function remove_api () {
        remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
        remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
    }
    add_action( 'after_setup_theme', 'remove_api' ); 

    remove_action ('wp_head', 'rsd_link'); 

    remove_action( 'wp_head', 'wlwmanifest_link'); 

    remove_action('wp_head', 'wp_generator');

    ?>