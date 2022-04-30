<?php 
    namespace WP_GraphQL;
  use Home\Clients\CLIENTS_FIELDS;
  class GraphQLRegisterClientsTypesUtils {
        public static function register() {
          register_graphql_object_type( CLIENTS_FIELDS::CLIENTS_ITEM_SCHEMA_TYPE, [
            'description' => __( CLIENTS_FIELDS::CLIENTS_ITEM_SCHEMA_TYPE, 'gco' ),
            'fields' => [              
              CLIENTS_FIELDS::ID_GQL_FIELD => [
                'type' => 'Int', 
                'description' => __( CLIENTS_FIELDS::ID_GQL_FIELD, 'gco' ),
              ],
              CLIENTS_FIELDS::TITLE_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( CLIENTS_FIELDS::TITLE_GQL_FIELD, 'gco' ),
              ],
              CLIENTS_FIELDS::THUMBNAIL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( CLIENTS_FIELDS::THUMBNAIL_GQL_FIELD, 'gco' ),
              ]
            ]
          ]);
          register_graphql_object_type( CLIENTS_FIELDS::CLIENTS_SCHEMA_TYPE, [
            'description' => __( CLIENTS_FIELDS::CLIENTS_SCHEMA_TYPE, 'gco' ),
            'fields' => [              
              CLIENTS_FIELDS::HEADING_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( CLIENTS_FIELDS::HEADING_GQL_FIELD, 'gco' ),
              ],
              CLIENTS_FIELDS::DATA_GQL_FIELD => [
                'type' => ['list_of' => CLIENTS_FIELDS::CLIENTS_ITEM_SCHEMA_TYPE], 
                'description' => __( CLIENTS_FIELDS::DATA_GQL_FIELD, 'gco' ),
              ]
            ]
          ]);
        }
    }