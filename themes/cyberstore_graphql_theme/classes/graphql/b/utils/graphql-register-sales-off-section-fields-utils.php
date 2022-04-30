<?php 

    namespace WP_GraphQL;

    use \SalesOffSection\SalesOffGetHeadingUtils;
    use \SalesOffSection\SalesOffGetSubHeadingUtils;
    use \SalesOffSection\SalesOffGetButtonTextUtils;
    use \SalesOffSection\SalesOffGetButtonUrlUtils;
    use \SalesOffSection\SalesOffGetBackgroundUtils;

    class GraphQLRegisterSalesOffSectionFieldsUtils {

        public static function register() {

            $field_name = 'getSalesOffSectionOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {
               
                return json_encode([
                   
                    "heading" => SalesOffGetHeadingUtils::get(),
                    "sub_heading" => SalesOffGetSubHeadingUtils::get(),
                    "background" => SalesOffGetBackgroundUtils::get(),
                    "button" => [
                        "text" => SalesOffGetButtonTextUtils::get(),
                        "url" => SalesOffGetButtonUrlUtils::get()
                    ]
                    
                ]);

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }