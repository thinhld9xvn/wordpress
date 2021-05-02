<?php

    namespace Search;

    class SearchHasTermUtils {

        public static function has_by_formdata($form_data) {

            return $form_data['context'] === _FILTER_TERM_SEARCH;

        }

    }