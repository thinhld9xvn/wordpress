<?php 
    namespace WP_GraphQL;
    use \Logo\LOGO_FIELDS;
    class GraphQLRegisterLogoTypesUtils {
        public static function register() {
          register_graphql_object_type( LOGO_FIELDS::LOGO_SRC_SCHEMA_TYPE, [
            'description' => __( LOGO_FIELDS::LOGO_SRC_SCHEMA_TYPE, 'gco' ),
            'fields' => [              
              LOGO_FIELDS::LOGO_URL => [
                'type' => 'String', 
                'description' => __( LOGO_FIELDS::LOGO_URL, 'gco' ),
              ],
            ]
          ]);
          register_graphql_object_type( LOGO_FIELDS::LOGO_SCHEMA_TYPE, [
            'description' => __( LOGO_FIELDS::LOGO_SCHEMA_TYPE, 'gco' ),
            'fields' => [              
              LOGO_FIELDS::LOGO_SRC => [
                'type' => ['list_of' => LOGO_FIELDS::LOGO_SRC_SCHEMA_TYPE], 
                'description' => __( LOGO_FIELDS::LOGO_SRC, 'gco' ),
              ],
              LOGO_FIELDS::LOGO_ALT => [
                'type' => 'String', 
                'description' => __( LOGO_FIELDS::LOGO_ALT, 'gco' ),
              ],
              LOGO_FIELDS::LOGO_URL => [
                'type' => 'String', 
                'description' => __( LOGO_FIELDS::LOGO_URL, 'gco' ),
              ],
            ]
          ]);
        }
    }