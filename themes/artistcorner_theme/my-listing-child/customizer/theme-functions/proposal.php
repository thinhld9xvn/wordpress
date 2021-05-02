<?php 
    
    class Proposal {    

        private static $public_proposals;
        private static $pending_proposals;
        private static $approved_proposals;
        private static $rejected_proposals;
        private static $expired_proposals;

        private static $public_sent_proposals;
        private static $approved_sent_proposals;
        private static $rejected_sent_proposals;
        private static $expired_sent_proposals;

        private static $users_profile_lists; 

        public static function get_proposal_user_booking_field($pid) {

            return get_post_meta($pid, _FIELD_PROPOSAL_USER_BOOKING, true);

        }

        public static function get_proposal_skills_required_field($pid) {

            return get_the_terms($pid, PROPOSAL_SKILLS_TAXONOMY);

        }

        public static function get_proposal_uploaded_files($pid) {

            return get_post_meta($pid, _FIELD_PROPOSAL_UPLOAD_FILES, true);

        }        

        public static function get_proposal_kind_of_offer($pid) {

           return get_term_by('id', (int) get_post_meta($pid, _FIELD_PROPOSAL_KIND_OF_OFFER, true), JOBS_ACCOUNT_TYPE_TAXONOMY);           

        }

        public static function get_proposal_form_data() {

            $option = get_option('section-proposal_option_name');

            $data['beginning_mission_options'] = extract_theme_options_field($option['proposal-form-beginning-mission-id']);
            $data['length_mission_options'] = extract_theme_options_field($option['proposal-form-length-mission-id']);
            $data['mission_location_options'] = extract_theme_options_field($option['proposal-form-mission-location-id']);

            return $data;

        }

        public static function checkUserProfileLoaded($uid) {

            if ( self::$users_profile_lists && count( self::$users_profile_lists ) > 0 ) :

                return array_key_exists($uid, self::$users_profile_lists);

            endif;

            return false;

        }       
        

        public static function get_proposal_data($post, $type = 'inbox') {

            global $current_user;

            $form_data = self::get_proposal_form_data(); 
            
            $receiver_id = (int) self::get_proposal_receiver_id($post->ID);
            $post_author_id = (int) $post->post_author;
            
            if ( $type === 'inbox' ) :
            
                $author_id = $post_author_id;

            else :

                $author_id = $receiver_id; 

            endif;

            $user_profile = self::$users_profile_lists[$author_id];

            $beginning_mission_options = $form_data['beginning_mission_options'];
            $beginning_mission_field = self::get_proposal_beginning_mission_field($post->ID);
            $beginning_mission_option = $beginning_mission_options[$beginning_mission_field];

            $mission_location_options = $form_data['mission_location_options'];
            $mission_location_field = self::get_proposal_mission_location_field($post->ID);

            $mission_location_option = $mission_location_options[$mission_location_field] ? $mission_location_options[$mission_location_field] : $mission_location_options[0];

            $booking_calendar = format_booking_date_field( self::get_proposal_user_booking_field($post->ID) );            

            if ( ! self::checkUserProfileLoaded($author_id) ) :

                $user_profile = UserMemberShip::get_user_profile($author_id);

            endif;          
            
            $data['host_uids'] = array($receiver_id, $post_author_id);

            $data['profile_name'] = mb_strtoupper(get_author_name($author_id), 'UTF-8');

            $data['profile_status'] = UserMemberShip::is_user_online($author_id) ? 'Online' : 'Offline';

            $data['profile_url'] = get_the_permalink($user_profile);
            $data['profile_tel'] = get_profile_contact_phone($user_profile);
            $data['profile_tel_url'] = "tel:" . preg_replace("/\s|&nbsp;/", "", $data['profile_tel']);
            $data['profile_email'] = get_profile_email($user_profile);
            $data['profile_email_url'] = "mailto:" . $data['profile_email'];
            $data['profile_website_url'] = get_profile_website($user_profile);
            $data['profile_socials'] = get_profile_social_networks($user_profile);
            $data['profile_location_url'] = "//maps.google.com/maps?daddr=" . urlencode( get_profile_contact_location($user_profile) );

            $data['proposal_id'] = $post->ID;              
            $data['user_receive'] = mb_strtoupper(self::get_proposal_receiver($post->ID), 'UTF-8');
            $data['mission_subject'] = self::get_proposal_mission_subject($post);
            $data['beginning_mission'] = $beginning_mission_option;
            $data['length_mission'] = $form_data['length_mission_options'][self::get_proposal_length_mission_field($post->ID)];
            $data['mission_location'] = $mission_location_option;
            $data['project_description'] = self::get_proposal_project_description_field($post->ID);
            $data['booking'] = $booking_calendar;
            $data['skills_required'] = self::get_proposal_skills_required_field($post->ID);
            $data['uploaded_files'] = self::get_proposal_uploaded_files($post->ID);           
            $data['proposal_status'] = self::get_proposal_status($post->ID);
            $data['proposal_kind_of_offer'] = self::get_proposal_kind_of_offer($post->ID);

            return $data;

        }

        public static function get_proposal_expires_timeout() {

            $option = get_option('section-proposal_option_name');

            return $option['proposal-expire-timeout-id'];

        }

        public static function is_proposal_expires($pid) {         

            $proposal_datecreated = get_the_date('Y-m-d' ,$pid);

            $daytimeout = self::get_proposal_expires_timeout();

            $now = date('Y-m-d', time());

            $delta = DateTimeUtils::getDiffDate($proposal_datecreated, $now );

            return $delta >= $daytimeout;

        }

        public static function is_proposal_approved($pid) {

            $status = get_post_meta($pid, _FIELD_PROPOSAL_STATUS, true);

            return $status === Proposal::PROPOSAL_APPROVED;

        }

        public static function is_proposal_rejected($pid) {

            $status = get_post_meta($pid, _FIELD_PROPOSAL_STATUS, true);

            return $status === Proposal::PROPOSAL_REJECTED;

        }

        public static function set_proposal_status($pid, $status) {

            update_post_meta($pid, _FIELD_PROPOSAL_STATUS, $status);

        }

        public static function get_proposal_status($pid) {

            $status = get_post_meta($pid, _FIELD_PROPOSAL_STATUS, true);

            if ( ! in_array($status, [self::PROPOSAL_APPROVED, self::PROPOSAL_REJECTED, self::PROPOSAL_EXPIRED]) ) :

                if ( self::is_proposal_expires($pid) ) :

                    return self::PROPOSAL_EXPIRED;

                endif;

            endif;

            return $status;

        }

        public static function get_proposal_sender($post) {

            return mb_strtoupper( get_author_name( $post->post_author ), 'UTF-8' );

        }

        public static function get_proposal_receiver_id($pid) {

            return get_post_meta($pid, _FIELD_PROPOSAL_USER_RECEIVE, true);

        }

        public static function get_proposal_receiver($pid) {

            return get_author_name(self::get_proposal_receiver_id($pid));

        }

        public static function get_proposal_mission_subject($post) {

            return $post->post_title;
            
        }

        public static function get_proposal_details_opening_body_contents() {

            $options = get_option('section-proposal_option_name');
            return $options['proposal-details-opening-body-id'];

        }

        public static function get_proposal_profile_sender_template() {

            $options = get_option('section-proposal_option_name');
            return $options['proposal-profile-sender-id'];

        }

        public static function get_all_proposals_in_active_user() {

            global $current_user;

            $args = array(

                'post_type' => PROPOSAL_POST_TYPE,
                'orderby' => 'desc',
                'order' => 'date',
                'meta_key' => _FIELD_PROPOSAL_USER_RECEIVE,
                'meta_value' => $current_user->ID,
                'posts_per_page' => -1

            );

            $proposals = query_posts($args);

            wp_reset_query();

            self::$public_proposals = $proposal;

            return $proposals;

        }

        public static function get_all_proposals_sent() {

            global $current_user;

            $args = array(

                'post_type' => PROPOSAL_POST_TYPE,
                'orderby' => 'desc',
                'order' => 'date',
                'author' => $current_user->ID,
                'posts_per_page' => -1

            );

            $proposals = query_posts($args);

            wp_reset_query();

            self::$public_sent_proposals = $proposal;

            return $proposals;

        }

        public static function get_pending_proposals_in_active_user() {

            global $current_user;

            $args = array(

                'post_type' => PROPOSAL_POST_TYPE,
                'orderby' => 'desc',
                'order' => 'date',
                'meta_key' => _FIELD_PROPOSAL_USER_RECEIVE,
                'meta_value' => $current_user->ID,
                'posts_per_page' => -1,
                'meta_key' => _FIELD_PROPOSAL_STATUS,
                'meta_value' => Proposal::PROPOSAL_PENDING

            );

            $proposals = query_posts($args);

            wp_reset_query();

            self::$pending_proposals = $proposals;

            return $proposals;


        }

        public static function get_approved_proposals_in_active_user() {

            global $current_user;

            $args = array(

                'post_type' => PROPOSAL_POST_TYPE,
                'orderby' => 'desc',
                'order' => 'date',
                'meta_query' => array(

                    'relation' => 'AND',

                    array(
                        'key' => _FIELD_PROPOSAL_USER_RECEIVE,
                        'value' => $current_user->ID,                        
                    ),

                    array(
                        'key' => _FIELD_PROPOSAL_STATUS,
                        'value' => Proposal::PROPOSAL_APPROVED
                    )
                    
                ),              
                'posts_per_page' => -1            

            );

            $proposals = query_posts($args);

            wp_reset_query();

            self::$approved_proposals = $proposals;

            return $proposals;            

        }

        public static function get_approved_sent_proposals() {

            
            global $current_user;

            $args = array(

                'post_type' => PROPOSAL_POST_TYPE,
                'orderby' => 'desc',
                'order' => 'date',
                'meta_query' => array(

                    array(
                        'key' => _FIELD_PROPOSAL_STATUS,
                        'value' => Proposal::PROPOSAL_APPROVED
                    )
                    
                ),       
                'author' => $current_user->ID,       
                'posts_per_page' => -1            

            );

            $proposals = query_posts($args);

            wp_reset_query();

            self::$approved_sent_proposals = $proposals;

            return $proposals;            

        }

        public static function get_rejected_proposals_in_active_user() {

            global $current_user;

            $args = array(

                'post_type' => PROPOSAL_POST_TYPE,
                'orderby' => 'desc',
                'order' => 'date',              
                'posts_per_page' => -1,
                'meta_query' => array(

                    'relation' => 'AND',

                    array(
                        'key' => _FIELD_PROPOSAL_USER_RECEIVE,
                        'value' => $current_user->ID,                        
                    ),

                    array(
                        'key' => _FIELD_PROPOSAL_STATUS,
                        'value' => Proposal::PROPOSAL_REJECTED
                    )
                    
                )
            );

            $proposals = query_posts($args);

            wp_reset_query();

            self::$rejected_proposals = $proposals;

            return $proposals;            

        }

        public static function get_rejected_sent_proposals() {

            global $current_user;

            $args = array(

                'post_type' => PROPOSAL_POST_TYPE,
                'orderby' => 'desc',
                'order' => 'date',              
                'posts_per_page' => -1,
                'meta_query' => array(                   

                    array(
                        'key' => _FIELD_PROPOSAL_STATUS,
                        'value' => Proposal::PROPOSAL_REJECTED
                    )
                    
                ),
                'author' => $current_user->ID
                    
            );

            $proposals = query_posts($args);

            wp_reset_query();

            self::$rejected_sent_proposals = $proposals;

            return $proposals;            

        }

        public static function get_expired_proposals_in_active_user() {

            $public_proposals = null;
            $expired_proposals = array();

            if ( self::$public_proposals ) :

                $public_proposals = self::$public_proposals;

            else :

                $public_proposals = self::get_all_proposals_in_active_user();

            endif;

            foreach ( $public_proposals as $key => $proposal ) :

                if ( self::is_proposal_expires($proposal->ID) ):

                    array_push($expired_proposals, $proposal);
                    
                endif;

            endforeach;

            return $expired_proposals;

        }   
        
        public static function get_expired_sent_proposals() {

            $public_proposals_sent = null;
            $expired_proposals_sent = array();

            if ( self::$public_sent_proposals ) :

                $public_proposals_sent = self::$public_sent_proposals;

            else :

                $public_proposals_sent = self::get_all_proposals_sent();

            endif;

            foreach ( $public_proposals_sent as $key => $proposal ) :

                if ( self::is_proposal_expires($proposal->ID) ):

                    array_push($expired_proposals_sent, $proposal);
                    
                endif;

            endforeach;

            return $expired_proposals_sent;

        }   

        public static function print_proposal_header_inbox_template($data) { 
            
            extract($data); 
            
            $proposals_length = count($proposals_items); 
            $proposals_approved_length = count($proposals_approved_items);
            $proposals_rejected_length = count($proposals_rejected_items);
            $proposals_expired_length = count($proposals_expired_items); ?>

            <div class="col-md-3 col-sm-6">
                <div class="mlduo-stat-box second">
                    <h2><?= $proposals_length ?></h2>
                    <p>All Proposal(s)</p>
                    <i class="icon-window"></i>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="mlduo-stat-box second __approved">
                    <h2><?= $proposals_approved_length ?></h2>
                    <p>Approved Proposal(s)</p>
                    <i class="icon-pencil-ruler"></i>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="mlduo-stat-box second __rejected">
                    <h2><?= $proposals_rejected_length ?></h2>
                    <p>Rejected Proposal(s)</p>
                    <i class="icon-flash"></i>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="mlduo-stat-box second _expired">
                    <h2><?= $proposals_expired_length ?></h2>
                    <p>Expires Proposal(s)</p>
                    <i class="mi graphic_eq"></i>
                </div>
            </div>

        <?php }

        public static function print_proposal_header_inbox() { 
            
            $data['proposals_items'] = self::get_all_proposals_in_active_user(); 
            
            $data['proposals_approved_items'] = self::get_approved_proposals_in_active_user();
            
            $data['proposals_rejected_items'] = self::get_rejected_proposals_in_active_user();
            
            $data['proposals_expired_items'] = self::get_expired_proposals_in_active_user();          
            
            self::print_proposal_header_inbox_template($data); ?>
            

        <?php }

        public static function print_proposal_header_outbox() {

            $data['proposals_items'] = self::get_all_proposals_sent(); 
            
            $data['proposals_approved_items'] = self::get_approved_sent_proposals();
            
            $data['proposals_rejected_items'] = self::get_rejected_sent_proposals();
            
            $data['proposals_expired_items'] = self::get_expired_sent_proposals();   

            self::print_proposal_header_inbox_template($data);       
        
        }

        public static function get_proposal_status_inbox($status) { 

            $html = '';

            if ( $status === self::PROPOSAL_EXPIRED ) : 
            
                $html = '<div class="ilisting-sj-item __status __expired">
                            <span class="fa fa-tag"></span>   
                            <span class="padLeft5"><i>Status: ' . $status . '</i></span>

                        </div>';
                        
            elseif ( $status === self::PROPOSAL_APPROVED ) : 
            
                $html = '<div class="ilisting-sj-item __status __approved">
                            <span class="fa fa-check-double"></span>
                            <span class="padLeft5"><i>Status: ' . $status . '</i></span>
                        </div>'; 
                        
            elseif ( $status === self::PROPOSAL_REJECTED ) :

                $html = '<div class="ilisting-sj-item __status __rejected">
                            <span class="fa fa-window-close"></span>
                            <span class="padLeft5"><i>Status: ' . $status . '</i></span>
                        </div>';

            endif;

            return $html;
        
        }

        public static function print_proposal_no_information_msg() { 
            
            $option = get_option('section-proposal_option_name'); ?>

            <p class="proposal-empty-info"><?= $option['proposal-no-information-msg-id'] ?></p>

        <?php }

        public static function print_proposal_status_inbox($status) { 

            echo self::get_proposal_status_inbox($status);

        }

        public static function print_proposal_listing_template($data, $type='inbox') { 
            
            extract($data); ?>

            <script type="text/javascript">
                var proposal_loader = `<?= htmlspecialchars( print_add_listing_ajax_loader('proposal-loader', 
                                                                                            'Loading, please wait ...'), 
                                                            ENT_QUOTES, 'UTF-8' ) ?>`;
            </script>

            <div class="col-proposal-ilisting col-md-3 col-sm-4 col-xs-12">
                <h4>Proposal Listings</h4>

                <?php if ( $public_proposals ) : ?>

                    <ul class="proposal-ilistings __menu">   

                        <?php foreach( $public_proposals as $key => $post ) : 

                            if ( $type === 'inbox' ) :
                            
                                $sender = self::get_proposal_sender($post);

                            else :

                                $receiver = self::get_proposal_receiver($post->ID);

                            endif;

                            $mission_subject = self::get_proposal_mission_subject($post);
                            $status = self::get_proposal_status($post->ID); 
                            
                            $data = self::get_proposal_data($post, $type); ?>                        

                            <li>
                                <a href="#"
                                data-proposal-item="<?= htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8') ?>">
                                    <div class="ilisting-subjects">
                                        <div class="ilisting-sj-item">
                                            <span class="fa fa-user"></span>

                                            <?php if ( $type === 'inbox' ) : ?>

                                                    <span class="padLeft5"><i>From: <?= $sender ?></i></span>

                                            <?php 
                                                else : ?>

                                                    <span class="padLeft5"><i>To: <?= $receiver ?></i></span>
                                        
                                            <?php endif; ?>

                                        </div>

                                        <div class="ilisting-sj-item">
                                            <span class="fa fa-clipboard-list"></span>
                                            <span class="padLeft5"><i>Mission subject: <?= $mission_subject ?></i></span>
                                        </div>
                                        
                                        <?php self::print_proposal_status_inbox($status); ?>

                                    </div>
                                </a>
                            </li>    
                        <?php endforeach; ?>                 
                        
                    </ul>

                <?php 
                    else :

                        self::print_proposal_no_information_msg();
                    
                    endif; ?>

            </div>

        <?php }

        public static function print_proposal_listing() { 

            $data = array();
            
            if ( self::$public_proposals ) :  

                $data['public_proposals'] = self::$public_proposals;

            else :

                $data['public_proposals'] = self::get_all_proposals_in_active_user();
            
            endif;
            
            self::print_proposal_listing_template($data); ?>            

        <?php }

        public static function print_proposal_outbox_listing() {

            $data = array();
            
            if ( self::$public_sent_proposals ) :  

                $data['public_proposals'] = self::$public_sent_proposals;

            else :

                $data['public_proposals'] = self::get_all_proposals_sent();
            
            endif;

            self::print_proposal_listing_template($data, 'outbox');

        }

        public static function print_proposal_details() { 
            
            $opening_body = self::get_proposal_details_opening_body_contents(); ?>

            <div class="col-proposal-details col-md-6 col-sm-8 col-xs-12">
                <h4>Proposal Details</h4>
                <div class="proposal-ilistings __main-contents" 
                        data-opening-body="<?= htmlspecialchars($opening_body, ENT_QUOTES, 'UTF-8') ?>">
                    
                    <?php self::print_proposal_no_information_msg(); ?>

                </div>
            </div>

        <?php }      

        public static function print_proposal_sender_profile($type='inbox') { ?>

            <script type="text/javascript">
                var proposal_set_status_loader = `<?php echo print_proposal_set_status_loader(); ?>`;
            </script>

            <div class="col-proposal-sender col-md-3 col-sm-12 col-xs-12">

                <h4><?= $type === 'inbox' ? 'Profile Sender' : 'Profile Receiver' ?></h4>

                <?php 
                    $templates = self::get_proposal_profile_sender_template(); ?>

                <div class="proposal-ilistings __main-profile" 
                        data-templates="<?= htmlspecialchars($templates, ENT_QUOTES, 'UTF-8') ?>">

                        <?php self::print_proposal_no_information_msg(); ?>

                </div>            

            </div>
                                   

        <?php }

        public static function print_proposal_inbox() { ?>

            <div class="proposal-header-inbox ohidden">

                <?php self::print_proposal_header_inbox(); ?>

            </div>

            <div class="__proposal-ilistings ohidden">

                <?php self::print_proposal_listing() ?>

                <?php self::print_proposal_details() ?>

                <?php self::print_proposal_sender_profile(); ?>

            </div>

        <?php }

        public static function print_proposal_outbox() { ?>

            <div class="proposal-header-inbox ohidden">

                <?php self::print_proposal_header_outbox(); ?>

            </div>

            <div class="__proposal-ilistings ohidden">

                <?php self::print_proposal_outbox_listing() ?>

                <?php self::print_proposal_details() ?>

                <?php self::print_proposal_sender_profile('outbox'); ?>              

            </div>

        <?php }

        public static function print_dashboard_proposal() { 
            
            global $post; ?>

            <?php $show_inbox = UserMemberShip::has_action_permission( UserPermission::SHOW_INBOX_IN_PROPOSAL ); ?>

            <section class="i-section">

                <div class="container section-body">

                    <div class="col-md-12">

                        <div class="woocommerce-MyAccount-content">

                            <div class="row">

                                <div class="col-md-9 mlduo-welcome-message">
                                    <h1><?php echo $post->post_title ?></h1>
                                </div>                                

                            </div>

                            <div class="tab-lists">

                                <?php if ( $show_inbox ) : ?>

                                    <a class="active" data-target="#inbox" href="#">Inbox</a>

                                <?php endif; ?>

                                <a class="<?= ! $show_inbox ? 'active' : '' ?>" data-target="#outbox" href="#">Outbox</a>

                            </div>

                            <div class="tab-lists-content">                                

                                <?php if ( $show_inbox ) : ?>

                                    <div id="inbox" class="active">

                                        <?php self::print_proposal_inbox(); ?>

                                    </div>

                                <?php endif; ?>

                                <div id="outbox" class="<?= ! $show_inbox ? 'active' : '' ?>">

                                    <?php self::print_proposal_outbox(); ?>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>

            </section>

        <?php }

    }