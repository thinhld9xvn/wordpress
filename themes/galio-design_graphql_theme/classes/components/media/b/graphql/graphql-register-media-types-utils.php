<?php 

    namespace WP_GraphQL;

    use \Media\MEDIA_FIELDS;
    use Taxonomies\TAXONOMIES_FIELDS;

    class GraphQLRegisterMediaTypesUtils {

        public static function register() {

          register_graphql_object_type( MEDIA_FIELDS::MEDIA_SCHEMA_TYPES, [
            'description' => __( MEDIA_FIELDS::MEDIA_SCHEMA_TYPES, 'gco' ),
            'fields' => [
              MEDIA_FIELDS::ID_GQL_FIELD => [
                'type' => 'Int', 
                'description' => __( MEDIA_FIELDS::ID_GQL_FIELD, 'gco' ),
              ],
              MEDIA_FIELDS::TITLE_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( MEDIA_FIELDS::TITLE_GQL_FIELD, 'gco' ),
              ],
              MEDIA_FIELDS::THUMBNAIL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( MEDIA_FIELDS::THUMBNAIL_GQL_FIELD, 'gco' ),
              ],
              MEDIA_FIELDS::CATEGORIES_GQL_FIELD => [
                'type' => ['list_of' => TAXONOMIES_FIELDS::TAX_ENTRY_SCHEMA_TYPES], 
                'description' => __( MEDIA_FIELDS::CATEGORIES_GQL_FIELD, 'gco' ),
              ],
            ]
          ]);
        }

    }