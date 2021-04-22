<?php

    namespace Actions\Woocommerce;

    class ActionWooCommerceCustomizeProductTabsUtils {

        public static function init($tabs) {

            unset( $tabs['reviews'] );		
            unset( $tabs['singleproductmultivendor'] );		

            $tabs['description']['title'] = __( 'Description' );		// Rename the description tab
            $tabs['description']['priority'] = 10;

            //$tabs['reviews']['title'] = __( 'Avis' );				// Rename the reviews tab
            //$tabs['singleproductmultivendor']['title'] = __( 'Plus de produits' );	// Rename the additional information tab

            $tabs['commercant'] = array();
            $tabs['commercant']['title'] = __('Commercant');
            $tabs['commercant']['priority'] = 20;
            $tabs['commercant']['callback'] = array('ActionWooCommerceCommercantTabCallbackUtils', 'init');

            $tabs['plus_de_produits'] = array();
            $tabs['plus_de_produits']['title'] = __('Plus de produits');
            $tabs['plus_de_produits']['priority'] = 40;
            $tabs['plus_de_produits']['callback'] = array('ActionWoocommerceCustomizeProductsRelatedTabUtils', 'init');

            return $tabs;           

        }

    }


