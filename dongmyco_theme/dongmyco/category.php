<?php get_header(); ?>
    
    <!-- main -->
    <section id="main">

        <?php
            $layout = array(
                        'news' => '/layout/category-news.php',
                        'products' => '/layout/category-products.php'
                      );

            $tp = 'news';

            $cat_id = get_query_var('cat');        
            $cat = get_category( $cat_id );

            $cat_meta = get_option("category_$cat_id");

            if ( isset( $cat_meta['cat-metabox-layout-category'] ) ) :

                $tp = $cat_meta['cat-metabox-layout-category'];

                if ( $tp === 'null' )  :

                    $tp = 'news';

                endif;

            endif; 

            include( locate_template( $layout[ $tp ] ) );

 get_footer(); ?>