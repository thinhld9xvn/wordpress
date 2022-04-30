<?php

    namespace Products;

    class ProductsGetAttributesListUtils {  

        private static function parseAttributes($pa_tax, $name) {

            $arrTermsList = [];

            $args = array(

                'taxonomy' => $pa_tax,
                'hide_empty' => false,
                'parent' => 0

            );

            $results = get_terms($args);  
            
            foreach ( $results as $key => $term ) :

                $arrTermsList[] = [
                    'id' => $term->term_id,
                    'name' => $name,
                    'text' => htmlspecialchars_decode( $term->name ),
                    'value' => $term->slug
                ];

            endforeach;

            return $arrTermsList;

        }

        public static function get() {

            $arrAttributesList = [];

            $arrAttributesList['sizes'] = self::parseAttributes(PA_KICHTHUOC_TAXONOMY, 'sizes');
            $arrAttributesList['colors'] = self::parseAttributes(PA_MAUSAC_TAXONOMY, 'colors');
            //$arrAttributesList['brands'] = self::parseAttributes(PA_THUONGHIEU_TAXONOMY, 'brands');

            return $arrAttributesList;

        }

    }