<?php 
    namespace WP_GraphQL;
    use Home\Banners\BANNERS_FIELDS;
    class GraphQLRegisterBannersTypesUtils {
        public static function register() {
          register_graphql_object_type( BANNERS_FIELDS::BANNERS_SCHEMA_TYPE, [
            'description' => __( BANNERS_FIELDS::BANNERS_SCHEMA_TYPE, 'gco' ),
            'fields' => [              
              BANNERS_FIELDS::HEADING1_FIELD => [
                'type' => 'String', 
                'description' => __( BANNERS_FIELDS::HEADING1_FIELD, 'gco' ),
              ],
              BANNERS_FIELDS::HEADING2_FIELD => [
                'type' => 'String', 
                'description' => __( BANNERS_FIELDS::HEADING2_FIELD, 'gco' ),
              ],
              BANNERS_FIELDS::HOTLINE_FIELD => [
                'type' => 'String', 
                'description' => __( BANNERS_FIELDS::HOTLINE_FIELD, 'gco' ),
              ],
              BANNERS_FIELDS::HOTLINE_URL_FIELD => [
                'type' => 'String', 
                'description' => __( BANNERS_FIELDS::HOTLINE_URL_FIELD, 'gco' ),
              ],
              BANNERS_FIELDS::BACKGROUND_FIELD => [
                'type' => 'String', 
                'description' => __( BANNERS_FIELDS::BACKGROUND_FIELD, 'gco' ),
              ],
              BANNERS_FIELDS::FEATURED_IMAGE_FIELD => [
                'type' => 'String', 
                'description' => __( BANNERS_FIELDS::FEATURED_IMAGE_FIELD, 'gco' ),
              ],
            ]
            ]);
        }
    }