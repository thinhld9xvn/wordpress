<?php 
    namespace WP_GraphQL;
    use \Home\HOME_FIELDS;
    use Taxonomies\TAXONOMIES_FIELDS;
    class GraphQLRegisterHomeTypesUtils {
        public static function register() {
          register_graphql_object_type( HOME_FIELDS::HOME_SPECIALS_ITEMS_GQL_FIELD, [
            'description' => __( HOME_FIELDS::HOME_SPECIALS_ITEMS_GQL_FIELD, 'gco' ),
            'fields' => [
              HOME_FIELDS::ID_GQL_FIELD => [
                'type' => 'Int', 
                'description' => __( HOME_FIELDS::ID_GQL_FIELD, 'gco' ),
              ],
              HOME_FIELDS::TITLE_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( HOME_FIELDS::TITLE_GQL_FIELD, 'gco' ),
              ],
              HOME_FIELDS::THUMBNAIL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( HOME_FIELDS::THUMBNAIL_GQL_FIELD, 'gco' ),
              ],
              HOME_FIELDS::URL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( HOME_FIELDS::URL_GQL_FIELD, 'gco' ),
              ],
              HOME_FIELDS::DATE_CREATED_GQL_FIELD => [
                'type' => ['list_of' => HOME_FIELDS::POST_DATECREATED_SCHEMA_TYPES], 
                'description' => __( HOME_FIELDS::DATE_CREATED_GQL_FIELD, 'gco' ),
              ],
              HOME_FIELDS::CATEGORIES_GQL_FIELD => [
                'type' => ['list_of' => TAXONOMIES_FIELDS::TAX_ENTRY_SCHEMA_TYPES], 
                'description' => __( HOME_FIELDS::CATEGORIES_GQL_FIELD, 'gco' ),
              ],
            ]
          ]);
        }
    }