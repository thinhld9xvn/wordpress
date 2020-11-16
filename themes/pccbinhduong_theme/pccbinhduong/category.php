<?php get_header(); ?>

	<!-- main -->
	<section id="main">

		<!-- container -->
		<div class="container">	

			
			<?php if ( function_exists( 'print_breadcrumbs' ) ) :

				 	print_breadcrumbs( 'breadcumbs', 'Trang chủ', '<span class="fa fa-caret-right cred"></span>'); 

				 endif; 

				$layout = array(
                        'tin-tuc' => '/layout/category-news.php',
                        'san-pham' => '/layout/category-products.php',
                        'duan-congtrinh' => '/layout/category-projects.php'
                      );

				$tp = 'tin-tuc';
                      
	            $cat_id = get_query_var('cat');
	            $cat_meta = get_option("category_$cat_id");

	            if ( isset( $cat_meta['cat-metabox-layout-category'] ) ) :

	            	$tp = $cat_meta['cat-metabox-layout-category'];

		            if ( $tp === 'null' || empty( $tp ) ) :
		                $tp = 'tin-tuc';
		            endif;            
	            	

	            endif;     

	            include( locate_template( $layout[ $tp ] ) );
	           
			?>
			

		</div>
		<!-- #container -->
		
	</section>
	<!-- #main -->	

<?php get_footer(); ?>