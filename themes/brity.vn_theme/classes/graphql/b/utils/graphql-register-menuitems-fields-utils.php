<?php 



    namespace WP_GraphQL;



    class GraphQLRegisterMenuItemsFieldsUtils {



        public static function register() {



            $field_name = 'getMenuItemsOption';



            $args = [];



            $resolve_callback = function($source, $args, $context, $info) {

                $menuLocations = get_nav_menu_locations();

                $results = [];

                foreach( $menuLocations as $key => $id ) :

                    $menuID = $menuLocations[$key];

                    $results[$key] = \Nav_Menus\NavMenusGetMenuItemsListUtils::get($menuID);

                endforeach;

                return json_encode($results);

            };



            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    



        }



    }