<?php 
    namespace WP_GraphQL;

    class GraphQLRegisterNotificationFieldsUtils {

        public static function register() {

            $field_name = 'getNotiNewPostTokenOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) { 

                $token = \Notifications\NotificationGetNewPostTokenUtils::get();

                return $token;

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }



    }