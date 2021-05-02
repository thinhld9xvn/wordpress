<?php 

    namespace Category_Listing_Types;

    class CategoryPrintJob4GridTagsUtils {

        public static function print_begin_tag($count) {

            if ( $count === 2 ) : ?>

                <div class="listing-type-anchors grid-fours-columns">

    <?php
            endif;

        }

        public static function print_end_tag($count, $length) {

            if ( $count === $length - 1 ) : ?>

                </div>
    
    <?php
            endif;

        }

    }