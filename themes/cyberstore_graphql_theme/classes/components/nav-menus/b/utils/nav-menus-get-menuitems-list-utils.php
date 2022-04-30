<?php 

    namespace Nav_Menus;

    class NavMenusGetMenuItemsListUtils {     
        
        private static function get_rt_menu_background($id) {

            $meta = get_post_meta($id, 'rt-wp-menu-custom-fields', true);            

            if ( ! empty( $meta ) ) :

                if ( array_key_exists('image', $meta) ) :

                    $image = $meta['image'];

                    if ( array_key_exists('media-url', $image) && 
                            ! empty($image['media-url']) ) :

                        return $image['media-url'];

                    endif;

                endif;

            endif;

            return null;

        }

        private static function is_sticky_menu_item($id) {

            $meta = get_post_meta($id, '_menu_item_classes', true);            

            if ( ! empty( $meta ) ) :

                return ! empty($meta[0]) && strtolower($meta[0]) === 'sticky';

            endif;

            return false;

        }

        private static function populate_children($menu_array, $menu_item)
            {
                $children = array();
                
                if (!empty($menu_array)){
                    
                    foreach ($menu_array as $k=>$m) { 
                        
                        if ( $m->type === 'taxonomy' ) :

                            if ( empty($m->post_title) ) :

                                $term_id = $m->object_id;
                                $taxonomy = $m->object;                            

                                $term = get_term_by('id', $term_id, $taxonomy);

                                $m->post_title = $term->name;                         

                                $m->url = filter_permalink(get_term_link($term));      
                                
                            endif;

                        endif;
            
                        if ($m->menu_item_parent == $menu_item->ID) {                            

                            $children[$m->ID] = array();
                            $children[$m->ID]['id'] = $m->ID;
                            $children[$m->ID]['text'] = $m->post_title ? htmlspecialchars_decode( $m->post_title ) : htmlspecialchars_decode( $m->title );
                            $children[$m->ID]['url'] = filter_permalink($m->url);
                            
                            unset($menu_array[$k]);

                            if ( self::is_sticky_menu_item($m->ID) ) :

                                $children[$m->ID]['sticky'] = true;

                            endif;
                            
                            $children[$m->ID]['childrens'] = self::populate_children($menu_array, $m);
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

        private static function is_footer_menu($menu_slug) {

           return 0 === strpos($menu_slug, 'footer');

        }

        private static function is_nav_category_menu($menu_slug) {

            return 0 === strpos($menu_slug, 'nav');
 
         }
            
        public static function get($menu_slug, $menu_id) {

            $menu_array = wp_get_nav_menu_items($menu_id);
            $menu_name = wp_get_nav_menu_name($menu_slug);

            $menu = array();

            if ( self::is_footer_menu($menu_slug) ) :
        
                $menu = array(
                    'id' => $menu_id,
                    'text' => $menu_name,
                    'childrens' => []
                );

            endif;

            if ( self::is_nav_category_menu($menu_slug) ) :

                $menu = array(
                    'heading' => $menu_name,
                    'data' => []
                );

            endif;
        
            foreach ($menu_array as $m) {
               
                if (empty($m->menu_item_parent)) {

                    $background = self::get_rt_menu_background($m->ID);

                    $data = [
                        $m->ID => []
                    ];

                    $data[$m->ID]['id'] = $m->ID;
                    $data[$m->ID]['text'] = $m->post_title ? htmlspecialchars_decode( $m->post_title ) : htmlspecialchars_decode( $m->title );
                    $data[$m->ID]['url'] = filter_permalink($m->url);

                    if ( $background ) :

                        $data[$m->ID]['background'] = $background;

                    endif;

                    $data[$m->ID]['childrens'] = self::populate_children($menu_array, $m);
                    $data[$m->ID]['order'] = $m->menu_order;

                    if ( self::is_footer_menu($menu_slug) ) :

                        $menu['childrens'] = array_merge($menu['childrens'], $data);

                    else :

                        if ( self::is_nav_category_menu($menu_slug) ) :

                            $menu['data'] = array_merge($menu['data'], $data);

                        else :
                    
                           $menu = array_merge($menu, $data);

                        endif;

                    endif;

                }
            }  

            if ( self::is_footer_menu($menu_slug) ) :
            
                self::travsel_elements($menu['childrens']);

            else :

                if ( self::is_nav_category_menu($menu_slug) ) :

                    self::travsel_elements($menu['data']);

                else :

                    self::travsel_elements($menu);

                endif;

            endif;
        
            return $menu;            

        }

    }