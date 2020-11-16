<?php
    class qTranslateMetaBoxes {

        private $metaboxes = array(),
                $languages = array();

        function __construct() {

             $taxonomy = $_GET['taxonomy'];

            if ( isset( $taxonomy ) ) :

                add_filter("{$taxonomy}_edit_form_fields", array( &$this, 'qtranslate_extra_term_fields' ) );    
                add_action("{$taxonomy}_add_form_fields", array( &$this, 'qtranslate_extra_front_term_fields' ), 10, 2);
       
            endif;

             // save extra term extra fields hook
            add_action ( "edited_terms", array( &$this, 'qtranslate_save_extra_term_fields' ), 10, 2 );
            add_action ( "created_term", array( &$this, 'qtranslate_save_extra_term_fields' ), 10, 2 );

            add_action ( "in_admin_footer", array( &$this, 'qtranslate_metaboxes_footer_scripts' ) );
            add_action ( "in_admin_footer", array( &$this, 'qtranslate_reset_term_form_field_after_create' ) );

        }

        public function qtranslate_metaboxes_init() {

            add_meta_box( 'qtranslate-metaboxes', 'Bài viết dịch tương ứng', array( &$this, 'qtranslate_metabox_callback' ), null, 'side', 'high');

        }

        private function q_filter_active_lang( $e ) {

            $langcodes = qt_get_langcodes();
            $active_langcode = qt_get_current_lang();

            //echo $active_langcode; die();

            return  in_array( $e['code'], $langcodes ) && 
                    $e['code'] !== $active_langcode;

        }

        public function qtranslate_metabox_callback() {         

            include QTRANSLATE_DIRECTORY_PACKAGES . '/languages.php';
            require_once QTRANSLATE_DIRECTORY_INC . '/qTranslate_db.php';

            $mydb = new qTranslate_db();
            
            $active_langcode = qt_get_current_lang();

            $post_id = $_GET['post'];

            $post_type = $_GET['post_type'];

            $has_q_postid = false;

            if ( isset( $post_id ) ) :

                $_post_id = $post_id;                

            else :

                $q_postid = $_GET['qtranslate_post_id'];

                if ( isset( $q_postid ) ) :

                    $_post_id = (int) $q_postid;

                    $has_q_postid = true;

                endif;

            endif;  

            if ( ! $has_q_postid ) :

                $post = get_post( $post_id );

                if ( ! isset( $post_type ) ) :
                
                    $post_type = $post->post_type;

                endif;

            endif;

            ob_start(); ?>

            <div class="qtranslate-container">

                <ul>

                <?php

                    $q_langs = array_filter( $this->languages, array( &$this, 'q_filter_active_lang') );
                   

                    foreach ( $q_langs as $q_lang ) :                         

                        // $post có ngôn ngữ tiếng việt
                        if ( $q_lang['code'] !== 'vi' ) :

                            if ( $has_q_postid ) :

                                $q_post = get_post( $_post_id );

                            else :

                                $q_post = $mydb->get_post_foreign( $_post_id, $q_lang['code'], $post_type );

                            endif;
                        
                        else :

                            if ( ! $has_q_postid ) :

                                $_post_id = (int) $post->qtranslate_post_id_primary;

                            endif;  

                            if ( (int) $_post_id !== 0 ) :

                                $q_post = get_post( $_post_id );

                            endif;                           

                        endif; 

                        if ( ! is_null( $q_post ) ) :

                            $q_pid = isset( $q_post->ID ) ? $q_post->ID : $q_post->id;

                            $admin_url = admin_url( "post.php?post={$q_pid}&action=edit&qtranslate_lang={$q_lang['code']}" );

                            $anchor_tag = "<a href='{$admin_url}' target='_blank' title='{$q_post->post_title}'>
                                    <span class='dashicons dashicons-edit'>
                                    </span>
                                    <span>{$q_post->post_title}</span>
                                  </a>";

                        else :

                            $admin_url = admin_url( "post-new.php?post_type={$post_type}&qtranslate_post_id={$post_id}&qtranslate_lang={$q_lang['code']}" );

                            $anchor_tag = "<a href='{$admin_url}' target='_blank' title='Tạo bài viết mới'>
                                            <span class='dashicons dashicons-plus'>
                                            </span> 
                                            <span></span>                                   
                                           </a>";

                        endif; ?>
                
                        <li class="wp-tab-bar">

                            <img src="<?php echo $q_lang['flag_base64'] ?>" alt="<?php echo $q_lang['locale'] ?>" />

                            <?php echo $anchor_tag ?>

                        </li>
                       
                        
                <?php

                    endforeach; ?>

                </ul>
                
            </div>

            <style>

                #qtranslate-metaboxes ul {
                    display:  inline-block;
                    margin-bottom:  0;
                }
                #qtranslate-metaboxes ul, #qtranslate-metaboxes ul li {
                    width:  100%;
                }

                #qtranslate-metaboxes ul li:not(:first-child) {

                    margin-bottom: 10px;

                }

                #qtranslate-metaboxes ul li, #qtranslate-metaboxes ul li > img {
                    float:  left;
                }

                #qtranslate-metaboxes ul li > a {

                    float: right;
                    width: calc(100% - 35px);
                    width: -webkit-calc(100% - 35px);

                }

                #qtranslate-metaboxes ul li > a > span {

                    position: relative;
                    top: -2px;
                    float: left;

                }

                #qtranslate-metaboxes ul li > a > span:last-child {

                    top: -3px;
                    float: right;
                    width: calc(100% - 25px);
                    width: -webkit-calc(100% - 25px);

                }

            </style>

        <?php
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;

        }

        public function qtranslate_metaboxes_save() {

        }

        public function qtranslate_extra_term_fields( $tag ) { 

            $field_langbox_id = "qtranslate-term-{$tag->term_id}-langbox";
            $field_mapping_id = "qtranslate-term-{$tag->term_id}-mappingbox";

            //if ( $this->option_exist( "term_{$tag->term_id}" ) ) :

            $term_meta = get_option( "term_{$tag->term_id}");

            $field_mapping_value = $term_meta[ $field_mapping_id ] ? $term_meta[ $field_mapping_id ] : '';

            $active_langcode = qt_get_current_lang();

            $languages = qt_get_languages(); 

            //print_r( $languages ); ?>

            <table class="form-table form_table_layout">

                <tr class="form-field">

                    <th scope="row" valign="top">

                        <label for="<?= $field_id ?>">
                          Ngôn ngữ
                        </label>

                    </th>

                    <td>
                        <select id="<?= $field_langbox_id ?>" class="qtranslate-langbox">

                            <?php 
                                foreach ( $languages as $lang ) : ?>
                                    
                                        <option value="<?= $lang->code ?>"
                                                <?= $lang->code === $active_langcode ? "selected='selected'" : "" ?>>
                                        
                                                <?= $lang->name ?>
                                    
                                        </option>

                        <?php  endforeach; ?>                            
                           
                        </select>       

                        <input type="hidden" class="_qtranslate-langbox"
                                             name="<?= "term_meta[{$field_langbox_id}]" ?>" 
                                             value="<?= $active_langcode ?>">                 
            
                    </td>

                </tr>   

                <tr class="form-field">

                    <th scope="row" valign="top">

                        <label for="<?= $field_mapping_id ?>">
                          Mục liên kết
                        </label>

                    </th>

                    <td class="qtranslate-mb-mappingbox">

                        <select id="<?= $field_mapping_id ?>" class="qtranslate-term-mappingbox">                           
                        </select>

                        <input type="hidden" class="_qtranslate-term-mappingbox"
                                             name="<?= "term_meta[{$field_mapping_id}]" ?>" 
                                             value="<?= $field_mapping_value ?>">
            
                    </td>

                </tr>   

            </table>

  <?php }

        public function qtranslate_extra_front_term_fields( $tag ) { 
            
            //if ( $this->option_exist( "term_{$tag->term_id}" ) ) :

            $active_langcode = qt_get_current_lang(); 

            $languages = qt_get_languages(); ?>

            <!-- form-field -->
            <div class="form-field">

                <label for="qtranslate-term-langcode">
                   Ngôn ngữ
                </label>    
                
                <!-- metabox-field -->
                <div class="metabox-field">

                    <select id="qtranslate-term-langcode" class="qtranslate-langbox">

                     <?php 
                        foreach ( $languages as $lang ) :  ?>
                            
                                <option value="<?= $lang->code ?>" 
                                        <?= $lang->code === $active_langcode ? "selected='selected'" : "" ?>>
                                
                                        <?= $lang->name ?>
                            
                                </option>

                <?php   endforeach; ?> 

                    </select>

                    <input type="hidden" class="_qtranslate-langbox"
                                         name="qtranslate_langcode" 
                                         value="<?= $active_langcode ?>"> 
        
                </div>
                <!-- #metabox-field -->

                <label for="qtranslate-term-mappingbox">
                   Mục liên kết
                </label>    
                
                <!-- metabox-field -->
                <div class="metabox-field qtranslate-mb-mappingbox">

                    <select class="qtranslate-term-mappingbox">
                    </select>

                    <input type="hidden" class="_qtranslate-term-mappingbox"
                                         name="qtranslate_mapping_item" 
                                         value="">
        
                </div>
                <!-- #metabox-field -->

            </div>
            <!-- #form-field -->     

    <?php }

        public function qtranslate_save_extra_term_fields( $term_id, $taxonomy ) {         

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
                
                //save the option array
                update_option( "term_{$t_id}", $term_meta );               
                
            endif;

        }   

        public function qtranslate_metaboxes_footer_scripts() { ?>

            <style type="text/css">
                .q-loadingicon img {
                    animation: q-loading-animation infinite linear 2s;
                    position: relative;
                    display: block;
                }

                @keyframes q-loading-animation {
                  from { 
                    transform: rotate(0deg);
                    -webkit-transform: rotate(0deg);
                  }
                  to { 
                    transform: rotate(360deg); 
                    -webkit-transform: rotate(360deg);
                  }
                }

                @-webkit-keyframes q-loading-animation {
                  from { 
                    transform: rotate(0deg);
                    -webkit-transform: rotate(0deg);
                  }
                  to { 
                    transform: rotate(360deg); 
                    -webkit-transform: rotate(360deg);
                  }
                }
            </style>

            <script type="text/javascript">

                jQuery(function($) {

                    function get_taxonomy() {

                        return pagenow.substr(5);

                    }

                    function q_get_map_item( id, langcode ) {

                        let params = {

                                id : id,
                                langcode : langcode,
                                taxonomy : get_taxonomy()

                            };

                        return $.ajax({

                            method : 'POST',
                            url : ajaxurl,
                            async : true,
                            data : {

                                action : 'sb_qtranslate_quick_edit',
                                cmd : 'q_get_map_item',

                                params : params

                            }


                        });


                    }

                    function q_get_items_list( id, langcode ) {

                        let params = {
                                   
                            langcode : langcode,
                            taxonomy : get_taxonomy()

                        };

                        if ( typeof( id ) !== 'undefined' && id != -1 ) {

                            params.id = id;

                        }

                        return $.ajax({

                            method : 'POST',
                            url : ajaxurl,
                            async : true,
                            data : {

                                action : 'sb_qtranslate_quick_edit',
                                cmd : 'q_get_items_list',
                                params : params

                            }


                        });

                    }

                    $(document).on('change', '.qtranslate-langbox', function(e) {

                        let val = $(this).val(),                           
                            $input = $(this).next('._qtranslate-langbox');

                        $input.val( val );

                        q_get_initialize( get_qid(), val );


                    });

                    $(document).on('change', '.qtranslate-term-mappingbox', function(e) {

                        let val = $(this).val(),                        
                            $input = $(this).next('._qtranslate-term-mappingbox');
                        
                        $input.val( val );

                    });

                    function get_q_term_id() {
                        return <?= isset( $_GET['qtranslate_term_id'] ) ? (int) $_GET['qtranslate_term_id'] : -1 ?>;
                    }

                    function get_pq_term_id() {

                        return <?= isset( $_GET['tag_ID'] ) ? (int) $_GET['tag_ID'] : -1 ?>;

                    }

                    function get_qid() {

                        let id = -1,
                            q_term_id = get_q_term_id(),

                            pq_term_id = get_pq_term_id();

                        if ( q_term_id !== -1 ) {

                            id = q_term_id;

                        }

                        else if ( pq_term_id !== -1 ) {

                            id = pq_term_id;

                        }

                        return id;

                    }

                    function q_get_initialize( id, langcode ) {
                        
                        let $mb_mappingbox = $('.qtranslate-mb-mappingbox');

                        $mb_mappingbox.find('select option')
                                      .remove();

                        let html = $mb_mappingbox.html();

                        $mb_mappingbox.html( q_get_loadingicon() );

                        let q_get_callback = function( list_items, item_obj ) {

                            let e_id = -1;

                            if ( typeof( item_obj ) === 'undefined' ) {

                                item_obj = null;

                            }
     
                            $mb_mappingbox.html( html );

                            let $mappingbox = $mb_mappingbox.find('.qtranslate-term-mappingbox'),
                                $_mappingbox = $mb_mappingbox.find('._qtranslate-term-mappingbox');

                            $mappingbox.append("<option value='-1'>Chưa liên kết</option>");

                            //console.log( list_items );

                            $.each( list_items, function(i, item) {

                                let boolCheck = id !== -1 && id === parseInt( item.term_id );

                                if ( item_obj !== null ) {

                                    boolCheck = boolCheck || ( item_obj['term_id'] !== -1 && item_obj['term_id'] === parseInt( item.term_id ) );

                                }

                                $mappingbox.append("<option value='" + item.term_id + "' " + ( boolCheck ? "selected='selected'" : "" ) + " >" + item.name + "</option>");

                            });

                            if ( item_obj !== null ) {

                                e_id = item_obj['term_id'];

                            }                            

                            else {

                                e_id = get_q_term_id();

                            }

                            if ( e_id !== -1 ) {

                                let $option = $mappingbox.find('option[value="' + e_id + '"]');

                                if ( $option.length > 0 ) {

                                    $mappingbox.val( e_id );
                                    $_mappingbox.val( e_id );

                                    return;

                                }                              

                            }

                            $mappingbox.val( -1 );
                            $_mappingbox.val( -1 );

                        };

                        q_get_items_list( get_q_term_id() !== -1 ? -1 : id, langcode ).then( function( list_items ) {  

                            let _id = get_q_term_id();
                          
                            // ton tai tham so q_term_id
                           if ( _id !== -1 ) {

                               q_get_callback( list_items ); 

                               return;                       

                           }

                           else {

                                if ( id !== -1 ) {

                                    q_get_map_item( id, langcode ).then( function( item_obj ) {

                                        q_get_callback( list_items, item_obj );

                                    });

                                    return;

                                }

                                q_get_callback( list_items ); 

                            }
                           

                        });     

                    }                    

                    q_get_initialize( get_qid(), '<?= qt_get_current_lang() ?>' );               

                });
                
            </script>

    <?php 
        }

        public function qtranslate_reset_term_form_field_after_create() {

        }


    }

    $qtranslate_metaboxes = new qTranslateMetaBoxes();

    add_action( 'add_meta_boxes', array( $qtranslate_metaboxes, 'qtranslate_metaboxes_init' ) );
    add_action( 'save_post', array( $qtranslate_metaboxes, 'qtranslate_metaboxes_save') );   