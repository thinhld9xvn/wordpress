<?php 
    namespace WP_GraphQL;
  use Home\HOME_FIELDS;
  use \Home\Products\PRODUCTS_FIELDS;
    class GraphQLRegisterProductsTypesUtils {
        public static function register() {
          register_graphql_object_type( PRODUCTS_FIELDS::PRODUCTS_SCHEMA_TYPE, [
            'description' => __( PRODUCTS_FIELDS::PRODUCTS_SCHEMA_TYPE, 'gco' ),
            'fields' => [              
              PRODUCTS_FIELDS::HEADING_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::HEADING_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::BUTTON_URL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::BUTTON_URL_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::BUTTON_TEXT_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::BUTTON_TEXT_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::DATA_GQL_FIELD => [
                'type' => ['list_of' =>  HOME_FIELDS::HOME_SPECIALS_ITEMS_GQL_FIELD], 
                'description' => __( PRODUCTS_FIELDS::DATA_GQL_FIELD, 'gco' ),
              ],
            ]
            ]);
        }
    }