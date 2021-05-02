<?php 
    namespace Proposals;

    class ProposalCreateUtils {

        public static function create($params) {

            global $current_user;
            
            extract($params);

            //print_r($params); die();

            $proposal_data = array(
                'post_status'   => 'publish',
                'post_title'    => $txtMissionSubject,
                'post_author'   => $current_user->ID,
                'post_type' => PROPOSAL_POST_TYPE
            );		 
              
            $pid = wp_insert_post( $proposal_data );
        
            if ( 0 === $pid || is_wp_error( $pid ) ) :
        
                return 'error';
        
            endif;

            update_post_meta($pid, _FIELD_PROPOSAL_STATUS, Proposal::PROPOSAL_PENDING);

            if ( $rdBeginningMission ) :

                update_post_meta($pid, _FIELD_PROPOSAL_BEGINNING_MISSION, $rdBeginningMission);

            endif;

            if ( $rdLengthMission ) :

                update_post_meta($pid, _FIELD_PROPOSAL_LENGTH_MISSION, $rdLengthMission);

            endif;

            if ( $chkMissionLocation ) :

                update_post_meta($pid, _FIELD_PROPOSAL_MISSION_LOCATION, $chkMissionLocation);

            endif;

            if ( $txtProjectDescription ) :

                update_post_meta($pid, _FIELD_PROPOSAL_PROJECT_DESCRIPTION, $txtProjectDescription);

            endif;

            if ( $slSkillRequired ) :

                //print_r($slSkillRequired);

                wp_set_post_terms( $pid, $slSkillRequired, PROPOSAL_SKILLS_TAXONOMY);

            endif;

            if ( $slKindOfOffer ) :

                //print_r($slKindOfOffer);
                
                $kindOfOffer = $slKindOfOffer[0];

                update_post_meta($pid, _FIELD_PROPOSAL_KIND_OF_OFFER, $kindOfOffer);

            endif;

            if ( $current_proposal_attachments ) :

                //print_r($current_proposal_attachments);

                update_profile_attachment_field($pid, _FIELD_PROPOSAL_UPLOAD_FILES, $current_proposal_attachments);

            endif;

            if ( $date_booking1 ) :

                update_post_meta($pid, _FIELD_PROPOSAL_USER_BOOKING, $date_booking1);

            endif;

            update_post_meta($pid, _FIELD_PROPOSAL_USER_RECEIVE, $txtUserReceive);

            return 'success';

        }

    }