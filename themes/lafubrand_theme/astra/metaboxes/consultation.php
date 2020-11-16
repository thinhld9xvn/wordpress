<?php	

    class consultationsMetaBoxes {

        function __construct() {           

        }

        public function consultation_metabox_callback() {

            //global $post;

            $author_selected_id = get_post_meta(get_the_id(), '_lafu_post_consultation', true); 

            $author_selected_id = FALSE !== $author_selected_id && ! empty( $author_selected_id ) ? (int) $author_selected_id : -1;

            ob_start(); ?>
               
                <div>         
                  
                    <p>   

                    	<?php 
                    		wp_dropdown_users( 

                    			array( 
                    				'show_option_none' => '--- Mời chọn một tác giả ---',
                    				'show_option_value' => '-1',
                    				'name' => 'slConsultation',
                    				'id' => 'slConsultation',
                    				'selected' => $author_selected_id
                    			) 

                    		);  ?>         

                    	<input type="hidden" id="txtConsultation" name="txtConsultation" value="<?php echo $author_selected_id ?>" />

                    </p>

                </div>

            <?php 
                $contents = ob_get_contents();

            ob_end_clean();

            echo $contents; 

        }

        public function consultation_metaboxes_init() {

            add_meta_box( 'consultation-metaboxes', 'Người tham vấn nội dung', array( &$this, 'consultation_metabox_callback' ), null, 'side', 'default');

        }

        public function consultation_enqueue_scripts() {

           wp_enqueue_script('lafu-consultation-script', ASTRA_THEME_URI . '/metaboxes/js/consultation-script.js');
           //wp_enqueue_style('astra-subject-tags-stylesheet', ASTRA_THEME_URI . '/metaboxes/css/subject-tags.css');

        }      

        public function save_consultation_metabox() {

            $txtConsultation = trim( $_POST['txtConsultation'] );           

            if ( ! empty( $txtConsultation ) ) :

                $key = '_lafu_post_consultation';
                $value = $txtConsultation;

                $_txtConsultation = get_post_meta(get_the_id(), $key, true); 

                if ( false === $_txtConsultation || $txtConsultation !== $_txtConsultation ) :

                    update_post_meta(get_the_id(), $key, $value);

                endif;

            endif;

        }

    }

    $consultations_metaboxes = new consultationsMetaBoxes();

    add_action( 'add_meta_boxes', array( $consultations_metaboxes, 'consultation_metaboxes_init' ) );
    add_action( 'admin_enqueue_scripts', array( $consultations_metaboxes, 'consultation_enqueue_scripts' ) );   

    add_action( 'save_post', array( $consultations_metaboxes, 'save_consultation_metabox' ) );
    