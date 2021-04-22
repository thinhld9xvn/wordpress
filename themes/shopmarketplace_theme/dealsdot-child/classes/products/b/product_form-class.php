<?php 

    namespace Products;

    class UC_Product_Form {

        private $options;

        function __construct($options) {

            $this->options = $options;

        }

        public function print_form() {

            $options = $this->options;

            ProductPrintAdminFormUtils::print($options);
            
        }

    }