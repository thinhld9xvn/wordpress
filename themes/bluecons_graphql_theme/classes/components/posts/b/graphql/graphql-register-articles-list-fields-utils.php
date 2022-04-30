<?php 
    namespace WP_GraphQL;
    use Posts\POST_FIELDS;
    class GraphQLRegisterArticlesListFieldsUtils {
        public static function register() {
            $field_name = 'getArticlesList';
            $args = [
                'post_type' => [
                    'type' => 'String'
                ],  
                'tax' => [
                    'type' => 'String'
                ],  
                'term' => [
                    'type' => 'String'
                ],  
                'limit' => [
                    'type' => 'Int'
                ],
                'slug' => [
                    'type' => 'String'
                ],
                's' => [
                    'type' => 'String'
                ],
                'related' => [
                    'type' => 'Boolean'
                ]
            ];
            $resolve_callback = function($source, $args, $context, $info) {   
                $post_type = !empty($args['post_type']) ? $args['post_type'] : 'post';
                $tax = !empty($args['tax']) ? $args['tax'] : null;
                $term = !empty($args['term']) ? $args['term'] : null;
                $limit = !empty($args['limit']) ? intval($args['limit']) : -1;
                $slug = !empty($args['slug']) ? $args['slug'] : '';
                $s = !empty($args['s']) ? $args['s'] : '';
                $related = $args['related'];
                return \Posts\PostsGetAllListsUtils::get($post_type, $tax, $term, $limit, $slug, $s, $related);
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, ['list_of' => POST_FIELDS::POST_SCHEMA_TYPES]);    
        }
    }