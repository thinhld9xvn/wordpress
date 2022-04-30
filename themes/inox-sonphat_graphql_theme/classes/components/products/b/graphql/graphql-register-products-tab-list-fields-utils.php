<?php 
    namespace WP_GraphQL;
    use Products\PRODUCTS_FIELDS;
    use \Products\ProductsGetAllListsUtils;
    class GraphQLRegisterProductsTabListsFieldsUtils {
        public static function register() {
            $field_name = 'getProductsTabLists';
            $args = [
                'lang' => [
                    'type' => 'LanguageCodeEnum'
                ],
                'limit' => [
                    'type' => 'Int'
                ],
                'tabs' => [
                    'type' => 'Int'
                ]
            ];
            $resolve_callback = function($source, $args, $context, $info) {  
                $params = [
                    'lang' => !empty($args['lang']) ? $args['lang'] : DEFAULT_LANG,
                    'limit' => !empty($args['limit']) ? intval($args['limit']) : 8,
                    'tabs' => !empty($args['tabs']) ? intval($args['tabs']) : 3,
                    'show_featured_box' => true,
                ];
                return ProductsGetAllListsUtils::get($params);
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, ['list_of' => PRODUCTS_FIELDS::PRODUCTS_TAB_SCHEMA_TYPES]);    
        }
    }