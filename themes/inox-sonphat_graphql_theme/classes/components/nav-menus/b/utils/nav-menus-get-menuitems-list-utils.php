<?php 
    namespace Nav_Menus;
    class NavMenusGetMenuItemsListUtils {   
        private static function get_afc_attributes($id) {
            $background_color = get_field(NAVMENUS_FIELDS::AFC_COLOR_MENU_FIELD, $id);
            $border_width = get_field(NAVMENUS_FIELDS::AFC_BORDER_WIDTH_FIELD, $id);
            $border_color = get_field(NAVMENUS_FIELDS::AFC_BORDER_COLOR_FIELD, $id);
            return [
                'background_color' => $background_color,
                'border_width' => $border_width,
                'border_color' => $border_color
            ];
        }
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
                        extract(self::get_afc_attributes($m->ID));
                        $children[$m->ID] = array();
                        $children[$m->ID][NAVMENUS_FIELDS::ID_GQL_FIELD] = $m->ID;
                        $children[$m->ID][NAVMENUS_FIELDS::TEXT_GQL_FIELD] = htmlspecialchars_decode( $m->post_title ? $m->post_title : $m->title );
                        $children[$m->ID][NAVMENUS_FIELDS::TYPE_GQL_FIELD] = $m->type === 'post_type_archive' ? 'archive' : $m->object;
                        $children[$m->ID][NAVMENUS_FIELDS::URL_GQL_FIELD] = filter_permalink($m->url);
                        unset($menu_array[$k]);
                        $children[$m->ID][NAVMENUS_FIELDS::MEGA_GQL_FIELD] = true;
                        $children[$m->ID][NAVMENUS_FIELDS::CHILDRENS_GQL_FIELD] = self::populate_children($menu_array, $m);
                        $children[$m->ID][NAVMENUS_FIELDS::ORDER_GQL_FIELD] = $m->menu_order;
                        $children[$m->ID][NAVMENUS_FIELDS::BACKGROUND_COLOR_GQL_FIELD] = $background_color;
                        $children[$m->ID][NAVMENUS_FIELDS::BORDER_WIDTH_GQL_FIELD] = $border_width;
                        $children[$m->ID][NAVMENUS_FIELDS::BORDER_COLOR_GQL_FIELD] = $border_color;
                    }
                }
            };
            return $children;
        }      
        private static function remove_empty_array(&$element) {
            if ( empty($element[NAVMENUS_FIELDS::CHILDRENS_GQL_FIELD]) ) :
                unset($element[NAVMENUS_FIELDS::CHILDRENS_GQL_FIELD]);
            endif;
        }
        private static function sort_menu(&$menu) {
            usort($menu, function($m1, $m2) {
                if ( $m1[NAVMENUS_FIELDS::ORDER_GQL_FIELD] === $m2[NAVMENUS_FIELDS::ORDER_GQL_FIELD] ) return 0;
                return $m1[NAVMENUS_FIELDS::ORDER_GQL_FIELD] < $m2[NAVMENUS_FIELDS::ORDER_GQL_FIELD] ? -1 : 1;
            });
            if ( ! empty( $menu[NAVMENUS_FIELDS::CHILDRENS_GQL_FIELD] ) ) :
                self::sort_menu($menu[NAVMENUS_FIELDS::CHILDRENS_GQL_FIELD]);
            endif;
        }
        private static function travsel_elements(&$element) {
            foreach( $element as $key => &$m ) {
                self::remove_empty_array($m);
                if ( array_key_exists(NAVMENUS_FIELDS::CHILDRENS_GQL_FIELD, $m) ) {
                    self::travsel_elements($m[NAVMENUS_FIELDS::CHILDRENS_GQL_FIELD]);
                }
            }
        }
        public static function get($menu_location) {
            $menu_array = wp_get_nav_menu_items($menu_location);
            $menu = array(); 
            foreach ($menu_array as $m) {
                if (empty($m->menu_item_parent)) {
                    extract(self::get_afc_attributes($m->ID));
                    $menu[$m->ID] = array();
                    $menu[$m->ID][NAVMENUS_FIELDS::ID_GQL_FIELD] = $m->ID;
                    $menu[$m->ID][NAVMENUS_FIELDS::TEXT_GQL_FIELD] = htmlspecialchars_decode( $m->post_title ? $m->post_title : $m->title );
                    $menu[$m->ID][NAVMENUS_FIELDS::TYPE_GQL_FIELD] = $m->type === 'post_type_archive' ? 'archive' : $m->object;
                    $menu[$m->ID][NAVMENUS_FIELDS::URL_GQL_FIELD] = filter_permalink($m->url);      
                    $menu[$m->ID][NAVMENUS_FIELDS::MEGA_GQL_FIELD] = true;              
                    $menu[$m->ID][NAVMENUS_FIELDS::CHILDRENS_GQL_FIELD] = self::populate_children($menu_array, $m);
                    $menu[$m->ID][NAVMENUS_FIELDS::ORDER_GQL_FIELD] = $m->menu_order;
                    $menu[$m->ID][NAVMENUS_FIELDS::BACKGROUND_COLOR_GQL_FIELD] = $background_color;
                    $menu[$m->ID][NAVMENUS_FIELDS::BORDER_WIDTH_GQL_FIELD] = $border_width;
                    $menu[$m->ID][NAVMENUS_FIELDS::BORDER_COLOR_GQL_FIELD] = $border_color;
                }
            }              
            self::travsel_elements($menu);
            self::sort_menu($menu);
            return $menu;            
        }
    }