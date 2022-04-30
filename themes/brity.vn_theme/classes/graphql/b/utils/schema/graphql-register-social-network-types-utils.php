<?php 

    namespace WP_GraphQL;

    class GraphQLRegisterSocialNetworkTypesUtils {

        public static function register() {

          register_graphql_object_type( 'SocialItemInfoType', [
            'description' => __( 'Describe the Type and what it represents', 'gco' ),
            'fields' => [
              'id' => [
                'type' => 'String', 
                'description' => __( 'id', 'gco' ),
              ],
              'url' => [
                'type' => 'String', 
                'description' => __( 'url', 'gco' ),
              ],
              'text' => [
                'type' => 'String', 
                'description' => __( 'text', 'gco' ),
              ],
            ]
            ]);

            register_graphql_object_type( GRAPHQL_FIELDS::SOCIAL_SCHEMA_TYPES, [
                'description' => __( 'Describe the Type and what it represents', 'gco' ),
                'fields' => [
                    GRAPHQL_FIELDS::SOCIAL_FACEBOOK_FIELD_TYPE => [
                    'type' => 'SocialItemInfoType', 
                    'description' => __( 'Facebook', 'gco' ),
                  ],
                  GRAPHQL_FIELDS::SOCIAL_TWITTER_FIELD_TYPE => [
                    'type' => 'SocialItemInfoType', 
                    'description' => __( 'Twitter', 'gco' ),
                  ],
                  GRAPHQL_FIELDS::SOCIAL_INSTAGRAM_FIELD_TYPE => [
                    'type' => 'SocialItemInfoType', 
                    'description' => __( 'Instagram', 'gco' ),
                  ],
                  GRAPHQL_FIELDS::SOCIAL_YOUTUBE_FIELD_TYPE => [
                    'type' => 'SocialItemInfoType', 
                    'description' => __( 'Youtube', 'gco' ),
                  ],
                  GRAPHQL_FIELDS::SOCIAL_DRB_FIELD_TYPE => [
                    'type' => 'SocialItemInfoType', 
                    'description' => __( 'Drb', 'gco' ),
                  ],
                  GRAPHQL_FIELDS::SOCIAL_BEHANCE_FIELD_TYPE => [
                    'type' => 'SocialItemInfoType', 
                    'description' => __( 'Behance', 'gco' ),
                  ],
                ],
              ] );

        }

    }