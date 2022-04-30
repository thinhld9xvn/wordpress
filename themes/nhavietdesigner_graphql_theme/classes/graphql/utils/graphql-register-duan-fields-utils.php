<?php 

    namespace WP_GraphQL;

    use DUANPAGE\DUGetAllListsUtils;
    use DUANPAGE\DUGetOptionPageFieldUtils;

    class GraphQLRegisterDuAnPageFieldsUtils {

        public static function register() {

            $field_name = 'getDuAnPageOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode(DUGetOptionPageFieldUtils::get());

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);   

            //
            
            $field_name = 'getDuAnTCListsOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode(DUGetAllListsUtils::get(PROJECT_POST_TYPE));

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);   

            //
            
            $field_name = 'getDuAnTKListsOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode(DUGetAllListsUtils::get(DESIGN_POST_TYPE));

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);   

        }

    }