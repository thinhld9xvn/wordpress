<?php 
    namespace WP_GraphQL;
use Products\PRODUCTS_FIELDS;
use Taxonomies\TAXONOMIES_FIELDS;

class GraphQLRegisterProductsListTypesUtils {
        public static function register() {
          register_graphql_object_type( PRODUCTS_FIELDS::PRODUCTS_THUMBNAIL_SCHEMA_TYPES, [
            'description' => __( PRODUCTS_FIELDS::PRODUCTS_THUMBNAIL_SCHEMA_TYPES, 'gco' ),
            'fields' => [
                PRODUCTS_FIELDS::URL_GQL_FIELD => [
                  'type' => 'String', 
                  'description' => __( PRODUCTS_FIELDS::URL_GQL_FIELD, 'gco' ),
                ],
            ]
          ]);
          register_graphql_object_type( PRODUCTS_FIELDS::PRODUCTS_GALLERY_SCHEMA_TYPES, [
            'description' => __( PRODUCTS_FIELDS::PRODUCTS_GALLERY_SCHEMA_TYPES, 'gco' ),
            'fields' => [
                PRODUCTS_FIELDS::DATA_GQL_FIELD => [
                  'type' => ['list_of' => PRODUCTS_FIELDS::PRODUCTS_THUMBNAIL_SCHEMA_TYPES], 
                  'description' => __( PRODUCTS_FIELDS::DATA_GQL_FIELD, 'gco' ),
                ],
            ]
          ]);
          register_graphql_object_type( PRODUCTS_FIELDS::PRODUCTS_PRICE_SCHEMA_TYPES, [
            'description' => __( PRODUCTS_FIELDS::PRODUCTS_PRICE_SCHEMA_TYPES, 'gco' ),
            'fields' => [
                PRODUCTS_FIELDS::PRICE_FIXED_GQL_FIELD => [
                  'type' => 'Int', 
                  'description' => __( PRODUCTS_FIELDS::PRICE_FIXED_GQL_FIELD, 'gco' ),
                ],
                PRODUCTS_FIELDS::PRICE_FORMAT_GQL_FIELD => [
                  'type' => 'String', 
                  'description' => __( PRODUCTS_FIELDS::PRICE_FORMAT_GQL_FIELD, 'gco' ),
                ],
            ]
          ]);
          register_graphql_object_type( PRODUCTS_FIELDS::PRODUCTS_SCHEMA_TYPES, [
            'description' => __( PRODUCTS_FIELDS::PRODUCTS_SCHEMA_TYPES, 'gco' ),
            'fields' => [
              PRODUCTS_FIELDS::ID_GQL_FIELD => [
                'type' => 'Int', 
                'description' => __( PRODUCTS_FIELDS::ID_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::NAME_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::NAME_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::TITLE_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::TITLE_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::TEXT_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::TEXT_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::URL_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::URL_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::SLUG_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::SLUG_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::BANNER_IMAGE_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::BANNER_IMAGE_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::SHORT_DESCRIPTION_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::SHORT_DESCRIPTION_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::DESCRIPTION_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::DESCRIPTION_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::PRICE_GQL_FIELD => [
                'type' => ['list_of' => PRODUCTS_FIELDS::PRODUCTS_PRICE_SCHEMA_TYPES], 
                'description' => __( PRODUCTS_FIELDS::PRICE_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::OLD_PRICE_GQL_FIELD => [
                'type' => ['list_of' => PRODUCTS_FIELDS::PRODUCTS_PRICE_SCHEMA_TYPES], 
                'description' => __( PRODUCTS_FIELDS::OLD_PRICE_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::STATUS_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::STATUS_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::BRANDS_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::BRANDS_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::PLACES_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::PLACES_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::COLORS_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::COLORS_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::SIZES_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::SIZES_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::SPECIFICATIONS_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::SPECIFICATIONS_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::THUMBNAILS_GQL_FIELD => [
                'type' => ['list_of' => PRODUCTS_FIELDS::PRODUCTS_THUMBNAIL_SCHEMA_TYPES], 
                'description' => __( PRODUCTS_FIELDS::THUMBNAILS_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::GALLERIES_GQL_FIELD => [
                'type' => ['list_of' => PRODUCTS_FIELDS::PRODUCTS_GALLERY_SCHEMA_TYPES], 
                'description' => __( PRODUCTS_FIELDS::GALLERIES_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::CATEGORIES_GQL_FIELD => [
                'type' => ['list_of' => TAXONOMIES_FIELDS::TAX_ENTRY_SCHEMA_TYPES], 
                'description' => __( PRODUCTS_FIELDS::CATEGORIES_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::POLYLANG_PRODUCTS_GQL_FIELD => [
                'type' => PRODUCTS_FIELDS::PRODUCTS_SCHEMA_TYPES, 
                'description' => __( PRODUCTS_FIELDS::POLYLANG_PRODUCTS_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::SEO_GQL_FIELD => [
                'type' => TAXONOMIES_FIELDS::TAX_SEO_SCHEMA_TYPES, 
                'description' => __( PRODUCTS_FIELDS::SEO_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::LOCALE_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::LOCALE_GQL_FIELD, 'gco' ),
              ],
            ]
          ]);
          register_graphql_object_type( PRODUCTS_FIELDS::PRODUCTS_TAB_SCHEMA_TYPES, [
            'description' => __( PRODUCTS_FIELDS::PRODUCTS_TAB_SCHEMA_TYPES, 'gco' ),
            'fields' => [
              PRODUCTS_FIELDS::ID_GQL_FIELD => [
                'type' => 'Int', 
                'description' => __( PRODUCTS_FIELDS::ID_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::TITLE_GQL_FIELD => [
                'type' => 'String', 
                'description' => __( PRODUCTS_FIELDS::TITLE_GQL_FIELD, 'gco' ),
              ],
              PRODUCTS_FIELDS::DATA_GQL_FIELD => [
                'type' => ['list_of' => PRODUCTS_FIELDS::PRODUCTS_SCHEMA_TYPES], 
                'description' => __( PRODUCTS_FIELDS::DATA_GQL_FIELD, 'gco' ),
              ],
            ]
          ]);
        }
    }