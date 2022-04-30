<?php 
    namespace WP_GraphQL;
    use \CTInfo\CTINFO_FIELDS;
    class GraphQLRegisterCTInfoTypesUtils {
        public static function register() {
          register_graphql_object_type( CTINFO_FIELDS::CTINFO_SCHEMA_TYPE, [
            'description' => __( 'Ctinfo', 'gco' ),
            'fields' => [              
                CTINFO_FIELDS::DESCRIPTION_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::DESCRIPTION_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::HOTLINE_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::HOTLINE_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::EMAIL_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::EMAIL_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::CONTACT_FORM_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::CONTACT_FORM_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::GIFTS_FORM_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::GIFTS_FORM_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::EMAIL_RECRUIT_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::EMAIL_RECRUIT_FIELD, 'gco' )
                ]
              ]
            ]);
        }
    }