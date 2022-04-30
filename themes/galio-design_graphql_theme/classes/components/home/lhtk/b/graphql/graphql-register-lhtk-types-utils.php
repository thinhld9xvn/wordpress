<?php 

    namespace WP_GraphQL;

    use \Home\LHTK\LHTK_FIELDS;

    class GraphQLRegisterLHTKTypesUtils {

        public static function register() {

          register_graphql_object_type( LHTK_FIELDS::LHTK_SCHEMA_TYPE, [
            'description' => __( 'LHTK section', 'gco' ),
            'fields' => [              
              LHTK_FIELDS::HEADING_FIELD => [
                'type' => 'String', 
                'description' => __( LHTK_FIELDS::HEADING_FIELD, 'gco' ),
              ],
              LHTK_FIELDS::CONTENTS_FIELD => [
                'type' => 'String', 
                'description' => __( LHTK_FIELDS::CONTENTS_FIELD, 'gco' ),
              ],
              LHTK_FIELDS::BUTTON_TEXT_FIELD => [
                'type' => 'String', 
                'description' => __( LHTK_FIELDS::BUTTON_TEXT_FIELD, 'gco' ),
              ],
              LHTK_FIELDS::BUTTON_URL_FIELD => [
                'type' => 'String', 
                'description' => __( LHTK_FIELDS::BUTTON_URL_FIELD, 'gco' ),
              ],
              LHTK_FIELDS::BACKGROUND_FIELD => [
                'type' => 'String', 
                'description' => __( LHTK_FIELDS::BACKGROUND_FIELD, 'gco' ),
              ],
            ]
            ]);

        }

    }