<?php 
    namespace WP_GraphQL;
use WoocommercesUtils\WOO_FIELDS;
use WoocommercesUtils\WooGetBacsAccountInfoUtils;
class GraphQLRegisterWooPaymentsFieldsUtils {
        public static function register() {
            $field_name = 'getWooBacsPayment';
            $args = [];
            $resolve_callback = function($source, $args, $context, $info) {
                return WooGetBacsAccountInfoUtils::get();
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, 
                                                    $resolve_callback, ['list_of' => WOO_FIELDS::WOO_PAYMENT_SCHEMA_TYPES]);    
        }
    }