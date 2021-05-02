<?php 

    function print_edit_account_panel() {
        
        global $current_user;
        
        require_once LIB_USER_ROLES; ?>

        <div class="element">
            <div class="pf-head round-icon">
                <div class="title-style-1">
                    <i class="mi person user-area-icon"></i>
                    <h5><?php _e( 'Account details', 'my-listing' ) ?></h5>
                </div>
            </div>
            <div class="pf-body">
                <form class="woocommerce-EditAccountForm edit-account sign-in-form" action=""
            method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ) ?>>

                    <?php do_action( 'woocommerce_edit_account_form_start' ) ?>

                    <?php
                    $password_field = null;
                    foreach ( MyListing\Src\User_Roles\get_used_fields( MyListing\Src\User_Roles\get_current_user_role() ) as $field ) {
                        $field->form = $field::FORM_ACCOUNT_DETAILS;
                        $field->user = wp_get_current_user();
                        if ( ! $field->get_prop('show_in_account_details') ) {
                            continue;
                        }

                        // show password always last in account details form
                        if ( $field->get_key() === 'password' ) {
                            $password_field = $field;
                            continue;
                        }

                        $field->get_form_markup();

                        if ( $field->get_key() === 'email' ) : ?>

                            <?php if ( ! UserMemberShip::has_action_permission(UserPermission::SHOW_EDIT_PROFILE_DETAILS) ) : 
                                
                                $avatar_profile = UserMemberShip::get_account_avatar(); ?>

                                <div class="fieldset-avatar-profile field-type-file form-group">

                                    <div class="field-head">
                                        <label for="avatar-profile">Avatar image</label>
                                    </div>

                                    <div class="field required-field">

                                        <div class="file-upload-field single-upload form-group-review-gallery ajax-upload">
                                            <input
                                                type="file"
                                                class="input-text review-gallery-input wp-job-manager-file-upload"
                                                data-file_types="jpg|jpeg|gif|png"
                                                data-max_count=""
                                                name="avatar-profile"
                                                id="avatar-profile"
                                                placeholder=""                                                    
                                                style="display: none;"
                                            />
                                            <div class="uploaded-files-list review-gallery-images">
                                                <label class="upload-file review-gallery-add" for="avatar-profile">
                                                    <i class="mi file_upload"></i>
                                                    <div class="content"></div>
                                                </label>

                                                <div class="job-manager-uploaded-files">
                                                
                                                    <?php print_profile_form_avatar_field($avatar_profile); ?>

                                                </div>
                                            </div>

                                            <small class="description"> Maximum file size: <?= get_max_upload_sizes() . ' MB' ?>. </small>
                                            <small class="error-msg"></small>
                                        </div>

                                    </div>

                                </div>

                            <?php endif; ?>

                            <div class="form-group">
                                <input type="text" 
                                        name="account_role" 
                                        id="reg_account_role" 
                                        value="<?= ucfirst(UserMemberShip::get_account_role($current_user->ID)) ?>" 
                                        placeholder="" 
                                        readonly="readonly">
                                <label>Account role</label>
                            </div>
                        
                        <?php endif;

                    }

                    if ( $password_field ) {
                        $password_field->get_form_markup();
                    }
                    ?>

                    <?php do_action( 'woocommerce_edit_account_form' ) ?>

                    <div class="">
                        <?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ) ?>
                        <button type="submit" class="buttons button-2 full-width" name="save_account_details"
                            value="<?php esc_attr_e( 'Save changes', 'my-listing' ) ?>">
                            <?php esc_html_e( 'Save changes', 'my-listing' ) ?>
                        </button>
                        <input type="hidden" name="action" value="save_account_details" />
                    </div>

                    <?php do_action( 'woocommerce_edit_account_form_end' ) ?>
                </form>
            </div>
        </div>

        <script type="text/javascript">
            jQuery(function($) {
                $('#reg_email').attr('readonly', '');
            })
        </script>

    <?php }

    function print_edit_account_navigation() { 
        
        $act = $_GET['a']; ?>

        <div class="element">

            <ul class="menu-lists">  

                <?php if ( UserMemberShip::has_action_permission(UserPermission::SHOW_EDIT_PROFILE_DETAILS) ) : ?>
                
                    <li class="<?= $act === 'profile' ? 'active' : '' ?>">
                        <a href="<?php print_edit_profile_link() ?>">
                            <span class="fa fa-user-circle"></span>
                            <span class="padLeft5">My profile</span>
                        </a>
                    </li>

                <?php endif; ?>

                <li class="<?= $act === 'account' ? 'active' : '' ?>">
                    <a href="<?php print_edit_account_details_link() ?>">
                        <span class="fa fa-cog"></span>
                        <span class="padLeft5">Account details</span>
                    </a>
                </li>
                
            </ul>
        </div>

    <?php }

    function print_edit_profile_panel() {   

        global $current_user;

        //echo var_dump(UserMemberShip::get_account_role($current_user->ID));

        //echo var_dump($current_user);

        $profileForm = ProfileForm::get_instance(); 
        
        $field_avatar_error_msg = $profileForm->get_field_avatar_error_msg();
        $field_bg_cover_error_msg = $profileForm->get_field_bg_cover_error_msg();
        $field_job_description_error_msg = $profileForm->get_field_job_description_error_msg();
        $field_company_logo_error_msg = $profileForm->get_field_company_logo_error_msg();
        $field_job_category_error_msg = $profileForm->get_field_job_category_error_msg();
        //$field_job_salary_error_msg = $profileForm->get_field_job_salary_error_msg();
        $field_job_qualification_error_msg = $profileForm->get_field_job_qualification_error_msg();
        $field_job_vacancy_type_error_msg = $profileForm->get_field_job_vacancy_type_error_msg();
        $field_region_error_msg = $profileForm->get_field_region_error_msg(); 
        $field_account_type_error_msg = $profileForm->get_field_account_type_error_msg();
        $field_language_error_msg = $profileForm->get_field_language_error_msg();
        $field_category_of_service_msg = $profileForm->get_field_category_of_service_error_msg();

        $data = get_profile_form_data($current_user);   

        $is_coaching_account = UserMemberShip::is_coaching_account();
        
        //echo var_dump(UserMemberShip::is_coaching_account());

        //print_r($data);
        
        //$networks = $data['socials'] ? stripslashes(json_encode($data['socials'])) : '[]'; ?>

        <script type="text/javascript">

            const ACCOUNT_TYPE_COACHING = '<?= ACCOUNT_TYPE_COACHING ?>';

            var profile_networks = <?= $data['socials'] ? stripslashes(json_encode($data['socials'])) : '[]'; ?>,
                profile_categories = <?= $data['categories'] ? stripslashes(json_encode($data['categories'])) : '[]'; ?>,                
                profile_qualification = <?= $data['qualifications'] ? stripslashes(json_encode($data['qualifications'])) : '[]'; ?>,
                profile_vacancy_types = <?= $data['vacancy_types'] ? stripslashes(json_encode($data['vacancy_types'])) : '[]'; ?>,
                profile_regions = <?= $data['region'] ? stripslashes(json_encode($data['region'])) : '[]'; ?>,
                profile_account_types = <?= $data['account_type'] ? stripslashes(json_encode($data['account_type'])) : '[]'; ?>,    
                profile_languages = <?= $data['languages'] ? stripslashes(json_encode($data['languages'])) : '[]'; ?>,     
                profile_category_of_service =  <?= $data['category_of_service'] ? stripslashes(json_encode($data['category_of_service'])) : '[]'; ?>,           
                is_coaching_account = <?= (int) $is_coaching_account ?>;

            jQuery(function($) {

                function printCatRenderResults($parent, $sl, dataCatLists) {

                    const sl_id = $sl.attr('id'),
                         sids = [];                       

                    let html_options = '';

                    dataCatLists.forEach(term => {

                        html_options += `<option value="${term.term_id}">${term.name}</option>`;   
                        
                        sids.push(`${term.term_id}`);

                    });

                    setTimeout(function() {

                        $sl.append(html_options);

                        $sl.val(sids);
                        

                    }, 200);

                }

                function createSectionRatingsByHour() {

                    var profile_rates_by_hour = <?= $data['rates_by_hour'] ? intval( $data['rates_by_hour'] ) : 10 ?>;

                    const html = `<div class="element form-section">
                                    <div class="pf-head round-icon">
                                        <div class="title-style-1">
                                            <i class="icon-banking-donation-2"></i>
                                            <h5>Rates by hour <span class="required">(*)</span></h5>
                                        </div>
                                    </div>
                                    <div class="pf-body">

                                        <div class="fieldset-rates_by_hour field-type-text form-group">
                                            <div class="field-head">
                                                <label for="rates_by_hour"> Please enter rates by hour value</label>
                                            </div>
                                            <div class="field required-field">

                                                <input type="number" 
                                                        class="input-text" 
                                                        name="rates_by_hour" 
                                                        id="rates_by_hour" 
                                                        min="10"
                                                        value="${profile_rates_by_hour}"
                                                        step="10"
                                                        placeholder="" 
                                                        required />
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            `;

                        $('#form-section-rates-by-hour').html(html);

                }

                function removeSectionRatingsByHour() {

                    $('#form-section-rates-by-hour').html('');

                }

                function isCoachingSelect2(e) {

                    var data = e.params.data,
                        selected_value = data.id,
                        selected_text = data.text.trim().toLowerCase();

                    return selected_text === ACCOUNT_TYPE_COACHING;

                }

                $(window).load(function() {

                    if ( profile_networks.length ) {

                        profile_networks.forEach((item, i) => {

                            setTimeout(function() {

                                $('input[data-repeater-create][type=button]').trigger('click');

                            }, 200);

                            setTimeout(function() {                               

                                $('select[name="links[' + i + '][network]"]').val(item.network)
                                                                    .trigger('change');
                                
                                $('input[type="text"][name="links[' + i + '][url]"]').val(item.url);

                            }, 400);


                        });

                    }

                    if ( profile_categories.length ) {

                        const $parent = $('.fieldset-job_category'),
                              $sl = $('#job_category');

                       printCatRenderResults($parent, $sl, profile_categories);
                       

                    }

                    /*if ( profile_salaries.length ) {

                        const $parent = $('.fieldset-job-salary'),
                              $sl = $('#job-salary');

                       printCatRenderResults($parent, $sl, profile_salaries);

                    }*/

                    if ( profile_qualification.length ) {

                        const $parent = $('.fieldset-job-qualification'),
                              $sl = $('#job-qualification');

                        printCatRenderResults($parent, $sl, profile_qualification);

                    }

                    if ( profile_vacancy_types.length ) {

                        const $parent = $('.fieldset-job-vacancy-type'),
                            $sl = $('#job-vacancy-type');

                        printCatRenderResults($parent, $sl, profile_vacancy_types);

                    }

                    if ( profile_regions.length ) {

                        const $parent = $('.fieldset-region'),
                            $sl = $('#region');

                        printCatRenderResults($parent, $sl, profile_regions);

                    }

                    if ( profile_account_types.length ) {

                        const $parent = $('.fieldset-account_type'),
                            $sl = $('#job_account_type');

                        printCatRenderResults($parent, $sl, profile_account_types);

                    } 
                    
                    if ( profile_languages.length ) {

                        const $parent = $('.fieldset-job_languages'),
                            $sl = $('#job_languages');

                        printCatRenderResults($parent, $sl, profile_languages);

                    }

                    if ( profile_category_of_service.length ) {

                        const $parent = $('.fieldset-job_category_of_service'),
                            $sl = $('#job_category_of_service');

                        printCatRenderResults($parent, $sl, profile_category_of_service);

                    } 
                    

                });

                if ( is_coaching_account ) {

                    createSectionRatingsByHour();

                }

                $('#job_account_type').on('select2:select', function(e) {

                    if ( isCoachingSelect2(e) ) {

                        createSectionRatingsByHour();

                    } 

                }).on('select2:unselect', function(e) {

                    if ( isCoachingSelect2(e) ) {

                        removeSectionRatingsByHour();

                    } 

                });

            });

        </script>

        <div class="add-listing-step" style="opacity: 0;">

            <div class="i-listings">

                <div class="wrapper">

                    <div class="row section-title">
                        <h2 class="case27-primary-text">My profile details</h2>
                    </div>

                    <form action="/add-listing/?listing_type=jobs" method="post" id="submit-job-form" class="job-manager-form light-forms c27-submit-listing-form" enctype="multipart/form-data">
                        
                        <div class="form-section-wrapper" id="form-section-avatar-profile">
                            <div class="element form-section">
                                <div class="pf-head round-icon">
                                    <div class="title-style-1">
                                        <i class="mi image"></i>
                                        <h5>Avatar Profile <span class="required">(*)</span></h5>
                                    </div>
                                </div>                                
                                <div class="pf-body">                                    
                                    <div class="fieldset-avatar-profile field-type-file form-group">
                                        <div class="field-head">
                                            <label for="avatar-profile">Avatar image</label>
                                        </div>
                                        <div class="field required-field" data-required-error="<?= $field_avatar_error_msg ?>">
                                            <div class="file-upload-field single-upload form-group-review-gallery ajax-upload">
                                                <input
                                                    type="file"
                                                    class="input-text review-gallery-input wp-job-manager-file-upload"
                                                    data-file_types="jpg|jpeg|gif|png"
                                                    data-max_count=""
                                                    name="avatar-profile"
                                                    id="avatar-profile"
                                                    placeholder=""                                                    
                                                    style="display: none;"
                                                />
                                                <div class="uploaded-files-list review-gallery-images">
                                                    <label class="upload-file review-gallery-add" for="avatar-profile">
                                                        <i class="mi file_upload"></i>
                                                        <div class="content"></div>
                                                    </label>

                                                    <div class="job-manager-uploaded-files">
                                                    
                                                        <?php print_profile_form_avatar_field($data['avatar_profile']); ?>

                                                    </div>
                                                </div>

                                                <small class="description"> Maximum file size: <?= get_max_upload_sizes() . ' MB' ?>. </small>
                                                <small class="error-msg"></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="fieldset-bg-cover-profile field-type-file form-group">
                                        <div class="field-head">
                                            <label for="avatar-profile">Background cover profile</label>
                                        </div>
                                        <div class="field required-field" data-required-error="<?= $field_bg_cover_error_msg ?>">
                                            <div class="file-upload-field single-upload form-group-review-gallery ajax-upload">
                                                <input
                                                    type="file"
                                                    class="input-text review-gallery-input wp-job-manager-file-upload"
                                                    data-file_types="jpg|jpeg|gif|png"
                                                    data-max_count=""
                                                    name="bg-cover-profile"
                                                    id="bg-cover-profile"
                                                    placeholder=""                                                    
                                                    style="display: none;"
                                                />
                                                <div class="uploaded-files-list review-gallery-images">
                                                    <label class="upload-file review-gallery-add" for="bg-cover-profile">
                                                        <i class="mi file_upload"></i>
                                                        <div class="content"></div>
                                                    </label>

                                                    <div class="job-manager-uploaded-files">                                                        
                                                    
                                                        <?php print_profile_form_bg_cover_profile_field($data['bg_cover_profile']); ?>

                                                    </div>

                                                </div>

                                                <small class="description"> Maximum file size: <?= get_max_upload_sizes() . ' MB' ?>. </small>
                                                <small class="error-msg"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-section-wrapper" id="form-section-general">
                            <div class="element form-section">
                                <div class="pf-head round-icon">
                                    <div class="title-style-1">
                                        <i class="icon-pencil-2"></i>
                                        <h5>General</h5>
                                    </div>
                                </div>
                                <div class="pf-body">
                                    <div class="fieldset-first_name field-type-text form-group">
                                        <div class="field-head">
                                            <label for="job_title"> First Name <span class="required">(*)</span></label>
                                        </div>
                                        <div class="field required-field">
                                            <input type="text" 
                                                    class="input-text" 
                                                    name="first_name" 
                                                    id="first_name" 
                                                    placeholder="" 
                                                    value="<?= $data['first_name'] ? $data['first_name'] : '' ?>" 
                                                    maxlength=""
                                                    required />
                                        </div>
                                    </div>
                                    <div class="fieldset-last_name field-type-text form-group">
                                        <div class="field-head">
                                            <label for="last_name"> Last Name <span class="required">(*)</span></label>
                                        </div>
                                        <div class="field required-field">
                                            <input type="text" 
                                                    class="input-text" 
                                                    name="last_name" 
                                                    id="last_name" 
                                                    placeholder="" 
                                                    value="<?= $data['last_name'] ? $data['last_name'] : '' ?>" 
                                                    maxlength=""
                                                    required />
                                        </div>
                                    </div>
                                    <div class="fieldset-job_title field-type-text form-group">
                                        <div class="field-head">
                                            <label for="job_title"> Job title <span class="required">(*)</span></label>
                                        </div>
                                        <div class="field required-field">
                                            <input type="text" 
                                                    class="input-text" 
                                                    name="job_title" 
                                                    id="job_title" 
                                                    placeholder="" 
                                                    value="<?= $data['job_title'] ? $data['job_title'] : '' ?>" 
                                                    maxlength=""
                                                    required />
                                        </div>
                                    </div>

                                    <div class="fieldset-job_description field-type-texteditor form-group">
                                        <div class="field-head">
                                            <label for="job_description"> Job description <span class="required">(*)</span></label>
                                        </div>
                                        <div class="field required-field" data-required-error="<?= $field_job_description_error_msg ?>">
                                            <?php 
                                                 $settings = array('wpautop' => true, 
                                                    'media_buttons' => false, 
                                                    'quicktags' => false, 
                                                    'textarea_rows' => '10', 
                                                    'textarea_id' => 'job_description',
                                                    'textarea_name' => 'job_description' );
                                                wp_editor( $data['job_description'] ? $data['job_description'] : '', 'job_description', $settings);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-section-wrapper" id="form-section-account-type">
                            <div class="element form-section">
                                <div class="pf-head round-icon">
                                    <div class="title-style-1">
                                        <i class="icon-user-add"></i>
                                        <h5>Account type <span class="required">(*)</span></h5>
                                    </div>
                                </div>
                                <div class="pf-body">

                                    <div class="fieldset-account_type field-type-text form-group">
                                        <div class="field-head">
                                            <label for="account_type"> Please choose my account type</label>
                                        </div>
                                        <div class="field required-field" data-required-error="<?= $field_account_type_error_msg ?>">

                                            <div class="cts-term-multiselect">
                                                <select
                                                    name="job_account_type[]"
                                                    id="job_account_type"
                                                    multiple="multiple"
                                                    data-mylisting-ajax="true"
                                                    data-mylisting-ajax-url="mylisting_list_terms"
                                                    data-mylisting-ajax-params='{"taxonomy":"account-type","listing-type-id":135}'
                                                >
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="form-section-wrapper" id="form-section-rates-by-hour">
                        </div>

                        <div class="form-section-wrapper" id="form-section-category-of-service">
                            <div class="element form-section">
                                <div class="pf-head round-icon">
                                    <div class="title-style-1">
                                        <i class="icon-user-add"></i>
                                        <h5>Category of service <span class="required">(*)</span></h5>
                                    </div>
                                </div>
                                <div class="pf-body">

                                    <div class="fieldset-job_category_of_service field-type-text form-group">
                                        <div class="field-head">
                                            <label for="job_category_of_service">Please choose my category of services</label>
                                        </div>
                                        <div class="field required-field" data-required-error="<?= $field_category_of_service_msg ?>">

                                            <div class="cts-term-multiselect">
                                                <select
                                                    name="job_category_of_service[]"
                                                    id="job_category_of_service"
                                                    multiple="multiple"
                                                    data-mylisting-ajax="true"
                                                    data-mylisting-ajax-url="mylisting_list_terms"
                                                    data-mylisting-ajax-params='{"taxonomy":"<?= JOBS_CATEGORY_OF_SERVICE_TAXONOMY ?>","listing-type-id":135}'
                                                >
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-section-wrapper" id="form-section-images-and-files">
                            <div class="element form-section">
                                <div class="pf-head round-icon">
                                    <div class="title-style-1">
                                        <i class="mi image"></i>
                                        <h5>Images and files</h5>
                                    </div>
                                </div>
                                <div class="pf-body">
                                    <div class="fieldset-job_book_online field-type-file form-group">
                                        <div class="field-head">
                                            <label for="job_book_online"> Book online (optional)</label>
                                        </div>
                                        <div class="field required-field">
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

                                                        <?php print_profile_form_book_online_field($data['book_online']); ?>

                                                    </div>
                                                </div>

                                                <small class="description"> Maximum file size: <?= get_max_upload_sizes() . ' MB' ?>. </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="fieldset-job_portfolio field-type-file form-group">
                                        <div class="field-head">
                                            <label for="job_portfolio"> Portfolio <small>(optional)</small> </label>
                                        </div>
                                        <div class="field">
                                            <div class="file-upload-field multiple-uploads form-group-review-gallery ajax-upload">
                                                <input
                                                    type="file"
                                                    class="input-text review-gallery-input wp-job-manager-file-upload"
                                                    data-file_types="jpg|jpeg|gif|png|doc|docx|xls|xlsx|pdf"
                                                    data-max_count=""
                                                    multiple
                                                    name="job_portfolio[]"
                                                    id="job_portfolio"
                                                    placeholder=""
                                                    style="display: none;"
                                                />
                                                <div class="uploaded-files-list review-gallery-images">
                                                    <label class="upload-file review-gallery-add" for="job_portfolio">
                                                        <i class="mi file_upload"></i>
                                                        <div class="content"></div>
                                                    </label>

                                                    <div class="job-manager-uploaded-files">
                                                        <?php print_profile_form_portfolio_field($data['portfolio']); ?>
                                                    </div>
                                                </div>

                                                <small class="description"> Maximum file size: <?= get_max_upload_sizes() . ' MB' ?>. </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="fieldset-job_demo_tape field-type-file form-group">
                                        <div class="field-head">
                                            <label for="job_demo_tape"> Demo tape <small>(optional)</small> </label>
                                        </div>
                                        <div class="field">
                                            <div class="file-upload-field multiple-uploads form-group-review-gallery ajax-upload">
                                                <input
                                                    type="file"
                                                    class="input-text review-gallery-input wp-job-manager-file-upload"
                                                    data-file_types="avi|ogg|m4a|mov|mp3|mp4|mpg|psd|xd|eps|ai|fig|flac"
                                                    data-max_count=""
                                                    multiple
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
                                                        <?php print_profile_form_demo_tape_field($data['demo_tape']); ?>
                                                    </div>
                                                </div>

                                                <small class="description"> Maximum file size: <?= get_max_upload_sizes() . ' MB' ?>. </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-section-wrapper" id="form-section-contact-information">
                            <div class="element form-section">
                                <div class="pf-head round-icon">
                                    <div class="title-style-1">
                                        <i class="icon-phone-outgoing"></i>
                                        <h5>Contact information <span class="required">(*)</span></h5>
                                    </div>
                                </div>
                                <div class="pf-body">
                                    <div class="fieldset-job_email field-type-email form-group">
                                        <div class="field-head">
                                            <label for="job_email"> Contact Email </label>
                                        </div>
                                        <div class="field required-field">
                                            <input type="email" 
                                                    class="input-text" 
                                                    name="job_email" 
                                                    id="job_email" 
                                                    placeholder="" 
                                                    value="<?= $data['email'] ? $data['email'] : '' ?>" 
                                                    required />
                                        </div>
                                    </div>

                                    <div class="fieldset-job_phone field-type-text form-group">
                                        <div class="field-head">
                                            <label for="job_phone"> Phone Number </label>
                                        </div>
                                        <div class="field required-field">
                                            <input type="text" 
                                                    class="input-text" 
                                                    name="job_phone" 
                                                    id="job_phone" 
                                                    placeholder="" 
                                                    value="<?= $data['phone'] ? $data['phone'] : '' ?>" 
                                                    minlength="" 
                                                    maxlength=""
                                                    required />
                                        </div>
                                    </div>

                                    <div class="fieldset-job_website field-type-url form-group">
                                        <div class="field-head">
                                            <label for="job_website"> Website <small>(optional)</small> </label>
                                        </div>
                                        <div class="field">
                                            <input type="url" 
                                                    class="input-text" 
                                                    name="job_website" 
                                                    id="job_website" 
                                                    placeholder="" 
                                                    value="<?= $data['website'] ? $data['website'] : '' ?>" />
                                        </div>
                                    </div>

                                    <div class="fieldset-links field-type-links form-group">
                                        <div class="field-head">
                                            <label for="links"> Social Networks <small>(optional)</small> </label>
                                        </div>
                                        <div class="field">
                                            <div class="repeater social-networks-repeater" data-list="[]">
                                                <div data-repeater-list="links">
                                                    <div data-repeater-item>
                                                        <select name="network" class="ignore-custom-select">
                                                            <option value="">Select Network</option>
                                                            <option value="Facebook">Facebook</option>
                                                            <option value="Twitter">Twitter</option>
                                                            <option value="Instagram">Instagram</option>
                                                            <option value="YouTube">YouTube</option>
                                                            <option value="Snapchat">Snapchat</option>
                                                            <option value="Tumblr">Tumblr</option>
                                                            <option value="Reddit">Reddit</option>
                                                            <option value="LinkedIn">LinkedIn</option>
                                                            <option value="Pinterest">Pinterest</option>
                                                            <option value="DeviantArt">DeviantArt</option>
                                                            <option value="VKontakte">VKontakte</option>
                                                            <option value="SoundCloud">SoundCloud</option>
                                                            <option value="Website">Website</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                        <input type="text" name="url" placeholder="Enter URL..." />
                                                        <button data-repeater-delete type="button" class="buttons button-5 icon-only small"><i class="material-icons delete"></i></button>
                                                    </div>
                                                </div>
                                                <input data-repeater-create type="button" value="Add" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-section-wrapper" id="form-section-job-details">
                            <div class="element form-section">
                                <div class="pf-head round-icon">
                                    <div class="title-style-1">
                                        <i class="icon-pencil-2"></i>
                                        <h5>Job details <span class="required">(*)</span></h5>
                                    </div>
                                </div>
                                <div class="pf-body">
                                    <div class="fieldset-job_category field-type-term-select form-group term-type-multiselect">
                                        <div class="field-head">
                                            <label for="job_category"> Jobs Category </label>
                                        </div>
                                        <div class="field required-field" data-required-error="<?= $field_job_category_error_msg ?>">

                                            <div class="cts-term-multiselect">
                                                <select
                                                    name="job_category[]"
                                                    id="job_category"
                                                    multiple="multiple"
                                                    data-mylisting-ajax="true"
                                                    data-mylisting-ajax-url="mylisting_list_terms"
                                                    data-mylisting-ajax-params='{"taxonomy":"job_listing_category","listing-type-id":135}'
                                                >
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="fieldset-job-salary field-type-term-select form-group term-type-multiselect">
                                        <div class="field-head">
                                            <label for="job-salary"> Job: Salary </label>
                                        </div>
                                        <div class="field required-field">
                                            <input type="number" 
                                                    class="input-text" 
                                                    name="job_salary" id="job_salary" 
                                                    placeholder="" 
                                                    min="100"
                                                    step="10"
                                                    value="<?= $data['salary'] ? $data['salary'] : '100' ?>" required>
                                        </div>
                                    </div>

                                    <div class="fieldset-job-qualification field-type-term-select form-group term-type-multiselect">
                                        <div class="field-head">
                                            <label for="job-qualification"> Job: Qualification </label>
                                        </div>
                                        <div class="field required-field" data-required-error="<?= $field_job_qualification_error_msg ?>">
                                            <div class="cts-term-multiselect">
                                                <select
                                                    name="job-qualification[]"
                                                    id="job-qualification"
                                                    multiple="multiple"
                                                    data-mylisting-ajax="true"
                                                    data-mylisting-ajax-url="mylisting_list_terms"
                                                    data-mylisting-ajax-params='{"taxonomy":"job-qualification","listing-type-id":135}'
                                                >
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="fieldset-job-vacancy-type field-type-term-select form-group term-type-multiselect">
                                        <div class="field-head">
                                            <label for="job-vacancy-type"> Job: Vacancy type </label>
                                        </div>
                                        <div class="field required-field" data-required-error="<?= $field_job_vacancy_type_error_msg ?>">
                                            <div class="cts-term-multiselect">
                                                <select
                                                    name="job-vacancy-type[]"
                                                    id="job-vacancy-type"
                                                    multiple="multiple"
                                                    data-mylisting-ajax="true"
                                                    data-mylisting-ajax-url="mylisting_list_terms"
                                                    data-mylisting-ajax-params='{"taxonomy":"job-vacancy-type","listing-type-id":135}'
                                                >
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-section-wrapper" id="form-section-job-languages">
                            <div class="element form-section">
                                <div class="pf-head round-icon">
                                    <div class="title-style-1">
                                        <i class="fa fa-flag"></i>
                                        <h5>Job Languages <span class="required">(*)</span></h5>
                                    </div>
                                </div>
                                <div class="pf-body">

                                    <div class="fieldset-job_languages field-type-term-select form-group term-type-multiselect">
                                        
                                        <div class="field-head">
                                            <label for="job-languages"> Job: Languages </label>
                                        </div>

                                        <div class="field required-field" data-required-error="<?= $field_language_error_msg ?>">
                                            
                                            <div class="cts-term-multiselect">
                                                
                                                <select
                                                    name="job_languages[]"
                                                    id="job_languages"
                                                    multiple="multiple"
                                                    data-mylisting-ajax="true"
                                                    data-mylisting-ajax-url="mylisting_list_terms"
                                                    data-mylisting-ajax-params='{"taxonomy":"languages","listing-type-id":135}'
                                                >
                                                </select>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>                   
                        
                        <div class="form-section-wrapper" id="form-section-job-location">
                            <div class="element form-section">
                                <div class="pf-head round-icon">
                                    <div class="title-style-1">
                                        <i class="fa fa-map-marker"></i>
                                        <h5>Job location <span class="required">(*)</span></h5>
                                    </div>
                                </div>
                                <div class="pf-body">
                                    <div class="fieldset-job_location field-type-location form-group">
                                        <div class="field-head">
                                            <label for="job_location"> Location</label>
                                        </div>
                                        <div class="field required-field">
                                            <div class="location-field-wrapper" data-options='{"default-lat":51.5072,"default-lng":-0.128,"default-zoom":12}'>
                                                <input type="text" 
                                                        class="input-text address-input" 
                                                        id="job_location" 
                                                        name="job_location" 
                                                        placeholder='e.g. "London"' 
                                                        value="<?= $data['job_location'] ? $data['job_location'] : '' ?>" 
                                                        maxlength="" 
                                                        required />
                                                <i class="mi my_location cts-get-location" data-input="#job_location" data-map="location-picker-map"></i>

                                                <div class="location-actions">
                                                    <div class="lock-pin">
                                                        <input id="job_location__lock_pin" type="checkbox" name="job_location__lock_pin" value="yes" />
                                                        <label for="job_location__lock_pin" class="locked"><i class="mi lock_outline"></i>Unlock Pin Location</label>
                                                        <label for="job_location__lock_pin" class="unlocked"><i class="mi lock_open"></i>Lock Pin Location</label>
                                                    </div>

                                                    <div class="enter-coordinates-toggle">
                                                        <span>Enter coordinates manually</span>
                                                    </div>
                                                </div>

                                                <div class="location-coords hide">
                                                    <div class="form-group">
                                                        <label for="job_location__latitude">Latitude</label>
                                                        <input type="text" 
                                                                name="job_location__latitude" 
                                                                id="job_location__latitude" 
                                                                class="latitude-input" 
                                                                value="<?= $data['job_location__latitude'] ? $data['job_location__latitude'] : '' ?>" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="job_location__longitude">Longitude</label>
                                                        <input type="text" 
                                                                    name="job_location__longitude" 
                                                                    id="job_location__longitude" 
                                                                    class="longitude-input" 
                                                                    value="<?= $data['job_location__longitude'] ? $data['job_location__longitude'] : '' ?>" />
                                                    </div>
                                                </div>

                                                <div class="c27-map picker" id="location-picker-map" data-options='{"skin":false,"cluster_markers":false,"scrollwheel":true}'></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="fieldset-region field-type-term-select form-group term-type-multiselect">
                                        <div class="field-head">
                                            <label for="region"> Region </label>
                                        </div>
                                        <div class="field required-field" data-required-error="<?= $field_region_error_msg ?>">
                                            <div class="cts-term-multiselect">
                                                <select
                                                    name="region[]"
                                                    id="region"
                                                    multiple="multiple"
                                                    data-mylisting-ajax="true"
                                                    data-mylisting-ajax-url="mylisting_list_terms"
                                                    data-mylisting-ajax-params='{"taxonomy":"region","listing-type-id":135}'
                                                >
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        

                        <div class="form-section-wrapper form-footer" id="form-section-submit">
                            <div class="form-section">
                                <div class="pf-body">                                

                                    <div class="listing-form-submit-btn">
                                        <button type="submit" name="submit_job" class="preview-btn button buttons button-2" value="submit">
                                            Save
                                        </button>                                    
                                    </div>
                                </div>
                            </div>
                        
                        </div>

                    </form>

                </div>
                
            </div>

            <div class="add-listing-nav" style="display:none">
                <ul></ul>
            </div>

            <div class="loader-bg main-loader add-listing-loader" style="background-color: #fff; display: none;">
                <div class="paper-spinner" style="width: 28px; height: 28px;">
                    <div class="spinner-container active">
                        <div class="spinner-layer layer-1" style="border-color: #000;">
                            <div class="circle-clipper left">
                                <div class="circle" style="border-width: 3px;"></div>
                            </div>
                            <div class="gap-patch">
                                <div class="circle" style="border-width: 3px;"></div>
                            </div>
                            <div class="circle-clipper right">
                                <div class="circle" style="border-width: 3px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="add-listing-loading-message">Please wait while the request is being processed.</p>
            </div>
        </div>


    <?php }

    function print_edit_account_template() {
        
        //require_once LIB_USER_ROLES;
        
        $act = $_GET['a']; ?>

        <div class="wrapper ohidden">

            <div class="col-sm-3 col-xs-12">

                <?php print_edit_account_navigation(); ?>

               
            </div>

            <div class="col-sm-9 col-xs-12">

                <?php 
                    $act === 'account' ? print_edit_account_panel() : 
                                         print_edit_profile_panel(); ?>
                
            </div>

        </div>
        

    <?php }