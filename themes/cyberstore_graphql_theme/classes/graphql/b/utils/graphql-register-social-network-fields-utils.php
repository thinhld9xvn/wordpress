<?php 

    namespace WP_GraphQL;

    use \Social_Network\SocialNetworkGetFbUrlUtils;
    use \Social_Network\SocialNetworkGetTwitterUrlUtils;
    use \Social_Network\SocialNetworkGetInstagramUrlUtils;
    use \Social_Network\SocialNetworkGetLinkedinUrlUtils;
    //use \Social_Network\SocialNetworkGetGPlusUrlUtils;
    use \Social_Network\SocialNetworkGetPinterestUrlUtils;

    class GraphQLRegisterSocialNetworkFieldsUtils {

        public static function register() {

            $field_name = 'getSocialNetWorkOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {

                $fb = SocialNetworkGetFbUrlUtils::get();       
                $twitter = SocialNetworkGetTwitterUrlUtils::get();
                $instagram = SocialNetworkGetInstagramUrlUtils::get();
                //$youtube = SocialNetworkGetYoutubeUrlUtils::get();
                $linkedin = SocialNetworkGetLinkedinUrlUtils::get();
                //$gplus = SocialNetworkGetGPlusUrlUtils::get();
                $pinterest = SocialNetworkGetPinterestUrlUtils::get();

                /*return json_encode([
                    'fb' => $fb,
                    'twitter' => $twitter,
                    'instagram' => $instagram,
                    'linkedin' => $linkedin,
                    'pinterest' => $pinterest
                ]);*/

                return json_encode([
                    [
                        'id' => 'fb',
                        'url' => $fb
                    ],
                    [
                        'id' => 'inst',
                        'url' => $instagram
                    ],
                    [
                        'id' => 'twitter',
                        'url' => $twitter
                    ],
                    [
                        'id' => 'linkedin',
                        'url' => $linkedin
                    ],
                    [
                        'id' => 'pinterest',
                        'url' => $pinterest
                    ]
                ]);

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }