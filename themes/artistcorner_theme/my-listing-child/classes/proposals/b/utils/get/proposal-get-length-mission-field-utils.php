<?php 
    namespace Proposals;

    class ProposalGetBeginningMissionFieldUtils {

        public static function get($pid) {

            return get_post_meta($pid, _FIELD_PROPOSAL_LENGTH_MISSION, true);


        }

    }