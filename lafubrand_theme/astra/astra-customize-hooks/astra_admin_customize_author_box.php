<?php 
    function loading_infinite_posts_ajax() {
        
        $post_type = isset( $_POST['post_type'] ) ? $_POST['post_type'] : 'post';

        $taxonomy = isset( $_POST['taxonomy'] ) ? $_POST['taxonomy'] : '';
        $field = isset( $_POST['field'] ) ? $_POST['field'] : '';
        $term = isset( $_POST['term'] ) ? $_POST['term'] : '';

        $author_id = isset( $_POST['author_id'] ) ? (int) $_POST['author_id'] : '';

        $tag_id = isset( $_POST['tag_id'] ) ? (int) $_POST['tag_id'] : '';

        $search_key = isset( $_POST['search_key'] ) ? $_POST['search_key'] : '';

        $number_items = isset( $_POST['n_items'] ) ? (int) $_POST['n_items'] : 4;

        $paged = isset( $_POST['paged'] ) ? (int) $_POST['paged'] : 1;

        $args = array(
            
            'posts_per_page' => $number_items,
            'orderby' => 'date',
            'order' => 'desc',
            'paged' => $paged

        );

        if ( ! empty( $post_type ) ) :

            $args['post_type'] = $post_type;

        endif;

        if ( ! empty( $taxonomy ) ) :

            $args['tax_query'] = array(

                array(

                    'taxonomy' => $taxonomy,
                    'field' => $field

                )

            );

            if ( ! empty( $term ) ) :

                $args['tax_query'][0]['terms'] = $term;

            endif;

        endif;

        if ( ! empty( $author_id ) ) :

            $args['author'] = $author_id;

        endif;

        if ( ! empty( $tag_id ) ) :

            $args['tag_id'] = $tag_id;

        endif;

        if ( ! empty( $search_key ) ) :

            $args['s'] = $search_key;

        endif;

        $results = query_posts( $args );

        foreach ( $results as $post ) :

            $post_category = get_the_category($post->ID);
            $post_category = $post_category[0];

            $post_category->permalink = get_category_link($post_category);

            $post->post_thumbnail = get_the_post_thumbnail( $post->ID, 'full' );          
            $post->post_permalink = get_the_permalink( $post->ID );
            $post->post_category = $post_category;

            $post->post_excerpt = get_the_excerpt($post->ID);
            
            
        endforeach;

        wp_reset_query();

        header("Content-Type: application/json; charset: utf-8");
        echo json_encode( $results );

        die();

    }

    add_action('wp_ajax_sb_loading_infinite_posts', 'loading_infinite_posts_ajax', 10);
    add_action('wp_ajax_nopriv_sb_loading_infinite_posts', 'loading_infinite_posts_ajax', 10);

    add_action( 'show_user_profile', 'extra_user_profile_priority_field', 1 );
    add_action( 'edit_user_profile', 'extra_user_profile_priority_field', 1 );

    function extra_user_profile_priority_field( $user ) {

        $avatar = get_the_author_meta( 'profile_avatar', $user->ID );
        $avatar = $avatar ? esc_attr( $avatar ) : 'https://secure.gravatar.com/avatar/c4c645522f94b3e95a9a7c56e2db48e4?s=96&#038;r=g'; ?>   

        <h3><?php _e("Ảnh đại diện", "blank"); ?></h3>   

        <table class="form-table">

            <tr>
                <th><label for="profile_avatar">Avatar</label></th>

                <td>

                    <img alt='avatar' style="cursor: pointer" src='<?= $avatar ?>' class='avatar media_upload avatar-96 photo' height='96' width='96' />

                    <input type="hidden" name="profile_avatar" id="profile_avatar" value="<?php echo esc_attr( get_the_author_meta( 'profile_avatar', $user->ID ) ); ?>" class="regular-text" /><br />

                    <span class="description"><?php _e("Please choose your avatar profile."); ?></span>

                </td>

            </tr>
      
        </table>  

        <h3><?php _e("Tiểu sử thành viên", "blank"); ?></h3>

        <table class="form-table">

            <tr>
                <th><?php _e("Tiểu sử thành viên (Tiếng Việt)"); ?></th>
                <td
                     <?php
                        $settings = array('wpautop' => false, 
                                          'media_buttons' => true, 
                                          'quicktags' => true, 
                                          'textarea_rows' => '10', 
                                          'textarea_name' => 'profile_description_vi' );
                        wp_editor( get_the_author_meta( 'profile_description_vi', $user->ID ), 'profile_description_vi', $settings); 

                    ?>  

                </td>
            </tr>

            <tr>
                <th><?php _e("Tiểu sử thành viên (Tiếng Anh)"); ?></th>
                <td
                     <?php
                        $settings = array('wpautop' => false, 
                                          'media_buttons' => true, 
                                          'quicktags' => true, 
                                          'textarea_rows' => '10', 
                                          'textarea_name' => 'profile_description_en' );
                        wp_editor( get_the_author_meta( 'profile_description_en', $user->ID ), 'profile_description_en', $settings); 

                    ?>  

                </td>
            </tr>
      
        </table>

        <h3><?php _e("Mạng xã hội", "blank"); ?></h3>

        <table class="form-table">

            <tr>
                <th><label for="profile_social_facebook">Mạng xã hội</label></th>
                <td>
                    
                    <span class="description"><?php _e("Facebook Social"); ?></span> <br/>
                    <input type="text" name="profile_social_facebook" id="profile_social_facebook" value="<?php echo esc_attr( get_the_author_meta( 'profile_social_facebook', $user->ID ) ); ?>" class="regular-text" /><br /><br />                    

                    <span class="description"><?php _e("Twitter social"); ?></span> <br/>
                     <input type="text" name="profile_social_twitter" id="profile_social_twitter" value="<?php echo esc_attr( get_the_author_meta( 'profile_social_twitter', $user->ID ) ); ?>" class="regular-text" /><br /><br />

                     <span class="description"><?php _e("Pinterest social"); ?></span> <br/>
                     <input type="text" name="profile_social_pinterest" id="profile_social_pinterest" value="<?php echo esc_attr( get_the_author_meta( 'profile_social_pinterest', $user->ID ) ); ?>" class="regular-text" /><br /> <br />
                   
                     <span class="description"><?php _e("Medium social"); ?></span> <br/>
                     <input type="text" name="profile_social_medium" id="profile_social_medium" value="<?php echo esc_attr( get_the_author_meta( 'profile_social_medium', $user->ID ) ); ?>" class="regular-text" /><br /><br />

                     <span class="description"><?php _e("Instagram social"); ?></span><br />
                     <input type="text" name="profile_social_instagram" id="profile_social_instagram" value="<?php echo esc_attr( get_the_author_meta( 'profile_social_instagram', $user->ID ) ); ?>" class="regular-text" /><br /><br />                    

                     <span class="description"><?php _e("Vimeo social"); ?></span><br />
                     <input type="text" name="profile_social_vimeo" id="profile_social_vimeo" value="<?php echo esc_attr( get_the_author_meta( 'profile_social_vimeo', $user->ID ) ); ?>" class="regular-text" /><br /><br/>

                     <span class="description"><?php _e("VK.com social"); ?></span><br />
                     <input type="text" name="profile_social_vk" id="profile_social_vk" value="<?php echo esc_attr( get_the_author_meta( 'profile_social_vk', $user->ID ) ); ?>" class="regular-text" /><br /><br/>

                     <span class="description"><?php _e("Linkedin social"); ?></span><br />
                     <input type="text" name="profile_social_linkedin" id="profile_social_linkedin" value="<?php echo esc_attr( get_the_author_meta( 'profile_social_linkedin', $user->ID ) ); ?>" class="regular-text" /><br /><br/>

                     <span class="description"><?php _e("Youtube social"); ?></span><br />
                     <input type="text" name="profile_social_youtube" id="profile_social_youtube" value="<?php echo esc_attr( get_the_author_meta( 'profile_social_youtube', $user->ID ) ); ?>" class="regular-text" /><br /><br/>
                    

                </td>
            </tr>
      
        </table>

        <h3><?php _e("Độ ưu tiên", "blank"); ?></h3>

        <table class="form-table">

            <tr>
                <th><label for="profile_priority"><?php _e("Priority"); ?></label></th>
                <td>
                    <input type="text" name="profile_priority" id="profile_priority" value="<?php echo esc_attr( get_the_author_meta( 'profile_priority', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description"><?php _e("Please enter your priority."); ?></span>
                </td>
            </tr>
      
        </table>
    <?php }

    add_action( 'personal_options_update', 'save_extra_user_profile_priority_field' );
    add_action( 'edit_user_profile_update', 'save_extra_user_profile_priority_field' );

    function save_extra_user_profile_priority_field( $user_id ) {

        if ( ! current_user_can( 'edit_user', $user_id ) ) { 
            return false; 
        }     
        update_user_meta( $user_id, 'profile_description_vi', $_POST['profile_description_vi'] );
        update_user_meta( $user_id, 'profile_description_en', $_POST['profile_description_en'] );
        update_user_meta( $user_id, 'profile_avatar', $_POST['profile_avatar'] );

        update_user_meta( $user_id, 'profile_social_facebook', $_POST['profile_social_facebook'] );
        update_user_meta( $user_id, 'profile_social_twitter', $_POST['profile_social_twitter'] );
        update_user_meta( $user_id, 'profile_social_pinterest', $_POST['profile_social_pinterest'] );
        update_user_meta( $user_id, 'profile_social_medium', $_POST['profile_social_medium'] );
        update_user_meta( $user_id, 'profile_social_instagram', $_POST['profile_social_instagram'] );
        update_user_meta( $user_id, 'profile_social_vimeo', $_POST['profile_social_vimeo'] );
        update_user_meta( $user_id, 'profile_social_vk', $_POST['profile_social_vk'] );
        update_user_meta( $user_id, 'profile_social_linkedin', $_POST['profile_social_linkedin'] );
        update_user_meta( $user_id, 'profile_social_youtube', $_POST['profile_social_youtube'] );

        update_user_meta( $user_id, 'profile_priority', $_POST['profile_priority'] );
    }

    add_filter('admin_enqueue_scripts','ShowTinyMCE');

    function loadTinyMCEScripts() {

         // conditions here
            wp_enqueue_script( 'common' );
            wp_enqueue_script( 'jquery-color' );
            wp_print_scripts('editor');
            if (function_exists('add_thickbox')) add_thickbox();
            wp_print_scripts('media-upload');
            if (function_exists('wp_tiny_mce')) wp_tiny_mce();
            wp_admin_css();
            wp_enqueue_script('utils');
            do_action("admin_print_styles-post-php");
            do_action('admin_print_styles');

    }

    function ShowTinyMCE() {

        $request_uri = $_SERVER['REQUEST_URI'];

        if ( false !== strpos( $request_uri, 'user-edit.php' ) ) :

           loadTinyMCEScripts();

        endif;

    }

    add_action( 'personal_options', array ( 'T5_Hide_Profile_Bio_Box', 'start' ) );

