<?php 
    namespace Proposals;

    class ProposalGetProjectDescriptionFieldUtils {

        public static function get($pid) {

            return get_post_meta($pid, _FIELD_PROPOSAL_PROJECT_DESCRIPTION, true);


        }

    }