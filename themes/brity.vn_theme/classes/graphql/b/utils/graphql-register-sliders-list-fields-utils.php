<?php 

    namespace WP_GraphQL;

    use \Slider\SliderGetAllListsUtils;
  
    class GraphQLRegisterSlidersListFieldsUtils {

        public static function register() {

            $field_name = 'getSlidersListOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode(SliderGetAllListsUtils::get());

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }