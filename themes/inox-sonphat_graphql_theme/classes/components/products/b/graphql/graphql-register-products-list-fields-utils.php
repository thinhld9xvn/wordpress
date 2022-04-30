<?php 
    namespace WP_GraphQL;
    use Products\PRODUCTS_FIELDS;
    use \Products\ProductsGetAllListsUtils;
    class GraphQLRegisterProductsListsFieldsUtils {
        public static function register() {
            $field_name = 'getProductsLists';
            $args = [
                'lang' => [
                    'type' => 'LanguageCodeEnum'
                ],
                'term_slug' => [
                    'type' => 'string'
                ],
                'slug' => [
                    'type' => 'string'
                ],
                'related' => [
                    'type' => 'Boolean'
                ],
                's' => [
                    'type' => 'String'
                ]
            ];
            $resolve_callback = function($source, $args, $context, $info) {  
                $params = [
                    'lang' => !empty($args['lang']) ? $args['lang'] : DEFAULT_LANG,
                    'term_slug' => !empty($args['term_slug']) ? $args['term_slug'] : null,
                    'slug' => !empty($args['slug']) ? $args['slug'] : null,
                    'related' => !empty($args['related']) ? $args['related'] : null,
                    's' => !empty($args['s']) ? $args['s'] : null,
                ];
                return ProductsGetAllListsUtils::get($params);
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, ['list_of' => PRODUCTS_FIELDS::PRODUCTS_SCHEMA_TYPES]);    
        }
    }