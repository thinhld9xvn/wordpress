<?php 

    namespace WP_GraphQL;

    use \Portfolio\PortfolioGetAllListsUtils;
  
    class GraphQLRegisterPortfolioListFieldsUtils {

        public static function register() {

            $field_name = 'getPortfolioListOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode(PortfolioGetAllListsUtils::get());

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }