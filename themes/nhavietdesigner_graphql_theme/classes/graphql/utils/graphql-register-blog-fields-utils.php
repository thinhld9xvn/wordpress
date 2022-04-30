<?php 

    namespace WP_GraphQL;

    use \Blog\BlogGetAllListsUtils;

    class GraphQLRegisterBlogFieldsUtils {

        public static function register() {

            $field_name = 'getNewsPageOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {    
                
                return json_encode(BlogGetAllListsUtils::get(NEWS_PID, NEWS_SLUG_CATEGORY));

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

            //

            $field_name = 'getRecruitPageOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {    
                
                return json_encode(BlogGetAllListsUtils::get(RECRUIT_PID ,RECRUIT_SLUG_CATEGORY));

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }