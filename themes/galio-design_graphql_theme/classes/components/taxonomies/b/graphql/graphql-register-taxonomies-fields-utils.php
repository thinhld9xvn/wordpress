<?php 

    namespace WP_GraphQL;

    use \Taxonomies\TAXONOMIES_FIELDS;
    use \Taxonomies\TaxGetAllCategoriesUtils;

    class GraphQLRegisterTaxonomiesFieldsUtils {

        public static function register() {

            $field_name = 'getTaxonomiesList';

            $args = [
                'tax' => [
                    'type' => 'String'
                ],
                'lang' => [
                    'type' => 'LanguageCodeEnum'
                ],
                'number' => [
                    'type' => 'Int'
                ]
            ];

            $resolve_callback = function($source, $args, $context, $info) {

                $tax = $args['tax'];
                $lang = !empty($args['lang']) ? $args['lang'] : DEFAULT_LANG;
                $number = !empty($args['number']) ? $args['number'] : '';

                return TaxGetAllCategoriesUtils::get($tax, $lang, $number);

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, 
                                                    $resolve_callback, 
                                                        ['list_of' => TAXONOMIES_FIELDS::TAX_SCHEMA_TYPES]);    

        }

    }