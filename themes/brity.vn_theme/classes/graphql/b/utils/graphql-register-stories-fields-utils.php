<?php 

    namespace WP_GraphQL;

    class GraphQLRegisterStoriesFieldsUtils {

        public static function register() {

            $field_name = 'getStoriesPostTypeOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {

                return json_encode([

                    "label" => \Stories\StoriesGetLabelUtils::get(),
                    "heading" => \Stories\StoriesGetHeadingUtils::get(),
                    "description" => \Stories\StoriesGetDescriptionUtils::get(),

                ]);

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }