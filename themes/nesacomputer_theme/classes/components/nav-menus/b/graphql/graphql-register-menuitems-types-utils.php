<?php 
    namespace WP_GraphQL;
    use \Nav_Menus\NAVMENUS_FIELDS;
    class GraphQLRegisterMenuItemsTypesUtils {
        public static function register() {
          register_graphql_object_type( NAVMENUS_FIELDS::NAVMENUS_SCHEMA_TYPES, [
            'description' => __( NAVMENUS_FIELDS::NAVMENUS_SCHEMA_TYPES, 'gco' ),
            'fields' => [
              NAVMENUS_FIELDS::ID_GQL_FIELD => [
                'type' => 'Int', 
                'description' => __( NAVMENUS_FIELDS::ID_GQL_FIELD, 'gco' ),
              ],
              NAVMENUS_FIELDS::TEXT_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( NAVMENUS_FIELDS::TEXT_GQL_FIELD, 'gco' ),
              ],
              NAVMENUS_FIELDS::TYPE_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( NAVMENUS_FIELDS::TYPE_GQL_FIELD, 'gco' ),
              ],
              NAVMENUS_FIELDS::URL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( NAVMENUS_FIELDS::URL_GQL_FIELD, 'gco' ),
              ],
              NAVMENUS_FIELDS::CHILDRENS_GQL_FIELD => [
                'type' => ['list_of' => NAVMENUS_FIELDS::NAVMENUS_SCHEMA_TYPES], 
                'description' => __( NAVMENUS_FIELDS::NAVMENUS_SCHEMA_TYPES, 'gco' ),
              ],
              NAVMENUS_FIELDS::MEGA_GQL_FIELD => [
                'type' => 'Boolean', 
                'description' => __( NAVMENUS_FIELDS::MEGA_GQL_FIELD, 'gco' ),
              ],
              NAVMENUS_FIELDS::ORDER_GQL_FIELD => [
                'type' => 'Int', 
                'description' => __( NAVMENUS_FIELDS::ORDER_GQL_FIELD, 'gco' ),
              ],
              NAVMENUS_FIELDS::BACKGROUND_COLOR_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( NAVMENUS_FIELDS::BACKGROUND_COLOR_GQL_FIELD, 'gco' ),
              ],
              NAVMENUS_FIELDS::BORDER_WIDTH_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( NAVMENUS_FIELDS::BORDER_WIDTH_GQL_FIELD, 'gco' ),
              ],
              NAVMENUS_FIELDS::BORDER_COLOR_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( NAVMENUS_FIELDS::BORDER_COLOR_GQL_FIELD, 'gco' ),
              ],
            ]
          ]);
        }
    }