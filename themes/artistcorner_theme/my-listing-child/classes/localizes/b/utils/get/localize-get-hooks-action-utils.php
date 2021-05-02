<?php 

    namespace Localizes;

    class LocalizeGetHooksActionUtils {

        public static function get() {

            return array(
                'actions' => array(
                    '_AJAX_GET_JOBS_LISTING_ACTION' => _AJAX_GET_JOBS_LISTING_ACTION,
                    '_AJAX_SAVE_PROFILE_ACTION' => _AJAX_SAVE_PROFILE_ACTION,
                    '_AJAX_GET_USERS_LIST_ACTION' => _AJAX_GET_USERS_LIST_ACTION,
                    '_AJAX_PUBLISH_PROPOSAL_ACTION' => _AJAX_PUBLISH_PROPOSAL_ACTION,
                    '_AJAX_SET_STATUS_PROPOSAL_ACTION' => _AJAX_SET_STATUS_PROPOSAL_ACTION,
                    '_AJAX_SUBMITTING_COMMENT_ACTION' => _AJAX_SUBMITTING_COMMENT_ACTION,
                    '_AJAX_UPDATE_COMMENT_ACTION' => _AJAX_UPDATE_COMMENT_ACTION,
                    '_AJAX_SAVE_PASSWORD_ACTION' => _AJAX_SAVE_PASSWORD_ACTION,
                    '_AJAX_CHANGE_ACCOUNT_AVATAR_ACTION' => _AJAX_CHANGE_ACCOUNT_AVATAR_ACTION,
                    '_AJAX_AGORA_CALL_VIDEO_ACTION' => _AJAX_AGORA_CALL_VIDEO_ACTION,
                    '_AJAX_SAVE_EVENTS_LIST_ACTION' => _AJAX_SAVE_EVENTS_LIST_ACTION
                )
            );

        }

    }