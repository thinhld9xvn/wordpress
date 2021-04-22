<?php 

    namespace Products;

    class ProductGetPriorityCategoriesUtils {

        public static function get() {

            $stories_categories_list = array(
                "Service",
                "alimentation",
                "artisanat d'art",
                "Restaurant Bar",
                "bijouterie",
                "Prêt à porter",
                "décoration équipement de la maison",
                "esthétique",
                "fleuriste",
                "galerie d'art",
                "jouets cadeaux",
                "librairie",
                "Médical",
                "parfumerie",
                "tabac",
                "téléphonie"
            );
        
            $stories_categories_list = array_map('mb_strtolower', $stories_categories_list);
        
            $args = array(
        
                'taxonomy' => PRODUCT_TAXONOMY,
                'hide_empty' => false,
                'parent' => 0
        
            );  
        
            $categories = get_terms( $args ); 
    
            if ( $categories ) :
    
                $categories_lists = array();
                $additional_lists = array(); // danh sach nhung danh muc khong trung lap voi $stories_categories_list
                
    
                foreach ( $categories as $key => $cat ) :
    
                    if ( in_array( mb_strtolower($cat->name), 
                                    $stories_categories_list ) ) :
    
                        $categories_lists[] = $cat;
    
                    else :
    
                        $additional_lists[] = $cat;
    
                    endif;
    
                endforeach; 
    
                // resort priority cat position
                foreach ($stories_categories_list as $key => $cat) :
    
                    $cid = ProductSearchCategoryUtils::search($cat, $categories_lists);
    
                    if ( -1 !== $cid ) :
    
                        $unique_cat = $categories_lists[$cid];
    
                        unset($categories_lists[$cid]);
    
                        array_unshift($categories_lists, $unique_cat);
    
                    endif;
                    
                endforeach;
                
                // import cat con thieu, can import random bo sung them
                $lists_count = sizeof( $categories_lists );
                $stories_count = sizeof( $stories_categories_list );
                $additional_count = sizeof($additional_lists);
    
                if ( $lists_count > 0 && $lists_count < $stories_count ) :
    
                    $countspan = $stories_count - $lists_count;
    
                    for ($i = 0; $i < $additional_count; $i++ ):
    
                        if ( $i < $countspan ) :
    
                            $categories_lists[] = $additional_lists[$i];
    
                        endif;
    
                    endfor;
                
                endif;
    
                return $categories_lists;
    
            endif;
    
            return null;  

        }

    }