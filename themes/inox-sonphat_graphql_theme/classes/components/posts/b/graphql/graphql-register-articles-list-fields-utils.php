<?php 
    namespace WP_GraphQL;
    use Posts\POST_FIELDS;
    class GraphQLRegisterArticlesListFieldsUtils {
        public static function register() {
            $field_name = 'getArticlesList';
            $args = [
                'lang' => [
                    'type' => 'LanguageCodeEnum'
                ],
                'limit' => [
                    'type' => 'Int'
                ],
                'slug' => [
                    'type' => 'String'
                ],
                'related' => [
                    'type' => 'Boolean'
                ]
            ];
            $resolve_callback = function($source, $args, $context, $info) {    
                $lang = !empty($args['lang']) ? $args['lang'] : DEFAULT_LANG;
                $limit = !empty($args['limit']) ? intval($args['limit']) : -1;
                $slug = !empty($args['slug']) ? $args['slug'] : '';
                $related = $args['related'];
                return \Posts\PostsGetAllListsUtils::get($lang, $limit, $slug, $related);
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, ['list_of' => POST_FIELDS::POST_SCHEMA_TYPES]);    
        }
    }