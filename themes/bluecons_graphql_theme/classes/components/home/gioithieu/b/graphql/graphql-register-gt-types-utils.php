<?php 
    namespace WP_GraphQL;
    use \Home\GioiThieu\GIOITHIEU_FIELDS;
    class GraphQLRegisterGTTypesUtils {
        public static function register() {
          register_graphql_object_type( GIOITHIEU_FIELDS::GT_SCHEMA_TYPE, [
            'description' => __( GIOITHIEU_FIELDS::GT_SCHEMA_TYPE, 'gco' ),
            'fields' => [              
              GIOITHIEU_FIELDS::HEADING_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::HEADING_GQL_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::CONTENTS_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::CONTENTS_GQL_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::BUTTON_TEXT_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::BUTTON_TEXT_GQL_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::BUTTON_URL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::BUTTON_URL_GQL_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::BACKGROUND_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::BACKGROUND_GQL_FIELD, 'gco' ),
              ],
            ]
            ]);
        }
    }