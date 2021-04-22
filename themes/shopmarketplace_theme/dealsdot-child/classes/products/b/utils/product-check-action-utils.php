<?php 

    namespace Products;

    class ProductCheckActionUtils {

        public static function has($action_name, $options) {

            return $options[\Products\PRODUCT_OPTIONS_FIELDS::FORM_ACTION] === $action_name;

        }

    }