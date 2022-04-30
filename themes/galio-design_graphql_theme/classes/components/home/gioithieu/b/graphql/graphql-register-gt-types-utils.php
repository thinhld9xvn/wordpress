<?php 

    namespace WP_GraphQL;

    use \Home\GioiThieu\GIOITHIEU_FIELDS;

    class GraphQLRegisterGTTypesUtils {

        public static function register() {

          register_graphql_object_type( GIOITHIEU_FIELDS::GT_SCHEMA_TYPE, [
            'description' => __( 'GT section', 'gco' ),
            'fields' => [              
              GIOITHIEU_FIELDS::HEADING_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::HEADING_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::CONTENTS_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::CONTENTS_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::BUTTON_TEXT_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::BUTTON_TEXT_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::BUTTON_URL_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::BUTTON_URL_FIELD, 'gco' ),
              ],
            ]
            ]);

        }

    }