<?php 
    namespace Proposals;

    class ProposalGetMissionLocationFieldUtils {

        public static function get($pid) {

            return get_post_meta($pid, _FIELD_PROPOSAL_MISSION_LOCATION, true);


        }

    }