/**
 * Captures the part with the biobox in an output buffer and removes it.
 *
 * @author Thomas Scholz, <info@toscho.de>
 *
 */
class T5_Hide_Profile_Bio_Box
{
    /**
     * Called on 'personal_options'.
     *
     * @return void
     */
    public static function start()
    {
        $action = ( IS_PROFILE_PAGE ? 'show' : 'edit' ) . '_user_profile';
        add_action( $action, array ( __CLASS__, 'stop' ) );
        ob_start();
    }

    /**
     * Strips the bio box from the buffered content.
     *
     * @return void
     */
    public static function stop()
    {
        $html = ob_get_contents();
        ob_end_clean();

        //file_put_contents( dirname(__FILE__) . '/debug.log', $html );

         // remove the headline      
        //$html = str_replace( '<h2>Quản lý tài khoản</h2>', '', $html );

         // remove the table row
       // $html = preg_replace( '~<tr id="password" class="user-pass1-wrap">.*</tr>~imsUu', '', $html );

        // remove the table row
        //$html = preg_replace( '~<tr class="user-pass2-wrap hide-if-js">.*</tr>~imsUu', '', $html );

        // remove the table row
        $html = preg_replace( '~<tr class="user-sessions-wrap hide-if-no-js">.*</tr>~imsUu', '', $html );

        // remove the table row
        $html = preg_replace( '~<tr class="user-profile-picture">.*</tr>~imsUu', '', $html );

        // remove the headline      
        $html = str_replace( '<h2>Xung quanh thành viên</h2>', '', $html );

        // remove the table row
        $html = preg_replace( '~<tr class="user-description-wrap">\s*<th><label for="description".*</tr>~imsUu', '', $html );

        
        print $html;
    }
} 

    function admin_user_textarea_tinymce() {

        $request_uri = $_SERVER['REQUEST_URI'];

        if ( false !== strpos( $request_uri, 'user-edit.php' ) || false !== strpos( $request_uri, 'profile.php' ) ) : 

            ob_start(); ?>

            <script type='text/javascript'>

                jQuery(document).ready(function($) {                       

                    //$('#your-profile').append( $obj );

                    var editor = {

                        ready: function() {

                            $('form').on( 'submit', function(e) {                

                                if ( typeof( tinyMCE ) != "undefined") {

                                    $wp_editors = tinyMCE.editors;

                                    if ( $wp_editors.length > 0 ) {

                                        $('.wp-switch-editor.switch-tmce').click();

                                        for ( var i = 0; i < $wp_editors.length; i++ ) {

                                            var id = $wp_editors[i].id,
                                                $editor_field = $('#' + id),
                                                contents = '';

                                            //console.log( $editor_field );

                                            if ( $editor_field.length > 0 ) {

                                                $wp_editors[i].save();

                                                //contents = $wp_editors[i].getContent();

                                                //$('#_' + id).val( contents );

                                            }

                                        }

                                    }

                                }
                                
                            });

                            //let t = setInterval(function() {   

                            $(window).load(function() {                        

                                if ( typeof( tinyMCE ) != "undefined") {

                                    $wp_editors = tinyMCE.editors;                            

                                    if ( $wp_editors.length > 0 ) { 

                                        //clearInterval( t );  

                                        //console.log( $wp_editors );                                

                                        for ( var i = 0; i < $wp_editors.length; i++ ) {

                                            var id = $wp_editors[i].id,
                                                $editor_field = $('#_' + id),
                                                contents = ''; 

                                            //console.log( $editor_field );               

                                            if ( $editor_field.length > 0 ) {             

                                                contents = $editor_field.val();  

                                                //console.log( contents );    

                                                //console.log( $wp_editors[i] );      

                                                $wp_editors[i].setContent(contents, {format: 'raw'});

                                            }

                                        }

                                    }

                                }

                            });


                            //}, 200);


                        }

                    }

                    editor.ready();

                    var media = {

                        index : 0,
                        
                        ready: function() {
                            
                            $(document).on('click', '.media_upload', this.uploadMedia);                            
                        },                    
                        
                        uploadMedia: function(e) {
                            
                            e.preventDefault();

                            //console.log('abc');
                        
                            var $attachment_thumbnail = $(this),
                                $attachment_url = $(this).nextAll('input[type=hidden]'),
                                
                                custom_uploader = wp.media({
                                    title: 'Select Media',
                                    button: {
                                        text: 'Upload Image'
                                    },
                                    multiple: false  // Set this to true to allow multiple files to be selected
                                })
                                .on('select', function() {
                                    
                                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                                    
                                    
                                    $attachment_thumbnail.attr('src', attachment['url'] );
                                    
                                    $attachment_url.val( attachment['url'] );
                                   
                                })
                                .open();
                                
                            }
                    }  
                    
                    media.ready();

                    $('table.form-table').eq(0).remove();                    

                    //$("table.form-table:contains('Mật khẩu mới')").remove();
                    

                });

            </script>           

    <?php
            $contents = ob_get_contents();
            ob_end_clean();

            echo $contents;

        endif;

    }

    add_action('in_admin_footer', 'admin_user_textarea_tinymce');


if( ! function_exists( 'prefix_astra_child_post_author_output' ) ) :

    function prefix_astra_child_post_author_output() {

        return '';
    }

    add_filter( 'astra_post_author_output', 'prefix_astra_child_post_author_output' );    

endif;

