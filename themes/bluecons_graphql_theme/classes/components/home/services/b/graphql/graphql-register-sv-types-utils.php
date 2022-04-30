<?php 
    namespace WP_GraphQL;
  use Home\HOME_FIELDS;
  use \Home\Services\SERVICES_FIELDS;
    class GraphQLRegisterSVTypesUtils {
        public static function register() {
          register_graphql_object_type( SERVICES_FIELDS::SV_SCHEMA_TYPE, [
            'description' => __( SERVICES_FIELDS::SV_SCHEMA_TYPE, 'gco' ),
            'fields' => [              
              SERVICES_FIELDS::HEADING_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( SERVICES_FIELDS::HEADING_GQL_FIELD, 'gco' ),
              ],
              SERVICES_FIELDS::HEADING_SMALL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( SERVICES_FIELDS::HEADING_SMALL_GQL_FIELD, 'gco' ),
              ],
              SERVICES_FIELDS::BUTTON_URL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( SERVICES_FIELDS::BUTTON_URL_GQL_FIELD, 'gco' ),
              ],
              SERVICES_FIELDS::BUTTON_TEXT_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( SERVICES_FIELDS::BUTTON_TEXT_GQL_FIELD, 'gco' ),
              ],
              SERVICES_FIELDS::DATA_GQL_FIELD => [
                'type' => ['list_of' =>  HOME_FIELDS::HOME_SPECIALS_ITEMS_GQL_FIELD], 
                'description' => __( SERVICES_FIELDS::DATA_GQL_FIELD, 'gco' ),
              ],
            ]
            ]);
        }
    }