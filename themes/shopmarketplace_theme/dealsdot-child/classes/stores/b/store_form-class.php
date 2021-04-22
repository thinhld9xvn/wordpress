<?php

    namespace Stores;

    class UC_Store_Form {

        private $options;

        function __construct($options) {

            $this->options = $options;

        }

        public function print_form() {

            $options = $this->options;

            StorePrintAdminFormUtils::print($options);           

         }

         public function print_form_fields() {

            $options = $this->options;

            StorePrintAdminHtmlFieldsUtils::print($options);           

         }

    }