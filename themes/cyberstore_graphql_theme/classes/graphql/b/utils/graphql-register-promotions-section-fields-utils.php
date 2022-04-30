<?php 

    namespace WP_GraphQL;

    use \PromotionsSection\PromotionsGetHtmlUtils;

    class GraphQLRegisterPromotionsSectionFieldsUtils {

        public static function register() {

            $field_name = 'getPromotionsSectionOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode([
                    "id" => "promotion-couple",
                    "html" => PromotionsGetHtmlUtils::get()
                ]);

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }