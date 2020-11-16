<!-- articlesBoxLayout -->
<div class="articlesBoxLayout boxCatNews ohidden mtop20">

	<!-- two-columns-layout -->
	<div class="split-columns two-columns-layout">

		<div class="item-layout col-md-3 col-sm-3 col-xs-12">

			<?php dynamic_sidebar( 'ColLeft Projects Sidebar' ); ?>

		</div>

		<div class="col-right item-layout boxColumnHBorder --left --top pad20-ms col-md-9 col-sm-9 col-xs-12 pull-right">

			<!-- articlesFirstShow -->
			<div class="articlesFirstShow col-xs-12">				

				<?php 
					$args = array(

						'hide_empty' => 0,
						'order' => 'desc',
						'orderby' => 'date',
						'child_of' => get_query_var('cat')

					); 

					$categories = get_categories( $args );


					if ( $categories ) : 

						include ( locate_template( '/layout/category-projects-subchild.php' ) );

					else :

						include ( locate_template( '/layout/category-projects-nosubchild.php' ) );

					endif; ?>				
				

			</div>
			<!-- articlesFirstShow -->

			<div class="clearfix"></div>

			<?php wp_page_navigation();
				  wp_reset_query(); ?>

		</div>

	</div>
	<!-- #two-columns-layout -->

</div>
<!-- #articlesBoxLayout -->