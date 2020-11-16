<?php   
   

    class MyThemePostTypeMetaBoxes {
        
        private $metaboxes = array();        
        
        public function __construct() {            
            include METABOX_DIRECTORY_OPTIONS . '/post_types_metaboxes.php';
        }

        /**
         Khai báo meta box
        **/
        function theme_meta_boxes_init() {           
            
            $metaboxes = $this->metaboxes;
            $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
            
            foreach ( $metaboxes as $metabox ) :

                $add_metabox = false;
                
                if ( isset( $metabox['where_show_on'] ) && 
                     ! empty( $metabox['where_show_on'] ) ) :

                    $arr_cat_slug = $metabox['category'];

                    // tham số 'category' tồn tại ?
                    if ( $arr_cat_slug ) :                                              

                        $post_cats = get_the_category( $post_id );
                        
                        foreach( $post_cats as $cat ) :

                            // kiểm tra xem slug của danh mục $cat này có nằm trong $arr_cat_slug ?
                            if ( in_array( $cat->slug, $arr_cat_slug ) ) :

                                $add_metabox = true;    
                                break;                            

                            else: 

                                // kiểm tra xem danh mục $cat này có là con của danh mục nào trong $arr_cat_slug ?                               
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

                        endforeach;

                    else: 

                        if ( 'page' === $metabox['where_show_on'] ) :

                            // tham số 'page template' tồn tại ?                        
                            $page_template = $metabox['page_template'];

                            if ( $page_template ) :

                                $page_template_layout = get_post_meta( $post_id, '_wp_page_template', true );

                                // là loại page template này => show metabox này ra
                                if ( false !== strpos( $page_template_layout, $page_template ) ) :

                                    $add_metabox = true;

                                endif;

                            else :

                                $add_metabox = true;

                            endif;

                        else :

                            $add_metabox = true;

                        endif;

                    endif;

                    if ( $add_metabox ) :

                        add_meta_box( $metabox['id'], $metabox['title'], array( &$this, 'theme_metabox_callback' ), $metabox['where_show_on'], 'advanced', 'high', array( 'metabox', $metabox ) );

                    endif;

                endif;                
               
            endforeach;
            
        }

        function print_metabox_field_begin_tag( $field, $obj_id, $obj_class, $args = array() ) {

            $condition = isset( $field['condition'] ) && 
                         is_array( $field['condition'] ) &&
                         sizeof( $field['condition'] ) > 0;

            if ( $condition ) :

                $condition_keys = array_keys( $field['condition'] );
                $rule_key = $condition_keys[0];

                $condition_complex = is_array( $field["condition"]["$rule_key"][0] ) ?
                                     true : 
                                     false;

                $condition_fields = '';
                $condition_values = '';
                $condition_compares = '';
                $condition_operator = '';

            endif; ?>
            
           <div id="<?php echo $obj_id ?>" 
                class="<?php echo $obj_class ?>"

                <?php if ( $condition) : 

                        if ( $condition_complex ) : 

                            $condition_arrays = $field["condition"]["$rule_key"][0]; ?>                

                            data-metabox-condition-complex="true"
                            data-metabox-condition-operator="<?php echo strtoupper( $field["condition"]["$rule_key"][1]['condition_operator'] ); ?>"

                            <?php foreach( $condition_arrays as $my_condition ) : 

                                    $condition_fields .= $my_condition['meta_field_id'];
                                    $condition_values .= $my_condition['meta_field_value'];
                                    $condition_compares .= $my_condition['meta_field_compare'];

                                    if ( $my_condition !== end( $condition_arrays ) ) :

                                        $condition_fields .= ',';
                                        $condition_values .= ',';
                                        $condition_compares .= ',';

                                    endif;

                                  endforeach; 

                        else : 

                            $condition_fields = $field["condition"]["$rule_key"]["meta_field_id"];
                            $condition_values = $field["condition"]["$rule_key"]["meta_field_value"];
                            $condition_compares = $field["condition"]["$rule_key"]["meta_field_compare"];

                        endif; ?>

                            data-metabox-condition-rule="<?php echo $condition_keys[0]; ?>"
                            data-metabox-condition-field="<?php echo $condition_fields; ?>"
                            data-metabox-condition-value="<?php echo $condition_values; ?>"
                            data-metabox-condition-compare="<?php echo $condition_compares; ?>"

             <?php      endif; ?>>

    <?php

        }
        
        function print_text_field_metabox_theme_callback( $post_id, $field, $args = array() ) {
                       
            wp_nonce_field( basename( __FILE__ ), $field['id'] . '-nonce' );

            if ( isset( $args['groupbox_args']['accordion_index'] ) ) :   

                $accordion_id = $args['groupbox_args']['accordion_id'];
                $accordion_index = $args['groupbox_args']['accordion_index'];

                $accordion = get_post_meta( $post_id, "_{$accordion_id}", true );
                $field_value = $accordion[ $accordion_index ][ "{$field['_id']}" ];

                $field_name = "{$accordion_id}[{$accordion_index}][{$field['_id']}]";

            else :

                $field_name = $field['id'];
                $field_value = get_post_meta( $post_id, '_' . $field['id'], true );                

            endif;

            $this->print_metabox_field_begin_tag( $field, "metabox_field_{$field['id']}", "metabox_field mtop10" ); ?>
            
                <div class="label">
                    <strong><?php echo $field['title']; ?></strong>
                </div>

                <div class="desc mtop10"><?php echo $field['desc']; ?></div>

                <div class="field mtop10">

                    <input id="<?php echo $field['id']; ?>" 
                           type="text" 
                           name="<?php echo $field_name; ?>" 
                           value="<?php echo esc_attr( $field_value ); ?>" /> 

                </div>

            </div>  
                  
<?php   }
        
        function print_textarea_field_metabox_theme_callback( $post_id, $field, $args = array() ) {
                       
            wp_nonce_field( basename( __FILE__ ), $field['id'] . '-nonce' );

            if ( isset( $args['groupbox_args']['accordion_index'] ) ) :   

                $accordion_id = $args['groupbox_args']['accordion_id'];
                $accordion_index = $args['groupbox_args']['accordion_index'];

                $accordion = get_post_meta( $post_id, "_{$accordion_id}", true );
                $field_value = $accordion[ $accordion_index ][ "{$field['_id']}" ];

                $field_name = "{$accordion_id}[{$accordion_index}][{$field['_id']}]";

            else :

                $field_name = $field['id'];
                $field_value = get_post_meta( $post_id, '_' . $field['id'], true );                

            endif;

            $this->print_metabox_field_begin_tag( $field, "metabox_field_{$field['id']}", "metabox_field mtop10" ); ?>
            
                <div class="label">
                    <strong><?php echo $field['title']; ?></strong>
                </div>

                <div class="desc mtop10"><?php echo $field['desc']; ?></div>

                <div class="field mtop10">

                    <textarea id="<?php echo $field['id']; ?>"                                                          
                              name="<?php echo $field_name; ?>"
                              rows="5"><?php echo esc_attr( $field_value ); ?></textarea>

                </div>

            </div>  
                  
<?php   }
        
        function print_select_field_metabox_theme_callback( $post_id, $field, $args ) {
            
            wp_nonce_field( basename( __FILE__ ), $field['id'] . '-nonce' );
                      
            if ( isset( $args['groupbox_args']['accordion_index'] ) ) :   

                $accordion_id = $args['groupbox_args']['accordion_id'];
                $accordion_index = $args['groupbox_args']['accordion_index'];

                $accordion = get_post_meta( $post_id, "_{$accordion_id}", true );
                $field_value = $accordion[ $accordion_index ][ "{$field['_id']}" ];

                $field_name = "{$accordion_id}[{$accordion_index}][{$field['_id']}]";

            else :

                $field_name = $field['id'];
                $field_value = get_post_meta( $post_id, '_' . $field['id'], true );

            endif;

            $validate_condition = isset( $field['validate'] ) && $field['validate']; ?>
            
           <div id="metabox_field_<?php echo $field['id'] ?>" 
                class="metabox_field mtop10">
           
                <div class="label"><strong><?php echo $field['title']; ?></strong></div>
                <div class="desc mtop10"><?php echo $field['desc']; ?></div>
                <div class="field mtop10">
                
                    <select id="<?php echo $field['id']; ?>" 
                            class="tFTypical tFChange select_field_metabox 
                                   <?= $validate_condition ? 'validate' : '' ?>">
                        
                        <?php while ( $option_name = current( $field['options'] ) ) : ?>
                        
                                <option value="<?php echo key( $field['options'] ) ?>" <?php selected( $field_value, key( $field['options'] ) ); ?>><?php echo $option_name; ?></option>
                            
                        <?php
                                next( $field['options'] );

                            endwhile; ?>
                        
                    </select>
                   
                    <input id="<?php echo $field['id'] . '-input-select'; ?>" type="hidden" name="<?php echo $field_name; ?>" value="<?php echo $field_value; ?>" /> 
    
                </div>
                
            </div>
                                  
   <?php 
            
        }
        
        function print_media_field_metabox_theme_callback( $post_id, $field, $args ) {
            
            wp_nonce_field( basename( __FILE__ ), $field['id'] . '-nonce' );           

            if ( isset( $args['groupbox_args']['accordion_index'] ) ) :

                $accordion_id = $args['groupbox_args']['accordion_id'];
                $accordion_index = $args['groupbox_args']['accordion_index'];

                $accordion = get_post_meta( $post_id, "_{$accordion_id}", true );
                $media_field_values = $accordion[ $accordion_index ][ "{$field['_id']}" ];

                $field_name = "{$accordion_id}[{$accordion_index}][{$field['_id']}]";

            else :

                $field_name = $field['id'];
                $media_field_values = get_post_meta( $post_id, '_' . $field['id'], true );

            endif;

            $this->print_metabox_field_begin_tag( $field, "metabox_field_{$field['id']}", "metabox_field mtop10" ); ?>

           
                <div class="label"><strong><?php echo $field['title']; ?></strong></div>
                <div class="desc pull-left mtop10 mright10"><?php echo $field['desc']; ?></div>
                
                <?php if ( $field['multiple'] ) : ?>
                
                    <div class="field_media_navigation mtop10">

                        <img class="field_media_widget_add cpointer"
                        
                                src="<?php echo METABOX_DIRECTORY_IMAGES_URI . '/widget_add.png' ?>" 
                                alt="widget_add" 
                                
                                data-image-path="<?php echo METABOX_DIRECTORY_IMAGES_URI ?>" 
                                data-field-id="<?php echo $field['id']; ?>" 
                                data-thumbnail-enable="<?= isset( $field['thumbnail'] ) && ! $field['thumbnail'] ? 'false' : 'true'  ?>" />
                    </div>
                    
                <?php endif; ?>
                
                <div class="clearfix"></div>
                
                <?php if ( is_array( $media_field_values ) && 
                           sizeof( $media_field_values ) > 0 ) :
                            
                            $count_field = 1;
                            
                            foreach ( $media_field_values as $media_field_value ): ?>
                        
                                <div class="field mtop10">
                                   
                                   <?php if ( $field['thumbnail'] || ! isset( $field['thumbnail'] ) ) : ?>
                                       <img src="<?php echo $media_field_value ?>" 
                                            class="thumbnail_media_field_metabox vmiddle" />
                                   <?php endif; ?>
                                   
                                   <input type="text" 
                                          name="<?php echo $field_name . '[]' ?>" 
                                          class="media_field_metabox vmiddle" 
                                          value="<?php echo $media_field_value ?>" />

                                   <input type="button" 
                                          class="button button-default media_upload vmiddle" 
                                          value="Choose an image" />
                                   
                                   <?php if ( $count_field > 1 ) :  // not first ?>
                                   
                                       <img src="<?php echo METABOX_DIRECTORY_IMAGES_URI . '/widget_remove.png' ?>" 
                                            class="field_media_widget_remove vmiddle cpointer" />
                                   
                                   <?php endif; ?>
                    
                                </div>
                            
                <?php           $count_field++;
                            endforeach;
                
                       else: ?>
                       
                           <div class="field mtop10">
                               
                               <?php if ( $field['thumbnail'] || 
                                          ! isset( $field['thumbnail'] ) ) : ?>
                                   <img src="<?php echo $media_field_values ?>" class="thumbnail_media_field_metabox vmiddle" />
                               <?php endif; ?>
                               
                               <input type="text" name="<?= $field['multiple'] ? $field_name . '[]' : $field_name ?>" class="media_field_metabox vmiddle" value="<?php echo $media_field_values ?>" />
                               <input type="button" class="button button-default media_upload vmiddle" value="Choose an image" />
                
                            </div>
                
                <?php endif; ?>
                
            </div>
                                  
   <?php
            
        }
        
        function print_editor_field_metabox_theme_callback( $post_id, $field, $args ) {
            
            wp_nonce_field( basename( __FILE__ ), $field['id'] . '-nonce' );            
            
             if ( isset( $args['groupbox_args']['accordion_index'] ) ) :   

                $accordion_id = $args['groupbox_args']['accordion_id'];
                $accordion_index = $args['groupbox_args']['accordion_index'];

                $accordion = get_post_meta( $post_id, "_{$accordion_id}", true );
                $field_value = $accordion[ $accordion_index ][ "{$field['_id']}" ];

                $field_name = "{$accordion_id}[{$accordion_index}][{$field['_id']}]";

            else :

                $field_name = $field['id'];
                $field_value = get_post_meta( $post_id, '_' . $field['id'], true );

            endif; 

            $this->print_metabox_field_begin_tag( $field, "metabox_field_{$field['id']}", "metabox_field mtop10" ); ?>
                    
                    <div class="label"><strong><?php echo $field['title'] ?></strong></div>
                    <div class="desc mtop10"><?php echo $field['desc'] ?></div>
                    <div class="field mtop10">
                        
                        <?php 
                        
                            $settings = array(
                                'teeny' => false,
                                'textarea_rows' => 5,
                                'tabindex' => 1,
                                'textarea_name' => $field_name
                            );
                            
                            wp_editor( $field_value, $field['id'], $settings); ?>
                        
                        
                        <input id="<?php echo $field['id'] . '-editor' ?>" type="hidden" name="<?php echo $field_name ?>" class="editor_field_metabox" />
                        
                    </div>
                </div>

 <?php }

        function print_checkbox_field_metabox_theme_callback( $post_id, $field, $args ) {
                       
            wp_nonce_field( basename( __FILE__ ), $field['id'] . '-nonce' );         
            
             if ( isset( $args['groupbox_args']['accordion_index'] ) ) :   

                $accordion_id = $args['groupbox_args']['accordion_id'];
                $accordion_index = $args['groupbox_args']['accordion_index'];

                $accordion = get_post_meta( $post_id, "_{$accordion_id}", true );
                $field_value = $accordion[ $accordion_index ][ "{$field['_id']}" ];

                $field_name = "{$accordion_id}[{$accordion_index}][{$field['_id']}]";

            else :

                $field_name = $field['id'];
                $field_value = get_post_meta( $post_id, '_' . $field['id'], true );

            endif;

            $this->print_metabox_field_begin_tag( $field, "metabox_field_{$field['id']}", "metabox_field mtop10" ); ?>
                    
                <div class="label">
                    <strong><?php echo $field['title'] ?></strong>
                </div>         

                <div class="field mtop10">
                    
                    <input id="<?php echo $field['id'] ?>" 
                           type="checkbox" name="<?php echo $field_name ?>"
                           class="txtFTypical tFChange checkbox_field_metabox" 
                           <?= isset( $field_value ) && 'true' === $field_value 
                                 ?
                                 'checked'
                                 :
                                 '' ?> /> 

                    <input id="<?php echo $field['id'] . '-checkbox' ?>" type="hidden" name="<?php echo $field_name ?>" value="<?= isset( $field_value ) ? $field_value : '' ?>" />

                    <?php echo $field['desc'] ?>  
                    
                </div>
            </div> 
                   
 <?php }

        function print_accordion_field_metabox_theme_callback( $post_id, $field ) {

            wp_nonce_field( basename( __FILE__ ), $field['id'] . '-nonce' );
            
            $field_value = get_post_meta( $post_id, '_' . $field['id'], true );            

            if ( is_array( $field_value ) &&
                 ! empty( $field_value ) ) :
            
                $accordion_count = sizeof( $field_value );

                $_SESSION[ basename( __FILE__ ) . "-{$field['id']}-count" ] = $accordion_count; ?>

                <script type="text/javascript">
                   var accordion_index = <?php echo $accordion_count; ?>
                </script>

    <?php   endif;

            $this->print_metabox_field_begin_tag( $field, "metabox_field_{$field['id']}", "metabox_field mtop10" ); ?>                

                <div class="label">
                    <strong><?php echo $field['title'] ?></strong>
                </div> 

                <div class="desc mtop10">
                    <?php echo $field['desc'] ?>
                </div> 

                <!-- metabox-field-accordion -->
                <div class="field metabox-field-accordion mtop10">

                    <button type="button" class="metabox-accordion-add-button button button-default">

                        <img class="vmiddle" src="<?php echo METABOX_DIRECTORY_IMAGES_URI . '/widget_add.png' ?>" alt="metabox_add_accordion" /> 
                        <span>Add an accordion</span>

                    </button>

                    <!-- metabox-accordion-group -->
                    <div class="metabox-accordion-group metabox-field-sortables metabox-global-fields-sortables metabox-accordion-sortables">

                        <!-- accordion-template-item -->
                        <div class="metabox-field-postbox-item metabox-accordion-item postbox closed accordion-template-item mtop20">

                            <button type="button" class="button-link metabox-collapse-button metabox-collapse-box">

                                <span class="screen-reader-text">Toggle panel: Metabox accordion</span>
                                <span class="toggle-indicator"></span>

                            </button>

                            <!-- metabox-accordion-title -->
                            <h2 class="metabox-accordion-title metabox-handle metabox-handle-title hndle metabox-collapse-box">

                                <strong>

                                    Accordion

                                    <span class="title" 
                                          data-accordion-title-field="<?php echo $field['collapse_title_field'] ?>">                                    
                                    </span>

                                </strong>

                            </h2>
                            <!-- #metabox-accordion-title -->

                            <!-- metabox-accordion-body -->
                            <div class="metabox-section-body inside mtop20">

                                <!-- accordion-groupbox -->
                                <div class="accordion-groupbox accordion-main-item">
                                   
                                    <?php 
                                        $args = array(
                                                'accordion' => true, 
                                                'accordion_args' => array(                                                                    
                                                    'id' => $field['id']                                                  
                                                )
                                            );
                                        $this->theme_metabox_fields_init_callback( $post_id, $field, $args ); ?>
                                                                
                                </div>
                                <!-- #accordion-groupbox -->

                                <!-- accordion-groupbox -->
                                <div class="accordion-groupbox mtop20">

                                    <button type="button" class="metabox-accordion-remove-button button button-default">

                                        <img class="vmiddle" src="<?php echo METABOX_DIRECTORY_IMAGES_URI . '/widget_remove.png' ?>" alt="metabox-remove-accordion" />

                                        <span class="vmiddle">Remove accordion</span>

                                    </button>

                                </div>
                                <!-- #accordion-groupbox -->

                            </div>
                            <!-- #metabox-accordion-body -->                       

                        </div>
                        <!-- #accordion-template-item -->

                        <?php if ( $accordion_count > 0 ) : 

                                $accordion_index = 0;

                                foreach ( $field_value as $accordion ) : ?>

                                    <!-- metabox-accordion-item -->
                                    <div class="metabox-field-postbox-item metabox-accordion-item postbox closed mtop20">

                                        <button type="button" class="button-link metabox-collapse-button metabox-collapse-box">

                                            <span class="screen-reader-text">Toggle panel: Metabox accordion</span>
                                            <span class="toggle-indicator"></span>

                                        </button>

                                        <!-- metabox-accordion-title -->
                                        <h2 class="metabox-accordion-title metabox-handle metabox-handle-title hndle metabox-collapse-box">

                                            <strong>

                                                Accordion

                                                <span class="title" 
                                                      data-accordion-title-field="<?php echo $field['collapse_title_field'] ?>">

                                                      <?php echo ' : ' . $accordion[ "{$field['collapse_title_field']}" ] ?>

                                                </span>

                                            </strong>

                                        </h2>
                                        <!-- #metabox-accordion-title -->

                                        <!-- metabox-accordion-body -->
                                        <div class="metabox-section-body inside mtop20">

                                            <!-- accordion-groupbox -->
                                            <div class="accordion-groupbox accordion-main-item">
                                               
                                                <?php 

                                                    $args = array(
                                                                'accordion' => true, 
                                                                'accordion_args' => array(                                                                    
                                                                    'id' => $field['id'],
                                                                    'index' => $accordion_index,
                                                                ) 
                                                            );

                                                    $this->theme_metabox_fields_init_callback( $post_id, $field, $args ); ?>
                                                                            
                                            </div>
                                            <!-- #accordion-groupbox -->

                                            <!-- accordion-groupbox -->
                                            <div class="accordion-groupbox mtop20">

                                                <button type="button" class="metabox-accordion-remove-button button button-default">

                                                    <img class="vmiddle" src="<?php echo METABOX_DIRECTORY_IMAGES_URI . '/widget_remove.png' ?>" alt="metabox-remove-accordion" />

                                                    <span class="vmiddle">Remove accordion</span>

                                                </button>

                                            </div>
                                            <!-- #accordion-groupbox -->

                                        </div>
                                        <!-- #metabox-accordion-body -->                       

                                    </div>
                                    <!-- #metabox-accordion-item -->

                        <?php 
                                    $accordion_index++;

                                endforeach;

                            endif; ?>

                    </div>
                    <!-- #metabox-accordion-group -->

                </div>
                <!-- #metabox-field-accordion -->

            </div>
<?php
        }

        function print_groupbox_field_metabox_theme_callback( $post_id, $field, $args = array() ) {
          
            wp_nonce_field( basename( __FILE__ ), $field['id'] . '-nonce' );           

            $this->print_metabox_field_begin_tag( $field, "metabox_field_{$field['id']}", "metabox_field metabox-field-postbox-item postbox closed mtop20" ); ?>

               
                <button type="button" class="button-link metabox-collapse-button metabox-collapse-box">

                    <span class="screen-reader-text">Toggle panel: Metabox groupbox</span>
                    <span class="toggle-indicator"></span>

                </button>

                <!-- metabox-groupbox-title -->
                <h2 class="metabox-groupbox-title metabox-handle metabox-handle-title hndle metabox-collapse-box">

                    <strong>

                        Groupbox : <?php echo $field['title']; ?>

                    </strong>

                </h2>
                <!-- #metabox-groupbox-title -->

                <!-- metabox-groupbox-body -->
                <div class="metabox-section-body inside mtop20">                       

                    <div class="desc mtop10">
                        <?php echo $field['desc'] ?>
                    </div> 

                    <!-- metabox-field-groupbox -->
                    <div class="metabox-field-groupbox mtop20">

                         <?php

                            $groupbox_args = array();

                            if ( $args['accordion'] ) :

                                $groupbox_args = array(
                                        'accordion_groupbox' => true,
                                        'groupbox_args' => array(
                                                'accordion_id' => $args['accordion_args']['id'],
                                                'accordion_index' => $args['accordion_args']['index']
                                            )
                                    );

                            endif;

                            $this->theme_metabox_fields_init_callback( $post_id, $field, $groupbox_args ); ?>

                    </div>
                    <!-- #metabox-field-groupbox -->

                </div>
                <!-- #metabox-groupbox-body -->

               

            </div>

    <?php
        }

        function theme_metabox_fields_init_callback( $post, $mb_fields, $args = array() ) {

            if ( $args['accordion'] ) :

                $field_arrays = $mb_fields['template'];

            else :

                $field_arrays = $mb_fields['fields'];

            endif;
            
            foreach ( $field_arrays as $field ) :

                if ( $args['accordion'] || 
                     $args['accordion_groupbox'] ) :                   

                    if ( $args['accordion'] ) :

                        if ( 'groupbox' === $field['type'] ) :

                            $field['id'] = "{$field['id']}";

                        endif;    

                    else : // accordion-groupbox  

                        $accordion_id = $args['groupbox_args']['accordion_id'];
                        $accordion_index = $args['groupbox_args']['accordion_index'];

                        if ( isset( $accordion_index ) ) :

                            $field['_id'] = $field['id'];
                            $field['id'] = "{$accordion_id}-{$accordion_index}-{$field['id']}";                            

                        else :

                            $field['id'] = "{$accordion_id}-uo--__index__--uc--uo-{$field['id']}-uc-";

                        endif;                        

                    endif;                                    

                endif;
                
                switch ( $field['type'] ) :
                    
                    case 'text':
                        
                        $this->print_text_field_metabox_theme_callback( ! is_numeric( $post ) ? $post->ID : $post, $field, $args );
                        
                        break;

                    case 'textarea':
                        
                        $this->print_textarea_field_metabox_theme_callback( ! is_numeric( $post ) ? $post->ID : $post, $field, $args );
                        
                        break;
                    
                    case 'select':
                        
                        $this->print_select_field_metabox_theme_callback( ! is_numeric( $post ) ? $post->ID : $post, $field, $args );
                        
                        break;
                        
                    case 'media':
                        
                        $this->print_media_field_metabox_theme_callback( ! is_numeric( $post ) ? $post->ID : $post, $field, $args );
                        
                        break;
                        
                    case 'editor':
                        
                        $this->print_editor_field_metabox_theme_callback( ! is_numeric( $post ) ? $post->ID : $post, $field, $args );
                        
                        break;

                    case 'check':
                        
                        $this->print_checkbox_field_metabox_theme_callback( ! is_numeric( $post ) ? $post->ID : $post, $field, $args );
                        
                        break;

                    case 'accordion':

                        $this->print_accordion_field_metabox_theme_callback( ! is_numeric( $post ) ? $post->ID : $post, $field );
                        
                        break;

                    case 'groupbox':

                        $this->print_groupbox_field_metabox_theme_callback( ! is_numeric( $post ) ? $post->ID : $post, $field, $args  );
                        
                        break;
                    
                    default:
                        
                        break;
                        
                endswitch;
                
            endforeach;

        }
         
        /**
         Khai báo callback
         @param $post là đối tượng WP_Post để nhận thông tin của post
        **/
        function theme_metabox_callback( $post, $args_callback ) {

            ob_start();
            
            $metabox = $args_callback['args'][1]; 

            $this->print_metabox_field_begin_tag( $metabox, "metabox_{$metabox['id']}_wrap" , "metabox_wrap" ); ?>

                <div class="metabox_groupbox_fields_sortables metabox-global-fields-sortables">

<?php               $this->theme_metabox_fields_init_callback( $post, $metabox ); ?>
                
                </div>

            </div>

<?php       $contents = ob_get_contents();
            ob_end_clean();           

            echo $contents;
            
        }
         
        /**
         Lưu dữ liệu meta box khi nhập vào
         @param post_id là ID của post hiện tại
        **/       

        function startsWith($haystack, $needle) {

             $length = strlen($needle);             
             return (substr($haystack, 0, $length) === $needle);
        }

        function endsWith($haystack, $needle) {

            $length = strlen($needle);

            if ($length == 0) {
                return true;
            }

            return (substr($haystack, -$length) === $needle);
        }

        function theme_meta_boxes_save( $post_id ) {

            $keys = array_keys( $_POST );

            while ( $key = current( $keys ) ) : 

                if ( $this->startsWith( $key, 'pt-field-' ) &&
                     ! $this->endsWith( $key, '-nonce') ) :

                    // accordion field
                    if ( false !== strpos( $key, '-uo--__index__' ) ) :

                        $s = explode('-uo--__index__', $key);
                        $accordion_key = $s[0];

                        // kiểm tra accordion này ?
                        if ( ! isset( $_POST[ "$accordion_key" ] ) ) :

                            // trước đó đã có dữ liệu => xóa meta accordion của post này
                            if ( $_SESSION[ basename( __FILE__ ) . "-{$field['id']}-count" ] > 0 ) :
                            
                                delete_post_meta( $post_id, "_{$accordion_key}" );

                            endif;

                        endif;

                    endif;

                    $_value = $_POST[ "$key" ];

                    update_post_meta( $post_id, "_{$key}", $_value );                   

                endif;

                next( $keys );

            endwhile;
          
        }
        
    }
        
    $theme_post_type_meta_boxes = new MyThemePostTypeMetaBoxes();
    
    add_action( 'add_meta_boxes', array( $theme_post_type_meta_boxes, 'theme_meta_boxes_init' ) );
    add_action( 'save_post', array( $theme_post_type_meta_boxes, 'theme_meta_boxes_save') );
?>