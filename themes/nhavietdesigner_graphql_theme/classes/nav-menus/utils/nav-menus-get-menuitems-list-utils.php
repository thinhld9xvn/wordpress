<?php 
    namespace Nav_Menus;

    class NavMenusGetMenuItemsListUtils {   

        private static function populate_children($menu_array, $menu_item) {

                $children = array();                

                if (!empty($menu_array)){

                    foreach ($menu_array as $k=>$m) { 

                        if ( $m->type === 'taxonomy' ) :

                            $term_id = $m->object_id;

                            $taxonomy = $m->object;    

                            $term = get_term_by('id', $term_id, $taxonomy);
                            $m->title = $term->name;                
                            $m->url = filter_permalink(get_term_link($term));                     
                        endif;

                        if ($m->menu_item_parent == $menu_item->ID) {

                            if ( FALSE !== array_search("page", $m->classes) ) :

                                $type = 'page';
        
                            else :
        
                                $type = $m->type === 'post_type_archive' ? 'archive' : $m->object;
        
                            endif;

                            $children[$m->ID] = array();

                            $children[$m->ID]['id'] = $m->ID;

                            $children[$m->ID]['text'] = htmlspecialchars_decode( $m->post_title ? $m->post_title : $m->title );

                            $children[$m->ID]['type'] = $type;

                            $children[$m->ID]['url'] = filter_permalink($m->url);

                            unset($menu_array[$k]);

                            $children[$m->ID]['subChildrens'] = self::populate_children($menu_array, $m);

                            $children[$m->ID]['order'] = $m->menu_order;

                        }

                    }

                };

                return $children;

            }      

            

        private static function remove_empty_array(&$element) {
            if ( empty($element['childrens']) ) :
                unset($element['childrens']);
            endif;
            if ( empty($element['subChildrens']) ) :
                unset($element['subChildrens']);
            endif;
        }
        private static function sort_menu(&$menu) {
            usort($menu, function($m1, $m2) {
                if ( $m1['order'] === $m2['order'] ) return 0;
                return $m1['order'] < $m2['order'] ? -1 : 1;
            });
            if ( ! empty( $menu['childrens'] ) ) :
                self::sort_menu($menu['childrens']);
            endif;
        }
        private static function travsel_elements(&$element) {
            foreach( $element as $key => &$m ) {
                self::remove_empty_array($m);
                if ( array_key_exists("childrens", $m) ) {
                    self::travsel_elements($m['childrens']);
                }
                if ( array_key_exists("subChildrens", $m) ) {
                    self::travsel_elements($m['subChildrens']);
                }

                

            }
        }

        public static function get($menu_location) {
            $menu_array = wp_get_nav_menu_items($menu_location);

            $menu = array();  

            foreach ($menu_array as $m) {

                //print_r($m);

                if (empty($m->menu_item_parent)) {

                    if ( array_search("page", $m->classes) ) :

                        $type = 'page';

                    else :

                        $type = $m->type === 'post_type_archive' ? 'archive' : $m->object;

                    endif;

                    $menu[$m->ID] = array();

                    $menu[$m->ID]['id'] = $m->ID;

                    $menu[$m->ID]['text'] = htmlspecialchars_decode( $m->post_title ? $m->post_title : $m->title );
                    
                    $menu[$m->ID]['type'] = $type;

                    $menu[$m->ID]['url'] = filter_permalink($m->url);

                    $menu[$m->ID]['childrens'] = self::populate_children($menu_array, $m);

                    $menu[$m->ID]['order'] = $m->menu_order;

                }

            }              

            self::travsel_elements($menu);
            self::sort_menu($menu);

            //echo json_encode($menu);

            return $menu;            
        }
    }