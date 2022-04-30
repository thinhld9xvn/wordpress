<?php 

    namespace WP_GraphQL;

    use \Video\VIDEO_FIELDS;
    use Taxonomies\TAXONOMIES_FIELDS;

    class GraphQLRegisterVideoTypesUtils {

        public static function register() {

          register_graphql_object_type( VIDEO_FIELDS::VIDEO_SCHEMA_TYPES, [
            'description' => __( VIDEO_FIELDS::VIDEO_SCHEMA_TYPES, 'gco' ),
            'fields' => [
              VIDEO_FIELDS::ID_GQL_FIELD => [
                'type' => 'Int', 
                'description' => __( VIDEO_FIELDS::ID_GQL_FIELD, 'gco' ),
              ],
              VIDEO_FIELDS::TITLE_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( VIDEO_FIELDS::TITLE_GQL_FIELD, 'gco' ),
              ],
              VIDEO_FIELDS::THUMBNAIL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( VIDEO_FIELDS::THUMBNAIL_GQL_FIELD, 'gco' ),
              ],
              VIDEO_FIELDS::VIDEO_YT_ID_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( VIDEO_FIELDS::VIDEO_YT_ID_GQL_FIELD, 'gco' ),
              ],
              VIDEO_FIELDS::CATEGORIES_GQL_FIELD => [
                'type' => ['list_of' => TAXONOMIES_FIELDS::TAX_ENTRY_SCHEMA_TYPES], 
                'description' => __( VIDEO_FIELDS::CATEGORIES_GQL_FIELD, 'gco' ),
              ],
            ]
          ]);
        }

    }