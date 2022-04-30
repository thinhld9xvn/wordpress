<?php 

    namespace WP_GraphQL;

    //use \CTInfo\CTInfoGetContactAddressHtmlUtils;
    use \CTInfo\CTInfoGetContactCopyrightUtils;
    //use \CTInfo\CTInfoGetContactEmailUtils;
    //use \CTInfo\CTInfoGetContactDescriptionHtmlUtils;
    use \CTInfo\CTInfoGetContactPhoneUtils;
    use \CTInfo\CTInfoGetContactPhoneUrlUtils;    
    use \CTInfo\CTInfoGetGmapUtils;
    //use \CTInfo\CTInfoGetChatMessengerUtils;

    class GraphQLRegisterCtInfoFieldsUtils {

        public static function register() {

            $field_name = 'getCtInfoOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode([
                    //'address' => CTInfoGetContactAddressHtmlUtils::get(),
                    'copyright' => [
                        'text' => CTInfoGetContactCopyrightUtils::get(),
                        'url' => '#'
                    ],
                    //'email' => CTInfoGetContactEmailUtils::get(),
                    //'description' => CTInfoGetContactDescriptionHtmlUtils::get(),
                    'hotline' => [
                        'text' => CTInfoGetContactPhoneUtils::get(),
                        'url' => CTInfoGetContactPhoneUrlUtils::get()
                    ],
                    'gmap' => CTInfoGetGmapUtils::get(),
                    //'chat_messenger' => CTInfoGetChatMessengerUtils::get()
                ]);

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }