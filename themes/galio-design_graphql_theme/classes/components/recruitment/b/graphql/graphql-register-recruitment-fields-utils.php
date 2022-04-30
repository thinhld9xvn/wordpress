<?php 

    namespace WP_GraphQL;

use Recruitment\RECRUITMENT_FIELDS;
use \Recruitment\RecruitmentGetPageDataMetaUtils;

    class GraphQLRegisterRecruitmentFieldsUtils {

        public static function register() {

            $field_name = 'getRecruitmentMetaPage';

            $args = [
                'lang' => [
                    'type' => 'LanguageCodeEnum'
                ]
            ];

            $resolve_callback = function($source, $args, $context, $info) {
                
                $lang = !empty($args['lang']) ? $args['lang'] : DEFAULT_LANG;

                return RecruitmentGetPageDataMetaUtils::get($lang);                

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, 
                                                    $resolve_callback, 
                                                        RECRUITMENT_FIELDS::RECRUITMENT_SCHEMA_TYPES);    

        }

    }