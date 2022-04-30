<?php 

    namespace WP_GraphQL;

    use SP\SanPhamgetAllItemsListUtils;
    use SP\SPGetAllTermsListUtils;

    class GraphQLRegisterProductsFieldsUtils {

        public static function register() {

            $field_name = 'getProductsOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode(SanPhamgetAllItemsListUtils::get());

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);

            //

            $field_name = 'getProductsTermsOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode(SPGetAllTermsListUtils::get());

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);

        }

    }