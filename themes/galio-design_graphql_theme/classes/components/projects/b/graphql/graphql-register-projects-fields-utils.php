<?php 
    namespace WP_GraphQL;
    use \Projects\PROJECT_FIELDS;
    use \Projects\ProjectsGetAllItemUtils;
    class GraphQLRegisterProjectsFieldsUtils {
        public static function register() {
            $field_name = 'getProjectsList';
            $args = [
                'lang' => [
                    'type' => 'LanguageCodeEnum'
                ],
                'slug' => [
                    'type' => 'String'
                ],
                'keyword' => [
                    'type' => 'String'
                ]
            ];
            $resolve_callback = function($source, $args, $context, $info) {
                $lang = !empty($args['lang']) ? $args['lang'] : DEFAULT_LANG;
                $slug = !empty($args['slug']) ? $args['slug'] : '';
                $keyword = !empty($args['keyword']) ? $args['keyword'] : '';
                return ProjectsGetAllItemUtils::get($lang, $slug, $keyword);      
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, 
                                                    $resolve_callback, 
                                                        ['list_of' => PROJECT_FIELDS::PROJECT_SCHEMA_TYPES]);    
        }
    }