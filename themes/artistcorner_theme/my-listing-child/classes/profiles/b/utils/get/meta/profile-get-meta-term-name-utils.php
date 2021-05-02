<?php 

    namespace Profiles;

    class ProfileGetMetaTermNameUtils {

        public static function get($term, $args) {

            $name = trim( $term->name );

            if ( $args['transform'] === 'uppercase' ) :

                $name = strtoupper($name);

            elseif ( $args['transform'] === 'capitalize') :

                $name = ucfirst($name);

            endif;

            return $name;

        }

    }