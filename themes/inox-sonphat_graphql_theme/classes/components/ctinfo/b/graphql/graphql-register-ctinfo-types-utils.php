<?php 

    namespace WP_GraphQL;

    use \CTInfo\CTINFO_FIELDS;

    class GraphQLRegisterCTInfoTypesUtils {

        public static function register() {

          register_graphql_object_type( CTINFO_FIELDS::SOCIALS_SCHEMA_TYPE, [
            'description' => __( CTINFO_FIELDS::SOCIALS_SCHEMA_TYPE, 'gco' ),
            'fields' => [              
                CTINFO_FIELDS::SOCIAL_ID_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::SOCIAL_ID_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::SOCIAL_TEXT_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::SOCIAL_TEXT_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::SOCIAL_URL_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::SOCIAL_URL_FIELD, 'gco' )
                ],
              ]
          ]);

          register_graphql_object_type( CTINFO_FIELDS::CTINFO_SCHEMA_TYPE, [
            'description' => __( 'Ctinfo', 'gco' ),
            'fields' => [              
                CTINFO_FIELDS::INTRODUCTION_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::INTRODUCTION_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::INTRODUCTION_BG_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::INTRODUCTION_BG_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::HOTLINE_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::HOTLINE_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::EMAIL_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::EMAIL_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::ADDRESS_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::ADDRESS_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::WEBSITE_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::WEBSITE_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::SUPPORTER_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::SUPPORTER_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::COPYRIGHT_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::COPYRIGHT_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::SOCIALS_FIELD => [
                  'type' => ['list_of' => CTINFO_FIELDS::SOCIALS_SCHEMA_TYPE], 
                  'description' => __( CTINFO_FIELDS::SOCIALS_SCHEMA_TYPE, 'gco' )
                ],
                CTINFO_FIELDS::DEFAULT_BANNER_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::DEFAULT_BANNER_FIELD, 'gco' )
                ],
              ]
          ]);

        }

    }