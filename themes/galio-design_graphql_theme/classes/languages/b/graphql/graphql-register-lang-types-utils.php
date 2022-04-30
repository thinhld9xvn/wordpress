<?php 

    namespace WP_GraphQL;
    use \Languages\LANGUAGES_FIELDS;

    class GraphQLRegisterLangTypesUtils {

        public static function register() {

          register_graphql_object_type( LANGUAGES_FIELDS::LANG_SCHEMA_ENUM_TYPES, [
            'description' => __( LANGUAGES_FIELDS::LANG_SCHEMA_ENUM_TYPES, 'gco' ),
            'fields' => [              
              LANGUAGES_FIELDS::VI => [
                'value' => LANGUAGES_FIELDS::VI
              ],
              LANGUAGES_FIELDS::EN => [
                'value' => LANGUAGES_FIELDS::EN
              ],
            ]
            ]);

        }

    }