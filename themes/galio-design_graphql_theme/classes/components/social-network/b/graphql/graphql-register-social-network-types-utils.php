<?php 

    namespace WP_GraphQL;

    use \Social_Network\SOCIAL_NETWORKS_FIELDS;

    class GraphQLRegisterSocialNetworkTypesUtils {

        public static function register() {

          register_graphql_object_type( SOCIAL_NETWORKS_FIELDS::SOCIAL_ITEM_TYPE, [
            'description' => __( 'Social Networks', 'gco' ),
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
        }

    }