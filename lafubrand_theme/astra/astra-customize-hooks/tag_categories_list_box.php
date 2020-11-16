<?php 

    class __Tag_Categories_List {

        function __construct() {
            
            $taxonomy = $_GET['taxonomy'];
            
            if ( isset( $taxonomy ) && $taxonomy === 'post_tag' ) :
            
                add_filter("{$taxonomy}_edit_form_fields", array( &$this, "astra_add_categories_list_field_form" ) );    
                add_action("{$taxonomy}_add_form_fields", array( &$this, "astra_add_categories_list_front_field_form" ), 10, 2);
            
            endif;

             // save extra term extra fields hook
             add_action ( "edited_terms", array( &$this, 'astra_save_categories_list_form' ), 10, 2 );
             add_action ( "created_term", array( &$this, 'astra_save_categories_list_form' ), 10, 2 );

             add_action('admin_footer', array( &$this, 'astra_admin_footer_scripts' ));
            

        }

        public function astra_add_categories_list_field_form($tag) { 
    
            $field_key = "_tag_parent_category"; 
            
            $term_meta = get_option( "term_{$tag->term_id}" ); 

            //print_r( $term_meta ); die();
        
            $field_value = ! empty( $term_meta[$field_key] ) ? (int) $term_meta[$field_key] : -1;
            
            ?>
        
            <table class="form-table form_table_layout">
        
                <tr class="form-field">
        
                    <th scope="row" valign="top">
        
                        <label for="categoriesListField">
                            Chủ đề thuộc danh mục:
                        </label>
        
                    </th>
        
                    <td>

                       <?php 
                            wp_dropdown_categories( 

                                array(
                                    'show_count' => 0,
                                    'hierarchical' => 1,
                                    'show_option_none' => '--- Mời chọn một danh mục ---',
                                    'option_none_value' => '-1',
                                    'hide_empty' => 0,
                                    'selected' => $field_value
                                ) 

                            ); ?>

                        <input id="term_meta_<?= $field_key ?>" 
                               type="hidden" 
                               name="<?= "term_meta[$field_key]" ?>" 
                               value="<?= $field_value ?>" />
        
                    </td>
        
                </tr>   
        
            </table>
        
        <?php }
        
        public function astra_add_categories_list_front_field_form() { 
            
            $field_key = "_tag_parent_category";  ?>

            <!-- form-field -->
            <div class="form-field">                

                <label for="categoriesListField">
                   Chủ đề thuộc danh mục:
                </label>    
                
                <!-- metabox-field -->
                <div class="metabox-field categoriesListField">

                    <?php 
                            wp_dropdown_categories( 

                                array(
                                    'show_count' => 0,
                                    'hierarchical' => 1,
                                    'show_option_none' => '--- Mời chọn một danh mục ---',
                                    'option_none_value' => '-1',
                                    'hide_empty' => 0
                                ) 

                            ); ?>

                    <input id="term_meta_<?= $field_key ?>" 
                           type="hidden" 
                           name="<?= "term_meta[$field_key]" ?>" 
                           value="-1" />
        
                </div>
                <!-- #metabox-field -->

            </div>
            <!-- #form-field -->     

            
        
        <?php }
        
        public function astra_save_categories_list_form( $term_id, $taxonomy ) {
        
            if ( isset( $_POST['term_meta'] ) ) :
                
                $t_id = $term_id;
                $term_meta = get_option( "term_{$t_id}");
                
                $term_keys = array_keys( $_POST['term_meta'] );

                //print_r( $term_keys ); die();

                foreach ( $term_keys as $key ) :
                        
                    if ( isset( $_POST['term_meta'][$key] ) ) :                       

                        $term_meta[$key] = $_POST['term_meta'][$key];

                    endif;                  
                    
                endforeach;

                //print_r( $term_meta ); die();
                
                //save the option array
                update_option( "term_{$t_id}", $term_meta );               
                
            endif;
        
        }

        public function astra_admin_footer_scripts() { ?>

            <script>
                var hid = "_tag_parent_category";
              document.getElementById('cat')
                      .onchange = function() {

                // if value is category id
                document.getElementById('term_meta_' + hid).value = this.value;

              }
            </script>

        <?php }

    }

    $tag_categories_list = new __Tag_Categories_List();