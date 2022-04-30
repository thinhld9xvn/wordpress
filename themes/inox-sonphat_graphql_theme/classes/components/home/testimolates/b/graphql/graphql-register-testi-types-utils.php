<?php 
    namespace WP_GraphQL;
    use Home\Testimolates\TESTIMOLATES_FIELDS;
    class GraphQLRegisterTestiTypesUtils {
        public static function register() {
          register_graphql_object_type( TESTIMOLATES_FIELDS::TESTIMOLATES_FIELDS_TYPE, [
            'description' => __( TESTIMOLATES_FIELDS::TESTIMOLATES_FIELDS_TYPE, 'gco' ),
            'fields' => [   
              TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_ID => [
                'type' => 'Int', 
                'description' => __( TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_ID, 'gco' ),
              ],           
              TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_TITLE => [
                'type' => 'String', 
                'description' => __( TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_TITLE, 'gco' ),
              ],
              TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_THUMBNAIL => [
                'type' => 'String', 
                'description' => __( TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_THUMBNAIL, 'gco' ),
              ]
            ]
          ]);
          register_graphql_object_type( TESTIMOLATES_FIELDS::TESTIMOLATES_SCHEMA_TYPE, [
            'description' => __( TESTIMOLATES_FIELDS::TESTIMOLATES_SCHEMA_TYPE, 'gco' ),
            'fields' => [   
              TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_HEADING => [
                'type' => 'String', 
                'description' => __( TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_HEADING, 'gco' ),
              ],    
              TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_CONTENTS => [
                'type' => 'String', 
                'description' => __( TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_CONTENTS, 'gco' ),
              ],    
              TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_BACKGROUND => [
                'type' => 'String', 
                'description' => __( TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_BACKGROUND, 'gco' ),
              ],
              TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_DATA => [
                'type' => ['list_of' => TESTIMOLATES_FIELDS::TESTIMOLATES_FIELDS_TYPE], 
                'description' => __( TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_DATA, 'gco' ),
              ],    
            ]
          ]);
        }
    }