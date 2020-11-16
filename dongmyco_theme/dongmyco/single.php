<?php get_header(); 
	global $post; ?>
    
    <!-- main -->
    <section id="main">

        <?php
            $layout = array(
                        'news' => '/layout/single-news.php',
                        'products' => '/layout/single-products.php'
                      );

            $tp = 'news';
                      
            $cat = get_the_category();
            $cat = $cat[ sizeof($cat) - 1 ];

            $cat_id = $cat->term_id;

            $cat_meta = get_option("category_$cat_id");

            if ( isset( $cat_meta['cat-metabox-layout-category'] ) ) :

                $tp = $cat_meta['cat-metabox-layout-category'];

                if ( $tp === 'null' )  :

                    $tp = 'news';

                endif;

            endif;

            include( locate_template( $layout[ $tp ] ) ); 

 get_footer(); ?>
