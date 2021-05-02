<?php 
    namespace Proposals;

    class ProposalGetSkillsRequiredUtils {

        public static function get() {

            $args = array(
                'taxonomy' => PROPOSAL_SKILLS_TAXONOMY,
                'hide_empty' => false
            );

            return get_terms($args);

        }

    }