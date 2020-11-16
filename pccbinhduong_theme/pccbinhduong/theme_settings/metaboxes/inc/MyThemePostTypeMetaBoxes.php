<?php 
    class MyThemePostTypeMetaBoxes {
        
        private $metaboxes = array();
        private $rmwb_metaboxes = array();
        
        public function __construct() {
            
            include get_template_directory() . '/options/post_types_metaboxes.php';          
            
        }
        
        function theme_remove_meta_boxes() {
            
            $rmwb_metaboxes = $this->rmwb_metaboxes;
            
            foreach ( $rmwb_metaboxes as $metabox ) :
                
                foreach ( $metabox['fields'] as $field ) :
                
                    delete_post_meta_by_key( '_' . $field );
                    
                endforeach;
                
            endforeach;
            
        }      
    
        /**
         Khai báo meta box
        **/
        function theme_meta_boxes_init() {           
            
            $metaboxes = $this->metaboxes;
            $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;         
            
            if ( WP_METABOX_FLAG == 'remove' ) :
                $this->theme_remove_meta_boxes();
            endif;
            
            foreach ( $metaboxes as $metabox ) :

                $add_metabox = false;
                
                if ( isset( $metabox['where_show_on'] ) && ! empty( $metabox['where_show_on'] ) ) :

                    $arr_cat_slug = $metabox['category'];

                    // tham số 'category' tồn tại ?
                    if ( $arr_cat_slug ) :

                        $is_all_subchildren = $metabox['category_all_subchildren'];                       

                        $post_cats = get_the_category( $post_id );                        
                        
                        foreach( $post_cats as $cat ) :

                            // kiểm tra xem slug của danh mục $cat này có nằm trong $arr_cat_slug ?
                            if ( in_array( $cat->slug, $arr_cat_slug ) ) :

                                $add_metabox = true;    
                                break;                            

                            else: 

                                // kiểm tra xem danh mục $cat này có là con của danh mục nào trong $arr_cat_slug ?
                                if ( isset( $is_all_subchildren ) && $is_all_subchildren ) :

                                    foreach ( $arr_cat_slug as $cat_slug ) :

                                        $mcat = get_term_by( 'slug', $cat_slug, 'category' );

                                        // là child category ?
                                        if ( cat_is_ancestor_of( $mcat, $cat ) ) :

                                            $add_metabox = true;
                                            break;

                                        endif;
                                        
                                    endforeach;

                                    // tìm được rồi thì out khỏi vòng lặp
                                    if ( $add_metabox ) :

                                        break;
                                    
                                    endif;

                                endif;

                            endif;

                        endforeach;

                    else: 

                        $add_metabox = true;

                    endif;

                    if ( $add_metabox ) :

                        add_meta_box( $metabox['id'], $metabox['title'], array( &$this, 'theme_metabox_callback' ), $metabox['where_show_on'], 'advanced', 'high', array( 'metabox', $metabox ) );

                    endif;

                endif;                
               
            endforeach;
            
        }
        
        function print_text_field_metabox_theme_callback( $post_id, $field ) {
            
            wp_nonce_field( basename( __FILE__ ), $field['id'] . '-nonce' );
            
            $field_value = get_post_meta( $post_id, '_' . $field['id'], true );
            
            printf( '   <div class="metabox_field mtop10">
                            <div class="label"><strong>%s</strong></div>
                            <div class="desc mtop10">%s</div>
                            <div class="field mtop10">
                                <input id="%s" type="text" name="%s" value="%s" /> 
                            </div>
                        </div>', 
                        $field['title'],
                        $field['desc'],
                        $field['id'],
                        $field['id'],
                        esc_attr( $field_value )
                   );
        }
        
        function print_select_field_metabox_theme_callback( $post_id, $field ) {
            
            wp_nonce_field( basename( __FILE__ ), $field['id'] . '-nonce' );
            
            $field_value = get_post_meta( $post_id, '_' . $field['id'], true ); 
            
            ob_start(); ?>
            
           <div class="metabox_field mtop10">
           
                <div class="label"><strong><?php echo $field['title']; ?></strong></div>
                <div class="desc mtop10"><?php echo $field['desc']; ?></div>
                <div class="field mtop10">
                
                    <select id="<?php echo $field['id']; ?>" class="select_field_metabox">
                        
                        <?php while ( $option_name = current( $field['options'] ) ) : ?>
                        
                                <option value="<?php echo key( $field['options'] ) ?>" <?php selected( $field_value, key( $field['options'] ) ); ?>><?php echo $option_name; ?></option>
                            
                        <?php
                                next( $field['options'] );
                            endwhile; ?>
                        
                    </select>
                   
                    <input id="<?php echo $field['id'] . '-input-select'; ?>" type="hidden" name="<?php echo $field['id']; ?>" value="<?php echo $field_value; ?>" /> 
    
                </div>
                
            </div>
                                  
   <?php    
            $contents = ob_get_contents();
            ob_end_clean();
            
            printf( $contents );
            
        }
        
        function print_media_field_metabox_theme_callback( $post_id, $field ) {
            
             wp_nonce_field( basename( __FILE__ ), $field['id'] . '-nonce' );
            
            $media_field_values = get_post_meta( $post_id, '_' . $field['id'], true );
            
            ob_start(); ?>
            
           <div class="metabox_field mtop10">
           
                <div class="label"><strong><?php echo $field['title']; ?></strong></div>
                <div class="desc pull-left mtop10 mright10"><?php echo $field['desc']; ?></div>
                
                <?php if ( $field['multiple'] ) : ?>
                
                    <div class="field_media_navigation mtop10">
                        <img class="field_media_widget_add cpointer"
                        
                                src="<?php echo get_template_directory_uri() . '/theme_settings/metaboxes/images/widget_add.png' ?>" 
                                alt="widget_add" 
                                
                                data-image-path="<?php echo get_template_directory_uri() . '/theme_settings/metaboxes/images' ?>" 
                                data-field-id="<?php echo $field['id']; ?>" 
                                data-thumbnail-enable="<?= isset( $field['thumbnail'] ) && ! $field['thumbnail'] ? 'false' : 'true'  ?>" />
                    </div>
                    
                <?php endif; ?>
                
                <div class="clearfix"></div>
                
                <?php if ( is_array( $media_field_values ) && sizeof( $media_field_values ) > 0 ) :
                            
                            $count_field = 1;
                            
                            foreach ( $media_field_values as $media_field_value ): ?>
                        
                                <div class="field mtop10">
                                   
                                   <?php if ( $field['thumbnail'] || ! isset( $field['thumbnail'] ) ) : ?>
                                       <img src="<?php echo $media_field_value ?>" class="thumbnail_media_field_metabox vmiddle" />
                                   <?php endif; ?>
                                   
                                   <input type="text" name="<?php echo $field['id'] . '[]' ?>" class="media_field_metabox vmiddle" value="<?php echo $media_field_value ?>" />
                                   <input type="button" class="button button-default media_upload vmiddle" value="Chọn ảnh" />
                                   
                                   <?php if ( $count_field > 1 ) :  // not first ?>
                                   
                                       <img src="<?php echo get_template_directory_uri() . '/theme_settings/metaboxes/images/widget_remove.png' ?>" class="field_media_widget_remove vmiddle cpointer" />
                                   
                                   <?php endif; ?>
                    
                                </div>
                            
                <?php           $count_field++;
                            endforeach;
                
                       else: ?>
                       
                           <div class="field mtop10">
                               
                               <?php if ( $field['thumbnail'] || ! isset( $field['thumbnail'] ) ) : ?>
                                   <img src="<?php echo $media_field_values ?>" class="thumbnail_media_field_metabox vmiddle" />
                               <?php endif; ?>
                               
                               <input type="text" name="<?= $field['multiple'] ? $field['id'] . '[]' : $field['id'] ?>" class="media_field_metabox vmiddle" value="<?php echo $media_field_values ?>" />
                               <input type="button" class="button button-default media_upload vmiddle" value="Chọn ảnh" />
                
                            </div>
                
                <?php endif; ?>
                
            </div>
                                  
   <?php    
            $contents = ob_get_contents();
            ob_end_clean();
            
            printf( $contents );
            
        }
        
        function print_editor_field_metabox_theme_callback( $post_id, $field ) {
            
            wp_nonce_field( basename( __FILE__ ), $field['id'] . '-nonce' );
            
            $field_value = get_post_meta( $post_id, '_' . $field['id'], true ); 
            
            ob_start(); ?>
            
                <div class="metabox_field mtop10">
                    
                    <div class="label"><strong><?php echo $field['title'] ?></strong></div>
                    <div class="desc mtop10"><?php echo $field['desc'] ?></div>
                    <div class="field mtop10">
                        
                        <?php 
                        
                            $settings = array(
                                'teeny' => true,
                                'textarea_rows' => 15,
                                'tabindex' => 1
                            );
                            
                            wp_editor( $field_value, $field['id'], $settings); ?>
                        
                        
                        <input id="<?php echo $field['id'] . '-editor' ?>" type="hidden" name="<?php echo $field['id'] ?>" class="editor_field_metabox" />
                        
                    </div>
                </div>
                
        <?php $contents = ob_get_contents(); 
              ob_end_clean();
              
              echo $contents; ?>
                   
 <?php }

        function print_checkbox_field_metabox_theme_callback( $post_id, $field ) {
            
            wp_nonce_field( basename( __FILE__ ), $field['id'] . '-nonce' );
            
            $field_value = get_post_meta( $post_id, '_' . $field['id'], true ); 
            
            ob_start(); ?>
            
                <div class="metabox_field mtop10">
                    
                    <div class="label">
                        <strong><?php echo $field['title'] ?></strong>
                    </div>         

                    <div class="field mtop10">
                        
                        <input id="<?php echo $field['id'] ?>" 
                               type="checkbox" name="<?php echo $field['id'] ?>"
                               class="checkbox_field_metabox" 
                               <?= isset( $field_value ) && 'true' === $field_value 
                                     ?
                                     'checked'
                                     :
                                     '' ?> /> 

                        <?php echo $field['desc'] ?>

                        <input id="<?php echo $field['id'] . '-checkbox' ?>" type="hidden" name="<?php echo $field['id'] ?>" value="<?= isset( $field_value ) ? $field_value : '' ?>" />
                        
                    </div>
                </div>
                
        <?php $contents = ob_get_contents(); 
              ob_end_clean();
              
              echo $contents; ?>
                   
 <?php }
         
        /**
         Khai báo callback
         @param $post là đối tượng WP_Post để nhận thông tin của post
        **/
        function theme_metabox_callback( $post, $args_callback ) {
            
            $metabox = $args_callback['args'][1];
            
            foreach ( $metabox['fields'] as $field ) :
            
                switch ($field['type'] ) :
                    
                    case 'text':
                        
                        $this->print_text_field_metabox_theme_callback( $post->ID, $field );
                        
                        break;
                    
                    case 'select':
                        
                        $this->print_select_field_metabox_theme_callback( $post->ID, $field );
                        
                        break;
                        
                    case 'media':
                        
                        $this->print_media_field_metabox_theme_callback( $post->ID, $field );
                        
                        break;
                        
                    case 'editor':
                        
                        $this->print_editor_field_metabox_theme_callback( $post->ID, $field );
                        
                        break;

                    case 'check':
                        
                        $this->print_checkbox_field_metabox_theme_callback( $post->ID, $field );
                        
                        break;
                    
                    default:
                        
                        break;
                        
                endswitch;
                
            endforeach;
            
        }
         
        /**
         Lưu dữ liệu meta box khi nhập vào
         @param post_id là ID của post hiện tại
        **/
        function theme_meta_boxes_save( $post_id ) {
            
            $metaboxes = $this->metaboxes;
            
            foreach ( $metaboxes as $metabox ) :
                
                foreach ( $metabox['fields'] as $field ) :
                    
                    $metakey_nonce = $_POST[ $field['id'] . '-nonce' ];
                    
                     // Kiểm tra nếu nonce chưa được gán giá trị hoặc không trùng khớp
                     if( ! isset( $metakey_nonce ) || ! wp_verify_nonce( $metakey_nonce, basename(__FILE__) ) ) :
                        return;
                     endif;
                     
                    if ( $field['multiple'] ) :
                        
                        $new_field_value = array_map( 'sanitize_text_field', $_POST[ $field['id'] ] );
                        
                    else :
                        
                        if ( $field['type'] === 'editor' ) :
                            
                            $new_field_value = $_POST[ $field['id'] ];
                            
                        else :
                            
                            $new_field_value = sanitize_text_field( $_POST[ $field['id'] ] );
                            
                        endif;
                        
                    endif;
                    
                    update_post_meta( $post_id, '_' . $field['id'], $new_field_value );
                    
                endforeach;
                    
            endforeach;
        }
        
    }
        
    $theme_post_type_meta_boxes = new MyThemePostTypeMetaBoxes();
    
    add_action( 'add_meta_boxes', array( $theme_post_type_meta_boxes, 'theme_meta_boxes_init' ) );
    add_action( 'save_post', array( $theme_post_type_meta_boxes, 'theme_meta_boxes_save') );
?>