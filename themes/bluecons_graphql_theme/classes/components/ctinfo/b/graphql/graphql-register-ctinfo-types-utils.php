<?php 
    namespace WP_GraphQL;
    use \CTInfo\CTINFO_FIELDS;
    class GraphQLRegisterCTInfoTypesUtils {
        public static function register() {
          register_graphql_object_type( CTINFO_FIELDS::CTINFO_SCHEMA_TYPE, [
            'description' => __( CTINFO_FIELDS::CTINFO_SCHEMA_TYPE, 'gco' ),
            'fields' => [              
                CTINFO_FIELDS::CONTACT_GQL_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::CONTACT_GQL_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::COPYRIGHT_GQL_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::COPYRIGHT_GQL_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::FOOTER_MENU_GQL_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::FOOTER_MENU_GQL_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::FOOTER_INFO_GQL_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::FOOTER_INFO_GQL_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::FOOTER_SOCIALS_GQL_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::FOOTER_SOCIALS_GQL_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::FOOTER_SUPPORTER_GQL_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::FOOTER_SUPPORTER_GQL_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::DEFAULT_BANNER_GQL_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::DEFAULT_BANNER_GQL_FIELD, 'gco' )
                ],
                CTINFO_FIELDS::CONTACT_FORM_FIELD => [
                  'type' => 'String', 
                  'description' => __( CTINFO_FIELDS::CONTACT_FORM_FIELD, 'gco' )
                ],
              ]
          ]);

        }

    }