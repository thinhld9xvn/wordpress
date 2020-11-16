<?php

    class MyThemeCategoryMetaBoxes {

        private $cat_fields = array();

        function __construct() {

            include get_template_directory() . '/options/terms_metaboxes.php';

        }

        function extra_media_field( $field, $cat_meta) {            

            ob_start(); ?>

                <tr>

                    <th scope="row" valign="top">

                        <label for="<?php echo $field['id'] ?>">
                            <?php echo $field['title'] ?>
                        </label>

                    </th>

                    <td>
                        <!-- metabox_field -->
                        <div class="metabox_field">

                            <?php if ( $field['multiple'] ) : ?>
                
                                <div style="margin-bottom: 10px;" class="field_media_navigation mtop10">
                                    
                                    <img class="field_media_widget_add cpointer vmiddle"
                                    
                                            src="<?php echo get_template_directory_uri() . '/theme_settings/metaboxes/images/widget_add.png' ?>" 
                                            alt="widget_add" 
                                            
                                            data-image-path="<?php echo get_template_directory_uri() . '/theme_settings/metaboxes/images' ?>" 
                                            data-field-id="<?php printf( 'cat_meta[%s]', $field['id'] ); ?>" 
                                            data-thumbnail-enable="<?= isset( $field['thumbnail'] ) && ! $field['thumbnail'] ? 'false' : 'true'  ?>" />

                                    <span class="vmiddle">Thêm mới đối tượng</span>


                                </div>
                                
                            <?php endif; ?>                           

                            <p class="description"><?php echo $field['desc'] ?></p>

                            <?php 
                                $media_cat_field = $cat_meta[ $field['id'] ];

                                if ( is_array( $media_cat_field ) && sizeof( $media_cat_field ) > 0 ) :
                                
                                    $count_field = 1;
                                    
                                    foreach ( $media_cat_field as $media_field_value ): ?>
                                
                                        <div class="field mtop10">
                                           
                                           <?php if ( $field['thumbnail'] || ! isset( $field['thumbnail'] ) ) : ?>
                                               <img width="100" src="<?php echo $media_field_value ?>" class="thumbnail_media_field_metabox vmiddle" />
                                           <?php endif; ?>
                                           
                                           <input type="text" name="<?php printf( "cat_meta[%s][]", $field['id'] ) ?>" class="media_field_metabox vmiddle" value="<?php echo $media_field_value ?>" />
                                           <input type="button" class="button button-default media_upload vmiddle" value="Chọn ảnh" />
                                           
                                           <?php if ( $count_field > 1 ) :  // not first ?>
                                           
                                               <img src="<?php echo get_template_directory_uri() . '/theme_settings/metaboxes/images/widget_remove.png' ?>" class="field_media_widget_remove vmiddle cpointer" />
                                           
                                           <?php endif; ?> 

                                        </div>                                         
                                
                    <?php               $count_field++;                    
                                    endforeach;   

                                else: ?>
                           
                                 <div class="field mtop10">
                                     
                                     <?php if ( $field['thumbnail'] || ! isset( $field['thumbnail'] ) ) : ?>
                                         <img width="100" src="<?php echo $cat_meta[ $field['id'] ] ?>" class="thumbnail_media_field_metabox vmiddle" />
                                     <?php endif; ?>
                                     
                                     <input type="text" 
                                            name="<?php printf( 'cat_meta[%s]%s', $field['id'], isset( $field['multiple'] ) && $field['multiple'] ? '[]' : '' ) ?>" 
                                            class="media_field_metabox vmiddle" 
                                            value="<?php echo $media_cat_field ?>" />

                                     <input type="button" class="button button-default media_upload vmiddle" value="Chọn ảnh" />

                                                        
                                  </div>
                    
                    <?php   endif; ?>

                        </div>
                        <!-- #metabox_field -->
            
                    </td>

                </tr>     

  <?php     $contents = ob_get_contents();
            ob_end_clean();

            echo $contents;
        }

        function extra_select_field( $field, $cat_meta) {            

            ob_start(); ?>

                <tr>

                    <th scope="row" valign="top">

                        <label for="<?php echo $field['id'] ?>">
                            <?php echo $field['title'] ?>
                        </label>

                    </th>

                    <td>

                        <select id="sl-<?php echo $field['id'] ?>" class="select_field_metabox">

                            <?php while ( $option_name = current( $field['options'] ) ) : ?>

                                      <option value="<?php echo key( $field['options'] ) ?>" <?php selected( key( $field['options'] ), $cat_meta[ $field['id'] ] ) ?> >

                                        <?php echo $option_name ?>

                                      </option>

                            <?php      next( $field['options'] );

                                   endwhile; ?>

                        </select>

                        <input type="hidden" id="<?php echo $field['id'] ?>" name="<?php printf( "cat_meta[%s]", $field['id'] ) ?>" value="<?php echo $cat_meta[ $field['id'] ]; ?>" />

                        <br/>

                        <p class="description"><?php echo $field['desc'] ?></p>
            
                    </td>

                </tr>     

  <?php     $contents = ob_get_contents();
            ob_end_clean();

            echo $contents;
        }

        //add extra fields to category edit form callback function
        function extra_category_fields( $tag ) {    //check for existing featured ID
        
            $t_id = $tag->term_id;
            $cat_meta = get_option( "category_$t_id"); 

            $fields = $this->cat_fields;                     

            foreach ( $fields as $field ) :                 

                switch ( $field['type'] ) :

                     case 'select':

                        $this->extra_select_field( $field, $cat_meta );
                        
                        break;

                    case 'media':

                        $this->extra_media_field( $field, $cat_meta );

                        break;
                     
                     default:
                         
                         break;

                endswitch;

            endforeach;            
   
         }
        
        // save extra category extra fields callback function
        function save_extra_category_fileds( $term_id ) {
            
            if ( isset( $_POST['cat_meta'] ) ) :                
                
                $t_id = $term_id;
                $cat_meta = get_option( "category_$t_id");
                
                $cat_keys = array_keys($_POST['cat_meta']);
                
                foreach ($cat_keys as $key) :
                    
                    if ( isset( $_POST['cat_meta'][$key] ) ) :
                        $cat_meta[$key] = $_POST['cat_meta'][$key];                       
                    endif;
                    
                endforeach;
                
                //save the option array
                update_option( "category_$t_id", $cat_meta );               
                
            endif;
            
        }

    }

    $category_meta_boxes = new MyThemeCategoryMetaBoxes();
    
    //add extra fields to category edit form hook
    add_action ( 'edit_category_form_fields', array( $category_meta_boxes, 'extra_category_fields' ) );
    
    // save extra category extra fields hook
    add_action ( 'edited_category', array( $category_meta_boxes, 'save_extra_category_fileds' ) );   

    
?>
