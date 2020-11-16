<?php
    class subjectTagsMetaBoxes {

        function __construct() {           

        }

        public function subject_tags_metabox_callback() {

            //global $post;

            $args = array(

                'hide_empty' => false,
                'number' => false

            );

            $tags = get_tags($args);            

            ob_start(); ?>

                <div>Danh sách chủ đề nguồn sẽ được lấy từ danh sách tags bài viết.</div>
                <div style="margin-top: 10px">
          
                    <p class="post-attributes-label-wrapper page-template-label-wrapper">
                        <label class="post-attributes-label" for="sl-subject-tags-lists">Danh sách chủ đề</label>
                    </p>

                    <select id="sl-subject-tags-lists">

                        <?php foreach ( $tags as $tag ) : ?>
                            
                            <option value="<?= $tag->term_id ?>">

                                <?= $tag->name ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                    <p style="margin-top: 10px">

                        <button class="button button-primary button-large btnAddSubjectTags">
                            Thêm chủ đề
                        </button>

                    </p>

                    <div id="subject-tags-added" 
                        class="subject-tags-added">

                    </div>

                    <input type="hidden" name="txtSubjectTagsList" value="" />

                </div>

            <?php 
                $contents = ob_get_contents();

            ob_end_clean();

            echo $contents; 

        }

        public function subject_tags_metaboxes_init() {

            add_meta_box( 'subject-tags-metaboxes', 'Chủ đề của bài viết', array( &$this, 'subject_tags_metabox_callback' ), null, 'side', 'default');

        }

        public function subject_tags_enqueue_scripts() {

           wp_enqueue_script('astra-subject-tags-script', ASTRA_THEME_URI . '/metaboxes/js/subject-tags-customize.js');
           wp_enqueue_style('astra-subject-tags-stylesheet', ASTRA_THEME_URI . '/metaboxes/css/subject-tags.css');

        }

        public function sb_ajax_get_subject_items() {

            $key = '_astra_subject_tags_list';

            $post_id = intval( $_POST['post_id'] );          

            $subjectTagsList = get_post_meta($post_id, $key, true);            

            if ( false !== $subjectTagsList ) :               

                header('Content-Type: application/json; charset: utf-8');
                echo $subjectTagsList;
                
            else :
                
                echo 'no-data';

            endif;

            die();

        }

        public function get_diff_subjects_list($sjs1, $sjs2) {

            $arrDiffLists = array();

            foreach ($sjs1 as $sj1) :

                $isDiff = true;

                foreach ($sjs2 as $sj2) :

                    if ( (int) $sj1['id'] === (int) $sj2['id'] ) :

                        $isDiff = false;
                        
                        break;
                        

                    endif;
                    
                endforeach;

                if ( $isDiff ) :

                    $arrDiffLists[] = $sj1;

                endif;
                
            endforeach;

            return $arrDiffLists;

        }

        public function subject_update_options($postID, $txtOldTagsList, $txtNewTagsList) {            

            $option_name = '_astra_subjects_tags_list_options';

            $isUpdate = false;

            $options = get_option($option_name);

            $options = FALSE === $options || empty( $options ) ? array() : json_decode( $options, true );

            //print_r( $options ); die();

            $oldTagsList = json_decode( stripslashes( $txtOldTagsList ), true ); 
            $newTagsList = json_decode( stripslashes( $txtNewTagsList ), true );  

            $arrDiffTagsLists = $this->get_diff_subjects_list($oldTagsList, $newTagsList);

             // remove all old subjects from options
            foreach ( $arrDiffTagsLists as $subject ) :

                $sj_id = (int) $subject['id'];

                $id = array_search($postID, $options[$sj_id]);

                unset( $options[$sj_id][$id] );

                $isUpdate = true;

            endforeach;

            // add new subjects to options
            foreach ($newTagsList as $subject) :

                $sj_id = (int) $subject['id'];

                if ( !  in_array( $postID, $options[$sj_id] ) ) :

                    $options[$sj_id][] = $postID;

                    $isUpdate = true;

                endif;
                
            endforeach;

            //echo "<pre>"; print_r( $options ); die();

            if ( $isUpdate ) :

                update_option($option_name, json_encode($options));

            endif;

        }

        public function save_subject_tags_metabox() {

            $postID = get_the_id();            

            $txtSubjectTagsList = trim( $_POST['txtSubjectTagsList'] ); 

            //echo var_dump( get_option('_astra_subjects_tags_list_options') ); die();
 
            /* 
                $options = array(
                    {subject_id} => array({post_id_1}, {post_id_2}), 
                    ...
                );
            */

            if ( ! empty( $txtSubjectTagsList )) :

                $key = '_astra_subject_tags_list';
                $value = $txtSubjectTagsList;

                $subjectTagsList = get_post_meta(get_the_id(), $key, true); 

                $this->subject_update_options($postID, $subjectTagsList, $txtSubjectTagsList);

                if ( false === $subjectTagsList || $subjectTagsList !== $txtSubjectTagsList ) :

                    //$this->subject_update_options($postID, $txtSubjectTagsList);

                    update_post_meta($postID, $key, $value);

                endif;

            endif;

        }

    }

    $subject_tags_metaboxes = new subjectTagsMetaBoxes();

    add_action( 'add_meta_boxes', array( $subject_tags_metaboxes, 'subject_tags_metaboxes_init' ) );
    add_action( 'admin_enqueue_scripts', array( $subject_tags_metaboxes, 'subject_tags_enqueue_scripts' ) );

    add_action( 'wp_ajax_sb_get_subject_items', array( $subject_tags_metaboxes, 'sb_ajax_get_subject_items' ) );
    add_action( 'wp_ajax_nopriv_sb_get_subject_items', array( $subject_tags_metaboxes, 'sb_ajax_get_subject_items' ) );

    add_action( 'save_post', array( $subject_tags_metaboxes, 'save_subject_tags_metabox' ) );
    