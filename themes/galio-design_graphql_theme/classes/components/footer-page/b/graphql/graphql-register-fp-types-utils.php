<?php 

    namespace WP_GraphQL;

    use \FooterPage\FP_FIELDS;

    class GraphQLRegisterFPTypesUtils {

        public static function register() {

          register_graphql_object_type( FP_FIELDS::FP_SCHEMA_TYPE, [
            'description' => __( 'Gioithieu', 'gco' ),
            'fields' => [              
              FP_FIELDS::HEADING_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( FP_FIELDS::HEADING_GQL_FIELD, 'gco' )
              ],
              FP_FIELDS::CONTENTS_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( FP_FIELDS::CONTENTS_GQL_FIELD, 'gco' )
              ],
              FP_FIELDS::BUTTON_TEXT_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( FP_FIELDS::BUTTON_TEXT_GQL_FIELD, 'gco' )
              ],
              FP_FIELDS::BUTTON_URL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( FP_FIELDS::BUTTON_URL_GQL_FIELD, 'gco' )
              ]
            ]
          ]);

        }

    }