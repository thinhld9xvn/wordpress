<?php 

    namespace Stores;

    class StoreCheckAttributesUtils {

        /* attributes : array */
        public static function has($store_name, $attributes) {            

            $listings = StoreGetListingUtils::get_by_metadata(array(
                'store_meta_key' => STORE_FIELDS::STORE_SHOP_NAME_FIELD,
                'store_meta_value' => $store_name
            ));

            if ( count($listings) === 0 ) :

                $store = \Commercants\CommercantSearchShopUtils::search($commercants_list, $store_name);

            else :

                $store = $listings[0];

            endif;

            $livraisons = StoreGetMetaDeliveryUtils::get($store->ID);
            $clickandcollect = StoreGetMetaCollectAndClickUtils::get($store->ID);

            if ( StoreValidAttributeUtils::yes( $attributes[\Stores\STORE_FIELDS::STORE_DELIVERY_FIELD] ) && 
                    StoreValidAttributeUtils::yes( $attributes[\Stores\STORE_FIELDS::STORE_CLICK_AND_COLLECT_FIELD] ) ) :
                
                if ( StoreValidAttributeUtils::yes( $livraisons ) && 
                     ! StoreValidAttributeUtils::yes( $clickandcollect ) ) :

                    return true;

                endif;

                if ( StoreValidAttributeUtils::yes( $clickandcollect ) && 
                        ! StoreValidAttributeUtils::yes( $livraisons ) ) :

                     return true;

                endif;

                if ( StoreValidAttributeUtils::yes( $clickandcollect ) && 
                        StoreValidAttributeUtils::yes( $livraisons ) ) :

                     return true;

                endif;

                return false;    
                 
            else :

                if ( StoreValidAttributeUtils::yes( $attributes[\Stores\STORE_FIELDS::STORE_DELIVERY_FIELD] ) && 
                        StoreValidAttributeUtils::yes( $livraisons ) ) :

                    return true;

                endif;

                if ( StoreValidAttributeUtils::yes( $attributes[\Stores\STORE_FIELDS::STORE_CLICK_AND_COLLECT_FIELD] ) && 
                        StoreValidAttributeUtils::yes( $clickandcollect ) ) :

                    return true;

                endif;

            endif; 

            return false;
            
        }

    }