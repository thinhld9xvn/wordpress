<?php get_header();       
      $head_options = get_option('section-header_option_name'); ?>
    
    <!-- main -->
    <section id="main">  

		<!-- support -->
		<div class="support">

			<!-- container -->
			<div class="container">
				<img class="w100p" src="<?php echo $head_options['banner-support-id']; ?>" alt="support" />
			</div>
			<!-- #container -->

		</div>
		<!-- #support -->

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
