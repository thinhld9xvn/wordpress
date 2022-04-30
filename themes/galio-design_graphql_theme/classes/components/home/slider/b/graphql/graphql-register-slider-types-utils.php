<?php 

    namespace WP_GraphQL;

    use \Home\SLider\SLIDER_FIELDS;

    class GraphQLRegisterSliderTypesUtils {

        public static function register() {

          register_graphql_object_type( SLIDER_FIELDS::SLIDER_FIELDS_TYPE, [
            'description' => __( 'Slider', 'gco' ),
            'fields' => [   
              SLIDER_FIELDS::SLIDER_GQL_ID => [
                'type' => 'Int', 
                'description' => __( SLIDER_FIELDS::SLIDER_GQL_ID, 'gco' ),
              ],           
              SLIDER_FIELDS::SLIDER_GQL_TITLE => [
                'type' => 'String', 
                'description' => __( SLIDER_FIELDS::SLIDER_GQL_TITLE, 'gco' ),
              ],           
              SLIDER_FIELDS::SLIDER_GQL_HEADING => [
                'type' => 'String', 
                'description' => __( SLIDER_FIELDS::SLIDER_GQL_HEADING, 'gco' ),
              ],
              SLIDER_FIELDS::SLIDER_GQL_BUTTON_TEXT => [
                'type' => 'String', 
                'description' => __( SLIDER_FIELDS::SLIDER_GQL_BUTTON_TEXT, 'gco' ),
              ],
              SLIDER_FIELDS::SLIDER_GQL_THUMBNAIL => [
                'type' => 'String', 
                'description' => __( SLIDER_FIELDS::SLIDER_GQL_THUMBNAIL, 'gco' ),
              ],
              SLIDER_FIELDS::SLIDER_GQL_VIDEO => [
                'type' => 'String', 
                'description' => __( SLIDER_FIELDS::SLIDER_GQL_VIDEO, 'gco' ),
              ],
              SLIDER_FIELDS::SLIDER_GQL_URL => [
                'type' => 'String', 
                'description' => __( SLIDER_FIELDS::SLIDER_GQL_URL, 'gco' ),
              ],
            ]
          ]);

        }

    }