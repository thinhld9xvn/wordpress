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
                width: 245px;
                height: 60px;

            }

        </style>

<?php }

    function disable_autosave() {
        wp_deregister_script('autosave');
    }

    // Thay thế hộp soạn thảo category description bằng tinymce
    function edited_form_taxonomy_tinymce_description($tag) {       
        ?>
        <table class="form-table">
            <tr class="form-field">
                <th scope="row" valign="top"><label for="description"><?php _ex('Mô tả', 'Taxonomy Description'); ?></label></th>
                <td>
                <?php
                    $settings = array('wpautop' => true, 
                                      'media_buttons' => true, 
                                      'quicktags' => true, 
                                      'textarea_rows' => '10', 
                                      'textarea_name' => 'description' );
                    wp_editor( wp_kses_post($tag->description , ENT_QUOTES, 'UTF-8'), 'taxonomy_description', $settings);
                ?>
                <br />
                <span class="description"><?php _e('Mô tả bình thường không được sử dụng trong giao diện, tuy nhiên có vài giao diện hiện thị mô tả này.'); ?></span>
                </td>
            </tr>
        </table>
    <?php
    }

    // Thay thế hộp soạn thảo category description bằng tinymce
    function front_form_taxonomy_tinymce_description() {   

        ?>
        <div class="form-field term-description-wrap">

            <label for="tag-description">
                <?php _ex('Mô tả', 'Taxonomy Description'); ?>
            </label>

            <?php
                $settings = array('wpautop' => true, 
                                  'media_buttons' => true, 
                                  'quicktags' => true, 
                                  'textarea_rows' => '10',
                                  'textarea_id' => 'tag-description',
                                  'textarea_name' => 'description' );
                wp_editor( wp_kses_post($tag->description , ENT_QUOTES, 'UTF-8'), 'taxonomy_description', $settings);
            ?>             
            <p class="description"><?php _e('Mô tả bình thường không được sử dụng trong giao diện, tuy nhiên có vài giao diện hiện thị mô tả này.'); ?></p>
             
        </div>
    <?php
    }

    function remove_default_category_description() {

        global $current_screen; ?>      

            <script type="text/javascript">

                jQuery(function($) {
    <?php
                    if ( 'term' === $current_screen->base ) : ?>   

                        $('textarea#description').closest('tr.form-field').remove();                                 

    <?php   
                    elseif ( 'edit-tags' === $current_screen->base  ) : ?>            

                        $('textarea#tag-description').closest('div.form-field').remove();
    <?php 
                    endif; ?>

                });

            </script>

<?php    }
    
    // thông báo lỗi khi đăng nhập
    function modify_login_wordpress_error() {
      return 'Username or password is incorrect !';
    }
    add_filter( 'login_errors', 'modify_login_wordpress_error' );

    function cc_mime_types($mimes) {
      $mimes['svg'] = 'image/svg+xml';
      return $mimes;
    }
    add_filter('upload_mimes', 'cc_mime_types');

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
   
    add_action('wp_print_scripts','disable_autosave');

    // remove the html filtering
    remove_filter( 'pre_term_description', 'wp_filter_kses' );
    remove_filter( 'term_description', 'wp_kses_data' );

    $taxonomy = $_GET['taxonomy'];

    if ( isset( $taxonomy ) ) :

        add_filter("{$taxonomy}_edit_form_fields", "edited_form_taxonomy_tinymce_description");    
        add_action("{$taxonomy}_add_form_fields", "front_form_taxonomy_tinymce_description", 10, 2);    
   
    endif;

    add_action('admin_head', 'remove_default_category_description'); 


    // giới hạn 20 ký tự ở cột term description khi vào edit-tags.php
    add_action(
        'admin_head-edit-tags.php',
        'wpse152619_edit_tags_trim_description'
    );
    function wpse152619_edit_tags_trim_description() {

        add_filter(
            'get_terms',
            'wpse152619_trim_description_callback',
            100,
            2
        );

    }

    function wpse152619_trim_description_callback( $terms, $taxonomies ) {
     
        foreach( $terms as $key => $term ) {

            $terms[ $key ]->description =
                wp_trim_words(
                    $term->description,
                    20,
                    ' ...'
                );

        }

        return $terms;
    }
    // #giới hạn 20 ký tự ở cột term description khi vào edit-tags.php 

    remove_filter( 'the_excerpt', 'wpautop' );
    remove_filter( 'get_the_excerpt', 'wpautop' );    

?>