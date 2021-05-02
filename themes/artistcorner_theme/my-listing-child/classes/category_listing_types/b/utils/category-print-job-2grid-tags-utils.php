<?php 

    namespace Category_Listing_Types;

    class CategoryPrintJob2GridTagsUtils {

        public static function print_begin_tag($count) {

            if ( $count === 0 ) : ?>

                <div class="listing-type-anchors grid-two-columns">
    
    <?php
            endif;

        }

        public static function print_end_tag($count, $length) {

            if ( $count === 1 || $count === $length - 1 ) : ?>

                </div>
    
    <?php
            endif;

        }

    }