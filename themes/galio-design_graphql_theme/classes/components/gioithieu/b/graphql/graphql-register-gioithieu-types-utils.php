<?php 

    namespace WP_GraphQL;

    use \GioiThieuPage\GIOITHIEU_FIELDS;

    class GraphQLRegisterGioiThieuTypesUtils {

        public static function register() {

          // slider schema
          register_graphql_object_type( GIOITHIEU_FIELDS::SLIDER_SCHEMA_TYPE, [
            'description' => __( 'Slider', 'gco' ),
            'fields' => [              
                GIOITHIEU_FIELDS::THUMBNAIL_FIELD => [
                  'type' => 'String', 
                  'description' => __( GIOITHIEU_FIELDS::THUMBNAIL_FIELD, 'gco' ),
                ]
              ]
            ]);

            // strength list items schema
          register_graphql_object_type( GIOITHIEU_FIELDS::STRENGTH_SCHEMA_LIST_ITEMS_FIELD, [
            'description' => __( 'Strength list items', 'gco' ),
            'fields' => [              
              GIOITHIEU_FIELDS::TITLE_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::TITLE_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::CONTENTS_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::CONTENTS_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::ICON_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::ICON_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::NO_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::NO_FIELD, 'gco' ),
              ]
            ]
            ]);

            // user list items schema
          register_graphql_object_type( GIOITHIEU_FIELDS::USERS_SCHEMA_LIST_ITEMS_FIELD, [
            'description' => __( 'user list items', 'gco' ),
            'fields' => [              
              GIOITHIEU_FIELDS::NAME_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::NAME_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::AVATAR_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::AVATAR_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::PROFESSOR_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::PROFESSOR_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::TYPE_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::TYPE_FIELD, 'gco' ),
              ]
            ]
            ]);

            // duration working schema
          register_graphql_object_type( GIOITHIEU_FIELDS::DURATION_WORKING_SCHEMA_FIELD, [
            'description' => __( 'duration working schema', 'gco' ),
            'fields' => [              
              GIOITHIEU_FIELDS::TITLE_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::TITLE_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::ICON_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::ICON_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::CONTENTS_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::CONTENTS_FIELD, 'gco' ),
              ]
            ]
            ]);

          register_graphql_object_type( GIOITHIEU_FIELDS::GIOITHIEU_SCHEMA_TYPE, [
            'description' => __( 'Gioithieu', 'gco' ),
            'fields' => [              
              GIOITHIEU_FIELDS::HEADING_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::HEADING_GQL_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::INTRODUCTION_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::INTRODUCTION_GQL_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::SLIDER_GQL_FIELD => [
                'type' => ['list_of' => GIOITHIEU_FIELDS::SLIDER_SCHEMA_TYPE], 
                'description' => __( GIOITHIEU_FIELDS::SLIDER_GQL_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::STRENGTH_HEADING_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::STRENGTH_HEADING_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::STRENGTH_DESC_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::STRENGTH_DESC_GQL_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::STRENGTH_LISTS_GQL_FIELD => [
                'type' => ['list_of' => GIOITHIEU_FIELDS::STRENGTH_SCHEMA_LIST_ITEMS_FIELD], 
                'description' => __( GIOITHIEU_FIELDS::STRENGTH_LISTS_GQL_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::USER_LISTS_GQL_FIELD => [
                'type' => ['list_of' => GIOITHIEU_FIELDS::USERS_SCHEMA_LIST_ITEMS_FIELD],
                'description' => __( GIOITHIEU_FIELDS::USER_LISTS_GQL_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::PRICE_HEADING_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::PRICE_HEADING_GQL_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::PRICE_CONTENTS_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::PRICE_CONTENTS_GQL_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::PRICE_BUTTON_TEXT_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::PRICE_BUTTON_TEXT_GQL_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::PRICE_BUTTON_URL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::PRICE_BUTTON_URL_GQL_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::PRICE_THUMBNAIL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::PRICE_THUMBNAIL_GQL_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::DURATION_WORKING_GQL_HEADING_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::DURATION_WORKING_GQL_HEADING_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::DURATION_WORKING_GQL_DESC_FIELD => [
                'type' => 'String', 
                'description' => __( GIOITHIEU_FIELDS::DURATION_WORKING_GQL_DESC_FIELD, 'gco' ),
              ],
              GIOITHIEU_FIELDS::DURATION_WORKING_GQL_LIST_ITEMS_FIELD => [
                'type' => ['list_of' => GIOITHIEU_FIELDS::DURATION_WORKING_SCHEMA_FIELD], 
                'description' => __( GIOITHIEU_FIELDS::DURATION_WORKING_GQL_LIST_ITEMS_FIELD, 'gco' ),
              ],
            ]
            ]);

        }

    }