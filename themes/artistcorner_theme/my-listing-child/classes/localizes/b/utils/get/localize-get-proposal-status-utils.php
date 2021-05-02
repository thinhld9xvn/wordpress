<?php 

    namespace Localizes;

    class LocalizeGetProposalStatusUtils {

        public static function get() {

            return array(
                'status' => array(
                    'pending' => Proposal::PROPOSAL_PENDING,
                    'approved' => Proposal::PROPOSAL_APPROVED,
                    'rejected' => Proposal::PROPOSAL_REJECTED,
                    'expired' => Proposal::PROPOSAL_EXPIRED,
                )
            );

        }

    }