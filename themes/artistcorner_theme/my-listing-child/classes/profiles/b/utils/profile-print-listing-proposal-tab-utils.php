<?php 

    namespace Profiles;

    class ProfilePrintListingProposalTabUtils {

        public static function print() {

            global $post;
        
            $tabs_info = _get_single_profile_listing_tabs_info(); 
            
            $form_data = Proposal::get_proposal_form_data(); 
    
            $account_types = UserMemberShip::get_user_account_types($post->post_author);
    
            //echo var_dump($account_types);
            
            extract($form_data); ?>
    
            <script type="text/javascript">
    
                jQuery(function($) {
    
                    var account_type = <?= $account_types ? json_encode($account_types) : '[]' ?>;
    
                    //console.log(account_type);
    
                    function createKindOfTypeBox() {
    
                        const html = `<label>Kind of offer <span class="required padLeft5">(*)</span></label>
                                        <div class="field">
                                            <div class="form-multiples-choose-box __links form-skill-required-box form-kind-of-offer">
                                                
                                                <div class="dropdown-js-wrapper __skills-required __kind-of-offer">
    
                                                    <select id="slKindOfOffer" 
                                                        name="slKindOfOffer[]" 
                                                        class="form-control js-simple-select2"                                                            
                                                        data-placeholder="Please choose your kind of offer">     
    
                                                        <option></option>                                                   
    
                                                        <?php $accounts = UserMemberShip::get_all_account_types(); 
    
                                                            if ( $accounts ) : 
    
                                                                foreach ( $accounts as $key => $term ) : ?>
    
                                                                    <option value="<?= $term->term_id ?>">
                                                                        <?= $term->name ?>
                                                                    </option>
    
                                                        <?php
                                                                endforeach;
    
                                                            endif; ?>
    
                                                    </select>
    
                                                </div>
                                            </div>
                                        </div>`;
    
                        $('.input-box.__kind-of-offer').html(html);
    
                        const $slKindOfOffer = $('#slKindOfOffer');
    
                        $slKindOfOffer.select2({
                            placeholder: $slKindOfOffer.data('placeholder'),
                            allowClear: true
                        });
                    
                    }
    
                    if ( account_type.length > 1 ) {
    
                        createKindOfTypeBox();
    
                    }
    
                });
    
            </script>
    
            <section class="profile-body listing-tab tab-hidden tab-type-bookings tab-layout-masonry pre-init" 
                     id="listing_tab_<?php echo $tabs_info['proposal']['id'] ?>">
    
                <div class="container">
    
                    <div class="row">
    
                        <div class="col-md-6 col-md-push-3 col-sm-8 col-sm-push-2 col-xs-12 grid-item bookings-form-wrapper">
    
                            <div class="element content-block">
                                <div class="pf-body">
    
                                    <div id="proposal-form" class="proposal-form">
    
                                        <form id="frmProposal" method="post" action="<?php the_permalink(); ?>">
                                        
                                            <div class="input-box">
                                                <label>Mission Subject <span class="required padLeft5">(*)</span></label>
                                                <div class="field">
                                                    <input id="txtMissionSubject" 
                                                            type="text" placeholder="Project title" 
                                                            name="txtMissionSubject" 
                                                            class="form-control" 
                                                            value=""
                                                            required />
                                                </div>
                                            </div>
    
                                            <div class="input-box">
    
                                                <label>Beginning of the mission</label>
    
                                                <div class="field field-radio-buttons">
    
                                                    <?php foreach ( $beginning_mission_options as $value => $label ) : ?> 
                                                        
                                                        <label class="radio">
                                                            <input type="radio" 
                                                                    name="rdBeginningMission" 
                                                                    value="<?= $value ?>" 
                                                                    <?= $label === reset($beginning_mission_options) ? 'checked' : '' ?> />
    
                                                            <span><?= $label ?></span>
    
                                                        </label>
    
                                                    <?php endforeach; ?>
                                                 
                                                </div>
                                            </div>
    
                                            <div class="input-box">
                                                <label>Length of the mission</label>
                                                <div class="field field-radio-buttons">
    
                                                    <?php foreach ( $length_mission_options as $value => $label ) : ?> 
                                                        
                                                        <label class="radio">
                                                            <input type="radio" 
                                                                    name="rdLengthMission" 
                                                                    value="<?= $value ?>" 
                                                                    <?= $label === reset($length_mission_options) ? 'checked' : '' ?> />
    
                                                            <span><?= $label ?></span>
    
                                                        </label>
    
                                                    <?php endforeach; ?>
                                                    
                                                </div>
                                            </div>
    
                                            <div class="input-box">
                                                <label>Mission location</label>
                                                <div class="field field-checkboxes">
    
                                                    <?php foreach ( $mission_location_options as $value => $label ) : 
                                                        
                                                        if ( (int) $value === 0 ) continue; ?> 
    
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="chkMissionLocation" value="<?= $value ?>" />
                                                            <span><?= $label ?></span>
                                                        </label>
    
                                                    <?php endforeach; ?>
    
                                                </div>
                                            </div>
    
                                            <div class="input-box">
                                                <label>Project description <span class="required padLeft5">(*)</span></label>
                                                <div class="field">
                                                    <textarea id="txtProjectDescription" 
                                                                name="txtProjectDescription" 
                                                                class="form-control" 
                                                                rows="10"
                                                                required></textarea>
                                                </div>
                                            </div>
    
                                            <div class="input-box">
                                                <label>Booking <span class="required padLeft5">(*)</span></label>
                                                <div class="field __booking">
                                                    <?php echo do_shortcode("[booking]") ?>
                                                </div>
                                            </div>                                        
    
                                            <div class="input-box __kind-of-offer">                                            
                                            </div>
    
                                            <div class="input-box">
                                                <label>Upload files</label>
                                                <div class="field">
                                                    <div class="file-upload-field multiple-uploads form-group-review-gallery ajax-upload">
                                                            <input
                                                                type="file"
                                                                class="input-text review-gallery-input wp-job-manager-file-upload"
                                                                data-file_types="jpg|jpeg|png|gif|bmp|doc|docx|xls|xlsx|pdf"
                                                                data-max_count=""
                                                                multiple
                                                                name="proposal_attachments[]"
                                                                id="proposal-attachments"
                                                                placeholder=""
                                                                style="display: none;"
                                                            />
                                                            <div class="uploaded-files-list review-gallery-images">
                                                                <label class="upload-file review-gallery-add" for="proposal-attachments">
                                                                    <i class="mi file_upload"></i>
                                                                    <div class="content"></div>
                                                                </label>
    
                                                                <div class="job-manager-uploaded-files">
                                                                    
                                                                </div>
                                                            </div>
    
                                                            <small class="description"> Maximum file size: <?= get_max_upload_sizes() . ' MB' ?>. </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="input-box submit-form-box">
    
                                                <button id="btnProposalSubmit" class="button-primary" type="submit" name="btnProposalSubmit">
                                                    Submit
                                                </button>
                                            </div>
    
                                            <input type="hidden" name="txtUserReceive" value="<?= $post->post_author ?>" />
    
                                        </form>
    
                                    </div>
                                    
                                </div>
    
                            </div>
                           
                        </div>
    
                    </div>
    
                </div>
    
            </section>

        <?php }

    }