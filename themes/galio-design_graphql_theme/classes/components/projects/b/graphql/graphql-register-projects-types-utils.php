<?php 

    namespace WP_GraphQL;

    use \Projects\PROJECT_FIELDS;
    use \Taxonomies\TAXONOMIES_FIELDS;

    class GraphQLRegisterProjectsTypesUtils {

        public static function register() {

          register_graphql_object_type( PROJECT_FIELDS::GALLERIES_SCHEMA_TYPES, [
            'description' => __( PROJECT_FIELDS::GALLERIES_SCHEMA_TYPES, 'gco' ),
            'fields' => [
              PROJECT_FIELDS::THUMBNAIL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PROJECT_FIELDS::THUMBNAIL_GQL_FIELD, 'gco' ),
              ],
              PROJECT_FIELDS::FULL_IMAGE_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PROJECT_FIELDS::FULL_IMAGE_GQL_FIELD, 'gco' ),
              ],
            ]
          ]);

          register_graphql_object_type( PROJECT_FIELDS::GALLERIES_SCHEMA_ROW_TYPES, [
            'description' => __( PROJECT_FIELDS::GALLERIES_SCHEMA_ROW_TYPES, 'gco' ),
            'fields' => [
              PROJECT_FIELDS::DATA_GQL_FIELD => [
                'type' => ['list_of' => PROJECT_FIELDS::GALLERIES_SCHEMA_TYPES], 
                'description' => __( PROJECT_FIELDS::DATA_GQL_FIELD, 'gco' ),
              ],
            ]
          ]);

          register_graphql_object_type( PROJECT_FIELDS::PROJECT_SCHEMA_TYPES, [
            'description' => __( PROJECT_FIELDS::PROJECT_SCHEMA_TYPES, 'gco' ),
            'fields' => [
              PROJECT_FIELDS::ID_GQL_FIELD => [
                'type' => 'Int', 
                'description' => __( PROJECT_FIELDS::ID_GQL_FIELD, 'gco' ),
              ],
              PROJECT_FIELDS::TITLE_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PROJECT_FIELDS::TITLE_GQL_FIELD, 'gco' ),
              ],
              PROJECT_FIELDS::URL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PROJECT_FIELDS::URL_GQL_FIELD, 'gco' ),
              ],
              PROJECT_FIELDS::THUMBNAIL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PROJECT_FIELDS::THUMBNAIL_GQL_FIELD, 'gco' ),
              ],
              PROJECT_FIELDS::BANNER_DESCRIPTION_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PROJECT_FIELDS::BANNER_DESCRIPTION_GQL_FIELD, 'gco' ),
              ],
              PROJECT_FIELDS::HEADING_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PROJECT_FIELDS::HEADING_GQL_FIELD, 'gco' ),
              ],
              PROJECT_FIELDS::DESCRIPTION_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PROJECT_FIELDS::DESCRIPTION_GQL_FIELD, 'gco' ),
              ],
              PROJECT_FIELDS::LOCATION_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PROJECT_FIELDS::LOCATION_GQL_FIELD, 'gco' ),
              ],
              PROJECT_FIELDS::DENTISION_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PROJECT_FIELDS::DENTISION_GQL_FIELD, 'gco' ),
              ],
              PROJECT_FIELDS::TIME_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PROJECT_FIELDS::TIME_GQL_FIELD, 'gco' ),
              ],
              PROJECT_FIELDS::TEAM_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PROJECT_FIELDS::TEAM_GQL_FIELD, 'gco' ),
              ],
              PROJECT_FIELDS::GALLERIES_GQL_FIELD => [
                'type' => ['list_of' => PROJECT_FIELDS::GALLERIES_SCHEMA_ROW_TYPES], 
                'description' => __( PROJECT_FIELDS::GALLERIES_GQL_FIELD, 'gco' ),
              ],
              PROJECT_FIELDS::POLYLANG_POST_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PROJECT_FIELDS::POLYLANG_POST_GQL_FIELD, 'gco' ),
              ],
              PROJECT_FIELDS::CATEGORIES_GQL_FIELD => [
                'type' => ['list_of' => TAXONOMIES_FIELDS::TAX_ENTRY_SCHEMA_TYPES], 
                'description' => __( PROJECT_FIELDS::CATEGORIES_GQL_FIELD, 'gco' ),
              ],
            ]
            ]);
        }

    }