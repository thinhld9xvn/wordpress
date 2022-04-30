<?php 
    namespace WP_GraphQL;
  use Home\Clients\CLIENTS_FIELDS;
  class GraphQLRegisterClientsTypesUtils {
        public static function register() {
          register_graphql_object_type( CLIENTS_FIELDS::CLIENTS_SCHEMA_TYPE, [
            'description' => __( CLIENTS_FIELDS::CLIENTS_SCHEMA_TYPE, 'gco' ),
            'fields' => [              
              CLIENTS_FIELDS::ID_FIELD => [
                'type' => 'Int', 
                'description' => __( CLIENTS_FIELDS::ID_FIELD, 'gco' ),
              ],
              CLIENTS_FIELDS::TITLE_FIELD => [
                'type' => 'String', 
                'description' => __( CLIENTS_FIELDS::TITLE_FIELD, 'gco' ),
              ],
              CLIENTS_FIELDS::THUMBNAIL_FIELD => [
                'type' => 'String', 
                'description' => __( CLIENTS_FIELDS::THUMBNAIL_FIELD, 'gco' ),
              ],
            ]
            ]);
        }
    }