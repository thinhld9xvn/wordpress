<?php 

    namespace Actions\Enqueues;

    class EnqueueAdminLocalizeDtLabelsUtils {

        public static function render() {

            $fields_id = array(

                'SEARCH_LABEL_ID' => \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_LABEL_ID,
                'NEXT_LABEL_ID' => \Theme_Options\THEME_OPTIONS_FIELDS::NEXT_LABEL_ID,
                'PREVIOUS_LABEL_ID' => \Theme_Options\THEME_OPTIONS_FIELDS::PREVIOUS_LABEL_ID,
                'SHOWING_LABEL_ID' => \Theme_Options\THEME_OPTIONS_FIELDS::SHOWING_LABEL_ID,
                'TO_LABEL_ID' => \Theme_Options\THEME_OPTIONS_FIELDS::TO_LABEL_ID,
                'OF_LABEL_ID' => \Theme_Options\THEME_OPTIONS_FIELDS::OF_LABEL_ID,
                'ENTRIES_LABEL_ID' => \Theme_Options\THEME_OPTIONS_FIELDS::ENTRIES_LABEL_ID,
                'EMPTY_DT_MSG_ID' => \Theme_Options\THEME_OPTIONS_FIELDS::EMPTY_DT_MSG_ID,
                
            );        
        
            wp_localize_script( 'jquery', 'THEME_OPTIONS_FIELDS', $fields_id );

        }

    }