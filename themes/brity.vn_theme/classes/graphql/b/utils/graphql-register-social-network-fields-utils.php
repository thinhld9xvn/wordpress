<?php 

    namespace WP_GraphQL;

    use \Social_Network\SocialNetworkGetFbUrlUtils;
    use \Social_Network\SocialNetworkGetTwitterUrlUtils;
    use \Social_Network\SocialNetworkGetInstagramUrlUtils;
    use \Social_Network\SocialNetworkGetYoutubeUrlUtils;
    use \Social_Network\SocialNetworkGetDrbUrlUtils;
    use \Social_Network\SocialNetworkGetBehanceUrlUtils;

    class GraphQLRegisterSocialNetworkFieldsUtils {

        public static function register() {

            $field_name = 'getSocialNetWorkOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {

                $fb = SocialNetworkGetFbUrlUtils::get();       
                $twitter = SocialNetworkGetTwitterUrlUtils::get();
                $instagram = SocialNetworkGetInstagramUrlUtils::get();
                $youtube = SocialNetworkGetYoutubeUrlUtils::get();
                $drb = SocialNetworkGetDrbUrlUtils::get();
                $behance = SocialNetworkGetBehanceUrlUtils::get();

                return [
                   GRAPHQL_FIELDS::SOCIAL_FACEBOOK_FIELD_TYPE => [
                       'id' => GRAPHQL_FIELDS::SOCIAL_FACEBOOK_FIELD_TYPE,
                       'url' => $fb,
                       'text' => 'facebook'
                   ],                   
                   GRAPHQL_FIELDS::SOCIAL_TWITTER_FIELD_TYPE => [
                        'id' => GRAPHQL_FIELDS::SOCIAL_TWITTER_FIELD_TYPE,
                        'url' => $twitter,
                        'text' => 'twitter'
                    ],              
                   GRAPHQL_FIELDS::SOCIAL_INSTAGRAM_FIELD_TYPE => [
                        'id' => GRAPHQL_FIELDS::SOCIAL_INSTAGRAM_FIELD_TYPE,
                        'url' => $instagram,
                        'text' => 'instagram'
                    ],              
                   GRAPHQL_FIELDS::SOCIAL_YOUTUBE_FIELD_TYPE => [
                        'id' => GRAPHQL_FIELDS::SOCIAL_YOUTUBE_FIELD_TYPE,
                        'url' => $youtube,
                        'text' => 'youtube'
                    ],               
                   GRAPHQL_FIELDS::SOCIAL_DRB_FIELD_TYPE => [
                        'id' => GRAPHQL_FIELDS::SOCIAL_DRB_FIELD_TYPE,
                        'url' => $drb,
                        'text' => 'drb'
                    ], 
                   GRAPHQL_FIELDS::SOCIAL_BEHANCE_FIELD_TYPE => [
                        'id' => GRAPHQL_FIELDS::SOCIAL_BEHANCE_FIELD_TYPE,
                        'url' => $behance,
                        'text' => 'behance'
                    ], 
                ];                

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, GRAPHQL_FIELDS::SOCIAL_SCHEMA_TYPES);    

        }

    }