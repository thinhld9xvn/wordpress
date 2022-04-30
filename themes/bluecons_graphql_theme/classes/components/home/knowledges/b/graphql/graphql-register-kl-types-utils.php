<?php 
    namespace WP_GraphQL;
  use Home\HOME_FIELDS;
  use \Home\Knowledges\KL_FIELDS;
    class GraphQLRegisterKLTypesUtils {
        public static function register() {
          register_graphql_object_type( KL_FIELDS::KL_SCHEMA_TYPE, [
            'description' => __( KL_FIELDS::KL_SCHEMA_TYPE, 'gco' ),
            'fields' => [              
              KL_FIELDS::HEADING_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( KL_FIELDS::HEADING_GQL_FIELD, 'gco' ),
              ],
              KL_FIELDS::BUTTON_URL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( KL_FIELDS::BUTTON_URL_GQL_FIELD, 'gco' ),
              ],
              KL_FIELDS::BUTTON_TEXT_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( KL_FIELDS::BUTTON_TEXT_GQL_FIELD, 'gco' ),
              ],
              KL_FIELDS::DATA_GQL_FIELD => [
                'type' => ['list_of' =>  HOME_FIELDS::HOME_SPECIALS_ITEMS_GQL_FIELD], 
                'description' => __( KL_FIELDS::DATA_GQL_FIELD, 'gco' ),
              ],
            ]
            ]);
        }
    }