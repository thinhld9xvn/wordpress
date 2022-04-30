<?php 

    namespace WP_GraphQL;

    use \Social_Network\SocialNetworkGetFbUrlUtils;
    use \Social_Network\SocialNetworkGetTwitterUrlUtils;
    use \Social_Network\SocialNetworkGetInstagramUrlUtils;
    use \Social_Network\SocialNetworkGetYoutubeUrlUtils;
    use \Social_Network\SocialNetworkGetPinterestUrlUtils;
    use \Social_Network\SocialNetworkGetVimeoUrlUtils;
    use \Social_Network\SOCIAL_NETWORKS_FIELDS;

    class GraphQLRegisterSocialNetworkFieldsUtils {

        public static function register() {

            $field_name = 'getSocialNetWorkList';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {

                $fb = SocialNetworkGetFbUrlUtils::get();       
                $twitter = SocialNetworkGetTwitterUrlUtils::get();
                $instagram = SocialNetworkGetInstagramUrlUtils::get();
                $youtube = SocialNetworkGetYoutubeUrlUtils::get();
                $pinterest = SocialNetworkGetPinterestUrlUtils::get();
                $vimeo = SocialNetworkGetVimeoUrlUtils::get();

                return [
                   [
                       'id' => SOCIAL_NETWORKS_FIELDS::FACEBOOK_FIELD,
                       'url' => $fb,
                       'text' => 'facebook'
                   ],                   
                   [
                        'id' => SOCIAL_NETWORKS_FIELDS::TWITTER_FIELD,
                        'url' => $twitter,
                        'text' => 'twitter'
                    ],              
                   [
                        'id' => SOCIAL_NETWORKS_FIELDS::INSTAGRAM_FIELD,
                        'url' => $instagram,
                        'text' => 'instagram'
                    ],              
                    [
                        'id' => SOCIAL_NETWORKS_FIELDS::YOUTUBE_FIELD,
                        'url' => $youtube,
                        'text' => 'youtube'
                    ],      
                    [
                        'id' => SOCIAL_NETWORKS_FIELDS::PINTEREST_FIELD,
                        'url' => $pinterest,
                        'text' => 'pinterest'
                    ],                        
                    [
                        'id' => SOCIAL_NETWORKS_FIELDS::VIMEO_FIELD,
                        'url' => $vimeo,
                        'text' => 'vimeo'
                    ],
                ];                

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, 
                                                    $resolve_callback, 
                                                        ['list_of' => SOCIAL_NETWORKS_FIELDS::SOCIAL_ITEM_TYPE]);    

        }

    }