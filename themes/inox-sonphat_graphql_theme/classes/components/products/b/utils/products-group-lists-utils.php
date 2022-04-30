<?php
    namespace Products;
    class ProductsGroupListsUtils {
        /*private static function filterp($product) {
            unset($product[PRODUCTS_FIELDS::CATEGORIES_GQL_FIELD]);
            unset($product[PRODUCTS_FIELDS::GALLERIES_GQL_FIELD]);
            unset($product[PRODUCTS_FIELDS::SEO_GQL_FIELD]);
            unset($product[PRODUCTS_FIELDS::POLYLANG_PRODUCTS_GQL_FIELD]);
            unset($product[PRODUCTS_FIELDS::SHORT_DESCRIPTION_GQL_FIELD]);
            unset($product[PRODUCTS_FIELDS::DESCRIPTION_GQL_FIELD]);
            return $product;
        }*/
        public static function perform($results, $limit = 8, $tabs = 3) {
            $grouped = [];
            foreach($results as $key => $product) :
                $pid = $product['id'];
                $categories = $product['categories'];
                if ( !empty($categories) ) :
                    foreach($categories as $k => $category) :
                        $cid = $category['id'];
                        $cname = $category['name'];
                        if ( !array_key_exists($cid, $grouped) && 
                                count($grouped) < $tabs ) :
                            $grouped[$cid] = [
                                PRODUCTS_FIELDS::ID_GQL_FIELD => $cid,
                                PRODUCTS_FIELDS::TITLE_GQL_FIELD => $cname,
                                //PRODUCTS_FIELDS::DATA_GQL_FIELD => [$product['id'] => self::filterp($product)]
                                PRODUCTS_FIELDS::DATA_GQL_FIELD => [$pid => $product]
                            ];
                        else :
                            if ( array_key_exists($cid, $grouped) ) :
                                $data =& $grouped[$cid][PRODUCTS_FIELDS::DATA_GQL_FIELD];
                                if (!array_key_exists($pid, $data) && count($data) < $limit) :
                                    //$data[$product['id']] = self::filterp($product); 
                                    $data[$pid] = $product; 
                                endif;
                            endif;
                        endif;
                    endforeach;
                endif;
            endforeach;
            return $grouped;
        }
    }