<?php 

    namespace WP_GraphQL;

    use \CTInfo\CTInfoGetContactCopyrightUtils;
    use \CTInfo\CTInfoGetContactEmailUtils;
    use \CTInfo\CTInfoGetContactDescriptionHtmlUtils;
    use \CTInfo\CTInfoGetContactPhoneUtils;
    use \CTInfo\CTInfoGetContactPhoneUrlUtils;    
    use \CTInfo\CTInfoGetContactAddressHtmlUtils;    
    use \CTInfo\CTInfoGetGmapUtils;

    class GraphQLRegisterCtInfoFieldsUtils {

        public static function register() {

            $field_name = 'getCtInfoOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode([
                    'copyright' => CTInfoGetContactCopyrightUtils::get(),
                    'email' => CTInfoGetContactEmailUtils::get(),
                    'description' => CTInfoGetContactDescriptionHtmlUtils::get(),
                    'phone' => CTInfoGetContactPhoneUtils::get(),
                    'phone_url' => CTInfoGetContactPhoneUrlUtils::get(),
                    'address' => CTInfoGetContactAddressHtmlUtils::get(),
                    'gmap' => CTInfoGetGmapUtils::get()
                ]);

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }