<?php 

    namespace Products;

    class ProductPrintListsInLoopUtils {

        public static function print($args, $msg_empty = "") {

            $messages = \MessageNotification\MessageGetUtils::get_all();

            //extract($messages);

            if ( empty( $msg_empty ) ) :

                $msg_empty = $messages[\Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_ANY_PRODUCT_LABEL_ID];

            endif;

            query_posts( $args );

            if ( have_posts() ) :

                ProductPrintListsTemplateUtils::print();

                \Paginations\PaginationPrintCustomLayoutUtils::print('pagination'); ?>

    <?php 
            else : 

                ProductPrintEmptyListsUtils::print($msg_empty);

            endif; 

            wp_reset_query();    

        }

    }