<?php 

    class __Term_Heading_Title {

        function __construct() {
            
            $taxonomy = $_GET['taxonomy'];
            
            if ( isset( $taxonomy ) ) :
            
                add_filter("{$taxonomy}_edit_form_fields", array( &$this, "astra_add_heading_field_form" ) );    
                add_action("{$taxonomy}_add_form_fields", array( &$this, "astra_add_heading_front_field_form" ), 10, 2);
            
            endif;

             // save extra term extra fields hook
             add_action ( "edited_terms", array( &$this, 'astra_save_heading_field_form' ), 10, 2 );
             add_action ( "created_term", array( &$this, 'astra_save_heading_field_form' ), 10, 2 );

             // REMOVE ASTRA ARCHIVE HEADER
            remove_action( 'astra_archive_header', 'astra_archive_page_info' );
             
            add_action( 'astra_archive_header', array( &$this, 'astra_custom_archive_page_info' ) );
            

        }

        public function astra_custom_archive_page_info() { 

            $term_heading = get_the_archive_title();

            if ( is_category() ) :

                $cat_id = get_query_var('cat');

                $term_meta = get_option( "term_{$cat_id}" );

                $term_heading = ! empty( $term_meta['_term_heading_title'] ) ? $term_meta['_term_heading_title'] : 
                                                                                    $term_heading;

            elseif ( is_search() ) :

                $term_heading = 'Kết quả tìm kiếm: "' . get_query_var('s') . '"';

            endif;
            
            ?>

                <section class="ast-archive-description">
                    <h1 class="page-title ast-archive-title">
                        <?php echo wp_kses_post($term_heading , ENT_QUOTES, 'UTF-8') ?>
                    </h1>
                    <div class="justify"><?php the_archive_description() ?></div>
                </section>
        
        <?php  }

        public function astra_add_heading_field_form($tag) { 
    
            $field_key = "_term_heading_title"; 
            
            $term_meta = get_option( "term_{$tag->term_id}" ); 

            //print_r( $term_meta ); die();
        
            $field_value = ! empty( $term_meta[$field_key] ) ? $term_meta[$field_key] : '';
            
            ?>
        
            <table class="form-table form_table_layout">
        
                <tr class="form-field">
        
                    <th scope="row" valign="top">
        
                        <label for="headingTitleSectionField">
                            Heading title (h1)
                        </label>
        
                    </th>
        
                    <td>

                        <?php 
                            $settings = array(
                                'wpautop' => true, 
                                'media_buttons' => true,                                
                                'quicktags' => true, 
                                'textarea_rows' => '5',
                                'textarea_id' => $field_key,
                                'textarea_name' => "term_meta[$field_key]" );
                            wp_editor( wp_kses_post($field_value , ENT_QUOTES, 'UTF-8'), $field_key . '_editor', $settings);
                        ?>
                                  
        
                    </td>
        
                </tr>   
        
            </table>
        
        <?php }
        
        public function astra_add_heading_front_field_form() { 
            
            $field_key = "_term_heading_title";  ?>

            <!-- form-field -->
            <div class="form-field">                

                <label for="headingTitleSectionField">
                   Heading title (h1)
                </label>    
                
                <!-- metabox-field -->
                <div class="metabox-field headingTitleSection"> 

                    <input type="text" id="headingTitleSectionField" 
                                       class="headingTitleSectionField"
                                        name="<?= "term_meta[$field_key]" ?>" 
                                        value="">
        
                </div>
                <!-- #metabox-field -->

            </div>
            <!-- #form-field -->     

            
        
        <?php }
        
        public function astra_save_heading_field_form( $term_id, $taxonomy ) {
        
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

    }

    $term_heading_title = new __Term_Heading_Title();