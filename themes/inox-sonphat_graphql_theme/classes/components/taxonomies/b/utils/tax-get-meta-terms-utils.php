<?php 
    namespace Taxonomies;
    class TaxGetMetaTermsUtils {
        public static function get($pid, $tax) {
            $arrTerms = [];
            $terms = get_the_terms($pid, $tax);
            foreach( $terms as $key => $term) :
                $n = htmlspecialchars_decode($term->name);
                $arrTerms[] = [
                    TAXONOMIES_FIELDS::ID_GQL_FIELD => $term->term_id,
                    TAXONOMIES_FIELDS::TEXT_GQL_FIELD => $n,
                    TAXONOMIES_FIELDS::NAME_GQL_FIELD => $n,
                    TAXONOMIES_FIELDS::TITLE_GQL_FIELD => $n,
                    TAXONOMIES_FIELDS::URL_GQL_FIELD => filter_permalink(get_term_link($term))
                ];
            endforeach;
            usort($arrTerms, function($a, $b) {
                return strcmp($a[TAXONOMIES_FIELDS::TEXT_GQL_FIELD], 
                              $b[TAXONOMIES_FIELDS::TEXT_GQL_FIELD]);
            });
            return $arrTerms;
        }
    }