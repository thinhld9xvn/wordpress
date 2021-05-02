<?php
    class FieldExtras {

        function __construct() {           

        }

        public function field_extras_metabox_callback() {  

            global $post;
            
            $account_types = get_post_meta($post->ID, _FIELD_JOBS_ACCOUNT_TYPE, true);
            $category_of_service = get_post_meta($post->ID, _FIELD_JOBS_CATEGORY_OF_SERVICE, true);
            $rates_by_hour = get_post_meta($post->ID, _FIELD_JOBS_RATES_BY_HOUR, true);
            $languages = get_post_meta($post->ID, _FIELD_JOBS_LANGUAGES, true); 
            $job_salary = get_profile_salary($post); ?>    

            <div class="ml-admin-listing-form __field-extras">     

                <div class="form-field ml-card listing-form-field">

                    <label for="job_account_type">
                        Job salary
                    </label>

                    <div class="form-item-value">

                        <div class="cts-term-multiselect">
                            <input type="text" 
                                    class="input-text" 
                                    name="job_salary" 
                                    id="job_salary"                                    
                                    value="<?= $job_salary ?>"
                                    placeholder="" />
                        </div>

                    </div>

                </div>

                <div class="form-field ml-card listing-form-field">

                    <label for="job_account_type">
		                Account Type
                    </label>

                    <div class="form-item-value">

                        <div class="cts-term-multiselect">
                            <select
                                name="job_account_type[]"
                                id="job_account_type"
                                multiple="multiple"
                                data-mylisting-ajax="true"
                                data-mylisting-ajax-url="mylisting_list_terms"
                                data-mylisting-ajax-params='{"taxonomy":"<?= JOBS_ACCOUNT_TYPE_TAXONOMY ?>","listing-type-id":135}'
                            >
                                <?php 
                                    foreach ( $account_types as $key => $v ) : ?>

                                        <option value="<?= $v ?>" selected="selected">
                                            <?php echo get_term_by('id', $v, JOBS_ACCOUNT_TYPE_TAXONOMY)->name;  ?>
                                        </option>

                                <?php endforeach;
                                ?>
                            </select>
                        </div>

                    </div>

                </div>

                <div class="form-field ml-card listing-form-field">

                    <label for="job_account_type">
		                Rates by hour (applied for coaching account type)
                    </label>

                    <div class="form-item-value">

                        <div class="cts-term-multiselect">
                            <input type="text" 
                                    class="input-text" 
                                    name="rates_by_hour" 
                                    id="rates_by_hour"                                    
                                    value="<?= $rates_by_hour ?>"
                                    placeholder="" />
                        </div>

                    </div>

                </div>

                <div class="form-field ml-card listing-form-field">

                    <label for="job_account_type">
		                Category of service
                    </label>

                    <div class="form-item-value">

                        <div class="cts-term-multiselect">
                            <select
                                name="job_category_of_service[]"
                                id="job_category_of_service"
                                multiple="multiple"
                                data-mylisting-ajax="true"
                                data-mylisting-ajax-url="mylisting_list_terms"
                                data-mylisting-ajax-params='{"taxonomy":"<?= JOBS_CATEGORY_OF_SERVICE_TAXONOMY ?>","listing-type-id":135}'
                            >
                                <?php 
                                    foreach ( $category_of_service as $key => $v ) : ?>

                                        <option value="<?= $v ?>" selected="selected">
                                            <?php echo get_term_by('id', $v, JOBS_CATEGORY_OF_SERVICE_TAXONOMY)->name;  ?>
                                        </option>

                                <?php endforeach;
                                ?>
                            </select>
                        </div>

                    </div>

                </div>

                <div class="form-field ml-card listing-form-field">

                    <label for="job_languages">
		                Languages
                    </label>

                    <div class="form-item-value">

                        <div class="cts-term-multiselect">
                            <select
                                name="job_languages[]"
                                id="job_languages"
                                multiple="multiple"
                                data-mylisting-ajax="true"
                                data-mylisting-ajax-url="mylisting_list_terms"
                                data-mylisting-ajax-params='{"taxonomy":"<?= JOBS_LANGUAGES_TAXONOMY ?>","listing-type-id":135}'
                            >
                                <?php 
                                    foreach ( $languages as $key => $v ) : ?>

                                        <option value="<?= $v ?>" selected="selected">
                                            <?php echo get_term_by('id', $v, JOBS_LANGUAGES_TAXONOMY)->name;  ?>
                                        </option>

                                <?php endforeach;
                                ?>
                            </select>
                        </div>

                    </div>

                </div>

                <div class="form-field ml-card listing-form-field">

                    <label for="job_book_online">
		                Book online
                    </label>

                    <div class="form-item-value">

                        <div class="file-upload-field single-upload form-group-review-gallery ajax-upload">
                            <input
                                type="file"
                                class="input-text review-gallery-input wp-job-manager-file-upload"
                                data-file_types="jpg|jpeg|gif|png|doc|docx|xls|xlsx|pdf"
                                data-max_count=""
                                name="job_book_online[]"
                                id="job_book_online"
                                multiple
                                placeholder=""
                                style="display: none;"
                            />
                            <div class="uploaded-files-list review-gallery-images">
                                <label class="upload-file review-gallery-add" for="job_book_online">
                                    <i class="mi file_upload"></i>
                                    <div class="content"></div>
                                </label>

                                <div class="job-manager-uploaded-files">  

                                    <?php print_profile_form_book_online_field(get_profile_book_online($post)); ?>                                 

                                </div>
                            </div>

                            <small class="description"> Maximum file size: <?= get_max_upload_sizes() . ' MB' ?>. </small>
                        </div>

                    </div>

                </div>

                <div class="form-field ml-card listing-form-field">

                    <label for="job_book_online">
                        Portfolio
                    </label>

                    <div class="form-item-value">

                        <div class="file-upload-field single-upload form-group-review-gallery ajax-upload">
                            <input
                                type="file"
                                class="input-text review-gallery-input wp-job-manager-file-upload"
                                data-file_types="jpg|jpeg|gif|png|doc|docx|xls|xlsx|pdf"
                                data-max_count=""
                                name="job_portfolio[]"
                                id="job_portfolio"
                                multiple
                                placeholder=""
                                style="display: none;"
                            />
                            <div class="uploaded-files-list review-gallery-images">
                                <label class="upload-file review-gallery-add" for="job_portfolio">
                                    <i class="mi file_upload"></i>
                                    <div class="content"></div>
                                </label>

                                <div class="job-manager-uploaded-files"> 

                                    <?php print_profile_form_portfolio_field(get_profile_portfolio($post)); ?>                                  

                                </div>
                            </div>

                            <small class="description"> Maximum file size: <?= get_max_upload_sizes() . ' MB' ?>. </small>
                        </div>

                    </div>

                </div>

                <div class="form-field ml-card listing-form-field">

                    <label for="job_demo_tape">
                        Demo tape
                    </label>

                    <div class="form-item-value">

                        <div class="file-upload-field single-upload form-group-review-gallery ajax-upload">
                            <input
                                type="file"
                                class="input-text review-gallery-input wp-job-manager-file-upload"
                                data-file_types="avi|ogg|m4a|mov|mp3|mp4|mpg|psd|xd|eps|ai|fig|flac"
                                data-max_count=""
                                name="job_demo_tape[]"
                                id="job_demo_tape"
                                multiple
                                placeholder=""
                                style="display: none;"
                            />
                            <div class="uploaded-files-list review-gallery-images">
                                <label class="upload-file review-gallery-add" for="job_demo_tape">
                                    <i class="mi file_upload"></i>
                                    <div class="content"></div>
                                </label>

                                <div class="job-manager-uploaded-files">  

                                    <?php print_profile_form_demo_tape_field(get_profile_demo_tape($post)); ?>                                 

                                </div>
                            </div>

                            <small class="description"> Maximum file size: <?= get_max_upload_sizes() . ' MB' ?>. </small>
                        </div>

                    </div>

                </div>

                

            </div>

        <?php }

        public function field_extras_metaboxes_init() {

            global $post;
            
            if ( $post->post_type === JOBS_POST_TYPE ) :

                add_meta_box( 'field-extras-metaboxes', 'Jobs listing field extras', array( &$this, 'field_extras_metabox_callback' ), null, 'normal', 'high');

            endif;

        }

        public function field_extras_enqueue_scripts() {  
            
            wp_enqueue_style('field-extras-stylesheet', CHILD_THEME_DIR_URI . '/customizer/theme-hooks/assets/css/field-extras.css');

        } 

        public function save_field_extras_metabox($post_id) {

            if ( $_POST['job_account_type'] ) :

                $account_types = $_POST['job_account_type'];

                update_post_meta($post_id, _FIELD_JOBS_ACCOUNT_TYPE, $account_types);

            endif;

            if ( $_POST['job_salary'] ) :

                $salary = $_POST['job_salary'];

                update_post_meta($post_id, _FIELD_JOBS_SALARY, $salary);

            endif;

            if ( $_POST['rates_by_hour'] ) :

                $rate_by_hour = $_POST['rates_by_hour'];

                update_post_meta($post_id, _FIELD_JOBS_RATES_BY_HOUR, $rate_by_hour);

            endif;

            if ( $_POST['job_languages'] ) :

                $languages = $_POST['job_languages'];

                update_post_meta($post_id, _FIELD_JOBS_LANGUAGES, $languages);

            endif;

            if ( $_POST['job_category_of_service'] ) :

                $category_of_service = $_POST['job_category_of_service'];

                update_post_meta($post_id, _FIELD_JOBS_CATEGORY_OF_SERVICE, $category_of_service);

            endif;

        }

    }

    $field_extras_metaboxes = new FieldExtras();

    add_action( 'add_meta_boxes', array( $field_extras_metaboxes, 'field_extras_metaboxes_init' ) );
    add_action( 'admin_enqueue_scripts', array( $field_extras_metaboxes, 'field_extras_enqueue_scripts' ) );

    add_action( 'save_post', array( $field_extras_metaboxes, 'save_field_extras_metabox' ) );