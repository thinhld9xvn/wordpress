<?php 

    namespace WP_GraphQL;

    use \Recruitment\RECRUITMENT_FIELDS;

    class GraphQLRegisterRecruitmentTypesUtils {

        public static function register() {

          register_graphql_object_type( RECRUITMENT_FIELDS::RECRUITMENT_ENTRY_SCHEMA_TYPES, [
            'description' => __( RECRUITMENT_FIELDS::RECRUITMENT_ENTRY_SCHEMA_TYPES, 'gco' ),
            'fields' => [
              RECRUITMENT_FIELDS::ID_GQL_FIELD => [
                'type' => 'Int', 
                'description' => __( RECRUITMENT_FIELDS::ID_GQL_FIELD, 'gco' ),
              ],
              RECRUITMENT_FIELDS::TITLE_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( RECRUITMENT_FIELDS::TITLE_GQL_FIELD, 'gco' ),
              ],
              RECRUITMENT_FIELDS::CONTENTS_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( RECRUITMENT_FIELDS::CONTENTS_GQL_FIELD, 'gco' ),
              ],
              RECRUITMENT_FIELDS::LOCATION_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( RECRUITMENT_FIELDS::LOCATION_GQL_FIELD, 'gco' ),
              ],
              RECRUITMENT_FIELDS::THUMBNAIL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( RECRUITMENT_FIELDS::THUMBNAIL_GQL_FIELD, 'gco' ),
              ],
            ]
          ]);

          register_graphql_object_type( RECRUITMENT_FIELDS::RECRUITMENT_SCHEMA_TYPES, [
            'description' => __( RECRUITMENT_FIELDS::RECRUITMENT_SCHEMA_TYPES, 'gco' ),
            'fields' => [
              RECRUITMENT_FIELDS::HEADING_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( RECRUITMENT_FIELDS::HEADING_GQL_FIELD, 'gco' ),
              ],
              RECRUITMENT_FIELDS::INTRODUCTION_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( RECRUITMENT_FIELDS::INTRODUCTION_GQL_FIELD, 'gco' ),
              ],
              RECRUITMENT_FIELDS::BUTTON_TEXT_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( RECRUITMENT_FIELDS::ID_GQL_FIELD, 'gco' ),
              ],
              RECRUITMENT_FIELDS::BUTTON_URL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( RECRUITMENT_FIELDS::ID_GQL_FIELD, 'gco' ),
              ],
              RECRUITMENT_FIELDS::POSTS_GQL_FIELD => [
                'type' => ['list_of' => RECRUITMENT_FIELDS::RECRUITMENT_ENTRY_SCHEMA_TYPES], 
                'description' => __( RECRUITMENT_FIELDS::POSTS_GQL_FIELD, 'gco' ),
              ],
            ]
            ]);
        }

    }