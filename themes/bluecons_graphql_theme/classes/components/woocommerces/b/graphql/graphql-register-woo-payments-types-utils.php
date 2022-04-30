<?php 
    namespace WP_GraphQL;
  use WoocommercesUtils\WOO_FIELDS;
  class GraphQLRegisterWooPaymentsTypesUtils {
      public static function register() {
        register_graphql_object_type( WOO_FIELDS::WOO_PAYMENT_SCHEMA_TYPES, [
          'description' => __( WOO_FIELDS::WOO_PAYMENT_SCHEMA_TYPES, 'gco' ),
          'fields' => [
            WOO_FIELDS::WOO_ACCOUNT_NAME_GQL_FIELD => [
              'type' => 'String', 
              'description' => __( WOO_FIELDS::WOO_ACCOUNT_NAME_GQL_FIELD, 'gco' ),
            ],
            WOO_FIELDS::WOO_ACCOUNT_NUMBER_GQL_FIELD => [
              'type' => 'String', 
              'description' => __( WOO_FIELDS::WOO_ACCOUNT_NUMBER_GQL_FIELD, 'gco' ),
            ],
            WOO_FIELDS::WOO_BANK_NAME_GQL_FIELD => [
              'type' => 'String', 
              'description' => __( WOO_FIELDS::WOO_BANK_NAME_GQL_FIELD, 'gco' ),
            ],
            WOO_FIELDS::WOO_SORT_CODE_GQL_FIELD => [
              'type' => 'String', 
              'description' => __( WOO_FIELDS::WOO_SORT_CODE_GQL_FIELD, 'gco' ),
            ],
            WOO_FIELDS::WOO_IBAN_GQL_FIELD => [
              'type' => 'String', 
              'description' => __( WOO_FIELDS::WOO_IBAN_GQL_FIELD, 'gco' ),
            ],
            WOO_FIELDS::WOO_BIC_GQL_FIELD => [
              'type' => 'String', 
              'description' => __( WOO_FIELDS::WOO_BIC_GQL_FIELD, 'gco' ),
            ],
          ]
        ]);
      }
  }